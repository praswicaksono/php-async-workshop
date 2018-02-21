<?php

require 'vendor/autoload.php';

use Amp\Loop;
use Amp\Deferred;
use Amp\Delayed;
use function Amp\Promise\all;
use function Amp\asyncCall;
use function Amp\call;

function task1()
{
    yield new Delayed(1000);
    echo 'Loaded Data Task 1' . PHP_EOL;
    yield new Delayed(10000);
    echo 'Task 1 Finished' . PHP_EOL;

    return 69;
}

function task2()
{
    yield new Delayed(1000);
    echo 'Loaded Data Task 2' . PHP_EOL;
    yield new Delayed(1000);
    echo 'Task 2 Finished' . PHP_EOL;

    return 96;
}

Loop::run(function () {
    
    $tasks = [
        call('task1'),
        call('task2'),
    ];

    $result = yield all($tasks);

    echo 'Result Task 1 : ' . $result[0] . PHP_EOL;
    echo 'Result Task 2 : ' . $result[1] . PHP_EOL;

    Loop::stop();

});