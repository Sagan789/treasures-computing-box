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
use App\Model\MeetingTime;
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
       /* $this->getParameter('default_clocks');
        $clocks = [];
        foreach ($clocks as $c) {
            array_push($clocks, new Clock($c->get('time_zone'), $c->get('country'), $c->get('city')));
        }

        $clock_UK = new Clock("Europe/London", "United Kingdom", "London");
*/

        $clock_NZ = new Clock("Pacific/Auckland", "New Zealand", "Auckland");
        $clock_UK = new Clock("Europe/London", "United Kingdom", "London");
        $clock_CA = new Clock("America/Vancouver", "Canada", "Vancouver");

        $clocks = array($clock_NZ, $clock_UK, $clock_CA);

        $meetingTime = new MeetingTime("Europe/London");
        $form = $this->createForm(MeetingFormType::class, $meetingTime);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $convertedTime = $clock_UK->convertTime($meetingTime->getTimeZone(), $meetingTime->getHour(), $meetingTime->getMinute(), $meetingTime->getDestTimeZone());
            return $this->render('clocks/clocks.html.twig', [
                'clocks' => $clocks,
                'convertedTime' => $convertedTime,
                'meetingForm' => $form->createView()
            ]);
        }
        /*
        if ($form->isSubmitted() && !$form->isValid()) {
            foreach ($form->getErrors() as $err) {
                $this->addFlash('error', $err->getMessage());
            }
        }*/

        return $this->render('clocks/clocks.html.twig', [
            'clocks' => $clocks,
            'meetingForm' => $form->createView()
        ]);
    }
}