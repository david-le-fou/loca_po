<?php

namespace GroupeBundle\Repository;

use GroupeBundle\Entity\Groupe;

/**
 * SuiviPieceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SuiviPieceRepository extends \Doctrine\ORM\EntityRepository
{
    public function findChangementFhuile(Groupe $groupe){

        $qb = $this->createQueryBuilder('s');

        return $qb->join('s.groupe', 'g')
            ->join('s.typePiece', 't')
            ->where('g = :groupe')
            ->andWhere('t.nom like :filtre')
            ->andWhere('t.nom like :type')
            ->orderBy('s.date', 'DESC')
            ->setParameter('groupe', $groupe)
            ->setParameter('type', '%huile%')
            ->setParameter('filtre', '%filtre%')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findChangementFgasoil(Groupe $groupe){

        $qb = $this->createQueryBuilder('s');

        return $qb->join('s.groupe', 'g')
            ->join('s.typePiece', 't')
            ->where('g = :groupe')
            ->andWhere('t.nom like :filtre')
            ->andWhere('t.nom like :type')
            ->orderBy('s.date', 'DESC')
            ->setParameter('groupe', $groupe)
            ->setParameter('type', '%gasoil%')
            ->setParameter('filtre', '%filtre%')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findChangementFair(Groupe $groupe){

        $qb = $this->createQueryBuilder('s');

        return $qb->join('s.groupe', 'g')
            ->join('s.typePiece', 't')
            ->where('g = :groupe')
            ->andWhere('t.nom like :filtre')
            ->andWhere('t.nom like :type')
            ->orderBy('s.date', 'DESC')
            ->setParameter('groupe', $groupe)
            ->setParameter('type', '%air%')
            ->setParameter('filtre', '%filtre%')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
