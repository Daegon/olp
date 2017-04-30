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
            ->addSelect('aCharacteristics')
            ->leftJoin('characteristics.children', 'children')
            ->leftJoin('children.attributes', 'attributes')
            ->leftJoin('attributes.characteristics', 'aCharacteristics')
            ->where('characteristics.parent IS NULL')
            ->getQuery()
            ->getResult();
    }
}
