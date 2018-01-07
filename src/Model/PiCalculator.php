<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 06/12/2017
 * Time: 16:56
 */

namespace App\Model;


class PiCalculator
{

    public static function liebniz_method(int $accuracy = 1000000) : float {
        $pi = 4; $top = 4; $bot = 3; $minus = TRUE;

        for($i = 0; $i < $accuracy; $i++)
        {
            $pi += ( $minus ? -($top/$bot) : ($top/$bot) );
            $minus = ( $minus ? FALSE : TRUE);
            $bot += 2;
        }
        return $pi;
    }
}