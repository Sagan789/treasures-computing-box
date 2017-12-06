<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 06/12/2017
 * Time: 16:17
 */

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TimeTableFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('size', ChoiceType::class, [
                'choices'  => ['10'=>10,'12'=>12,'20'=>20,'30'=>30,'40'=>40,'50'=>50],
                'attr' => ['class' => 'tt_size_input']
            ]);
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([

        ]);
    }
}