<?php


function task1()
{
    echo 'Task 1 Dimulai' . PHP_EOL;
    sleep(2);
    echo 'Task 1 Selesai' . PHP_EOL;
}

function task2()
{
    echo 'Task 2 Dimulai' . PHP_EOL;
    sleep(1);
    echo 'Task 2 Selesai' . PHP_EOL;
}

function task3()
{
    echo 'Task 3 Dimulai' . PHP_EOL;
    sleep(3);
    echo 'Task 3 Selesai' . PHP_EOL;
}

function main()
{
    $tasks = new SplQueue();
    $tasks->enqueue('task1');
    $tasks->enqueue('task2');
    $tasks->enqueue('task3');

    while (! $tasks->isEmpty()) {
        $task = $tasks->dequeue();
        
        call_user_func($task);
    }
}

main();