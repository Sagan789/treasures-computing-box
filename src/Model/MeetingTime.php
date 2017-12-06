<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 04/12/2017
 * Time: 15:16
 */

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;


class MeetingTime
{
    /**
     * @Assert\NotBlank()
     * @var string
     */
    private $time_zone;

    /**
     * @Assert\NotBlank()
     * @Assert\Range(min=0, minMessage="Negative hours! Come on...")
     * @Assert\Range(max=23, maxMessage="Only 24 hours a day...")
     * @Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * @var integer
     */
    private $hour;
    /**
     * @Assert\NotBlank()
     * @Assert\Range(min=0, minMessage="Negative minutes! Come on...")
     * @Assert\Range(max=59, maxMessage="Only 59 minutes per hour...")
     * @Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * @var integer
     */
    private $minute;

    function __construct(string $time_zone)
    {
        $this->time_zone = $time_zone;
    }

    /**
     * @return mixed
     */
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * @param mixed $hour
     */
    public function setHour($hour)
    {
        $this->hour = $hour;
    }

    /**
     * @return mixed
     */
    public function getMinute()
    {
        return $this->minute;
    }

    /**
     * @param mixed $minute
     */
    public function setMinute($minute)
    {
        $this->minute = $minute;
    }

    /**
     * @return string
     */
    public function getTimeZone(): string
    {
        return $this->time_zone;
    }

    /**
     * @param string $time_zone
     */
    public function setTimeZone(string $time_zone)
    {
        $this->time_zone = $time_zone;
    }

}