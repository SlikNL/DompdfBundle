<?php

namespace Slik\DompdfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SlikDompdfBundle:Default:index.html.twig', array('name' => $name));
    }
}
