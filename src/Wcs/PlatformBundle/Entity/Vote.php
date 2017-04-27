<?php

namespace Wcs\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vote
 *
 * @ORM\Table(name="vote")
 * @ORM\Entity(repositoryClass="Wcs\PlatformBundle\Repository\VoteRepository")
 */
class Vote
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="votes")
     */
    private $user;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Questions", inversedBy="votes")
     */
    private $question;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Reponses", inversedBy="votes")
     */
    private $reponse;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param \Wcs\PlatformBundle\Entity\User $user
     *
     * @return Vote
     */
    public function setUser(\Wcs\PlatformBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Wcs\PlatformBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set question
     *
     * @param \Wcs\PlatformBundle\Entity\Questions $question
     *
     * @return Vote
     */
    public function setQuestion(\Wcs\PlatformBundle\Entity\Questions $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \Wcs\PlatformBundle\Entity\Questions
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set reponse
     *
     * @param \Wcs\PlatformBundle\Entity\Reponses $reponse
     *
     * @return Vote
     */
    public function setReponse(\Wcs\PlatformBundle\Entity\Reponses $reponse = null)
    {
        $this->reponse = $reponse;

        return $this;
    }

    /**
     * Get reponse
     *
     * @return \Wcs\PlatformBundle\Entity\Reponses
     */
    public function getReponse()
    {
        return $this->reponse;
    }

}
