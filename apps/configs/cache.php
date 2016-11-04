<?php
$cache['session'] = array(
    'type' => 'FileCache',
    'cache_dir' => WEBPATH . '/cache/filecache/',
);
$cache['master'] = array(
    'type' => 'Redis',
    'use_redis' => true, 
    'compress' => true, 
    'servers' => array(
        array(
            'host' => '127.0.0.1',
            'port' => 6379,
            'weight' => 100,
            'persistent' => true,
        ),
        array(
            'host' => '127.0.0.1',
            'port' => 6379,
            'weight' => 100,
            'persistent' => true,
        ),
    ),
);
return $cache;