<?php

namespace AppBundle\Repository;

use Doctrine\ORM\Query;
use Doctrine\ORM\EntityRepository;

class MenuRepository extends EntityRepository
{
    /**
     * Récupère un menu par son identifiant
     *
     * @param  int $id
     *
     * @return Menu
     */
    public function getById($id)
    {
        return $this
            ->createQueryBuilder('m')
            ->where('m.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
