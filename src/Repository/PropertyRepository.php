<?php

namespace App\Repository;

use App\Entity\Property;
use App\Entity\PropertySearch;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Property|null find($id, $lockMode = null, $lockVersion = null)
 * @method Property|null findOneBy(array $criteria, array $orderBy = null)
 * @method Property[]    findAll()
 * @method Property[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Property::class);
    }

    public function findAllVisibleQuery(PropertySearch $search)
    {
        // $query = $this->findVisibleQuery();
        $query = $this->createQueryBuilder('p');
        if($search->getMaxPrice()){
            $query->andwhere('p.price <= :maxprice')
                  ->setParameter('maxprice', $search->getMaxPrice());
        }
        if($search->getMinSurface()){
            $query->andwhere('p.surface >= :minsurface')
                  ->setParameter('minsurface', $search->getMinSurface());
                  
        }
        if($search->getTags()->count() > 0){
            $k = 0;
            foreach($search->getTags() as $tag){
                $k++;
                $query = $query
                        ->andWhere(":tag$k MEMBER OF p.tags")
                        ->setParameter("tag$k", $tag );
            }
        }
        return $query->getQuery();
                    
                    
    }

    public function lastProperty(): array
    {
        return $this->createQueryBuilder('p')
                    ->orderBy('p.id', 'DESC')
                    ->setMaxResults(12)
                    ->getQuery()
                    ->getResult();
                   
    }

    private function findVisibleQuery()
    {
        return $this->createQueryBuilder('p')
        ->getQuery()
        ->getResult();
    }

    // /**
    //  * @return Property[] Returns an array of Property objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Property
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
