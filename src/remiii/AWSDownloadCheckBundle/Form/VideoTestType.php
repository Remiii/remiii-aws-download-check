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
                'choices' => array('3' => 'Fast (<5sec)', '2' => 'Normal', '1' => 'Slow (>15sec)')
            ))
            ->add('readingQuality', 'choice', array(
                'choices' => array('5' => '5/5: Fluidité au top :-)', '4' => '4/5: Fluide', '3' => '3/5: Ca rame', '2' => '2/5: Rame trop / pas regardable', '1' => '1/5: Je ne vois pas la video :-(')
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
