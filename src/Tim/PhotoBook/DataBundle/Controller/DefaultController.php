<?php

namespace Tim\PhotoBook\DataBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TimPhotoBookDataBundle:Default:index.html.twig');
    }
}
