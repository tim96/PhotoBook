<?php

namespace Tim\PhotoBook\FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TimPhotoBookFrontendBundle:Default:index.html.twig');
    }
}
