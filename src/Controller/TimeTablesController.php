<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 05/12/2017
 * Time: 19:11
 */

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Form\TimeTableFormType;

class TimeTablesController extends Controller
{

    /**
     * @Route("/math/timetables", name="timetables")
     */
    public function indexAction(Request $request)
    {
        $cols = [];
        $rows = [];
        $size = $this->getParameter('time_table.max');
        $form = $this->createForm(TimeTableFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $size = $data['size'];
        }

        for ($i=1;$i<=$size;$i++) {
            $cols[$i] = $i;
            $rows[$i] = $i;
        }

        return $this->render('timetables/tabledisplay.html.twig', [
            'cols' => $cols,
            'rows' => $rows,
            'form' => $form->createView()
        ]);
    }
}