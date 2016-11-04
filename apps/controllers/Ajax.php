<?php
/**
 * 启动：php /mnt/hgfs/git/demei/application/app_server.php start
 * 杀死：ps -ef|grep app_server.php|grep -v grep|cut -c 9-15|xargs kill -9
 * 安装ab工具：yum install httpd-tools
 * 压力测试：ab -c 1000 -n 10000 http://127.0.0.1:9502/ajax/t3?username=我我我
 **/

namespace App\Controller;
use Swoole;

class Ajax extends Swoole\Controller
{
    //开启json ajax
// 	public $is_ajax = true;
	function __construct($swoole){
		parent::__construct($swoole);
	}

	function index(){
		$this->http->header('Content-Type', 'text/html; charset=UTF-8');
		return $this->showTrace(true);
	}
	
    function test(){
    	$uid = $_GET['uid'];
        return array('json' => $uid);
    }
    
    public function t1(){
    	$content = Swoole\Client\Http::quickGet('http://www.baidu.com');
    	return $content;
    }
    
    public function t2(){
    	$arr_get = Swoole\Filter::filterArray($_GET);
    	$this->log(11111111);
//     	return $arr_get;
    }
    
    /**
    * @name: RSA加密解密
    * @创建者： xiongjianbang
    * @作　用： 
    * @create:  2016-11-3 下午2:35:54
    */
    public function t3(){
    	$arr_get = Swoole\Filter::filterArray($_GET);
		$pre = $this->rsa_encode($arr_get);
		echo Swoole\Tool::dump($pre);
		echo "<br />";
		echo "<br />";
		echo "<br />";
		//公钥解密
		$arr_ret = $this->rsa_decode($pre);
		echo Swoole\Tool::dump($arr_ret);
		
		//公钥加密，私钥解密
	/* 	echo 'source:干IT的<br />';
		$pue = $rsa->pubEncrypt('干IT的');
		echo 'public encrypt:<br />' . $pue . '<br />';
		
		$prd = $rsa->privDecrypt($pue);
		echo 'private decrypt:' . $prd; */
    }
    
    //缓存获取
    function cache_get()
    {
    	$result = $this->cache->get("swoole_var_1");
    	if(empty($result)){
    		$result = "swoole11";
    		$this->cache->set("swoole_var_1", $result);
    	}
    	var_dump($result);
    }
    
    //缓存设置
    function cache_set()
    {
    	$result = $this->cache->set("swoole_var_1", "swoole");
    	if($result)
    	{
    		echo "cache set success. Key=swoole_var_1";
    	}
    	else
    	{
    		echo "cache set failed.";
    	}
    }
}