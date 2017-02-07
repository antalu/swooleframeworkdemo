##使用方法：
 * 启动：php /mnt/hgfs/git/swooleframeworkdemo/application/app_server.php start
 * 停止：php /mnt/hgfs/git/swooleframeworkdemo/application/app_server.php stop
 * kill所有相关进程：ps -ef|grep app_server.php|grep -v grep|cut -c 9-15|xargs kill -9
 
##压测方法：
 * 安装ab工具：yum install httpd-tools
 * 压力测试：ab -c 1000 -n 10000 http://127.0.0.1:9501/ajax/t3?username=我我我

##安装热更新扩展：
 * git clone https://github.com/zenovich/runkit.git
 * cd runkit
 * phpize
 * ./configure --with-php-config=/usr/local/php/bin/php-config
 * make
 * make install
 * vim /usr/local/php/etc/php.ini 加上 extension="runkit.so"
##php7版本安装热更新扩展：
 * 参照：https://github.com/TysonAndre/runkit7
 
