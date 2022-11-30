<?php

$json_get = file_get_contents('tasks.json');
$tasks = json_decode($json_get, true);
// var_dump($json_get, $tasks);

$task_list = [];
foreach ($tasks as $task) {
    array_push($task_list, $task['task']);
}

if (isset($_GET['new_task']) && !in_array($_GET['new_task'], $task_list)) {
    $new_task = [
        "task" => $_GET['new_task'],
        "marked" => false
    ];

    array_push($tasks, $new_task);
    // var_dump($new_task, $tasks);

    $json_put = json_encode($tasks);
    file_put_contents('tasks.json', $json_put);

    /* header('Content-Type: application/json');
    echo json_encode($tasks); */
}
