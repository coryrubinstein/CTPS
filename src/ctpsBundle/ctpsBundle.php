<?php

namespace ctpsBundle;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ctpsBundle extends Bundle
{
    /**
     * @Route("/"}, name="home")
     */
    public function showAction()
    {

        $points = [
            'Please just let this work',
            'I would really appreciate it'

        ];

        return $this->render('/Default/index.html.twig', [
            'points' => $points
        ]);

    }
}
