<html>
	<head>
		<meta http-equiv="Content-type" content="text/html ; charset=utf-8">
		<title>
			給鬼給怪 創意LOGO比賽
		</title>
		<script type="text/javascript">
			function check_data()
			{		
				var id = document.myForm.id.value;
				var tab = "ABCDEFGHJKLMNPQRSTUVXYWZIO";
				var A1 = new Array (1,1,1,1,1,1,1,1,1,1,2,2,2,2,2,2,2,2,2,2,3,3,3,3,3,3 );
				var A2 = new Array (0,1,2,3,4,5,6,7,8,9,0,1,2,3,4,5,6,7,8,9,0,1,2,3,4,5 );
				var Mx = new Array (9,8,7,6,5,4,3,2,1,1);
						
				//將身份證字號的英文字母轉換為大寫
				id = id.toUpperCase();				
				var i = tab.indexOf(id.charAt(0));
				
				
				if (id.length != 10) //驗證身份證字號是否為 10 碼
				{
				  alert("身份證字號共有 10 碼");
				  return false;
				}
				else if (i == -1)//驗證身份證字號的第一碼是否為英文字母
				{
				  alert("不合法的身份證字號");
				  return false;
				}
						
				var sum = A1[i] + A2[i] * 9;
				var v;
				for (i = 1; i < 10; i++) //驗證身份證字號進階規則
				{
				  v = parseInt(id.charAt(i));
				  if (isNaN(v))
				  {
					alert("不合法的身份證字號");							
					return false;		
				  }
							
				  sum = sum + v * Mx[i];
				}
					
				if (sum % 10 != 0)
				{
				  alert("不合法的身份證字號");
				  return false;
				}

				//此部份用來驗證瀏覽者是否有選擇參賽者
				for (var i = 0;i < document.myForm.elements.length; i++)
				{
				  var e = document.myForm.elements[i];
				  if (e.name == "name" && e.checked == true )
				  {
					var found = true;
					break;          
				  }
				}
						
				if (found != true)
				{
				  alert("您沒有選擇參賽者");
				  return false;				
				}
						
				myForm.submit();
			}
		</script>
	</head>
	<body style="background-image:url('back.jpg'); background-size:cover;">
		<br/><h1 align="center" valign="center" style="color:#FFFFFF">給鬼給怪 創意LOGO比賽之我要投票</h1><br/>
		<center> 
			<?php
				require_once("server.php");
				$cou = 0;
				$sql ="select * from 2015Halloween";
				$sql2 = mysql_query($sql);
			?>
			
			<form name="myForm" action="pro_vote.php" method="post">
			
			<?php
			echo "<table align='center' style='color:#FFFFFF'>";
			while($row = mysql_fetch_array($sql2))
			{
				if($cou == 0)
				{
					echo "<tr>";
				}
				
				echo "<td>";
				
				echo "<table  style='border:3px #FFFFFF solid;padding:5px;' rules='all' cellpadding='5'; >";
					echo "<tr>";
						echo "<td>";
							echo "<div style='width:5cm;height:5cm;'>";
								echo "<img src='".$row['Route']."'  width='190' height='190' >";
							echo "</div>";
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td bgcolor='#000000'>";
							echo "<div style='width:5cm;height:1cm;'>";
								echo "<p style='color:#FFFFFF'>作者&nbsp;:&nbsp;".$row['name']."</p>";
							echo "</div>";
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>";
							echo "<div style='width:5cm;height:3cm;'>";
								echo "<textarea name='Con1' readonly='readonly' style='width:5cm;height:3cm;font-size:20px;' onkeyup='this.value = this.value.slice(0, 100)'>".$row['Content']."</textarea>";
							echo "</div>";
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td bgcolor='#000000'>";
							echo "<div style='width:5cm;height:1cm;'>";
								echo "<p style='color:#FFFFFF'>現在票數&nbsp;:&nbsp;".$row['Votes']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
								echo "<input type='radio' name='name' value='".$row['number']."'>選他<br></p>";
							echo "</div>";
						echo "</td>";
					echo "</tr>";
				echo "</table>";
				//echo "</div>";
				
				echo "</td>";
				
				$cou++;
				if($cou == 4)
				{	
					echo "</tr>";
					$cou = 0;
				}
				
			}
			echo "</table>";
			?>
			
				<table>
					<tr>
						<td colspan="3" align="right" bgcolor="#000000"><p style='color:#FFFFFF'><br>&nbsp;&nbsp;請輸入您的身份證字號：<input type="text" name="id" size="10">&nbsp;&nbsp;<br>&nbsp;</p></td>
					</tr>
				</table>
				<table>
					<tr>
						<td colspan="3" align="center" bgcolor="#000000"><p style='color:#FFFFFF'><br>&nbsp;&nbsp;外籍生投票請寄Email到csieinnttu@gmail.com&nbsp;&nbsp;</p><p style='color:#FFFFFF'>標題 : 萬聖節投票</p><p style='color:#FFFFFF'>&nbsp;&nbsp;內容 : 學號 - 姓名 - 欲投票之作品的作者姓名&nbsp;&nbsp;<br>&nbsp;</p></td>
					</tr>
				</table>
				<p align="center"> 
					<input type="button" value="投票" onClick="check_data()">
					<input type="reset" value="重新設定">
				</p>
			</form>
		</center> 
	</body>
</html>

