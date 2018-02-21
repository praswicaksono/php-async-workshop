<?php

require 'vendor/autoload.php';

use Amp\Loop;
use function Amp\asyncCall;
use function Amp\call;
use function Amp\File\open;

Loop::run(function () {
    open('log.txt', 'a+')->onResolve(function ($error, $result) {
        $result->end('Hello World' . PHP_EOL)->onResolve(function ($error, $result) {
            echo 'write success' . PHP_EOL;
        });
    });

    // $handle = yield open('log.txt', 'a+');
    // yield $handle->end('Hello World' . PHP_EOL);
    // echo 'write success' . PHP_EOL;

    // asyncCall(function () {
    //     $handle = yield open('log.txt', 'a+');
    //     yield $handle->end('Hello World' . PHP_EOL);
    //     echo 'write success' . PHP_EOL;
    // });

    // echo 'after async call' . PHP_EOL;

});