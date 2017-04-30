<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Attribute;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Characteristic;

/**
 * Class LoadCharacteristicsData
 *
 * @package AppBundle\DataFixtures\ORM
 */
class LoadCharacteristicsData implements FixtureInterface
{
    /**
     * @var int
     */
    protected $characteristicsCount = 0;
    /**
     * @var int
     */
    protected $attributesCount = 0;


    /**
     * @inheritdoc
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 30; $i++) {
            $characteristic = $this->createCharacteristic();
            for ($j = 1; $j <= 3; $j++) {
                $childCharacteristic = $this->createCharacteristic();
                // create new attribute time to time
                if (empty($attribute) || 1 === rand(1, 2)) {
                    $attribute = $this->createAttribute();
                    $manager->persist($attribute);
                }
                $childCharacteristic->addAttribute($attribute);
                $childCharacteristic->setParent($characteristic);
                $characteristic->addChild($childCharacteristic);
            }
            $manager->persist($characteristic);
        }

        $manager->flush();
    }

    /**
     * @return Characteristic
     */
    protected function createCharacteristic()
    {
        $this->characteristicsCount++;

        $characteristic = new Characteristic();
        $characteristic->setName("Characteristic {$this->characteristicsCount}");

        return $characteristic;
    }

    /**
     * @return Attribute
     */
    protected function createAttribute()
    {
        $this->attributesCount++;

        $attribute = new Attribute();
        $attribute->setName("Attribute {$this->attributesCount}");

        return $attribute;
    }
}