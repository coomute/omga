<?php

namespace Coomute\Bundle\OmgaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GenreType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('metas', 'entity', array(
                'class' => 'Coomute\Bundle\OmgaBundle\Entity\Meta', 
                'property'=>'meta', 
                'multiple'=>true,
                'label' => 'Meta Genre',
                "mapped" => false
                )) 
            ->add('genre')
            ->add('idMeta', null, array('required'=>false))
            ->add('tempoMin')
            ->add('tempoMax')
            ->add('electronicRatio')
            ->add('acousticRatio')
            ->add('electricRatio')
            ->add('yearMin')
            ->add('yearMax')
            ->add('send', 'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Coomute\Bundle\OmgaBundle\Entity\Genre'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'coomute_bundle_omgabundle_genre';
    }
}
