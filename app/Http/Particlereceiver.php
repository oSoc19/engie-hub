<?php
//file_put_contents ( 'tmp/ngroktest.log', json_encode($_POST));
//$data = $_POST['data'];
//$json = json_decode($data);
//
//
//$body = file_get_contents("php://input");
//$webhook = json_decode($body, true);
//
//echo "Here are the media URLs:";
//print_r($webhook["output_urls"]);

$json = file_get_contents('php://input');
if ($json !== false):
    $data = json_decode($json, true);
    if ($data !== null):
        echo "hello";
        echo $data;
    endif;
endif;

$json = file_get_contents('php://input');
$action = json_decode($json, true);
echo $action;




