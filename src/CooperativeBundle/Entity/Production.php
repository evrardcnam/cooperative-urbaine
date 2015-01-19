<?php

namespace CooperativeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Production
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CooperativeBundle\Entity\ProductionRepository")
 */
class Production
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
     * @ORM\Column(name="id_production", type="integer")
     */
    private $idProduction;

    /**
     * @var array
     *
     * @ORM\Column(name="produits", type="array")
     */
    private $produits;

    /**
     * @var integer
     *
     * @ORM\Column(name="production_max", type="integer")
     */
    private $productionMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="cout_produit", type="integer")
     */
    private $coutProduit;

    /**
     * @var integer
     *
     * @ORM\Column(name="ccommande_min", type="integer")
     */
    private $ccommandeMin;

    /**
     * @var integer
     *
     * @ORM\Column(name="commande_max", type="integer")
     */
    private $commandeMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="ddate_debut", type="integer")
     */
    private $ddateDebut;

    /**
     * @var integer
     *
     * @ORM\Column(name="ddate_fin", type="integer")
     */
    private $ddateFin;


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
     * Set idProduction
     *
     * @param integer $idProduction
     * @return Production
     */
    public function setIdProduction($idProduction)
    {
        $this->idProduction = $idProduction;

        return $this;
    }

    /**
     * Get idProduction
     *
     * @return integer 
     */
    public function getIdProduction()
    {
        return $this->idProduction;
    }

    /**
     * Set produits
     *
     * @param array $produits
     * @return Production
     */
    public function setProduits($produits)
    {
        $this->produits = $produits;

        return $this;
    }

    /**
     * Get produits
     *
     * @return array 
     */
    public function getProduits()
    {
        return $this->produits;
    }

    /**
     * Set productionMax
     *
     * @param integer $productionMax
     * @return Production
     */
    public function setProductionMax($productionMax)
    {
        $this->productionMax = $productionMax;

        return $this;
    }

    /**
     * Get productionMax
     *
     * @return integer 
     */
    public function getProductionMax()
    {
        return $this->productionMax;
    }

    /**
     * Set coutProduit
     *
     * @param integer $coutProduit
     * @return Production
     */
    public function setCoutProduit($coutProduit)
    {
        $this->coutProduit = $coutProduit;

        return $this;
    }

    /**
     * Get coutProduit
     *
     * @return integer 
     */
    public function getCoutProduit()
    {
        return $this->coutProduit;
    }

    /**
     * Set ccommandeMin
     *
     * @param integer $ccommandeMin
     * @return Production
     */
    public function setCcommandeMin($ccommandeMin)
    {
        $this->ccommandeMin = $ccommandeMin;

        return $this;
    }

    /**
     * Get ccommandeMin
     *
     * @return integer 
     */
    public function getCcommandeMin()
    {
        return $this->ccommandeMin;
    }

    /**
     * Set commandeMax
     *
     * @param integer $commandeMax
     * @return Production
     */
    public function setCommandeMax($commandeMax)
    {
        $this->commandeMax = $commandeMax;

        return $this;
    }

    /**
     * Get commandeMax
     *
     * @return integer 
     */
    public function getCommandeMax()
    {
        return $this->commandeMax;
    }

    /**
     * Set ddateDebut
     *
     * @param integer $ddateDebut
     * @return Production
     */
    public function setDdateDebut($ddateDebut)
    {
        $this->ddateDebut = $ddateDebut;

        return $this;
    }

    /**
     * Get ddateDebut
     *
     * @return integer 
     */
    public function getDdateDebut()
    {
        return $this->ddateDebut;
    }

    /**
     * Set ddateFin
     *
     * @param integer $ddateFin
     * @return Production
     */
    public function setDdateFin($ddateFin)
    {
        $this->ddateFin = $ddateFin;

        return $this;
    }

    /**
     * Get ddateFin
     *
     * @return integer 
     */
    public function getDdateFin()
    {
        return $this->ddateFin;
    }
}
