<?php

if (isset($_POST['task'])) {
    $new_task = [
        'task' => $_POST['task'],
        'marked' => false
    ];

    if ($new_task['task'] !== '') {
        $json_tasks = file_get_contents('../tasks.json');
        $tasks = json_decode($json_tasks, true);

        $exist = false;
        $i = 0;
        while (!$exist && $i < count($tasks)) {
            if ($new_task['task'] === $tasks[$i]['task']) {
                $exist = true;
            }
            $i++;
        }

        if (!$exist) {
            array_push($tasks, $new_task);

            $json_tasks = json_encode($tasks);
            file_put_contents('../tasks.json', $json_tasks);
        }
    }

    header("Content-Type: application/json");
    echo $json_tasks;
}
