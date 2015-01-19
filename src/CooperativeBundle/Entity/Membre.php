<?php

namespace CooperativeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Membre
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CooperativeBundle\Entity\MembreRepository")
 */
class Membre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_membre", type="integer")
     */
    private $idMembre;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_membre", type="string", length=255)
     */
    private $nomMembre;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp_membre", type="string", length=255)
     */
    private $mdpMembre;

    /**
     * @var integer
     *
     * @ORM\Column(name="age_membre", type="integer")
     */
    private $age_membre;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire_personnel", type="string", length=255)
     */
    private $commentaire_personnel;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idMembre
     *
     * @param integer $idMembre
     * @return Membre
     */
    public function setIdMembre($idMembre)
    {
        $this->idMembre = $idMembre;

        return $this;
    }

    /**
     * Get idMembre
     *
     * @return integer 
     */
    public function getIdMembre()
    {
        return $this->idMembre;
    }

    /**
     * Set nomMembre
     *
     * @param string $nomMembre
     * @return Membre
     */
    public function setNomMembre($nomMembre)
    {
        $this->nomMembre = $nomMembre;

        return $this;
    }

    /**
     * Get nomMembre
     *
     * @return string 
     */
    public function getNomMembre()
    {
        return $this->nomMembre;
    }

    /**
     * Set mdpMembre
     *
     * @param string $mdpMembre
     * @return Membre
     */
    public function setMdpMembre($mdpMembre)
    {
        $this->mdpMembre = $mdpMembre;

        return $this;
    }

    /**
     * Get mdpMembre
     *
     * @return string 
     */
    public function getMdpMembre()
    {
        return $this->mdpMembre;
    }

    /**
     * @return int
     */
    public function getAgeMembre()
    {
        return $this->age_membre;
    }

    /**
     * @param int $age_membre
     */
    public function setAgeMembre($age_membre)
    {
        $this->age_membre = $age_membre;
    }

    /**
     * @return string
     */
    public function getCommentairePersonnel()
    {
        return $this->commentaire_personnel;
    }

    /**
     * @param string $commentaire_personnel
     */
    public function setCommentairePersonnel($commentaire_personnel)
    {
        $this->commentaire_personnel = $commentaire_personnel;
    }
}
