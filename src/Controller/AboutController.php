<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    private const MISSIONS = [
        [
            'title' => 'Expertise R.H.',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Etiam lacus nunc, euismod eu ultricies porta, congue eget quam. 
            Vestibulum accumsan libero id feugiat condimentum. 
            Cras molestie interdum elementum. Mauris ipsum ex, 
            fringilla eu dignissim sed, dignissim id tellus. 
            Nulla at scelerisque magna. Maecenas pharetra volutpat sapien, 
            at sagittis eros vulputate non. Aliquam blandit lacus ac enim sollicitudin dapibus. 
            Aenean sed est id arcu feugiat bibendum. Sed pulvinar vel sapien ut faucibus. 
            Vestibulum eget justo id odio consectetur rutrum in fringilla nisl. 
            Proin placerat aliquet risus non pretium. Nunc congue metus finibus nibh 
            bibendum cursus. In tortor nisl, blandit sit amet euismod sed, ultrices at turpis. ',
            'smImage' => 'https://via.placeholder.com/350x250?text=Small+Image',
            'mdImage' => 'https://via.placeholder.com/500x250?text=Medium+Image',
        ],
        [
            'title' => 'C.V. automatisé et anonyme',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Etiam lacus nunc, euismod eu ultricies porta, congue eget quam. 
            Vestibulum accumsan libero id feugiat condimentum. 
            Cras molestie interdum elementum. Mauris ipsum ex, 
            fringilla eu dignissim sed, dignissim id tellus. 
            Nulla at scelerisque magna. Maecenas pharetra volutpat sapien, 
            at sagittis eros vulputate non. Aliquam blandit lacus ac enim sollicitudin dapibus. 
            Aenean sed est id arcu feugiat bibendum. Sed pulvinar vel sapien ut faucibus. 
            Vestibulum eget justo id odio consectetur rutrum in fringilla nisl. 
            Proin placerat aliquet risus non pretium. Nunc congue metus finibus nibh 
            bibendum cursus. In tortor nisl, blandit sit amet euismod sed, ultrices at turpis. ',
            'smImage' => 'https://via.placeholder.com/350x250?text=Small+Image',
            'mdImage' => 'https://via.placeholder.com/500x250?text=Medium+Image',
        ],
        [
            'title' => 'Recrutement de hauts potentiels',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Etiam lacus nunc, euismod eu ultricies porta, congue eget quam. 
            Vestibulum accumsan libero id feugiat condimentum. 
            Cras molestie interdum elementum. Mauris ipsum ex, 
            fringilla eu dignissim sed, dignissim id tellus. 
            Nulla at scelerisque magna. Maecenas pharetra volutpat sapien, 
            at sagittis eros vulputate non. Aliquam blandit lacus ac enim sollicitudin dapibus. 
            Aenean sed est id arcu feugiat bibendum. Sed pulvinar vel sapien ut faucibus. 
            Vestibulum eget justo id odio consectetur rutrum in fringilla nisl. 
            Proin placerat aliquet risus non pretium. Nunc congue metus finibus nibh 
            bibendum cursus. In tortor nisl, blandit sit amet euismod sed, ultrices at turpis. ',
            'smImage' => 'https://via.placeholder.com/350x250?text=Small+Image',
            'mdImage' => 'https://via.placeholder.com/500x250?text=Medium+Image',
        ],
    ];
    /**
     * @Route("/a-propos", name="about")
     */
    public function index(): Response
    {
        return $this->render('about/index.html.twig', ['missions' => self::MISSIONS]);
    }
}
