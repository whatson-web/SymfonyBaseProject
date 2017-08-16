<?php

namespace CmsBundle\Form\Backend;

use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use WH\MediaBundle\Form\Backend\FileType;

/**
 * Class HomeFileType
 *
 * @package CmsBundle\Form\Backend
 */
class HomeFileType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'file',
                FileType::class,
                [
                    'label' => 'Image',
                ]
            )
            ->add(
                'position',
                HiddenType::class,
                [
                    'attr' => [
                        'class' => 'sortable-field',
                    ],
                ]
            );
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => 'CmsBundle\Entity\HomeFile',
                'required'   => false,
            ]
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'bk_cms_homefile';
    }

}
