<?php

namespace Wcs\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Categories
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity(repositoryClass="Wcs\PlatformBundle\Repository\CategoriesRepository")
 */
class Categories
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
     * @ORM\Column(name="intitule", type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Length(
     *      min = 3,
     *      max = 255,
     * )
     */
    private $intitule;

    /**
     *
     * @ORM\ManyToMany(targetEntity="User", mappedBy="categories")
     *
     */
    private $users;

    /**
     *
     * @ORM\ManyToMany(targetEntity="Questions", mappedBy="categories")
     *
     */
    private $questions;

    /**
     * @var string
     *
     * @ORM\Column(name="img_categories", type="string", length=100, nullable=true)
     */
    private $imgCategories;

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
     * Set intitule
     *
     * @param string $intitule
     *
     * @return Categories
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * Get intitule
     *
     * @return string
     */
    public function getIntitule()
    {
        return $this->intitule;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add user
     *
     * @param \Wcs\PlatformBundle\Entity\User $user
     *
     * @return Categories
     */
    public function addUser(\Wcs\PlatformBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \Wcs\PlatformBundle\Entity\User $user
     */
    public function removeUser(\Wcs\PlatformBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add question
     *
     * @param \Wcs\PlatformBundle\Entity\Questions $question
     *
     * @return Categories
     */
    public function addQuestion(\Wcs\PlatformBundle\Entity\Questions $question)
    {
        $this->questions[] = $question;

        return $this;
    }

    /**
     * Remove question
     *
     * @param \Wcs\PlatformBundle\Entity\Questions $question
     */
    public function removeQuestion(\Wcs\PlatformBundle\Entity\Questions $question)
    {
        $this->questions->removeElement($question);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Set imgCategories
     *
     * @param string $imgCategories
     *
     * @return Categories
     */
    public function setImgCategories($imgCategories)
    {
        $this->imgCategories = $imgCategories;

        return $this;
    }

    /**
     * Get imgCategories
     *
     * @return string
     */
    public function getImgCategories()
    {
        return $this->imgCategories;
    }
}
