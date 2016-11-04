# swooleframeworkdemo

/**
 * 启动：php /mnt/hgfs/git/swooleframeworkdemo/application/app_server.php start
 * 停止：php /mnt/hgfs/git/swooleframeworkdemo/application/app_server.php stop
 * kill所有相关进程：ps -ef|grep app_server.php|grep -v grep|cut -c 9-15|xargs kill -9
 * 安装ab工具：yum install httpd-tools
 * 压力测试：ab -c 1000 -n 10000 http://127.0.0.1:9502/ajax/t3?username=我我我
 **/