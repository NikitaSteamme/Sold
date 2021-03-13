<?php

use Nikitam\Example\Item;
use Nikitam\Example\DB;

require __DIR__ . '/vendor/autoload.php';

//$test = new Item(123, 'USD', "test desc 2", "flat", '25', 'm2', 2, 'saltovla', 'dr Narodov 222');

$db  = new DB();
echo $db->getStageParams(23213);

