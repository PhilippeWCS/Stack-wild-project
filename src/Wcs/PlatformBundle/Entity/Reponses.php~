<?php

namespace Wcs\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reponses
 *
 * @ORM\Table(name="reponses")
 * @ORM\Entity(repositoryClass="Wcs\PlatformBundle\Repository\ReponsesRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Reponses
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
     * @var string
     *
     * @ORM\Column(name="contenu", type="string", length=255)
     */
    private $contenu;

    /**
     * @var datetime
     *
     * @ORM\Column(name="Add_at", type="datetime")
     */
    private $addAt;

    /**
     *
     * @ORM\ManyToOne(targetEntity="user", inversedBy="reponses")
     *
     */
    private $user;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Questions", inversedBy="reponses")
     *
     */
    private $question;

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
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Reponses
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }
    

    /**
     * Set user
     *
     * @param \Wcs\PlatformBundle\Entity\user $user
     *
     * @return Reponses
     */
    public function setUser(\Wcs\PlatformBundle\Entity\user $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Wcs\PlatformBundle\Entity\user
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
     * @return Reponses
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
     * Set addAt
     *
     * @param \DateTime $addAt
     *
     * @return Reponses
     */
    public function setAddAt($addAt)
    {
        $this->addAt = $addAt;

        return $this;
    }

    /**
     * Get addAt
     *
     * @return \DateTime
     */
    public function getAddAt()
    {
        return $this->addAt->format('d/m/Y H:i:s');
    }

    /**
     * @ORM\PrePersist
     */
    public function setAddAtValue()
    {
        $this->addAt = new \DateTime();
    }
}
