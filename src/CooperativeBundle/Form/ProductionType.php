<?php

namespace CooperativeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idProduction')
            ->add('produits')
            ->add('productionMax')
            ->add('coutProduit')
            ->add('ccommandeMin')
            ->add('commandeMax')
            ->add('ddateDebut')
            ->add('ddateFin')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CooperativeBundle\Entity\Production'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cooperativebundle_production';
    }
}
