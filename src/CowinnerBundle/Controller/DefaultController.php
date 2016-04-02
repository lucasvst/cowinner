<?php

namespace CowinnerBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use JMS\Serializer\SerializerBuilder;

use CowinnerBundle\Entity\CowEntity as Cow;
use CowinnerBundle\Form\CowDetails;

class DefaultController extends Controller
{
    use \CowinnerBundle\Traits\LoggerTrait;

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

        $costs = [];

        try {
            
            $cows = $this->serializer
                ->deserialize($data, 'array<CowinnerBundle\Entity\CowEntity>', 'json');

        } catch (\Exceptiom $e) {

            $this->logMe($e);
            $this->addFlash('notice', 'Sorry, something went wrong...I\'ll fix asap.');
        }

            foreach ( $cows as $cow ) {
                $costs[] = $this->get('cost_factory')->build($cow);
            }

            $costs = $this->get('cost_arbitrator')->arbitrate($costs);

        return $this->render('cowinner/list.html.twig', compact('costs'));
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

            try {

                $data = $this->get('serializer')
                    ->normalize($request->request->get('cow_details'));
            
                $this->get('cow_service')->create($data);
            
            } catch (\Exceptiom $e) {

                $this->logMe($e);
                $this->addFlash('notice', 'Sorry, something went wrong...I\'ll fix asap.');
            }
            
            return $this->redirect($this->generateUrl('home'));
        }
        
        return $this->render('cowinner/create.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function deleteAction($id)
    {
        try {
        
            $this->get('cow_service')->delete($id);
        
        } catch (\Exceptiom $e) {

            $this->logMe($e);
            $this->addFlash('notice', 'Sorry, something went wrong...I\'ll fix asap.');            
        }

        $this->addFlash('notice', 'Cow fired!');
        return $this->redirectToRoute('home');
    }
}
