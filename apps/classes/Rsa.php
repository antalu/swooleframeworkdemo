<?php
namespace App;
/**
 * 使用openssl实现非对称加密
 * 
 * @since 2015-11-10
 */
class Rsa
{
    /**
     * private key
     */
        private $_privKey;
       
        /**
         * public key
         */
        private $_pubKey;
       
        /**
         * the keys saving path
         */
        private $_keyPath;
       
        /**
         * the construtor,the param $path is the keys saving path
         */
        public function __construct(){
        	//公钥
        	$this->_privKey = '-----BEGIN PRIVATE KEY-----
MIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQCdX+pi0BV0XMGn
kUFG4mPwJcUF+POlhDwpwMEVb8277euvXBPysL27Mo+/UhNKihfnnY1n6M8IXbDQ
hgUavInqEqfnlAU+eRAQBigDaLw4k7Z7AI1razs/Q+eqda57D9ecAzAXLBOMfENE
hYiq6SGXWfn5dKLICtdbYsMBZMdfaoeMc+SyGGj+/Q8PubwqcSl+s4K7rE599o8V
Zee8BMry51X9j1M9H5OBMGeR6EhMjLd1inEZ4fRv329Wu0G2GMuabraxUYSnIViC
eMso+oNvPv8k7+1lyuCoXmqZq95kpFiXvxMoa5U940Lda0NiW2zh8brh344xEP8F
s5VDOQh1AgMBAAECggEAXnomjAu/1YuZ9q8NMTDYLmN+VIeQPd2VALvnLqdgK2I6
C5yLnTbdsHQ6N/FeA3HDyBidu7PYFn2omIbcqaBma0+n3S7PtyGWswf/HYzS8mQ7
OLysKcDGYMSzX3ImvVpVZiPDyyV61uwCtjA0S+aJdANgPpH254EaqJIx37RQvMaW
eLlPAJ8+Y8ZfAb0LoiX9lcWtUzT1YvXU/8jqV7CRneBTeSV6Gp7UfgDpfR7WQRBR
75DOLyqDN+RzTg+1IkAlQi2lP2mj0Bl7MrEJL5LzZ64cM0LTkXMPrT/Y+Uyo/Xwg
HRwmAgIP/AHYhg9uu1oZtstBuUV9Js3cHZhQ3omkQQKBgQDJ2TDik7hZY87HKfp2
EzAtS2kfT6xmOEFLbVG57tG0OZ8UChXRdYEeGcy2gdeJ4lCGRnVMwhtUC/YQiduz
xUClYXf25ZfZRhj8rt93Rl/u+0FQAfsKu3xx4/riWBRpwC/awuA+wptLlXSUvNzH
0G7Mk5N8feZ9LeDnyzodz7/lFwKBgQDHmEyj1j2A9Z59kGeh6zSzxOphmCBVOJ8k
SKA91IUrPjb3jolPZCNo09WJTnnEJDtxoIqxneM9k6WgrxQ2RQhoANTDCtJSaHEf
DYHThE7FNdQ5YdgA1B1JY/0M1Fip+8SQ0rVf6d+UG3WFk/W53DMS7CmdM+630Qpi
hxGT0+mOUwKBgDuwUlhuPnGQpjEXJM2N1w1N44Qy11RTBlv7s9M74B9fer8+TD1o
dgokrvi5ZLeNiSpr43wTWml8MAOsAKAkkH1XWVZVhpXluLXgMIzg7rWI70NtkoMV
9jLnq+ULDt5Gyt/yCMYGXk33oEXro44jAODWMyL5SBN0YbGp00HFkYV5AoGAN4av
C4U2ZwHtrZDWw7zjVH+blLr1g7/UxgtOSOUuhvEv6X7FxEhfcXI9HY2vYlmSD/JR
o0gBR8gjc6hBPzfFNunERt5j1HkpvzHKxEUyhLqM58nIhbJ800X1x/PrFp7r+D4m
JyCxCkr5TsfyvFn9+22nxgwEhS6qbO6WfUGe3/ECgYAYMgnR6e0B9cQouOyPcxWn
YBavE5f2gxa3I1y6t1P/N5VFvvk+Ebx2fq/8G6egXCjs6fbnDkM2yS39gxvy+62Y
kO/v7KkF6O938j6P59ba2xJIt3BgopFWSmPJJJOrQCBwmVabDOsmfdrccW2+cbXk
fVx87HZyT/CBhjbjLiijpg==
-----END PRIVATE KEY-----';
        	//私钥
        	$this->_pubKey = '-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAnV/qYtAVdFzBp5FBRuJj
8CXFBfjzpYQ8KcDBFW/Nu+3rr1wT8rC9uzKPv1ITSooX552NZ+jPCF2w0IYFGryJ
6hKn55QFPnkQEAYoA2i8OJO2ewCNa2s7P0PnqnWuew/XnAMwFywTjHxDRIWIqukh
l1n5+XSiyArXW2LDAWTHX2qHjHPkshho/v0PD7m8KnEpfrOCu6xOffaPFWXnvATK
8udV/Y9TPR+TgTBnkehITIy3dYpxGeH0b99vVrtBthjLmm62sVGEpyFYgnjLKPqD
bz7/JO/tZcrgqF5qmaveZKRYl78TKGuVPeNC3WtDYlts4fG64d+OMRD/BbOVQzkI
dQIDAQAB
-----END PUBLIC KEY-----';
        }

        /**
         * create the key pair,save the key to $this->_keyPath
         */
        public function createKey()
        {
                $r = openssl_pkey_new();
                openssl_pkey_export($r, $privKey);
                file_put_contents($this->_keyPath . DIRECTORY_SEPARATOR . 'priv.key', $privKey);
                $this->_privKey = openssl_pkey_get_private($privKey);
                $rp = openssl_pkey_get_details($r);
                $pubKey = $rp['key'];
                file_put_contents($this->_keyPath . DIRECTORY_SEPARATOR .  'pub.key', $pubKey);
                $this->_pubKey = openssl_pkey_get_public($pubKey);
        }

        /**
         * setup the private key
         */
        public function setupPrivKey()
        {
                $this->_privKey = openssl_pkey_get_private($this->_privKey);
                return true;
        }
       
        /**
         * setup the public key
         */
        public function setupPubKey()
        {
                $this->_pubKey = openssl_pkey_get_public($this->_pubKey);
                return true;
        }
       
        /**
         * encrypt with the private key
         */
        public function privEncrypt($data)
        {
                if(!is_string($data)){
                        return null;
                }
                $this->setupPrivKey();
                $r = openssl_private_encrypt($data, $encrypted, $this->_privKey);
                if($r){
                        return base64_encode($encrypted);
                }
                return null;
        }
       
        /**
         * decrypt with the private key
         */
        public function privDecrypt($encrypted)
        {
                if(!is_string($encrypted)){
                        return null;
                }
                $this->setupPrivKey();
                $encrypted = base64_decode($encrypted);
                $r = openssl_private_decrypt($encrypted, $decrypted, $this->_privKey);
                if($r){
                        return $decrypted;
                }
                return null;
        }
       
        /**
         * encrypt with public key
         */
        public function pubEncrypt($data)
        {
                if(!is_string($data)){
                        return null;
                }
                $this->setupPubKey();
                $r = openssl_public_encrypt($data, $encrypted, $this->_pubKey);
                if($r){
                        return base64_encode($encrypted);
                }
                return null;
        }
       
        /**
         * decrypt with the public key
         */
        public function pubDecrypt($crypted)
        {
                if(!is_string($crypted)){
                        return null;
                }
                $this->setupPubKey();
                $crypted = base64_decode($crypted);
                $r = openssl_public_decrypt($crypted, $decrypted, $this->_pubKey);
                if($r){
                        return $decrypted;
                }
                return null;
        }
       
        public function __destruct()
        {
//                 @ fclose($this->_privKey);
//                 @ fclose($this->_pubKey);
        }

}