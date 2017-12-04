<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 04/12/2017
 * Time: 15:20
 */

namespace App\Form;

use App\Model\Time;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;


class MeetingFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateOfMeeting', DateTimeType::class, [
                'placeholder' => array(
                    'year' => 'Year', 'month' => 'Month', 'day' => 'Day',
                    'hour' => 'Hour', 'minute' => 'Minute',
                )
            ]);
    }


    public function configureOptions(OptionsResolver $resolver)
    {

    }
}