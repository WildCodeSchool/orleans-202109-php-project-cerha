<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Entity\User;
use App\Form\RegistrationCandidateType;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use App\Security\EmailVerifier;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

class RegistrationController extends AbstractController
{
    private EmailVerifier $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }

    /**
     * @Route("/register", name="app_register")
     */
    public function register(
        Request $request,
        UserPasswordHasherInterface $userPasswordHasher,
        EntityManagerInterface $entityManager
    ): Response {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('password')->getData() //@phpstan-ignore-line
                )
            );

            $entityManager->persist($user);

            $entityManager->flush();

            $_POST['user'] = $user;

            // generate a signed url and email it to the user
            /** @var string */
            $address = $this->getParameter('mailer_from');
            /** @var string */
            $userEmail = $user->getEmail();
            $this->emailVerifier->sendEmailConfirmation(
                'app_verify_email',
                $user,
                (new TemplatedEmail())
                    ->from(new Address($address, 'CERHA Confirmation'))
                    ->to($userEmail)
                    ->subject('Please Confirm your Email')
                    ->htmlTemplate('registration/confirmation_email.html.twig')
            );

            $userId = $user->getId();
            $this->addFlash('warning', 'Allez vérifier votre email afin de compléter votre inscription');

            if ($form->get('type')->getData() == 'Entreprise') {
                return $this->redirectToRoute('register_candidat', ['id' => $userId]);
            } else {
                return $this->redirectToRoute('register_candidat', ['id' => $userId]);
            }
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/verify/email", name="app_verify_email")
     */
    public function verifyUserEmail(Request $request): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            /** @var User */
            $user = $this->getUser();
            $this->emailVerifier->handleEmailConfirmation($request, $user);
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $exception->getReason());

            return $this->redirectToRoute('app_register');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success', 'Votre addresse email a été vérifiée.');

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/register/candidat", name="register_candidat")
     */
    public function candidatRegistration(
        Request $request,
        EntityManagerInterface $entityManager,
        UserRepository $userRepository
    ): Response {
        $user = $userRepository->findOneById($_GET['id']);
        $candidat = new Candidat();
        $form = $this->createForm(RegistrationCandidateType::class, $candidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $candidat->setUser($user);
            $entityManager->persist($candidat);
            $entityManager->flush();

            $this->addFlash('success', 'Inscription terminée, merci de vous connecter et compléter votre profil.');

            return $this->redirectToRoute('candidat_show');
        }

        return $this->render('registration/registerCandidat.html.twig', [
            'registrationCandidatForm' => $form->createView(),
        ]);
    }
}
