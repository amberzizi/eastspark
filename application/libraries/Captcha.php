<?php

/**
 * Example
 * 
 *   $this->load->library('captcha');
 *   $this->captcha->init(array('width'=>80,'height'=>26,'length'=>4,'fontPath'=>'./fonts/Comicbd.ttf'));
 *   $this->cookie->set('register_captcha', $this->captcha->code);
 *   $this->captcha->generate();
 *   
 */
class Captcha {

    public $code = '';      //验证码内容
    public $length = 4;     //验证码文字长度
    public $height = '';    //验证码高度
    public $width = '';     //验证码图片宽度
    public $fontPath = '';  //字体路径
    public $imageName = ''; //如果存为文件,文件路径
    public $output = true;  //默认直接输出到浏览器

    /**
     * 初始化验证码类
     * @param type $config
     */

    public function init($config = NULL) {
        $defaults = array('imageName' => '', 'width' => '80', 'height' => '25', 'fontPath' => './fonts/Comicbd.ttf', 'length' => 4, 'output' => true);
        foreach ($defaults as $key => $val) {
            if (!is_array($config)) {
                if (!isset($this->{$key}) OR $this->{$key} == '') {
                    $this->{$key} = $val;
                }
            } else {
                $this->{$key} = (!isset($config[$key])) ? $val : $config[$key];
            }
        }
        $this->buildCode($this->length);
    }

    /**
     * 生成验证码内容
     * @param type $length
     */
    private function buildCode($length) {
        $str = "234678abcdefhijkmnpqrtuvwxyzABCDEFGHJKLMNPQRTUVWXYZ";
        for ($i = 0; $i < $length; $i++) {
            $randnum = mt_rand(0, strlen($str) - 1);
            $this->code .= $str[$randnum];
        }
    }

    /**
     * 生成验证码图片
     */
    public function generate() {
        //以下内容仿照 system/helpers/captcha_helper.php 实现
        $angle = ($this->length >= 6) ? rand(-($this->length - 6), ($this->length - 6)) : 0;
        $x_axis = rand(6, (360 / $this->length) - 16);
        $y_axis = ($angle >= 0 ) ? rand($this->height, $this->width) : rand(6, $this->height);

        $im = imagecreate($this->width, $this->height);    //生成图片
        $bg_color = imagecolorallocate($im, 255, 255, 255);
        $border_color = imagecolorallocate($im, 153, 102, 102);
        $text_color = imagecolorallocate($im, 0, 0, 0);
        $grid_color = imagecolorallocate($im, 255, 182, 182);
        $shadow_color = imagecolorallocate($im, 255, 240, 240);

        ImageFilledRectangle($im, 0, 0, $this->width, $this->height, $bg_color);

        $theta = 1;
        $thetac = 7;
        $radius = 16;
        $circles = 20;
        $points = 32;

        for ($i = 0; $i < ($circles * $points) - 1; $i++) {
            $theta = $theta + $thetac;
            $rad = $radius * ($i / $points );
            $x = ($rad * cos($theta)) + $x_axis;
            $y = ($rad * sin($theta)) + $y_axis;
            $theta = $theta + $thetac;
            $rad1 = $radius * (($i + 1) / $points);
            $x1 = ($rad1 * cos($theta)) + $x_axis;
            $y1 = ($rad1 * sin($theta)) + $y_axis;
            imageline($im, $x, $y, $x1, $y1, $grid_color);
            $theta = $theta - $thetac;
        }
        $use_font = ($this->fontPath != '' AND file_exists($this->fontPath) AND function_exists('imagettftext')) ? TRUE : FALSE;
        if ($use_font == FALSE) {
            $font_size = 5;
            $x = rand(0, $this->width / ($this->length / 3));
            $y = 0;
        } else {
            $font_size = 16;
            $x = rand(0, $this->width / ($this->length / 1.5));
            $y = $font_size + 2;
        }
        $x = 8; //固定第一个字符X轴坐标
        for ($i = 0; $i < strlen($this->code); $i++) {
            if ($use_font == FALSE) {
                $y = rand(0, $this->height / 2);
                imagestring($im, $font_size, $x, $y, substr($this->code, $i, 1), $text_color);
                $x += ($font_size * 2);
            } else {
                //$y = rand($img_height / 2, $img_height - 3);//计算Y轴坐标
                $y = 20;
                imagettftext($im, $font_size, $angle, $x, $y, $text_color, $this->fontPath, substr($this->code, $i, 1));
                $x += $font_size;
            }
        }
        imagerectangle($im, 0, 0, $this->width - 1, $this->height - 1, $border_color);

        if ($this->output === true) {
            header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); //不缓存
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-cache, must-revalidate");
            header("Pramga: no-cache");
            header("Content-type: image/jpeg");
            ImageJPEG($im);
        } else {
            ImageJPEG($im, $this->imageName);
        }
        ImageDestroy($im);
    }

}

?>