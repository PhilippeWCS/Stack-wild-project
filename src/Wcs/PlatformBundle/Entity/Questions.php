<?php

namespace Wcs\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Formulaire des Questions
 *
 * @ORM\Table(name="questions")
 * @ORM\Entity(repositoryClass="Wcs\PlatformBundle\Repository\QuestionsRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Questions
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
     * @ORM\Column(name="Intitule_question", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Length(
     *      min = 3,
     *      max = 255,
     * )
     */
    private $intituleQuestion;

    /**
     * @var string
     *
     * @ORM\Column(name="Contenu", type="text")
     * @Assert\NotBlank()
     */
    private $contenu;

    /**
     * @var integer
     *
     * @ORM\Column(name="Nb_vue", type="integer")
     */
    private $nbVue = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="resolu", type="integer")
     */
    private $resolu = 0;

    /**
     * @var datetime
     *
     * @ORM\Column(name="Add_at", type="datetime")
     */
    private $addAt;

    /**
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="questions")
     */
    private $user;

    /**
     *
     * @ORM\ManyToMany(targetEntity="Categories", inversedBy="questions")
     * @ORM\JoinTable(name="questions_categories")
     */
    private $categories;

    /**
     *
     * @ORM\OneToMany(targetEntity="Reponses", mappedBy="question")
     */
    private $reponses;

    /**
     *
     * @ORM\OneToMany(targetEntity="Vote", mappedBy="question")
     *
     */
    private $votes;

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
     * Set intituleQuestion
     *
     * @param string $intituleQuestion
     *
     * @return Questions
     */
    public function setIntituleQuestion($intituleQuestion)
    {
        $this->intituleQuestion = $intituleQuestion;

        return $this;
    }

    /**
     * Get intituleQuestion
     *
     * @return string
     */
    public function getIntituleQuestion()
    {
        return $this->intituleQuestion;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Questions
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
     * Set lienImage
     *
     * @param string $lienImage
     *
     * @return Questions
     */
    public function setLienImage($lienImage)
    {
        $this->lienImage = $lienImage;

        return $this;
    }

    /**
     * Get lienImage
     *
     * @return string
     */
    public function getLienImage()
    {
        return $this->lienImage;
    }

    /**
     * Set nbVue
     *
     * @param integer $nbVue
     *
     * @return Questions
     */
    public function setNbVue($nbVue)
    {
        $this->nbVue = $nbVue;

        return $this;
    }

    /**
     * Get nbVue
     *
     * @return integer
     */
    public function getNbVue()
    {
        return $this->nbVue;
    }

    /**
     * Set user
     *
     * @param \Wcs\PlatformBundle\Entity\User $user
     *
     * @return Questions
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
     * Constructor
     */
    public function __construct()
    {
        $this->reponses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add reponse
     *
     * @param \Wcs\PlatformBundle\Entity\Reponses $reponse
     *
     * @return Questions
     */
    public function addReponse(\Wcs\PlatformBundle\Entity\Reponses $reponse)
    {
        $this->reponses[] = $reponse;

        return $this;
    }

    /**
     * Remove reponse
     *
     * @param \Wcs\PlatformBundle\Entity\Reponses $reponse
     */
    public function removeReponse(\Wcs\PlatformBundle\Entity\Reponses $reponse)
    {
        $this->reponses->removeElement($reponse);
    }

    /**
     * Get reponses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReponses()
    {
        return $this->reponses;
    }

    /**
     * Add category
     *
     * @param \Wcs\PlatformBundle\Entity\Categories $categories
     *
     * @return Questions
     */
    public function addCategory(\Wcs\PlatformBundle\Entity\Categories $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \Wcs\PlatformBundle\Entity\Categories $categories
     */
    public function removeCategory(\Wcs\PlatformBundle\Entity\Categories $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set addAt
     *
     * @param \DateTime $addAt
     *
     * @return Questions
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

    /**
     * Add vote
     *
     * @param \Wcs\PlatformBundle\Entity\Vote $vote
     *
     * @return Questions
     */
    public function addVote(\Wcs\PlatformBundle\Entity\Vote $vote)
    {
        $this->votes[] = $vote;

        return $this;
    }

    /**
     * Remove vote
     *
     * @param \Wcs\PlatformBundle\Entity\Vote $vote
     */
    public function removeVote(\Wcs\PlatformBundle\Entity\Vote $vote)
    {
        $this->votes->removeElement($vote);
    }

    /**
     * Get votes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVotes()
    {
        return $this->votes;
    }

    /**
     * Set resolu
     *
     * @param integer $resolu
     *
     * @return Questions
     */
    public function setResolu($resolu)
    {
        $this->resolu = $resolu;

        return $this;
    }

    /**
     * Get resolu
     *
     * @return integer
     */
    public function getResolu()
    {
        return $this->resolu;
    }
}
