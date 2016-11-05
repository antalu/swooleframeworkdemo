<?php

namespace App;

abstract class Log {
    const TRACE   = 0;
    const INFO    = 1;
    const NOTICE  = 2;
    const WARN    = 3;
    const ERROR   = 4;


    protected static $level_str = array(
        'TRACE',
        'INFO',
        'NOTICE',
        'WARN',
        'ERROR',
    );

    //写日志
    static function write($msg, $level=self::ERROR, $log_key='master'){
    	if (defined('DEBUG') and DEBUG == 'on'){
	        $file_name = WEBPATH . '/logs/'.date('Y-m-d').'.log';
	        $level_str = self::$level_str[$level];
	        error_log(date('Y-m-d H:i:s')."\t{$level_str}:{$msg}\r\n",3,$file_name);
    	}
    }
}