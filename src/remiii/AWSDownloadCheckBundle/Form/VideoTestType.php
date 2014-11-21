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
            ->add('downloadTime', 'choice', array(
                'choices' => array('fast' => 'Fast', 'normal' => 'Normal', 'slow' => 'Slow')
            ))
            ->add('readingQuality', 'choice', array(
                'choices' => array('top' => 'Fluidité au top', 'fluide' => 'Fluide', 'rame' => 'Ca rame', 'lent' => 'Rame trop / pas regardable', 'cassé' => 'Je ne vois pas la video')
            ))
            ->add('next', 'submit', array('attr' => array('class' => 'btn btn-default pull-right')));
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
        return 'video_test';
    }
}
