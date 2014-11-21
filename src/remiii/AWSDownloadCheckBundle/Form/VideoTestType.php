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
                'choices' => array(1 => 'Fluidité au top', 2 => 'Fluide', 3 => 'Ca rame', 4 => 'Rame trop / pas regardable', 5 => 'Je ne vois pas la video')
            ))
            ->add('readingQuality', null, array())
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
