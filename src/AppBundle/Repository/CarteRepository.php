<?php

namespace AppBundle\Repository;

/**
 * CarteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CarteRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByCarteIds($tabIds){
        
        return $this->getEntityManager()->createQuery(""
                . "SELECT   c "
                . "FROM     AppBundle:Carte c "
                . "WHERE    c.id IN (:ids)")
                ->setParameter("ids", $tabIds)
                ->getResult();
    }
    
    /**
     * Renvoie un tableau comprenant (id, type) des cartes du
     * joueur dont tu passes l'id en paramètre.
     * @param type $joueurId
     */
    public function findDataByJoueurId($joueurId){
        
        return $this->getEntityManager()->createQuery(""
                . "SELECT   c.id, c.type "
                . "FROM     AppBundle:Carte c "
                . "         JOIN c.joueur j "
                . "WHERE    j.id=:joueurId")
                ->setParameter("joueurId", $joueurId)
                ->getScalarResult();
    }
}
