<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request)
    {
        $form = $this->createForm(ContactType::Class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $formData = $form->getData();

            dump($formData);
        }

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'contact_form' => $form->createView()
        ]);
    }
}
