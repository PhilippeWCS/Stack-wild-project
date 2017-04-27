<?php

namespace Wcs\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AllUsersController extends Controller
{
    public function showAction()
    {

        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('WcsPlatformBundle:User')->findAll();

        return $this->render('AllUsers/show.html.twig', array(
            'users'=>$users,
        ));
    }

}
