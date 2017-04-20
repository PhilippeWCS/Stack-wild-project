<?php

namespace Wcs\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="`user`")
 * @ORM\Entity(repositoryClass="Wcs\PlatformBundle\Repository\UserRepository")
 */
class User extends BaseUser
{

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100)
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Length(
     *      min = 3,
     *      max = 100,
     * )
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=100)
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @Assert\Length(
     *      min = 3,
     *      max = 100,
     * )
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="img_profil", type="string", length=100, nullable=true)
     */
    private $imgProfil='profil_default.png';

    /**
     * @var string
     *
     * @ORM\Column(name="url_linkedin", type="string", length=255, nullable=true)
     * @Assert\Url()
     */
    private $urlLinkedin;

    /**
     * @var string
     *
     * @ORM\Column(name="url_tweeter", type="string", length=255, nullable=true)
     * @Assert\Url()
     */
    private $urlTweeter;

    /**
     * @var string
     *
     * @ORM\Column(name="url_github", type="string", length=255, nullable=true)
     * @Assert\Url()
     */
    private $urlGithub;

    /**
     * @var string
     *
     * @ORM\Column(name="profil", type="string", length=20, nullable=true)
     * @Assert\Choice(callback = "getProfils")
     */
    private $profil;

    /**
     * @var string
     *
     * @ORM\Column(name="ville_ecole", type="string", length=100, nullable=true)
     * @Assert\Type("string")
     * @Assert\Length(
     *      min = 3,
     *      max = 100,
     * )
     */
    private $villeEcole;

    /**
     * @var string
     *
     * @ORM\Column(name="emploi", type="string", length=100, nullable=true)
     * @Assert\Type("string")
     * @Assert\Length(
     *      min = 3,
     *      max = 100,
     * )
     */
    private $emploi;

    /**
     * @var string
     *
     * @ORM\Column(name="entreprise", type="string", length=100, nullable=true)
     * @Assert\Length(
     *      min = 3,
     *      max = 100,
     * )
     */
    private $entreprise;

    /**
     *
     * @ORM\OneToMany(targetEntity="Questions", mappedBy="user")
     * 
     */
    private $questions;

    /**
     *
     * @ORM\OneToMany(targetEntity="Reponses", mappedBy="user")
     *
     */
    private $reponses;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function setEmail($email)
    {
        parent::setEmail($email);
        $this->setUsername($email);
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set imgProfil
     *
     * @param string $imgProfil
     *
     * @return User
     */
    public function setImgProfil($imgProfil)
    {
        if(isset($imgProfil) && !empty($imgProfil)){
            $this->imgProfil = $imgProfil;

            return $this;
        }
    }

    /**
     * Get imgProfil
     *
     * @return string
     */
    public function getImgProfil()
    {
        return $this->imgProfil;
    }

    /**
     * Set urlLinkedin
     *
     * @param string $urlLinkedin
     *
     * @return User
     */
    public function setUrlLinkedin($urlLinkedin)
    {
        $this->urlLinkedin = $urlLinkedin;

        return $this;
    }

    /**
     * Get urlLinkedin
     *
     * @return string
     */
    public function getUrlLinkedin()
    {
        return $this->urlLinkedin;
    }

    /**
     * Set urlTweeter
     *
     * @param string $urlTweeter
     *
     * @return User
     */
    public function setUrlTweeter($urlTweeter)
    {
        $this->urlTweeter = $urlTweeter;

        return $this;
    }

    /**
     * Get urlTweeter
     *
     * @return string
     */
    public function getUrlTweeter()
    {
        return $this->urlTweeter;
    }

    /**
     * Set urlGithub
     *
     * @param string $urlGithub
     *
     * @return User
     */
    public function setUrlGithub($urlGithub)
    {
        $this->urlGithub = $urlGithub;

        return $this;
    }

    /**
     * Get urlGithub
     *
     * @return string
     */
    public function getUrlGithub()
    {
        return $this->urlGithub;
    }

    /**
     * Set profil
     *
     * @param string $profil
     *
     * @return User
     */
    public function setProfil($profil)
    {
        $this->profil = $profil;

        return $this;
    }

    /**
     * Get profil
     *
     * @return string
     */
    public function getProfil()
    {
        return $this->profil;
    }

    public static function getProfils()
    {
        return array(
            '' => 'Sélectionner...',
            'Elève' => 'Elève',
            'Ancien élève' => 'Ancien élève',
            'Staff formateur' => 'Staff formateur',
            'Staff manager et autre' => 'Staff manager et autre');
    }

    /**
     * Set villeEcole
     *
     * @param string $villeEcole
     *
     * @return User
     */
    public function setVilleEcole($villeEcole)
    {
        $this->villeEcole = $villeEcole;

        return $this;
    }

    /**
     * Get villeEcole
     *
     * @return string
     */
    public function getVilleEcole()
    {
        return $this->villeEcole;
    }

    /**
     * Set emploi
     *
     * @param string $emploi
     *
     * @return User
     */
    public function setEmploi($emploi)
    {
        $this->emploi = $emploi;

        return $this;
    }

    /**
     * Get emploi
     *
     * @return string
     */
    public function getEmploi()
    {
        return $this->emploi;
    }

    /**
     * Set entreprise
     *
     * @param string $entreprise
     *
     * @return User
     */
    public function setEntreprise($entreprise)
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    /**
     * Get entreprise
     *
     * @return string
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }

    /**
     * Add question
     *
     * @param \Wcs\PlatformBundle\Entity\Question $question
     *
     * @return User
     */
    public function addQuestion(\Wcs\PlatformBundle\Entity\Question $question)
    {
        $this->questions[] = $question;

        return $this;
    }

    /**
     * Remove question
     *
     * @param \Wcs\PlatformBundle\Entity\Question $question
     */
    public function removeQuestion(\Wcs\PlatformBundle\Entity\Question $question)
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
     * Add reponse
     *
     * @param \Wcs\PlatformBundle\Entity\Reponses $reponse
     *
     * @return User
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
}
