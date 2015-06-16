<?php
if($_SERVER['REMOTE_ADDR']=='127.0.0.1' OR $_SERVER['REMOTE_ADDR'] == '::1'){
    require $_SERVER['DOCUMENT_ROOT'].'/sanosfood/aws/aws-autoloader.php';
}else{
    require $_SERVER['DOCUMENT_ROOT'].'/aws/aws-autoloader.php';
}

use Aws\Common\Aws;