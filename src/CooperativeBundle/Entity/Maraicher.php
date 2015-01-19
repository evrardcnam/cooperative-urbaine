<?php

namespace CooperativeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Maraicher
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CooperativeBundle\Entity\MaraicherRepository")
 */
class Maraicher
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
     * @ORM\Column(name="id_maraicher", type="integer")
     */
    private $idMaraicher;

    /**
     * @ORM\ManyToMany(targetEntity="\CooperativeBundle\Entity\Production")
     */
    private $productionMaraicher;

    /**
     * @ORM\ManyToOne(targetEntity="\CooperativeBundle\Entity\Adresse")
     */
    private $adresseExploitation;


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
     * Set idMaraicher
     *
     * @param integer $idMaraicher
     * @return Maraicher
     */
    public function setIdMaraicher($idMaraicher)
    {
        $this->idMaraicher = $idMaraicher;

        return $this;
    }

    /**
     * Get idMaraicher
     *
     * @return integer 
     */
    public function getIdMaraicher()
    {
        return $this->idMaraicher;
    }

    /**
     * Set productionMaraicher
     *
     * @param string $productionMaraicher
     * @return Maraicher
     */
    public function setProductionMaraicher($productionMaraicher)
    {
        $this->productionMaraicher = $productionMaraicher;

        return $this;
    }

    /**
     * Get productionMaraicher
     *
     * @return string 
     */
    public function getProductionMaraicher()
    {
        return $this->productionMaraicher;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productionMaraicher = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add productionMaraicher
     *
     * @param \CooperativeBundle\Entity\Production $productionMaraicher
     * @return Maraicher
     */
    public function addProductionMaraicher(\CooperativeBundle\Entity\Production $productionMaraicher)
    {
        $this->productionMaraicher[] = $productionMaraicher;

        return $this;
    }

    /**
     * Remove productionMaraicher
     *
     * @param \CooperativeBundle\Entity\Production $productionMaraicher
     */
    public function removeProductionMaraicher(\CooperativeBundle\Entity\Production $productionMaraicher)
    {
        $this->productionMaraicher->removeElement($productionMaraicher);
    }

    /**
     * Set adresseExploitation
     *
     * @param \CooperativeBundle\Entity\Adresse $adresseExploitation
     * @return Maraicher
     */
    public function setAdresseExploitation(\CooperativeBundle\Entity\Adresse $adresseExploitation = null)
    {
        $this->adresseExploitation = $adresseExploitation;

        return $this;
    }

    /**
     * Get adresseExploitation
     *
     * @return \CooperativeBundle\Entity\Adresse
     */
    public function getAdresseExploitation()
    {
        return $this->adresseExploitation;
    }
}
