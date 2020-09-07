<?php

namespace App\Form;

use App\DTO\CurrencyDTO;
use App\Enum\CurrencyEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CurrencyForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('currency', ChoiceType::class, [
                'label' => 'Waluta',
                'choices' => CurrencyEnum::getCurrencies()
            ])
            ->add('date', DateType::class, [
                'label' => 'Data',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'html5' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CurrencyDTO::class,
            'attr' => [
                'novalidate' => 'novalidate',
            ],
        ]);
    }
}