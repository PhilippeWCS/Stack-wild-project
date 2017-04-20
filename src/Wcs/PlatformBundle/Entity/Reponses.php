<?php

namespace Wcs\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reponses
 *
 * @ORM\Table(name="reponses")
 * @ORM\Entity(repositoryClass="Wcs\PlatformBundle\Repository\ReponsesRepository")
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
     * @ORM\Column(name="Contenu", type="string", length=255)
     */
    private $contenu;

    /**
     * @var string
     *
     * @ORM\Column(name="LienImage", type="string", length=255, nullable=true)
     */
    private $lienImage;

    /**
    * Many responses have one question
    * @ORM\ManytoOne(targetEntity="Questions", inversedBy="reponses")
    */
    private $questions;
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
     * Set lienImage
     *
     * @param string $lienImage
     *
     * @return Reponses
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
     * Set questions
     *
     * @param \Wcs\PlatformBundle\Entity\Questions $questions
     *
     * @return Reponses
     */
    public function setQuestions(\Wcs\PlatformBundle\Entity\Questions $questions = null)
    {
        $this->questions = $questions;

        return $this;
    }

    /**
     * Get questions
     *
     * @return \Wcs\PlatformBundle\Entity\Questions
     */
    public function getQuestions()
    {
        return $this->questions;
    }

}
