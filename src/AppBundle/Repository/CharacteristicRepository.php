<?php

namespace AppBundle\Repository;

/**
 * Class CharacteristicRepository
 *
 * @package AppBundle\Repository
 */
class CharacteristicRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @return array
     */
    public function findTopLevelWithAttributes()
    {
        return $this->createQueryBuilder('characteristics')
            ->addSelect('children')
            ->addSelect('attributes')
            ->addSelect('parent')
            ->leftJoin('characteristics.children', 'children')
            ->leftJoin('characteristics.parent', 'parent')
            ->leftJoin('characteristics.attributes', 'attributes')
            ->getQuery()
            ->getResult();
    }
}
