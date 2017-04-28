<?php

namespace Wcs\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AllUsersController extends Controller
{
    public function showAction()
    {

        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('WcsPlatformBundle:User')->findAll();

        return $this->render('AllUsers/showList.html.twig', array(
            'users'=>$users,
        ));
    }

    public function showOneAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('WcsPlatformBundle:User')->find($id);

        return $this->render('AllUsers/show.html.twig', array(
            'user'=>$user,
        ));
    }

}
