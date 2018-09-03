<?php
require_once 'vendor/autoload.php';
session_start();

$apiKey = 'L9P6S03G4ZVXI578';
if (isset($_POST['secret'])) {
    ThingSpeak::logIn($apiKey)->add([
        'field1',
        'field2',
        'field3',
        'field4',
        'field5',
        'field6',
    ], [
        $_POST['temperatura'],
        $_POST['cisnienie'],
        $_POST['wilgotnosc'],
        $_POST['predkosc'],
        $_POST['kat'],
        $_POST['zachmurzenie'],
    ]);
    $_SESSION['OK'] = 1;
} else {
    $weather = new Weather;
    ThingSpeak::logIn($apiKey)->add([
        'field1',
        'field2',
        'field3',
        'field4',
        'field5',
        'field6',
    ], [
        $weather->temperatura,
        $weather->cisnienie,
        $weather->wilgotnosc,
        $weather->predkosc,
        $weather->kat,
        $weather->zachmurzenie,
    ]);
}
header('Location: index.php');