<?php

namespace CooperativeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Consomacteur
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CooperativeBundle\Entity\ConsomacteurRepository")
 */
class Consomacteur
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
     * @ORM\Column(name="id_consomacteur", type="integer")
     */
    private $idConsomacteur;

    /**
     * @var array
     *
     * @ORM\Column(name="jours_livraison", type="array")
     */
    private $joursLivraison;


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
     * Set idConsomacteur
     *
     * @param integer $idConsomacteur
     * @return Consomacteur
     */
    public function setIdConsomacteur($idConsomacteur)
    {
        $this->idConsomacteur = $idConsomacteur;

        return $this;
    }

    /**
     * Get idConsomacteur
     *
     * @return integer 
     */
    public function getIdConsomacteur()
    {
        return $this->idConsomacteur;
    }

    /**
     * Set joursLivraison
     *
     * @param array $joursLivraison
     * @return Consomacteur
     */
    public function setJoursLivraison($joursLivraison)
    {
        $this->joursLivraison = $joursLivraison;

        return $this;
    }

    /**
     * Get joursLivraison
     *
     * @return array 
     */
    public function getJoursLivraison()
    {
        return $this->joursLivraison;
    }
}
