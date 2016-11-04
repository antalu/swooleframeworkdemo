<?php
namespace App\Model;
use Swoole;

class User extends Swoole\Model
{
    /**
     * 表名
     * @var string
     */
    public $table = 'users';

    function test()
    {
        $a = model('Test');
        var_dump($a);
        $key = '1234';
        $this->swoole->cache->delete($key);
        $this->db->getAffectedRows();
    }
    
    public function getone($id=''){
    	$result = $this->get($id);
    	$user = $result->get();
    	return $user;
    }
    
    public function insert($data=array())
    {
    	if(empty($data)){
    		return FALSE;
    	}
    	$data['name'] = isset($data['name'])?$data['name']:'';
    	$data['level'] = isset($data['level'])?$data['level']:'';
    	$data['mobile'] = isset($data['mobile'])?$data['mobile']:'';
    	$id = $this->put($data);
    	return $id;
    }
}