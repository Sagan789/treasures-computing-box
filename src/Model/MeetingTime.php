<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 04/12/2017
 * Time: 15:16
 */

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

use \Datetime;

class MeetingTime
{
    /**
     * @Assert\NotBlank()
     * @var string
     */
    private $time_zone;

    /**
     * @Assert\DateTime()
     * @var DateTime
     */
    private $dateForMeeting;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="integer", message="The value {{ value }} is not a valid {{ type }}.")
     * @Assert\Range(
     *     min=0,
     *     max=23,
     *     minMessage="Negative hours! Come on...",
     *     maxMessage="Only 24 hours a day..."
     * )
     *
     */
    private $hour;

    /**
     * @var integer
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="integer", message="The value {{ value }} is not a valid {{ type }}.")
     * @Assert\Range(
     *     min=0,
     *     max=59,
     *     minMessage="Negative minutes! Come on...",
     *     maxMessage="Only 59 minutes per hour..."
     * )
     *
     */
    private $minute;



    function __construct(string $time_zone)
    {
        $this->time_zone = $time_zone;
        $this->dateForMeeting = new \DateTime("now", new \DateTimeZone($time_zone));
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

    /**
     * @return DateTime
     */
    public function getDateForMeeting()
    {
        return $this->dateForMeeting;
    }

    /**
     * @param DateTime $dateForMeeting
     */
    public function setDateForMeeting(DateTime $dateForMeeting)
    {
        $this->dateForMeeting = $dateForMeeting;
    }



}