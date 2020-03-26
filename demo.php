<?php
/**
 * PThreads多线程demo，调用php-cli.ini，必须在cli模式下运行
 * class Request
 */
class Request extends Thread{
	public $url;
	public $response;
	public function __construct($url){
		$this->url = $url;
	}
	public function run(){
		$this->response = file_get_contents($this->url);
	}
}

echo time()."<br>";
$chG = new Request("http://www.acfun.cn");
$chB = new Request("http://www.bilibili.com");
$chG ->start();
$chB ->start();
$chG->join();
$chB->join();

echo $gl = $chG->response;
echo $bd = $chB->response;
echo time();