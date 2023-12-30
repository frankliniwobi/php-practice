<?php

use Illuminate\Support\Collection;

require __DIR__.'/../vendor/autoload.php';

$collection = new Collection([1,2,4]);

die(var_dump($collection));