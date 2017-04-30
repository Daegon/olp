<?php

namespace AppBundle\Repository;

/**
 * Class AttributeRepository
 *
 * @package AppBundle\Repository
 */
class AttributeRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @return array
     */
    public function findWithCharacteristics()
    {
        return $this->createQueryBuilder('attribute')
            ->addSelect('characteristics')
            ->leftJoin('attribute.characteristics', 'characteristics')
            ->getQuery()
            ->getResult();
    }
}
