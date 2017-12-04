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
     * @var string
     */
    private $formatted_date;
    /**
     * @var string
     */
    private $formatted_time;


    function __construct(string $time_zone, string $country, string $city){
        $this->time_zone = $time_zone;
        $this->country = $country;
        $this->city = $city;

        $tz_object = new \DateTimeZone($this->time_zone);
        $datetime = new \DateTime();
        $datetime->setTimezone($tz_object);

        $this->formatted_date = $datetime->format($this->date_format);
        $this->formatted_time = $datetime->format($this->time_format);
    }

    /**
     * @return string
     */
    public function getFormattedDate(): string
    {
        return $this->formatted_date;
    }

    /**
     * @return string
     */
    public function getFormattedTime(): string
    {
        return $this->formatted_time;
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





}