<?php

namespace Wcs\PlatformBundle\Controller;

use Wcs\PlatformBundle\Entity\Reponses;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Reponse controller.
 *
 */
class ReponsesController extends Controller
{
    /**
     * Lists all reponse entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reponses = $em->getRepository('WcsPlatformBundle:Reponses')->findAll();

        return $this->render('reponses/index.html.twig', array(
            'reponses' => $reponses,
        ));
    }

    /**
     * Creates a new reponse entity.
     *
     *
     */
    public function newAction(Request $request, $idQuestion = null)
    {
        $reponse = new Reponses();
        $user = $this->getUser();
        $reponse->setUser($user);
        $form = $this->createForm('Wcs\PlatformBundle\Form\ReponsesType', $reponse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reponse);
            $em->flush();

            return $this->redirectToRoute('questions_show', array('id' => $reponse->getQuestion()->getId()));
        }

        return $this->render('reponses/new.html.twig', array(
            'reponse' => $reponse,
            'idQuestion' => $idQuestion,
            'form' => $form->createView()
        ));
    }

    /**
     * Finds and displays a reponse entity.
     *
     */
    public function showAction(Reponses $reponse)
    {
        $deleteForm = $this->createDeleteForm($reponse);

        return $this->render('reponses/show.html.twig', array(
            'reponse' => $reponse,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reponse entity.
     *
     */
    public function editAction(Request $request, Reponses $reponse)
    {
        $deleteForm = $this->createDeleteForm($reponse);
        $editForm = $this->createForm('Wcs\PlatformBundle\Form\ReponsesType', $reponse);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reponses_edit', array('id' => $reponse->getId()));
        }

        return $this->render('reponses/edit.html.twig', array(
            'reponse' => $reponse,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reponse entity.
     *
     * @Security("has_role('ROLE_USER')")
     *
     */
    public function deleteAction(Request $request, Reponses $reponse)
    {
        $form = $this->createDeleteForm($reponse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reponse);
            $em->flush();
        }

        return $this->redirectToRoute('reponses_index');
    }

    /**
     * Creates a form to delete a reponse entity.
     *
     * @param Reponses $reponse The reponse entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reponses $reponse)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reponses_delete', array('id' => $reponse->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
