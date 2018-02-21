<?php

require 'vendor/autoload.php';

use Amp\Dns;
use Amp\Loop;
use function Amp\Promise\all;

Loop::run(function () {
    // $githubIp = yield Dns\resolve('github.com', Dns\Record::A);
    // var_dump($githubIp);
    // Loop::stop();

    Dns\resolve('github.com', Dns\Record::A)->onResolve(function ($error, $result) {
        var_dump($result);
        Loop::stop();
    });
});