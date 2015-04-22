<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include_once dirname(dirname(__FILE__)).'/base.php';
include_once dirname(dirname(__FILE__)).'/codereturn/code_return.php';
include_once '/test.inc';

class Test extends Base{

    public static $kk=1;
    public function __construct() {
        parent::__construct();
        $this->load->library('encrypt');
    }
    //获取手机端验证码   加密 解密
    public function test_ps(){
        //获取秘钥
        $ps = $this->config->item('encryption_key');
        $key = 'this message is come from tel 20150227';
        //秘钥加密
        $key_ps = $this->encrypt->encode($key);
        
        //测试解密
        $test_key='cBtfBn5D2YXurYqGNR8chop0OJCFW7aFi1it4N/9Vuund0jiiYj64OINx2n6rKrvZg3etHzA7Bh3NlIJTKovs26swJONdY0xl5FqdFT++3sd1SK2kvbov8Eq0njcXA1I';
        $key_ori = $this->encrypt->decode($test_key);
        //echo $key_ori;
        
    }
    
    
    public function print_im(){
        echo dirname(dirname(__FILE__));
        echo dirname(__FILE__);
        echo __FILE__;
    }
    
    //错误异常静态属性返回测试
    public function print_return_code(){
        echo Code_return::$OK;
    }

    //错误异常返回码 显示
    public function show_error_code_list(){
        
        $this->load->view('/error_code_return/show_code');
    }
    
    //异常捕获 日志记录 测试
    public function test_except(){
        try{
            
           throw new Exception("Value must be 1 or below aaaaaaaaaaaaaaaaaaa"); 
            
        }catch(Exception $e){
            $this->logger($e->getMessage());
        }
    } 
    //日志打印
    public function logger($log_content='日志测试'){
        $log_filename = dirname(dirname(dirname(__FILE__))).'/logs/tel_api_exception/'.date("Ymd").".log"; 
        $file = fopen($log_filename ,"a+");
        fwrite($file, date('H:i:s')." ".$log_content."\r\n");
        fclose($file);

    }
    public function get_time(){
        echo date('Y-m-d H:i:s');
    }
    public function test_config(){
        echo $this->config->site_url().'<br/>'.$this->config->base_url()."<br/>".$this->config->system_url();
    }
    //测试导入的 inc文件中的常量使用
    public function test_inc(){
        echo YOKE;
    }
    public function test_base(){
        echo BASEPATH;
    }
    public function test_kk(){
        
        echo self::$kk++;
    
    }
    //查看数据库连接PDO
    public function test_pdo(){
        print_r(PDO::getAvailableDrivers());
    }
    //测试PDO连接数据库
    public function test_connect_pdo(){
        try{
            $pdo = new PDO('mysql:dbname=mmf;host=192.168.0.201','root','');
        //var_dump($pdo);
        
        $q = 'select * from api_test';
        $data = $pdo->query($q);
        //var_dump($data->rowCount());
        foreach($data as $row){
            var_dump($row['name']);
        }
        unset($pdo);
        
        }catch(Exception $e){
            echo $e->getLine();
        }
        
    }
    //测试文件处理类
    public function test_splfile(){
        $log_filename = dirname(dirname(dirname(__file__))) . '/logs/user_enter_exception/20150302.log';
        $file = new SplFileInfo($log_filename);
        echo $file->getSize();
        echo "<br/>";
        echo $file->getExtension();
        echo "<br/>";
        echo $file->getBasename();
        echo "<br/>";
        echo $file->getMTime();
        echo "<br/>";
        echo $file->getPathname();
        echo "<br/>";
        echo $file->getType();
        echo "<br/>";
        echo $file->isDir();
        echo "<br/>";
        echo $file->isFile();
        echo "<br/>";
        echo $file->isWritable();
        echo "<br/>";
    }
    //测试操作文件
    public function test_objfile_read(){
        $log_filename = dirname(dirname(dirname(__file__))) . '/logs/user_enter_exception/20150302.log';
        $file = new SplFileObject($log_filename,'r');
        
        //读取
        while(!$file->eof()){
            echo $file->fgets();
        }
        
    }
  //测试操作文件
    public function test_objfile_write(){
        $log_filename = dirname(dirname(dirname(__file__))) . '/logs/user_enter_exception/20150302.log';
        $file = new SplFileObject($log_filename,'a+');
        
        //写入
        $file->fwrite("hereis new\r\n");
        
    }
    
    //测试读取网络url
    public function test_webfile_read(){
        $log_filename = 'http://www.qiaotiantian.com/';
        $file = fopen($log_filename, "r");
        
        //读取
        //$read = fgetcsv($file);
        $result ='';
        //head头信息
        $tt = stream_get_meta_data($file); 
        //读取网页信息
        while(!feof($file)){
            $result .=  fgets($file);
        }
        //实际 就是html的集合  通过浏览器输出成页面
        //var_dump($result);
        //echo个 utf-8 编码
        //应该只读取局部  修改html
        echo "url: $result"; 

        fclose($file);
        
    }
    
    //测试 socket 获取其他服务器页面  head头  get post
    public function test_socket(){
        //var_dump(parse_url('http://www.qiaotiantian.com:808/test/kk/index.php?ck=8'));
        //应该使用 parse_url后进行check每一个部分是否符合要求
        $url = parse_url('http://www.qiaotiantian.com:80/');
        //var_dump($url);
        if($fp = fsockopen($url['host'],$url['port'],$errno,$errstr,30)){
            $send = "GET {$url['path']} HTTP/1.1\r\n";
            $send .= "HOST:{$url['host']}\r\n";
            $send .= "CONNECTION:Close\r\n\r\n";
            
            fwrite($fp,$send);
            
            //$result='';
             while(!feof($fp)){
                echo fgets($fp);
            }
            //var_dump($result);
        }
        //获取头文件  表名可通信  200返回码
       
    }
  //压缩 gz
  public function test_file_gz(){
    $log_filename = dirname(dirname(dirname(__file__))) . '/logs/user_enter_exception/212.txt.gz';
    $fp =gzopen($log_filename,'w9');
    gzwrite($fp,"233232\n");
    gzwrite($fp,"233232\n");
    gzwrite($fp,"233232\n");
    gzwrite($fp,"233232\n");
    //gzwrite($fp,"null");
    gzclose($fp);
  }
  
  public function test_file_regz(){
    $log_filename = dirname(dirname(dirname(__file__))) . '/logs/user_enter_exception/212.txt.gz';
    $log_filename2 = dirname(dirname(dirname(__file__))) . '/logs/user_enter_exception/212.txt';
    //$fp1 = readgzfile($log_filename);
    //$fp 为含有解压数据的数组 一行 为 一项
    $fp = gzfile($log_filename);
    $file = fopen($log_filename2, "a");
    for($i=0;$i<count($fp);$i++){
        fwrite($file, $fp[$i]);
    }
        fclose($file);
  }
  
    

//尝试引入外部XML 文件 解析  两种方式
 public function test_xml(){
    
    //方式1
    $file = file_get_contents(dirname(__file__).'/testxml.xml');
    $postObj = simplexml_load_string($file, 'SimpleXMLElement', LIBXML_NOCDATA);
    //方式2
    $file1 = simplexml_load_file(dirname(__file__).'/testxml.xml');
    echo $file1->people[0]->name;
    //
 }
 public function test_info(){
    ini_set('xdebug.dump.SERVER','*');
    
    xdebug_dump_superglobals();
 }
 
}
/** here is the end of this page **/
