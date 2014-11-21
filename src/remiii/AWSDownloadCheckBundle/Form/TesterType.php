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
            ->add('speedtestScreenshot', 'file', array(
                'data_class' => null,
                'required' => false,
                'help_block' => '<a href="http://speedtest.net" target="_blank">http://speedtest.net</a>'
            ))
            ->add('cloudfrontScreenshot', 'file', array(
                'data_class' => null,
                'required' => false,
                'help_block' => '<a href="http://d7uri8nf7uskq.cloudfront.net/JsTestBig.html" target="_blank">http://d7uri8nf7uskq.cloudfront.net/JsTestBig.html</a>'
            ))
            ->add('expertPartOneScreenshot', 'file', array(
                'data_class' => null,
                'required' => false,
                'help_block' => '<pre>dig s3.amazonaws.com
dig video.i-players.com
traceroute -T http://video.i-players.com/a4f092966a23e7edea120de3e3e0ab7c94bd2176.mp4
wget --server-response http://video.i-players.com/a4f092966a23e7edea120de3e3e0ab7c94bd2176.mp4</pre>'
            ))
            ->add('expertPartTwoScreenshot', 'file', array(
                'data_class' => null,
                'required' => false,
                'help_block' => '<pre>dig resolver-identity.cloudfront.net
dig video.i-players.com
traceroute -T http://cdn.video.i-players.com/a4f092966a23e7edea120de3e3e0ab7c94bd2176.mp4
wget --server-response http://cdn.video.i-players.com/a4f092966a23e7edea120de3e3e0ab7c94bd2176.mp4</pre>'
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
