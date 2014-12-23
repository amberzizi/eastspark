<?php
function fuck_url($target) {
    $arr_t = explode('/', $target);
    $fuck = '';
    foreach ($arr_t as $key => $value) {
        if ($value == '..') {
            $fuck = $key;
            break;
        }
    }

    if ($fuck != '') {
        unset($arr_t[$fuck]);
        unset($arr_t[$fuck - 1]);

        $target_again = implode('/', $arr_t);
        return fuck_url($target_again);
    } else {
        return $target;
    }
}

function get_file_count($dir_name) {
    $files = 0;
    if ($handle = opendir($dir_name)) {
        while (false !== ($file = readdir($handle))) {
            $files++;
        }
        closedir($handle);
    }
    return $files;
}

function delDirAndFile($dirName) {
    if ($handle = opendir($dirName)) {
        while (false !== ( $item = readdir($handle) )) {
            if ($item != "." && $item != "..") {
                unlink("$dirName/$item");
            }
        }
        closedir($handle);
    }
}

if (!empty($_FILES)) {
    $tempFile = $_FILES['Filedata']['tmp_name'];
    $targetPath = fuck_url($_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/');
    //$targetFile = str_replace('//', '/', $targetPath) . $_FILES['Filedata']['name'];
    //如果当天的文件夹没被创建，将会被创建
    if (!file_exists($targetPath)) {
        mkdir($targetPath);
    }

$e=pathinfo($_FILES['Filedata']['name']);
    $size = get_file_count(str_replace('//', '/', $targetPath))-1;
    $targetFile = str_replace('//', '/', $targetPath) .$size.'.'.$e['extension'];

    move_uploaded_file($tempFile, $targetFile);
    echo "********************";
}
?>