<?php

namespace GroupeBundle\Controller;

use AppBundle\Services\UploadService;
use Doctrine\Common\Persistence\ObjectManager;
use GestionBundle\Entity\NumDoc;
use GroupeBundle\Entity\HistoriqueEtat;
use GroupeBundle\Entity\HistoriqueGroupe;
use GroupeBundle\Entity\Probleme;
use GroupeBundle\Entity\problemePhoto;
use GroupeBundle\Entity\solutionProbleme;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use UserBundle\Entity\HistoriqueGlobal;

use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;


/**
 * Probleme controller.
 *
 * @Route("probleme")
 */
class ProblemeController extends Controller
{

    const ETAT_SIGNALER = "Problème signalé";
    const ETAT_PROPOSER = "Solution proposé";
    const ETAT_RESOLUTION = "Résolution en cour";
    const ETAT_RESOLU = "Problème résolu";
    const ETAT_NON_RESOLU = "Problème non-résolu";

    private function recupereNumeroProbleme(ObjectManager $em){

        $date = new \DateTime();

        $repositoryNumero = $em->getRepository('GestionBundle:NumDoc');
        $entityNumero = $repositoryNumero->findOneBy(array(
            'nom' => 'problème_groupe'
        ));

        if(! $entityNumero){
            $newNum = new NumDoc();
            $newNum->setNumero('001');
            $newNum->setNom('problème_groupe');

            $em->persist($newNum);
            $em->flush();

            $entityNumero = $newNum;
        }

        $numero = 'PBM-'.$entityNumero->getNumero().'/'.$date->format('Y');

        return $numero;

    }

    private function nextNumero(ObjectManager $em){

        $repositoryNumero = $em->getRepository('GestionBundle:NumDoc');
        $entityNumero = $repositoryNumero->findOneBy(array(
            'nom' => 'problème_groupe'
        ));

        $numeroPrec = $entityNumero->getNumero();

        $intNextNum = intval($numeroPrec) + 1;
        $nextNum = $intNextNum + 1;

        if(strlen($intNextNum) == 1){
            $nextNum = '00'.$intNextNum;
        }
        if(strlen($intNextNum) == 2){
            $nextNum = '0'.$intNextNum;
        }

        $numero = $em->getRepository('GestionBundle:NumDoc')
            ->findOneBy(array(
                'nom' => 'problème_groupe'
            ))
        ;
        $numero->setNumero($nextNum);
        $em->persist($numero);

    }


    /**
     * Lists all probleme entities.
     *
     * @Route("/signaler", name="probleme_new")
     *
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $listeGroupe = $em->getRepository('GroupeBundle:Groupe')->findBy(
            array(),
            array('numero' => "asc"))
        ;

        if($request->getMethod() == "POST"){
            $probleme = new Probleme();
            $probleme->setUserCreer($this->getUser());
            $probleme->setDateSignalement(\DateTime::createFromFormat('d/m/Y', $_POST['date']));

            $groupe = $em->getRepository('GroupeBundle:Groupe')->findOneBy(array(
                'id' => $_POST['groupe'],
            )) ;

            $probleme->setNumero($_POST['numero']);
            $probleme->setGroupe($groupe);
            $probleme->setCause($_POST['motif']);
            $probleme->setDescription($_POST['description']);
            $probleme->setEtat(self::ETAT_SIGNALER);

            $em->persist($probleme);

            //HISTORIQUE GROUPE
            $historiqueGroupe = new HistoriqueGroupe();
            $historiqueGroupe->setProblemeSignale($probleme);
            $historiqueGroupe->setDate($probleme->getDateSignalement());
            $historiqueGroupe->setGroupe($groupe);

            $em->persist($historiqueGroupe);

            if(! empty($_POST['signalerArret'])){
                $etatArret = $em->getRepository('GroupeBundle:ListeEtatGroupe')->find(3);
                $groupe->setEtatGroupe($etatArret);
            }

            //NEXT NUMERO
            $this->nextNumero($em);

            $em->flush();

            // ------------------- ////// HISTORIQUE GLOBAL ////// ---------------------

            $historiqueGlobal = new HistoriqueGlobal();
            $historiqueGlobal->setUserHistorique($this->getUser());
            $historiqueGlobal->setLibelle('Ajout du problème'.$probleme->getNumero());
            $historiqueGlobal->setLien($this->generateUrl('probleme_show', array('id' => $probleme->getId())));

            $em->persist($historiqueGlobal);

            // ------------------- ////// HISTORIQUE GLOBAL ////// ---------------------
            $em->flush();

            return $this->redirectToRoute('probleme_show', array('id' => $probleme->getId()));
        }

        return $this->render('@Groupe/probleme/new.html.twig', array(
            'numero' => $this->recupereNumeroProbleme($em),
            'listeGroupe' => $listeGroupe
        ));
    }

    /**
     * Lists all probleme entities.
     *
     * @Route("/liste", name="probleme_index")
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $problemes = $em->getRepository('GroupeBundle:Probleme')->findAll();

        return $this->render('@Groupe/probleme/index.html.twig', array(
            'problemes' => $problemes,
        ));
    }

    /**
     * Finds and displays a probleme entity.
     *
     * @Route("/afficher{id}500/info", name="probleme_show")
     *
     */
    public function showAction(Probleme $probleme)
    {
        $em = $this->getDoctrine()->getManager();
        $missions = $em->getRepository('GroupeBundle:Mission')->findBy(array(
            'probleme' => $probleme
        ));

        return $this->render('@Groupe/probleme/show.html.twig', array(
            'probleme' => $probleme,
            'missions' => $missions,
        ));
    }


    /**
     * Finds and displays a probleme entity.
     *
     * @Route("ajouter/solution{id}1320/info", name="probleme_ajouterSolution")
     *
     */
    public function ajouterSolutionAction(Request $request, Probleme $probleme)
    {
        $em = $this->getDoctrine()->getManager();

        if($request->getMethod() == 'POST'){

            $probleme->setEtat(self::ETAT_PROPOSER);

            $solution = new solutionProbleme();
            $solution->setUserSolution($this->getUser());
            $solution->setProbleme($probleme);
            $solution->setSolution($_POST['solutionText']);

            if($_FILES['solutionFile']['size'] > 0){

                $uploadService = new UploadService();

                if($pj = $uploadService->uploadSimpleFichier('CommSolution', 'solution', 'solutionFile')){
                    $solution->setPieceJointe($pj);
                }else{
                    throw new Exception('Erreur! Erreur dans le téléchargement du fichier..');
                }
            }

            $em->persist($solution);

            $em->persist($probleme);

            // ------------------- ////// HISTORIQUE GLOBAL ////// ---------------------

            $historiqueGlobal = new HistoriqueGlobal();
            $historiqueGlobal->setUserHistorique($this->getUser());
            $historiqueGlobal->setLibelle('Ajout d\'un solution dans : '.$probleme->getNumero() );
            $historiqueGlobal->setLien($this->generateUrl('probleme_show', array('id' => $probleme->getId())));


            $em->persist($historiqueGlobal);

            // ------------------- ////// HISTORIQUE GLOBAL ////// ---------------------

            $em->flush();
            
           // ------------------- AJOUTER ID PHOTO ---------------------

            if($solution->getPieceJointe()){
                $file = new Filesystem();
                $nomDuFichier = str_replace('CommSolution\\', "", $solution->getPieceJointe());
                try {
                    $file->rename('document/'.$solution->getPieceJointe() , 'document/CommSolution/'.$solution->getId().'-'.$nomDuFichier);

                } catch (IOExceptionInterface $exception) {
                    echo "Hey Allin An error occurred while creating your directory at ".$exception->getPath();
                }
                $solution->setPieceJointe('CommSolution/'.$solution->getId().'-'.$nomDuFichier);

                $em->persist($solution);
                $em->flush();
            }
           
           // ------------------- ////// AJOUTER ID PHOTO ////// ---------------------
            

            return $this->redirectToRoute('probleme_show', array('id' => $probleme->getId()));

        }

        throw new Exception("Erreur 404");

    }

    /**
     * Finds and displays a probleme entity.
     *
     * @Route("changer{id}1320/pbm/etat", name="probleme_changerEtat")
     *
     */
    public function changerEtatAction(Request $request, Probleme $probleme)
    {
        $em = $this->getDoctrine()->getManager();

        if ($request->getMethod() == 'POST') {

            if ($_POST['etat'] == "encour") {
                $probleme->setEtat(self::ETAT_RESOLUTION);
            }
            if ($_POST['etat'] == "resolu") {
                $probleme->setEtat(self::ETAT_RESOLU);
            }
            if ($_POST['etat'] == "non") {
                $probleme->setEtat(self::ETAT_NON_RESOLU);
            }

            $em->persist($probleme);
            // ------------------- ////// HISTORIQUE GLOBAL ////// ---------------------

            $historiqueGlobal = new HistoriqueGlobal();
            $historiqueGlobal->setUserHistorique($this->getUser());
            $historiqueGlobal->setLibelle('Changer l\'etat problème:'.$probleme->getEtat() );
            $historiqueGlobal->setLien($this->generateUrl('probleme_show', array('id' => $probleme->getId())));

            $em->persist($historiqueGlobal);


            // ------------------- ////// HISTORIQUE GLOBAL ////// ---------------------
            $em->flush();

            return $this->redirectToRoute('probleme_show', array('id' => $probleme->getId()));
        }
        throw new Exception("Erreur 404");

    }

    /**
     * Finds and displays a probleme entity.
     *
     * @Route("ajouter{id}1320/pbm/photo-autre", name="probleme_newPhoto")
     *
     */
    public function newPhotoProblemeAction(Request $request, Probleme $probleme)
    {
        $em = $this->getDoctrine()->getManager();

        if($request->getMethod() == 'POST'){

            $photo = new problemePhoto();
            $photo->setProbleme($probleme);
            $photo->setNom($_POST['nomProblemePhoto']);

            if($_FILES['fileProblemePhoto']['size'] > 0){

                $uploadService = new UploadService();

                if($pj = $uploadService->uploadSimpleFichier('Probleme', 'photoProb', 'fileProblemePhoto')){
                    $photo->setUrl($pj);
                }else{
                    throw new Exception('Erreur! Erreur dans le téléchargement du fichier..');
                }
            }

            $em->persist($photo);

            $em->flush();

            // ------------------- AJOUTER ID PHOTO ---------------------


            $file = new Filesystem();
            $nomDuFichier = str_replace('Probleme\\', "",$photo->getUrl());
            try {
                $file->rename('document/'.$photo->getUrl() , 'document/Probleme/'.$probleme->getId().'-'.$nomDuFichier);

            } catch (IOExceptionInterface $exception) {
                echo "Hey Allin An error occurred while creating your directory at ".$exception->getPath();
            }
            $photo->setUrl('Probleme/'.$probleme->getId().'-'.$nomDuFichier);

            $em->persist($photo);
            $em->flush();


            // ------------------- ////// AJOUTER ID PHOTO ////// ---------------------


            return $this->redirectToRoute('probleme_show', array('id' => $probleme->getId()));

        }

        throw new Exception("Erreur 404");
        
        
    }

    /**
     * Lists all probleme entities.
     *
     * @Route("/modifier{id}/500", name="probleme_edit")
     *
     */
    public function editAction(Request $request, Probleme $probleme){
        $em = $this->getDoctrine()->getManager();

        if($request->getMethod() == "POST"){

            $probleme->setCause($_POST['motif']);
            $probleme->setDescription($_POST['description']);

            $em->persist($probleme);;

            $em->flush();

            // ------------------- ////// HISTORIQUE GLOBAL ////// ---------------------

            $historiqueGlobal = new HistoriqueGlobal();
            $historiqueGlobal->setUserHistorique($this->getUser());
            $historiqueGlobal->setLibelle('Modification du problème'.$probleme->getNumero());
            $historiqueGlobal->setLien($this->generateUrl('probleme_show', array('id' => $probleme->getId())));

            $em->persist($historiqueGlobal);

            // ------------------- ////// HISTORIQUE GLOBAL ////// ---------------------
            $em->flush();

            return $this->redirectToRoute('probleme_show', array('id' => $probleme->getId()));
        }

        return $this->render('@Groupe/probleme/edit.html.twig', array(
            'numero' => $probleme->getNumero(),
            'probleme' => $probleme
        ));
    }


}
