<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 04/12/2017
 * Time: 10:06
 */

namespace App\Controller;

use App\Form\MeetingFormType;
use App\Model\Clock;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class ClockController extends Controller
{
    /**
    * @Route("/clock/world", name="clock_world")
    */
    public function favouriteClocks(Request $request)
    {

        $clock_NZ = new Clock("Pacific/Auckland", "New Zealand", "Auckland");
        $clock_UK = new Clock("Europe/London", "United Kingdom", "London");
        $clock_CA = new Clock("America/Vancouver", "Canada", "Vancouver");

        $clocks = array($clock_NZ, $clock_UK, $clock_CA);

        $form = $this->createForm(MeetingFormType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            dump($form->getData());die;
        }

        return $this->render('clocks/clocks.html.twig', [
            'clocks' => $clocks,
            'meetingForm' => $form->createView()
        ]);
    }
}