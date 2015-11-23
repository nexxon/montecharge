<?php

namespace Ingesup\MonteChargeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('IngesupMonteChargeBundle:Default:index.html.twig');
    }
}
