<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 06/12/2017
 * Time: 16:52
 */

namespace App\Controller;

use App\Model\PiCalculator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PiCalculatorController extends Controller
{
    /**
     * @Route("/math/pi_leibniz", name="pi_leibniz")
     */
    public function leibniz(Request $request)
    {
        $pi = PiCalculator::liebniz_method();

        return $this->render('pi/calculatepi.html.twig', [
            'pi_value' => $pi
        ]);
    }
}