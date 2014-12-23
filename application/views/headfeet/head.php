<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <link rel="shortcut icon" href="../favicon.ico" />
        <meta name="renderer" content="webkit"/>
        <meta name="description" content="<?php echo $meta['description']; ?>" />
        <meta name="keywords" content="<?php echo $meta['keywords']; ?>" />
        <meta name="renderer" content="webkit"/>
        <title><?php echo $meta['title']; ?> - 伊斯货运</title>
        <?php
        foreach ($meta['css'] as $value) {
            echo $value;
        }
        foreach ($meta['js'] as $value) {
            echo $value;
        }
        ?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="text/javascript">
            $(document).ready(function() {
                var aMenuOneLi = $(".menu-one > li");
                var aMenuTwo = $(".menu-two");
                $(".menu-one > li > .header").each(function(i) {
                    $(this).click(function() {
                        if ($(aMenuTwo[i]).css("display") == "block") {
                            $(aMenuTwo[i]).slideUp(300);
                            $(aMenuOneLi[i]).removeClass("menu-show");
                        } else {
                            for (var j = 0; j < aMenuTwo.length; j++) {
                                $(aMenuTwo[j]).slideUp(300);
                                $(aMenuOneLi[j]).removeClass("menu-show");
                            }
                            $(aMenuTwo[i]).slideDown(300);
                            $(aMenuOneLi[i]).addClass("menu-show");
                        }
                    });
                });
                var num1 = $('#channel1 >ul >li').length;
                var num2 = $('#channel2 >ul >li').length;
                var num3 = $('#channel3 >ul >li').length;
                if(num1==0){
                   $('#channel1').css('display','none'); 
                }
                if(num2==0){
                   $('#channel2').css('display','none'); 
                }
                if(num3==0){
                   $('#channel3').css('display','none'); 
                }
            });
        </script>

    </head>
    <body class="body_bg">

