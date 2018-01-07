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


class MeetingFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('timezone', ChoiceType::class, [
                'choices' => $this->availableTimeZone(),
                'attr' => ['class' => 'datetimeselect timezone'],
                'label'=> 'Time Zone',
            ])
            ->add('dateForMeeting', DateType::class, [
                'label'=> 'Day',
            ])
            ->add('hour', ChoiceType::class, [
                'choices' => range(0,23),
                'attr' => ['class' => 'datetimeselect'],
                'label'=> 'Hour',
            ])
            ->add('minute', ChoiceType::class, [
                'choices' => array('0'=>0,'30'=>30),
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
        ];
        return $tz;

    }

}