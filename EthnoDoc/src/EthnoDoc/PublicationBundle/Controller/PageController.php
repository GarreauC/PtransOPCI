<?php

namespace EthnoDoc\PublicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function homeAction() {
        return $this->render('EthnoDocPublicationBundle:Page:home.html.twig', array(

        ));
    }

    public function registerAction()
    {
        return $this->render('EthnoDocPublicationBundle:Page:register.html.twig', array(
                // ...
            ));    }

}
