<?php

namespace App\Repository;

use App\Entity\Pokemon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Pokemon>
 */
class PokemonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pokemon::class);
    }

    public function findAllOrderedByNameAsc()
    {
        $this->getEntityManager();
        $dql = "SELECT p FROM App\Entity\Pokemon p ORDER BY p.nom ASC";
        $query = $this->getEntityManager()->createQuery($dql);
        return $query->getResult();
    }

    public function findAllOrderedByNameDesc()
    {
        $this->getEntityManager();
        $dql = "SELECT p FROM App\Entity\Pokemon p ORDER BY p.nom DESC";
        $query = $this->getEntityManager()->createQuery($dql);
        return $query->getResult();
    }

    public function findAllCaptured(){
        $this->getEntityManager();
        $dql = "SELECT p FROM App\Entity\Pokemon p WHERE p.estCapture = 1 ORDER BY p.nom ASC";
        $query = $this->getEntityManager()->createQuery($dql);
        return $query->getResult();
    }
}
