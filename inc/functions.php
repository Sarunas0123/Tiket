<?php

function printData(){
    $data = "data/info.txt";
    $content = file_get_contents($data);
    $formData = implode(',', $_POST);
    $content .= $formData.rand(1000, 4000).":";
    file_put_contents($data, $content);
    $messages = file_get_contents($data, true);
    $messages = explode(':', $messages);
    return $messages;
}
function readData(){
    $data = "data/info.txt";
    $content = file_get_contents($data);
    $messages = explode(':', $content);
    return $messages;
}