<?php

class cityWeather
{
    private $cityName;
    private $country;
    private $timestamp;
    private $weather;
    private $icon;

    public function __construct($city,$time,$country,$weather,$icon)
    {
        $this->timestamp=$time;
        $this->cityName=$city;
        $this->country=$country;
        $this->weather=$weather;
        $this->icon=$icon;
    }

    public function getCity()
    {
        return $this->cityName;
    }
    public function getCountry()
    {
            return $this->country;
    }
    public function getDate()
    {
        $date =gmdate("M d Y H:i", $this->timestamp);
        return $date;
    }
    public function getIcon()
    {
        $iconPath ='media/image/'.$this->icon.'.svg';
        return $iconPath;
    }
    public function getWeather()
    {

        return $this->weather;
    }
}