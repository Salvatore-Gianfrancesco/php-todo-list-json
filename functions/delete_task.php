<?php

if (isset($_POST['task_index'])) {
    $task_index = $_POST['task_index'];

    $json_tasks = file_get_contents('../tasks.json');
    $tasks = json_decode($json_tasks, true);

    array_splice($tasks, $task_index, 1);

    $json_tasks = json_encode($tasks);
    file_put_contents('../tasks.json', $json_tasks);

    header("Content-Type: application/json");
    echo $json_tasks;
}
