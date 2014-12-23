<?php

//生成JS标签
function addJs($url) {
    return '<script type="text/javascript" language="javascript" src="' . $url . '"></script>';
}

//生成CSS链接
function addCss($url) {
    return '<link rel="stylesheet" type="text/css" media="all" href="' . $url . '" />';
}

//渲染性别
function renderSex($val) {
    $val == 1 ? $text = '男' : $text = '女';
    return $text;
}

function get_keyword($url,$kw_start)
{
    $start=stripos($url,$kw_start);//函数返回字符串在另一个字符串中第一次出现的位置。
    $url=substr($url,$start+strlen($kw_start));
    $start=stripos($url,'&');//函数返回字符串在另一个字符串中第一次出现的位置。
    if ($start>0)
    {
        $start=stripos($url,'&');
        $s_s_keyword=substr($url,0,$start);
    }
    else
    {
        $s_s_keyword=substr($url,0);
    }
    return $s_s_keyword;
}
function mysql_protect($s) {
	return "\"" . mysql_real_escape_string ($s) . "\"";
}
function search_word_from() {
    $referer = isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'';
    if(strstr( $referer, 'baidu.com')){ //百度
        preg_match( "|baidu.+wo?r?d=([^\\&]*)|is", $referer, $tmp );
        if(!isset($tmp[1])){
            $tmp[1]='';
        }
        $keyword = urldecode( $tmp[1] );
        $from = 'baidu';
    }elseif(strstr( $referer, 'google.com') or strstr( $referer, 'google.cn')){ //谷歌
        preg_match( "|google.+q=([^\\&]*)|is", $referer, $tmp );
        if(!isset($tmp[1])){
            $tmp[1]='';
        }
        $keyword = urldecode( $tmp[1] );
        $from = 'google';
    }elseif(strstr( $referer, 'so.com')){ //360搜索
        preg_match( "|so.+q=([^\\&]*)|is", $referer, $tmp );
        if(!isset($tmp[1])){
            $tmp[1]='';
        }
        $keyword = urldecode( $tmp[1] );
        $from = '360'; 
    }elseif(strstr( $referer, 'sogou.com')){ //搜狗
        preg_match( "|sogou.com.+query=([^\\&]*)|is", $referer, $tmp );
        if(!isset($tmp[1])){
            $tmp[1]='';
        }
        $keyword = urldecode( $tmp[1] );
        $from = 'sogou';   
    }elseif(strstr( $referer, 'soso.com')){ //搜搜
        preg_match( "|soso.com.+w=([^\\&]*)|is", $referer, $tmp );
        if(!isset($tmp[1])){
            $tmp[1]='';
        }
        $keyword = urldecode( $tmp[1] );
        $from = 'soso';
    }else {
        $keyword ='';
        $from = '';
    }
 
    return array('keyword'=>$keyword,'from'=>$from);
}
function judge_browser() {
    if(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE8.0"))
                $user_agent = "IE8.0";
            elseif(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE7.0"))
                $user_agent = "IE7.0";
            elseif(strpos($_SERVER["HTTP_USER_AGENT"],"MSIE6.0"))
                $user_agent = "IE6.0";
            elseif(strpos($_SERVER["HTTP_USER_AGENT"],"Firefox"))
                $user_agent = "Firefox";
            elseif(strpos($_SERVER["HTTP_USER_AGENT"],"Firefox/16"))
                $user_agent = "Firefox16";
            elseif(strpos($_SERVER["HTTP_USER_AGENT"],"Chrome"))
                $user_agent = "Chrome";
            elseif(strpos($_SERVER["HTTP_USER_AGENT"],"Safari"))
                $user_agent = "Safari";
            elseif(strpos($_SERVER["HTTP_USER_AGENT"],"Opera"))
                $user_agent = "Opera";
            else $user_agent = "其他";
    return $user_agent;
}
?>
