<?php

$json_get = file_get_contents('tasks.json');
$tasks = json_decode($json_get);
// var_dump($json_get, $tasks);

if (isset($_GET['new_task']) && !in_array($_GET['new_task'], $tasks)) {
    $new_task = $_GET['new_task'];
    array_push($tasks, $new_task);
    // var_dump($new_task, $tasks);

    $json_put = json_encode($tasks);
    file_put_contents('tasks.json', $json_put);

    /* header('Content-Type: application/json');
    echo json_encode($tasks); */
}
