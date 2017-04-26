<?php

namespace Wcs\PlatformBundle\Controller;

use Wcs\PlatformBundle\Entity\Questions;
use Wcs\PlatformBundle\Entity\Categories;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Question controller.
 *
 */
class QuestionsController extends Controller
{
    /**
     * Lists all question entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $questions = $em->getRepository('WcsPlatformBundle:Questions')->findAll();

        return $this->render('questions/index.html.twig', array(
            'questions' => $questions,
        ));
    }

    /**
     * Creates a new question entity.
     *
     * @Security("has_role('ROLE_USER')")
     */
    public function newAction(Request $request)
    {
        $question = new Questions();
        $user = $this->getUser();
        $question->setUser($user);
        $form = $this->createForm('Wcs\PlatformBundle\Form\QuestionsType', $question);



        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($question);
            $em->flush();

            return $this->redirectToRoute('questions_index');
        }

        return $this->render('questions/new.html.twig', array(
            'question' => $question,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a question entity.
     *
     */
    public function showAction(Questions $question)
    {
        $deleteForm = $this->createDeleteForm($question);
        $em = $this->getDoctrine()->getManager();
        $NbVue = $question->getNbVue();
        $NbVue += 1;
        $question->setNbVue($NbVue);
        $em->flush();



        return $this->render('questions/show.html.twig', array(
            'question' => $question,
            'delete_form' => $deleteForm->createView()
        ));
    }

    /**
     * Displays a form to edit an existing question entity.
     *
     * @Security("has_role('ROLE_USER')")
     */
    public function editAction(Request $request, Questions $question)
    {
        $deleteForm = $this->createDeleteForm($question);
        $editForm = $this->createForm('Wcs\PlatformBundle\Form\QuestionsType', $question);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('questions_edit', array('id' => $question->getId()));
        }

        return $this->render('questions/edit.html.twig', array(
            'question' => $question,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a question entity.
     *
     * @Security("has_role('ROLE_USER')")
     *
     */
    public function deleteAction(Request $request, Questions $question)
    {
        $form = $this->createDeleteForm($question);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($question);
            $em->flush();
        }

        return $this->redirectToRoute('questions_index');
    }

    /**
     * Creates a form to delete a question entity.
     *
     * @param Questions $question The question entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Questions $question)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('questions_delete', array('id' => $question->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
