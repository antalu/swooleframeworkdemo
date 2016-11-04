<?php
$redis['master'] = array(
    'host'    => "127.0.0.1",
    'port'    => 6379,
    'password' => '123456',
    'timeout' => 0.25,
    'pconnect' => false,
//    'database' => 1,
);
return $redis;
