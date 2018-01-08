<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 04/12/2017
 * Time: 15:20
 */

namespace App\Form;

use App\Model\MeetingTime;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;


class MeetingFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('timezone', ChoiceType::class, [
                'choices' => $this->availableTimeZone(),
                'attr' => ['class' => 'datetimeselect timezone'],
                'label'=> 'Time Zone Source',
            ])
            ->add('dest_timezone', ChoiceType::class, [
                'choices' => $this->availableTimeZone(),
                'attr' => ['class' => 'datetimeselect timezone'],
                'label'=> 'Time Zone For Conversion',
            ])
            ->add('dateForMeeting', DateType::class, [
                'label'=> 'Day',
                'widget' => 'single_text',
            ])
            ->add('hour', IntegerType::class, [
                'attr' => ['class' => 'datetimeselect'],
                'label'=> 'Hour',
            ])
            ->add('minute', IntegerType::class, [
                'attr' => ['class' => 'datetimeselect'],
                'label'=> 'Min',
            ]);
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MeetingTime::class
        ]);
    }

    public function availableTimeZone() : array
    {
        $tz = [
            'America/Vancouver' => 'America/Vancouver',
            'America/Toronto' =>'America/Toronto',
            'Pacific/Auckland' =>'Pacific/Auckland',
            'Europe/London' => 'Europe/London',
            'America/New_York' => 'America/New_York'

        ];
        return $tz;

    }

}