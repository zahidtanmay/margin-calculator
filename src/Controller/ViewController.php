<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class ViewController
 * @package App\Controller
 */
class ViewController extends AbstractController
{
    /**
     * Homepage view
     * @Route("/", name="homepage")
     */
    public function index(): Response
    {
        return $this->render('home.html.twig');
    }
}
