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
        $cows = $this->get('cow_service')->listCow();
        return $this->render('cowinner/list.html.twig', compact('cows'));
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
