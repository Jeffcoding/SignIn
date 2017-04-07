<?php
$phonenumber = isset($_POST["phonenumber"])?$_POST["phonenumber"]:"";
$code = isset($_POST["code"])?$_POST["code"]:"";
global $num;
if($code==$num)
{  
if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
	$uri = 'https://';
} else {
	$uri = 'http://';
}
$uri .= $_SERVER['HTTP_HOST'];
header('Location: '.$uri.'/SignIn/SignIn');
}
else
	echo '<script>alert("验证失败");</script>';
}
?>