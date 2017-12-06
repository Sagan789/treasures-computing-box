<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 04/12/2017
 * Time: 13:11
 */

namespace App\Model;


class Clock
{

    const TIME_ZONE_REFERENCE = 'Europe/London';

    /**
     * @var string
     */
    private $time_zone;
    /**
     * @var string
     */
    private $country;
    /**
     * @var string
     */
    private $city;
    /**
     * @var string
     */
    private $date_format = 'd/m/Y';
    /**
     * @var string
     */
    private $time_format = 'H:i:s';
    /**
     * @var integer
     */
    private $offset;

    /**
     * @var \DateTime
     */
    private $datetime;

    /**
     * Clock constructor.
     * @param string $time_zone
     * @param string $country
     * @param string $city
     */
    function __construct(string $time_zone, string $country, string $city)
    {
        $this->time_zone = $time_zone;
        $this->country = $country;
        $this->city = $city;

        $tz_object = new \DateTimeZone($this->time_zone);
        $this->datetime = new \DateTime();
        $this->datetime->setTimezone($tz_object);

        $origin_dtz = new \DateTimeZone(Clock::TIME_ZONE_REFERENCE);
        $origin_dt = new \DateTime("now", $origin_dtz);

        $this->offset = $tz_object->getOffset($this->datetime) - $origin_dtz->getOffset($origin_dt);
    }


    /**
     * @return void
     */
    public function update()
    {
        $this->datetime = new \DateTime("now");
    }

    /**
     * @param int $hour
     * @param int $minute
     * @return string
     */
    public function convertToReferenceTime(string $remote_tz, int $hour, int $minute): string
    {
        $remote_dtz = new \DateTimeZone($remote_tz);
        $remoteTime = new \DateTime("now", $remote_dtz);
        $remoteTime->setTime($hour, $minute);

        $origin_dtz = new \DateTimeZone(Clock::TIME_ZONE_REFERENCE);
        $remoteTime->setTimezone($origin_dtz);

        return $remoteTime->format($this->time_format);
    }

    /**
     * @return string
     */
    public function getFormattedDate(): string
    {
        return $this->datetime->format($this->date_format);;
    }

    /**
     * @return string
     */
    public function getFormattedTime(): string
    {
        return $this->datetime->format($this->time_format);
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
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getDateFormat(): string
    {
        return $this->date_format;
    }

    /**
     * @param string $date_format
     */
    public function setDateFormat(string $date_format)
    {
        $this->date_format = $date_format;
    }

    /**
     * @return string
     */
    public function getTimeFormat(): string
    {
        return $this->time_format;
    }

    /**
     * @param string $time_format
     */
    public function setTimeFormat(string $time_format)
    {
        $this->time_format = $time_format;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }


    /**
     * @return string
     */
    public function getFormattedOffset(): string
    {
        $offset = ($this->offset / 3600);
        return $offset > 0 ? '+ '.  $offset : $offset ;
    }







}