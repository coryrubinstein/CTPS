<?php

namespace ctpsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="landingpage")
     */
    public function indexAction()
    {
        return $this->render('ctpsBundle:Default:index.html.twig');
    }
}
