<?php

namespace Board\BoardBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * BoardRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository
{
	public function findOneByIdJoinedToBoard($num)
    {
    $query = $this->getEntityManager()
        ->createQuery(
            'SELECT p, c FROM BoardBundle:User p
            JOIN p.name c
            WHERE p.id = :id'
        )->setUser('id', $num);

    try {
        return $query->getSingleResult();
    } catch (\Doctrine\ORM\NoResultException $e) {
        return null;
    }
    }
}
