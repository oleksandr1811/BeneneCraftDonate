<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/engine/classes/Main.class.php';
$engine = new Engine;

//Make sure that it is a POST request.
if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') !== 0){
    echo '<script type="text/javascript">window.location.href="/";</script>';
    die();
}

//Receive the RAW post data.
$content = trim(file_get_contents("php://input"));

//Attempt to decode the incoming RAW post data from JSON.
$decoded = json_decode($content, true);

//If json_decode failed, the JSON is invalid.
if(!is_array($decoded)){
    die();
}

if($decoded['bill']['status']['value'] !== 'PAID') die();

$engine->payment_action_qiwi($decoded['bill']['customer']['account'], $decoded['bill']['amount']['value']);


