<?php

require 'vendor/autoload.php';

use Amp\Loop;
use Amp\Deferred;
use Amp\Delayed;
use Amp\Dns;
use function Amp\Promise\all;
use function Amp\asyncCall;
use function Amp\call;

function resolveGithub()
{
    $result = yield Dns\resolve('github.com', Dns\Record::A);

    return $result;
}

function resolveGoogle()
{
    $result = yield Dns\resolve('google.com', Dns\Record::A);

    return $result;
}

Loop::run(function () {
    
    $tasks = [
        call('resolveGithub'),
        call('resolveGoogle'),
    ];

    $result = yield all($tasks);

    var_dump($result);

    Loop::stop();

});