<?php

namespace Wcs\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Wcs\PlatformBundle\Entity\Questions;
use Wcs\PlatformBundle\Entity\Vote;
use Wcs\PlatformBundle\WcsPlatformBundle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class VoteController extends Controller
{
    /**
     * @Security("has_role('ROLE_USER')")
     */
    public function voteAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $vote = new Vote();

            $id = $request->get('id');
            $type = $request->get('type');

            $em = $this->getDoctrine()->getManager();
            $user = $this->getUser();
            $vote->setUser($user);

            if($type === 'question'){
                $question = $em->getRepository('WcsPlatformBundle:Questions')->find($id);
                $vote->setQuestion($question);
                $em->persist($vote);
                $em->flush();
                $nbVote = count($em->getRepository('WcsPlatformBundle:Vote')->findBy(array('question' => $id)));

                return new JsonResponse(array('nbVote' => $nbVote));
            }
            else if ($type === 'reponse'){
                $reponse = $em->getRepository('WcsPlatformBundle:Reponses')->find($id);
                $vote->setReponse($reponse);
                $em->persist($vote);
                $em->flush();
                $nbVote = count($em->getRepository('WcsPlatformBundle:Vote')->findBy(array('reponse' => $id)));

                return new JsonResponse(array('nbVote' => $nbVote));
            }
        }
        return new JsonResponse(array('erreur' => 'Une erreur s\'est produite'));
    }
}
