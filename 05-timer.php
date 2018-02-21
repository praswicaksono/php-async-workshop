<?php

require 'vendor/autoload.php';

use Amp\Loop;

Loop::run(function () {
    Loop::repeat(1000, function () {
        echo 'Executed in Loop::repeat' . PHP_EOL;
    });

    Loop::delay(5000, function () {
        echo 'Executed in Loop:delay' . PHP_EOL;
        Loop::stop();
        echo 'Loop stopped';
    });
});
