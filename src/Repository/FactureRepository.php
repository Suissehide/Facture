<?php

namespace App\Repository;

use App\Entity\Facture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Facture|null find($id, $lockMode = null, $lockVersion = null)
 * @method Facture|null findOneBy(array $criteria, array $orderBy = null)
 * @method Facture[]    findAll()
 * @method Facture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FactureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Facture::class);
    }

    public function compte()
    {
        return $this->createQueryBuilder('p')
                    ->select('COUNT(p)')
                    ->getQuery()
                    ->getSingleScalarResult();
    }

    public function findByFilter($sort, $searchPhrase)
    {
        $qb = $this->createQueryBuilder('p');
        if ($searchPhrase != "") {
            $qb->andWhere('
                    p.myCompany LIKE :search
                    OR p.clientCompany LIKE :search
                ')
                ->setParameter('search', '%' . $searchPhrase . '%');
        }
        if ($sort) {
            foreach ($sort as $key => $value) {
                if ($key == 'entreprise')
                    $qb->orderBy('p.myCompany', $value);
                else if ($key == 'client')
                    $qb->orderBy('p.clientCompany', $value);
                else if ($key == 'facturation')
                    $qb->orderBy('p.invoiceDate', $value);
                else if ($key == 'echeance')
                    $qb->orderBy('p.dueDate', $value);
                else if ($key == 'description')
                    $qb->orderBy('p.projectDescription', $value);
                else
                    $qb->orderBy('p.' . $key, $value);
            }
        } else {
            $qb->orderBy('p.dueDate', 'ASC');
        }
        return $qb;
    }

    // /**
    //  * @return Facture[] Returns an array of Facture objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Facture
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
