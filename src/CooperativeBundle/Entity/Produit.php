<?php

namespace CooperativeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CooperativeBundle\Entity\ProduitRepository")
 */
class Produit
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
     * @ORM\Column(name="id_produit", type="integer")
     */
    private $idProduit;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_produit", type="string", length=255)
     */
    private $nomProduit;

    /**
     * @var string
     *
     * @ORM\Column(name="type_produit", type="string", length=255)
     */
    private $typeProduit;

    /**
     * @var boolean
     *
     * @ORM\Column(name="dispo_produit", type="boolean")
     */
    private $dispoProduit;


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
     * Set idProduit
     *
     * @param integer $idProduit
     * @return Produit
     */
    public function setIdProduit($idProduit)
    {
        $this->idProduit = $idProduit;

        return $this;
    }

    /**
     * Get idProduit
     *
     * @return integer 
     */
    public function getIdProduit()
    {
        return $this->idProduit;
    }

    /**
     * Set nomProduit
     *
     * @param string $nomProduit
     * @return Produit
     */
    public function setNomProduit($nomProduit)
    {
        $this->nomProduit = $nomProduit;

        return $this;
    }

    /**
     * Get nomProduit
     *
     * @return string 
     */
    public function getNomProduit()
    {
        return $this->nomProduit;
    }

    /**
     * Set typeProduit
     *
     * @param string $typeProduit
     * @return Produit
     */
    public function setTypeProduit($typeProduit)
    {
        $this->typeProduit = $typeProduit;

        return $this;
    }

    /**
     * Get typeProduit
     *
     * @return string 
     */
    public function getTypeProduit()
    {
        return $this->typeProduit;
    }

    /**
     * Set dispoProduit
     *
     * @param boolean $dispoProduit
     * @return Produit
     */
    public function setDispoProduit($dispoProduit)
    {
        $this->dispoProduit = $dispoProduit;

        return $this;
    }

    /**
     * Get dispoProduit
     *
     * @return boolean 
     */
    public function getDispoProduit()
    {
        return $this->dispoProduit;
    }
}
