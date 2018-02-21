<?php

function xrange($start, $end, $step = 1) {
    for ($i = $start; $i <= $end; $i += $step) {
        yield $i;
    }
}

function main()
{
    foreach (xrange(1, 10) as $range) {
        echo $range;
    }
    
    // $generator = xrange(1, 10);

    // while ($generator->valid()) {
    //     echo $generator->current();
    //     $generator->next();
    // }
}

main();