<?php

require 'vendor/autoload.php';

use Amp\Delayed;
use Amp\Loop;
use function Amp\asyncCall;

asyncCall(function () {
    echo 'Task 1 Dimulai' . PHP_EOL;
    yield new Delayed(1000);
    echo 'Task 1 Selesai' . PHP_EOL;
});
asyncCall(function () {
    echo 'Task 2 Dimulai' . PHP_EOL;
    yield new Delayed(2000);
    echo 'Task 2 Selesai' . PHP_EOL;
});
asyncCall(function () {
    echo 'Task 3 Dimulai' . PHP_EOL;
    yield new Delayed(3000);
    echo 'Task 3 Selesai' . PHP_EOL;
});

echo '-- Before Loop --' . PHP_EOL;

Loop::run();