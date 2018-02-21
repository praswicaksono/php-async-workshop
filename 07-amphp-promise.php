<?php

require 'vendor/autoload.php';

use Amp\Loop;
use Amp\Deferred;

function job()
{
    $deferred = new Deferred();

    Loop::delay(5000, function () use ($deferred) {
        $deferred->resolve('Job Done');
        Loop::stop();
    });

    return $deferred->promise();
}
Loop::run(function () {
    // $result = yield job();
    // echo $result . PHP_EOL;

    job()->onResolve(function ($error, $result) {
        echo $result . PHP_EOL;
    });

    echo 'After Job' . PHP_EOL;
});