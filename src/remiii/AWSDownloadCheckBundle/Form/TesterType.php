<?php

namespace remiii\AWSDownloadCheckBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Collection;

class TesterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('email')
            ->add('isp', null, array(
                'label'  => 'Internet Service Provider',
            ))
            ->add('connexionType', 'choice', array(
                'choices' => array('adsl' => 'ADSL', 'sdsl' => 'SDSL', 'vdsl' => 'VDSL', 'fibre' => 'Fibre', '3g' => '3G', '4g' => '4G'),
                'expanded' => true,
            ))
            ->add('routerLink', 'choice', array(
                'choices' => array('wifi' => 'Wifi', 'filaire' => 'Filaire', 'autre' => 'Autre'),
                'expanded' => true
            ))
            ->add('screenshot', 'file', array(
                'data_class' => null,
                'required' => false
            ))
            ->add('save', 'submit', array('attr' => array('class' => 'btn btn-default pull-right')));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'remiii\AWSDownloadCheckBundle\Entity\Tester',
            'translation_domain' => 'tester_type'
        ));
    }

    public function getName()
    {
        return 'tester';
    }
}
