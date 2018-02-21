<?php

function task1()
{
    yield 'Task 1 Dimulai' . PHP_EOL;

    // pause execution before sleep
    yield;

    sleep(2);
    yield 'Task 1 Selesai' . PHP_EOL;
}

function task2()
{
    yield 'Task 2 Dimulai' . PHP_EOL;
    yield 'Task 2 Selesai' . PHP_EOL;
}

function task3()
{
    yield 'Task 3 Dimulai' . PHP_EOL;

    // pause execution before sleep
    yield;

    sleep(3);
    yield 'Task 3 Selesai' . PHP_EOL;
}

function main()
{
    $tasks = new SplQueue();
    $tasks->enqueue(task1());
    $tasks->enqueue(task2());
    $tasks->enqueue(task3());

    while (! $tasks->isEmpty()) {
        $task = $tasks->dequeue();
        echo (string) $task->current();

        $task->next();
        if ($task->valid()) {
            $tasks->enqueue($task);
        }
    }
}

main();