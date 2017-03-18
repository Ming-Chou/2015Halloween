<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-type" content="text/html ; charset=utf-8">
		<title>投稿結果</title>
	</head>
	<body style="background-image:url('back.jpg'); background-size:cover;">
		<div align="center"  style="background-color:#ffffff;margin-top:50px;margin-right:150px;margin-left:150px;margin-bottom:50px;">
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
				echo "alert('投搞時間已經結束了哦！');";
				echo "history.back();";
				echo "</script>";
				exit();
			}
		?>
		<?php
		function check_nick($id) { 

     			$flag = false; 
   			$id = strtoupper($id); // 將英文字母全部轉成大寫 
   			$id_len = strlen($id); // 取得字元長度 

  
  			if($id_len <= 0) { 
  			        return false;   
       				exit; 
   			} 
     			if ($id_len > 10) { 
        			return false;   
        			exit; 
     			} 
     			if ($id_len < 10 && $id_len > 0) { 
     				return false;   
        			exit;   
     			} 
  
     			//檢 查 第一個字母是否為英文字 
     			$id_sub1 = substr($id,0,1); // 從第一個字元開始 取得字串 
     			$id_sub1 = ord($id_sub1); // 回傳字串的acsii 碼 
     			if ($id_sub1 > 90 || $id_sub1 < 65) { 
        			return false;   
        			exit; 
     			} 

     			//檢 查 身份證字號的 第二個字元 男生或女生 
     			$id_sub2 = substr($id,1,1); 
  
     			if($id_sub2 !="1" && $id_sub2 != "2") { 
        			return false;   
        			exit; 
     			} 

     			for ($i=1;$i<10;$i++) { 
        			$id_sub3 = substr($id,$i,1); 
        			$id_sub3 = ord($id_sub3); 
        			if ($id_sub3 > 57 || $id_sub3 < 48) { 
           				$n=$i+1; 
           				return false;   
           				exit; 
        			} 
     			} 
  
     			$num=array("A" => "10","B" => "11","C" => "12","D" => "13","E" => "14", 
     			"F" => "15","G" => "16","H" => "17","J" => "18","K" => "19","L" => "20", 
     			"M" => "21","N" => "22","P" => "23","Q" => "24","R" => "25","S" => "26", 
     			"T" => "27","U" => "28","V" => "29","X" => "30","Y" => "31","W" => "32", 
     			"Z" => "33","I" => "34","O" => "35"); 

     			$d1 = substr($id,0,1); // 從第一個字元開始 取得字串 
     			$n1=substr($num[$d1],0,1)+(substr($num[$d1],1,1)*9); 
     			$n2=0; //初使化 
     			for ($j=1;$j<9;$j++) { 
        			$d4=substr($id,$j,1); 
        			$n2=$n2+$d4*(9-$j); 
     			} 
     			$n3=$n1+$n2+substr($id,9,1); 
     			if(($n3 % 10)!= 0) { 
        			return false;   
        			exit;       
     			} 
     			return true;   

  		} 
		?>
		<?php
			require_once("server.php");
			$upload_dir="/var/www/html/2015Halloween/upload/";
			
			
				$name = $_POST['name'];
				$sex = $_POST['sex'];
				$number = $_POST['number'];
				$school = $_POST['school'];//
				$ID = $_POST['ID'];//
				$OrderDate = $_POST['OrderDate'];//
				$phone = $_POST['phone'];//
				$myEmail = $_POST['myEmail'];//
				
				$tmp = $_FILES["file"]["tmp_name"];
								
				$Content = $_POST['Content'];//
			
			$is_exists = false;
			
			//檢查是否有重複參賽
			$sql="select * from 2015Halloween";
			$sql2 = mysql_query($sql);
			$i=1;
			while($list=mysql_fetch_array($sql2)){
				if($list['ID']==$ID or $list['number']==$number){
					$is_exists = true;
					break;
				}
				$i++;
			}
				
			if(!check_nick($ID))
			{
				echo "<script type='text/javascript'>";
    				echo "alert('不合法的身份證字號！');";
				echo "history.back();";
				echo "</script>";
			}
			else if($number>10499999 || $number<9899999)
			{
				echo "<script type='text/javascript'>";
    				echo "alert('不合法的學號！');";
				echo "history.back();";
				echo "</script>";
			}
			else if($is_exists){
				echo "<br><br><br>上傳失敗：不能重複參加!<br><br><br>";
			}
			else if($_FILES['file']['size'] > 20480000){
				echo "<br><br><br>上傳失敗：圖片大小超過20MB<br><br><br>";
			}
			else{
				$Route = "./upload/".$number;
				$Zero = 0;

				if(move_uploaded_file($tmp,$upload_dir.($number)))
				{
				    echo "<script>alert('上傳成功');</script>;";
				    $sql = "insert into 2015Halloween(name,sex,number,school,ID,OrderDate,phone,myEmail,Content,Route) value('".$name."','".$sex."','".$number."','".$school."','".$ID."','".$OrderDate."','".$phone."','".$myEmail."','".$Content."','".$Route."')";
					mysql_query($sql);
					
					$url = "index.html";
					echo "<script type='text/javascript'>";
					echo "window.location.href='$url'";
					echo "</script>"; 
				} 
				else {
					echo "<br><br><br>上傳失敗，請回上一頁重新上傳<br><br><br>";
					echo $_FILES['file']['error'];
				}					
			}
		?>
		</div>
	</body>
</html>
