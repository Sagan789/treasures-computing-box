<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 04/12/2017
 * Time: 15:16
 */

namespace App\Model;


class Time
{

    /**
     * @var array
     */
    private $hours;
    /**
     * @var array
     */
    private $minutes;


    function __construct()
    {
        $this->hours = range(0,23);
        $this->minutes = range(0,59);
    }

    /**
     * @return array
     */
    public function getHours(): array
    {
        return $this->hours;
    }

    /**
     * @return array
     */
    public function getMinutes(): array
    {
        return $this->minutes;
    }



}