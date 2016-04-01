<?php

namespace CowinnerBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use CowinnerBundle\Entity\Cow;
use CowinnerBundle\Form\CowDetails;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function listAction()
    {        
        $data = $this->get('cow_service')->list();

        $cows = $this->get('serializer')
                ->denormalize($data, Cow::class, ['groups' => ['details']]);

        print_r($cows);exit;

        // return $this->render('cowinner/list.html.twig', compact('cows'));
    }

    /**
     * @Route("/create", name="")
     */
    public function createAction(Request $request)
    {        
        $cow = new Cow();
        
        $form = $this->createForm(CowDetails::class, $cow);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $this->get('serializer')
                ->normalize($cow, null, ['groups' => ['details']]);
            
            $this->get('cow_service')->create($data);
            
            return $this->redirectToRoute('/');
        }
        
        return $this->render('cowinner/create.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
