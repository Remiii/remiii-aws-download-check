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
            ->add('connexionType', null, array(
                'choices' => array(0 => 'Private', 1 => 'Open'),
                'required' => true
            ))
            ->add('routerLink', null, array(
                'choices' => array(0 => 'Private', 1 => 'Open'),
                'required' => true
            ))
            ->add('testerTempId', 'hidden', array())
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
