<?php
$id=$_POST['memberID'];
$psd=$_POST['psd'];
//jianyan
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signin";
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$sql = "SELECT * FROM sicunusers WHERE phonenumber=".(string)$id;
$result=$conn->query($sql);//执行sql查询
$num=$result->num_rows; //获取记录数
if($num){ // 用户存在；
	$row=$result->fetch_assoc();
	if($psd===$row['password']){ //对密码进行判断。
		$_SESSION['view']=$id;
		if($row['identy']=='administrator'){
			$_SESSION['identy']='administrator';
		}else{
			$_SESSION['identy']='member';
		}
		$_SESSION['view']=$id;
		echo "登陆成功，正在为你跳转至后台页面";
		if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
		} else {
			$uri = 'http://';
		}
		$uri .= $_SERVER['HTTP_HOST'];
		header('Location: '.$uri.'/SignIn/SignIn/member');
		exit;
	}else{
		echo "密码不正确";
		echo "<a href='/'>返回登陆页面</a>";
	}
}else{
	echo "用户不存在";
	echo "<a href='/'>返回登陆页面</a>";
}
$conn->close();
?>