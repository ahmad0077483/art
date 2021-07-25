<?php


require __DIR__ .'vendor/autoload.php';


try {
$redis= new Predis\Client();
$counter=$redis->incr('counter');
echo $counter;
}catch (Exception $e){

    var_dump($e->getMessage());die;
}
