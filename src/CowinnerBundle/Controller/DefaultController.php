<?php

namespace CowinnerBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use JMS\Serializer\SerializerBuilder;

use CowinnerBundle\Entity\Cow;
use CowinnerBundle\Form\CowDetails;

class DefaultController extends Controller
{
    private $serializer;

    public function __construct()
    {
        $this->serializer = SerializerBuilder::create()->build();
    }

    /**
     * @Route("/", name="home")
     */
    public function listAction()
    {        
        $data = $this->get('cow_service')->listCow();

        $cows = $this->serializer
            ->deserialize($data, 'array<CowinnerBundle\Entity\Cow>', 'json');

        return $this->render('cowinner/list.html.twig', compact('cows'));
    }

    /**
     * @Route("/create", name="create")
     */
    public function createAction(Request $request)
    {        
        $cow = new Cow();
        
        $form = $this->createForm(CowDetails::class, $cow);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $this->get('serializer')
                ->normalize($request->request->get('cow_details'));
            
            $this->get('cow_service')->create($data);
            
            return $this->redirect($this->generateUrl('home'));
        }
        
        return $this->render('cowinner/create.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
