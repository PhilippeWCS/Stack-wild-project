<?php

namespace Wcs\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WcsPlatformBundle:Default:index.html.twig');
    }
}
