<?php

use GuzzleHttp\Client;

class ThingSpeak
{
    
    protected $apiKey;
    protected $httpClient;
    
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->httpClient = new Client();
    }
    
    public static function logIn($apiKey)
    {
        return new self($apiKey);
    }
    
    public function add($field, $value)
    {
        if (is_array($field) && is_array($value)) {
            $data = '';
            for ($i = 0; $i < count($field); $i++) {
                $data .= "&{$field[$i]}={$value[$i]}";
            }
        } else {
            $data = "&{$field}={$value}";
        }
        
        $this->httpClient->get("https://api.thingspeak.com/update?api_key=L9P6S03G4ZVXI578$data");
        
        return $this;
    }
}