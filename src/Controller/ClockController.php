<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 04/12/2017
 * Time: 10:06
 */

namespace App\Controller;

use App\Model\Clock;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;


class ClockController extends Controller
{
    /**
    * @Route("/clock/world", name="clock_world")
    */
    public function favouriteClocks()
    {

        $clock_NZ = new Clock("Pacific/Auckland", "New Zealand", "Auckland");
        $clock_UK = new Clock("Europe/London", "United Kingdom", "London");
        $clock_CA = new Clock("America/Vancouver", "Canada", "Vancouver");

        $clocks = array($clock_NZ, $clock_UK, $clock_CA);

        return $this->render('clocks/clocks.html.twig', [
            'clocks' => $clocks
        ]);
    }
}