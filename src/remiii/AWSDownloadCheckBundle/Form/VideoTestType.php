<?php

namespace remiii\AWSDownloadCheckBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Collection;

class VideoTestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('downloadTime', null, array(
                'required' => true
            ))
            ->add('readingQuality', null, array(
                'required' => true
            ))
            ->add('idVideo', 'hidden', array())
            ->add('testerTempId', 'hidden', array())
            ->add('save', 'submit', array('attr' => array('class' => 'btn btn-default pull-right')));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'remiii\AWSDownloadCheckBundle\Entity\VideoTest',
            'translation_domain' => 'video_test_type'
        ));
    }

    public function getName()
    {
        return 'video test';
    }
}
