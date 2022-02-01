<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $email = (new Email())
                ->from($this->getParameter('mailer_from')) /** @phpstan-ignore-line */
                ->to($this->getParameter('mailer_to')) /** @phpstan-ignore-line */
                ->subject('Vous avez reçu un nouveau message')
                ->html($this->renderView('contact/newEmail.html.twig', ['contact' => $contact]));

            $mailer->send($email);
            $this->addFlash('success', 'Merci, votre message a bien été envoyé.');

            return $this->redirectToRoute('contact');
        }



        return $this->render('contact/index.html.twig', ['form' => $form->createView()]);
    }
}
