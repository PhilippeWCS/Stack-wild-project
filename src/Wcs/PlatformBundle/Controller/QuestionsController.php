<?php

namespace Wcs\PlatformBundle\Controller;

use Wcs\PlatformBundle\Entity\Questions;
use Wcs\PlatformBundle\Entity\Categories;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;

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

            $this->addFlash(
                'success',
                'La question a bien été ajoutée'
            );

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
        $em = $this->getDoctrine()->getManager();
        $NbVue = $question->getNbVue();
        $NbVue += 1;
        $question->setNbVue($NbVue);
        $em->flush();

        $voteRepFobidden = $em->getRepository('WcsPlatformBundle:Vote')->voteReponsesForbiddenByUserAndByQuestion($this->getUser(), $question->getId());
        $voteQuestForbidden = $em->getRepository('WcsPlatformBundle:Vote')->findBy(array(
            'user' => $this->getUser(),
            'question' => $question->getId()
        ));

        return $this->render('questions/show.html.twig', array(
            'question' => $question,
            'voteRepFobidden' => $voteRepFobidden,
            'voteQuestForbidden' => $voteQuestForbidden,
        ));
    }

    /**
     * Displays a form to edit an existing question entity.
     *
     * @Security("has_role('ROLE_USER')")
     */
    public function editAction(Request $request, Questions $question)
    {
        $editForm = $this->createForm('Wcs\PlatformBundle\Form\QuestionsType', $question);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash(
                'success',
                'La question a bien été modifiée'
            );

            return $this->redirectToRoute('questions_show', array('id' => $question->getId()));
        }

        return $this->render('questions/edit.html.twig', array(
            'question' => $question,
            'edit_form' => $editForm->createView(),
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
        $em = $this->getDoctrine()->getManager();
        $em->remove($question);
        $em->flush();

        $this->addFlash(
            'success',
            'La question a bien été supprimée'
        );

        return $this->redirectToRoute('questions_index');
    }

    public function resoluAction(Request $request)
    {
        if ($request->isXmlHttpRequest()){
            $id = $request->get('id');

            $em = $this->getDoctrine()->getManager();

            $question = $em->getRepository('WcsPlatformBundle:Questions')->find($id);
            $question->setResolu($id);

            $em->flush();
            return new JsonResponse(array('statut' => "ok"));
        }
    }

}
