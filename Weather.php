<?php

use GuzzleHttp\Client;

class Weather
{
    
    public $temperatura;
    public $cisnienie;
    public $wilgotnosc;
    public $predkosc;
    public $kat;
    public $zachmurzenie;
    
    public function __construct()
    {
        $httpClient = new Client();
        
        $response = $httpClient->get('api.openweathermap.org/data/2.5/weather?id=2172797&APPID=527475b4485f0308208e48781134b3cd');
        $openweathermap = json_decode($response->getBody());
        
        $this->temperatura = $this->kelvinToCelsjus($openweathermap->main->temp);
        $this->cisnienie = $openweathermap->main->pressure;
        $this->wilgotnosc = $openweathermap->main->humidity;
        $this->predkosc = $openweathermap->wind->speed;
        $this->kat = $openweathermap->wind->deg;
        $this->zachmurzenie = $openweathermap->clouds->all;
    }
    
    public function kelvinToCelsjus($kelvinTemperature)
    {
        return $kelvinTemperature - 273.5;
    }
}