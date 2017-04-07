<html>
	<head>
		<meta charset="utf-8"/>
	</head>
	<body>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
	<input type="text" name="memberID" value="账号" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '账号';}">
	<input type="text" name="name" value="姓名" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '姓名';}">
	<input type="password" name="psd" value="Password"onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">	
	<input id="submit" type="submit" value="提交">
</form>
<?php
function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "signin";

	// 创建连接
	$conn = new mysqli($servername, $username, $password, $dbname);
	// 检测连接
	if ($conn->connect_error) {
		die("连接失败: " . $conn->connect_error);
	}
	$id=isset($_POST['memberID'])?$_POST['memberID']:"";
	$name=isset($_POST['name'])?$_POST['name']:"";
	$psd=isset($_POST['psd'])?$_POST['psd']:"";
	$sql = "INSERT INTO SicunUsers (phonenumber, name, password, identy)
	VALUES ('".$id."', '".$name."', '".$psd."', 'administrator')";

	if ($conn->query($sql) === TRUE) {
		echo "新记录插入成功";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	
	
	// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$sql = "SELECT phonenumber, name, identy FROM sicunusers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
		if($row['identy']=='administrator'){
        echo "<br> pn: ". $row["phonenumber"]. " - Name: ". $row["name"];
		}
    }
} else {
    echo "0 个结果";
}
$conn->close();
}
?> 