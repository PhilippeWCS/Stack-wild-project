<?php

namespace Wcs\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Wcs\PlatformBundle\Entity\Categories;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class CategoriesController extends Controller
{
    /**
     * @Security("has_role('ROLE_USER')")
     */
    public function addAction(Request $request)
    {
        $categorie = new Categories();
        $form = $this->createForm('Wcs\PlatformBundle\Form\CategoriesType', $categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();

            return $this->redirectToRoute('wcs_platform_categories_index');
        }
        return $this->render('categories/add.html.twig', array(
            'categorie' => $categorie,
            'form' => $form->createView(),
        ));
    }

    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('WcsPlatformBundle:Categories')->findAll();
        return $this->render('categories/index.html.twig', array(
            'categories'=> $categories,
        ));
    }

}
