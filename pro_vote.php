<html>
	<head>
		<meta http-equiv="Content-type" content="text/html ; charset=utf-8">
		<title>
			給鬼給怪 創意LOGO比賽
		</title>
	</head>
	<body style="background-image:url('back.jpg'); background-size:cover;">
	<?php
			date_default_timezone_set("Asia/Taipei");
			$Y = date("Y");
			$m = date("m");
			$d = date("d");
			$start_time = mktime(0,0,0,10,8,2015);
			$end_time = mktime(0,0,0,12,11,2015);
			$now_time = mktime(0,0,0,date("m"),date("d"),date("Y"));
			if($now_time<$start_time)
			{
				echo "<script type='text/javascript'>";
				echo "alert('投票時間還沒開始哦！');";
				echo "history.back();";
				echo "</script>";
				exit();					
			}
			if($now_time>$end_time)
			{
				echo "<script type='text/javascript'>";
				echo "alert('投票時間已經結束了哦！');";
				echo "history.back();";
				echo "</script>";
				exit();
			}
		?>
<?php
//if(true)
//{
  require_once("server.php");
  $sql="select * from 2015Halloween";
  $result = mysql_query($sql) ;
  
  header("Content-type: text/html; charset=utf-8");
  
  //取得表單資料
  $id = strtoupper($_POST["id"]);
  $v = $_POST["name"];
  
  //取得IP位址
  $ip=$_SERVER['REMOTE_ADDR'];
  
  //建立cookie
  setcookie("vote", "true", time()+3600);

  //建立資料連接
  //$link = create_connection();
			
  //取得符合IP欄位的資料
  $sql_ip = "SELECT * FROM ipp Where ip = '$ip'";
  $result_ip = mysql_query($sql_ip);
  
  //取得符合ID欄位的資料
  $sql_id = "SELECT * FROM ipp Where id = '$id'";
  $result_id = mysql_query($sql_id);

  //如果身份證字號、IP位址或cookie已存在
  if (mysql_num_rows($result_ip)!=0 || mysql_num_rows($result_id)!= 0 || htmlspecialchars($_COOKIE["vote"]==true))
  {
    //釋放 $result 佔用的記憶體
    mysql_free_result($result_ip);
	mysql_free_result($result_id);
		
    //顯示已投票訊息
    echo "<script type='text/javascript'>";
    echo "alert('您已經投過票囉！');";
	echo "history.back();";
	echo "history.back();";
	echo "</script>";
    exit();
  }
	
  //如果都不存在
  else
  {
    //釋放 $result 佔用的記憶體	
    mysql_free_result($result_ip);
	mysql_free_result($result_id);
	
    // 執行 INSERT INTO 陳述式，將此瀏覽者的身份證字號與IP位址加
    // 入 id_number 資料表，表示此身份證字號與IP位址已投票
    $sql = "INSERT INTO ipp (id, ip) VALUES ('$id', '$ip')";
    $result = mysql_query($sql);
				
    //使用 UPDATE 陳述式將票數 + 1
    $sql = "UPDATE `2015Halloween` SET `Votes` = `Votes` + 1 WHERE `number` = ".$v;
    $result = mysql_query($sql);
	
	//顯示已投票訊息
    echo "<script type='text/javascript'>";
    echo "alert('您已經完成投票囉！');";
	echo "history.back();";
	echo "history.back();";
	echo "</script>";
	exit();
	
  }
/*
else
{
  //顯示截止投票訊息
  echo "<script type='text/javascript'>";
  echo "alert('已截止投票囉！');";
  echo "window.open('home.php','_self')";
  echo "</script>";
  exit();
}	*/
  //關閉資料連接	
  //mysql_close($link);

?>
	</body>
</html>
