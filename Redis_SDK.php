<?php

namespace redis;
	
use Predis;
use think\facade\Config;

final class Redis_SDK 
{
   private static $ins =null;
	   
   static function create()
    { 
 
       
        if (!isset(self::$ins) ) {
		$info=Config::get('redis_sdk.');	 
		$redis=new Predis\Client(array('scheme' => 'tcp','host' =>$info['host'],'port' =>$info['port']));		  
		$redis->auth($info['pass']);
		
            self::$ins=$redis;
        }
        return self::$ins;
    }
}


