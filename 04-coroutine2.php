<?php


function logger()
{
    while (true) {
        echo yield . PHP_EOL;
    }
}

function main()
{
    $loggger = logger();

    $loggger->send('Log 1');
    $loggger->send('Log 2');
    $loggger->send('Log 3');
    $loggger->send('Log 4');
}

main();