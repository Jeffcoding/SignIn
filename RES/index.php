<?php
$temp=(int)date("Ymdhis");
function R()
{
	$b=23333;
	$c=127;
	global $temp;
	$an=($temp*$b+$c)%65535;
	$temp=$an;
	return $an;
}
$num="";
function viewcode()
{
	global $num;
	for( $i=0 ; $i<6 ; $i++)
	{
		$num .= (string)(R()%9);
	}
}
viewcode();

function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>验证码</title>
	<meta charset="utf-8"/>
	<script type="application/x-javascript">
	window.onload=function(){
		var send=document.getElementById('send');
		times=60;
		timer=null;
		send.onclick=function(){
		var a="验证码为："+"<?php echo $num;?>";
		alert(a);
		// 计时开始
		var that = this;
		this.disabled=true;
		timer = setInterval(function(){
			times --;
			that.value = times + "秒后重试";
			if(times <= 0){
			that.disabled =false;
			that.value = "发送验证码";
			clearInterval(timer);
			times = 60;
			}
		},1000);  
		}  
	} 
	var submit=document.getElementById("submit");
	if(submit.value=="")
		this.disabled=false;
	else
		this.disabled=true;
	</script>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> 
<table align="center">
<tr>
<td>+86
<input type="text" id="phonenumber" name="phonenumber" value="手机号码" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '手机号码';}" >
</td>
<td>
<input type="button" id="send" name="send" value="发送验证码">
</td>
</tr>
<tr>
<td>
<input type="text" name="code"/>
</td>
<td>
<input type="submit" id="submit" value="确认">
</tr>
</table>
</form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   $phonenumber = isset($_POST["phonenumber"])?test_input($_POST["phonenumber"]):"";
   $code = isset($_POST["code"])?test_input($_POST["code"]):"";
   global $num;
   print_r($num);
   if($code==$num)
	   echo '<script>alert("验证成功");</script>';
   else
	   echo '<script>alert("验证失败");</script>';
}
?>