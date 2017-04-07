<?php
$servername = "localhost";
$username = "root";
$password = "";

// 创建连接
$conn = new mysqli($servername, $username, $password);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 创建数据库
$sql = "CREATE DATABASE signin character set utf8;";
if ($conn->query($sql) === TRUE) {
    echo "数据库创建成功";
	echo "<br>";
} else {
    echo "Error creating database: " . $conn->error;
	echo "<br>";
}

$conn->close();
$dbname = "signin";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// 使用 sql 创建数据表
$sql = "CREATE TABLE SicunUsers (
sid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
phonenumber BIGINT(11) NOT NULL,
name VARCHAR(30) NOT NULL,
password VARCHAR(16) NOT NULL,
identy VARCHAR(13) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "数据表 SicunUsers 创建成功";
	echo "<br>";
} else {
    echo "创建数据表错误: " . mysqli_error($conn);
	echo "<br>";
}

$sql = "CREATE TABLE Meetings (
mid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
meetname VARCHAR(30) NOT NULL,
meetadd VARCHAR(100) NOT NULL,
meettime VARCHAR(13) NOT NULL,
state INT(1) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "数据表 Meetings 创建成功";
	echo "<br>";
} else {
    echo "创建数据表错误: " . mysqli_error($conn);
	echo "<br>";
}

$sql = "CREATE TABLE leavings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
meetname VARCHAR(30) NOT NULL,
username VARCHAR(30) NOT NULL,
reason VARCHAR(100),
state INT(1) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "数据表 leavings 创建成功";
	echo "<br>";
} else {
    echo "创建数据表错误: " . mysqli_error($conn);
	echo "<br>";
}

$sql = "CREATE TABLE MtoS (
username VARCHAR(30) NOT NULL,
meetname VARCHAR(100) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "数据表 MtoS 创建成功";
	echo "<br>";
} else {
    echo "创建数据表错误: " . mysqli_error($conn);
	echo "<br>";
}
$conn->close();
?> 