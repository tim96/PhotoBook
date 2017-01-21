<?php

namespace Tim\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TimUserBundle:Default:index.html.twig');
    }
}
