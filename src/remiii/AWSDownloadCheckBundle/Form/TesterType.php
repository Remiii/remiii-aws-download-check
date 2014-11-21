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
            ->add('firstname', null, array(
                'required' => true
            ))
            ->add('lastname', null, array(
                'required' => true
            ))
            ->add('email', null, array(
                'required' => true
            ))
            ->add('isp', null, array(
                'required' => true
            ))
            ->add('connexionType', 'choice', array(
                'choices' => array('adsl' => 'ADSL', 'sdsl' => 'SDSL', 'vdsl' => 'VDSL', 'fibre' => 'Fibre', '3g' => '3G', '4g' => '4G'),
                'expanded' => true,
                'required' => true
            ))
            ->add('routerLink', 'choice', array(
                'choices' => array('wifi' => 'Wifi', 'filaire' => 'Filaire', 'autre' => 'Autre'),
                'expanded' => true,
                'required' => true
            ->add('screenshot', 'file', array(
                'data_class' => null,
                'required' => false
            ))
            ->add('tempId', 'hidden', array())
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
