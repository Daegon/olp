<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Attribute;
use AppBundle\Entity\Characteristic;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CharacteristicController extends Controller
{
    /**
     * @Route("/", name="homepage")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $characteristics = $this->getDoctrine()->getRepository(Characteristic::class)->findTopLevelWithAttributes();
        $attributes = $this->getDoctrine()->getRepository(Attribute::class)->findWithCharacteristics();

        return $this->render('AppBundle:characteristic:index.html.twig', compact('characteristics', 'attributes'));
    }
}
