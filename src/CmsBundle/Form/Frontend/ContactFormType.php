<?php

namespace CmsBundle\Form\Frontend;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

/**
 * Class ContactFormType
 *
 * @package CmsBundle\Form\Frontend
 */
class ContactFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'firstname',
                TextType::class,
                [
                    'label' => 'Prénom*',
                ]
            )
            ->add(
                'lastname',
                TextType::class,
                [
                    'label' => 'Nom*',
                ]
            )
            ->add(
                'email',
                EmailType::class,
                [
                    'label' => 'Email*',
                ]
            )
            ->add(
                'message',
                TextareaType::class,
                [
                    'label' => 'Message',
                    'attr'  => [
                        'placeholder' => 'Votre message',
                    ],
                ]
            );
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => 'CmsBundle\Entity\ContactForm',
                'required'   => false,
            ]
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ft_cms_contactform';
    }

}
