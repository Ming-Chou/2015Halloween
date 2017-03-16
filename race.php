<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset="utf-8">
		<title>
			給鬼給怪 創意LOGO比賽
		</title>
	</head>
	
	<body style="background-image:url('back.jpg'); background-size:cover;">
		<script language="javascript">

			function checkform() 
			{
				
				var ID = document.form1.ID.value;			

				var errmsg = ""

				var style = /\.(jpeg|jpg|gif|png)$/i;  //允許的檔案格式
				
				var agr=document.getElementById('agrees');

				if (document.form1.name.value == "")
				{ 
					alert("請輸入姓名"); 
				}
				else if (document.form1.sex.value == "")
				{ 
					alert("請輸入性別"); 
				}
				else if (document.form1.number.value == "")
				{ 
					alert("請輸入學號"); 
				}
				else if (document.form1.school.value == "")
				{ 
					alert("請輸入系級"); 
				}
				else if (document.form1.ID.value == "")
				{ 
					alert("請輸入身分證字號"); 
				}
				else if (document.form1.OrderDate.value == "")
				{ 
					alert("請輸入出生年月日"); 
				}
				else if (document.form1.phone.value == "")
				{ 
					alert("請輸入手機"); 
				}
				else if (document.form1.myEmail.value == "")
				{ 
					alert("請輸入電子郵件"); 
				}
				else if (document.form1.file.value == "")
				{ 
					alert("請選擇圖片"); 
				}
				else if (!style.test(document.form1.file.value))
				{ 
					alert("檔案格式不正確,請重新選擇\r\n jpeg,jpg,gif,png為允許格式");
				}
				else if (!agr.checked)
				{
					alert("您尚未同意個人聲明書及授權條款");
				}
				else
				{
					
						document.form1.submit();
					
				}

			}

		</script>
	
        <!-- S 彈出窗口 Dialog text -->
        <div style="display: none">
            <div id="dialog" style="height: 100px; line-height: 100px; text-align: center">
                您沒有勾選同意服務條款，請勾選同意服務條款後再嘗試送出資料
            </div>
        </div>
        <!-- E 彈出窗口 Dialog text -->
		<!-- &nbsp;&nbsp; -->
		<br/>
		<h1 align="center" valign="center"  style="color:#FFFFFF">給鬼給怪 創意LOGO比賽之我要投稿</h1><br/>
		<center> 
		<form action="pro_race.php" name="form1" method="post" enctype="multipart/form-data">
			<table  style="border:7px #000000 solid;padding:5px;" rules='all' cellpadding='5';>
				<tr>
				<td bgcolor='#000000'><center><p style="color:#FFFFFF">姓名 : </p></center></td>
				<td bgcolor='#000000'><p><input type="text" name="name" maxlength="8" placeholder = "請輸入姓名"  autofocus = "autofocus"  /></p></td>
				<td bgcolor='#000000'><center><p style="color:#FFFFFF">性別 : </p></center></td>
				<td bgcolor='#000000'><p><input type="text" name="sex" maxlength="1" placeholder = "請輸入性別" /></p></td>
				</tr>
				<tr>
				<td bgcolor='#000000'><center><p style="color:#FFFFFF">學號 : </p></center></td>
				<td bgcolor='#000000'><p><input type="text" name="number" maxlength="8" onkeyup="value=value.replace(/[^\d]/g,'') " placeholder = "請輸入學號" /></p></td>
				<td bgcolor='#000000'><center><p style="color:#FFFFFF">系級 : </p></center></td>
				<td bgcolor='#000000'><p><input type="text" name="school" maxlength="4" placeholder = "請輸入系級"/></p></td>
				</tr>
				<tr>
				<td bgcolor='#000000'><center><p style="color:#FFFFFF">身分證字號 : </p></center></td>
				<td bgcolor='#000000'><p><input type="text" name="ID"  placeholder = "請輸入身分證字號" /></p></td>
				<td bgcolor='#000000'><center><p style="color:#FFFFFF">出生年月日 : </p></center></td>
				<td bgcolor='#000000'><p><input type = "date" name = "OrderDate" /></p></td>
				</tr>
				<tr>
				<td bgcolor='#000000'><center><p style="color:#FFFFFF">手機 : </p></center></td>
				<td bgcolor='#000000'><p><input type="text" name="phone" maxlength="10" placeholder = "請輸入手機" /></p></td>
				<td bgcolor='#000000'>&nbsp;</td><td bgcolor='#000000'>&nbsp;</td>
				</tr>
				<tr>
				<td bgcolor='#000000'><center><p style="color:#FFFFFF">電子郵件 : </p></center></td>
				<td bgcolor='#000000'><p><input type = "email"  size="40" name = "myEmail"  placeholder = "請輸入電子郵件"/></p></td>
				<td bgcolor='#000000'>&nbsp;</td><td bgcolor='#000000'>&nbsp;</td>
			</table>
			
			<br><br>
			
			<table style="border:7px #000000 solid;padding:5px;" rules='all' cellpadding='5';>
				<tr>
				<td bgcolor='#000000'><br><center><p style="color:#FFFFFF">上傳作品&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></center><br></td>
				<td bgcolor='#000000'><p style="color:#FFFFFF">
					<input type="hidden" name="max_file_size" value="20480000">
					<input type="file" id="file" name="file" size="40">
					</p>
				</td>
				</tr>
			</table>
			
			<br><br>
			
			<table  style="border:3px #000000 solid;padding:5px;" rules="all" cellpadding='5'; >
				<tr>
					<td bgcolor='#000000'>
						<div style="width:18cm">
							<p align="center" valign="center" style="color:#FFFFFF">LOGO設計理念及涵義說明：（100 字以內）</p>
						</div>
					</td>
				</tr>
				<tr>
					<td bgcolor='#000000'>
						<div style="width:18cm;height:6cm;overflow-x:hidden;overflow-y:auto;background-color:white;">
							<textarea name="Content" style="width:18cm;height:6cm;font-size:20px;" onkeyup="this.value = this.value.slice(0, 100)"> </textarea>
						</div>
					</td>
				</tr>
			</table>
			
			<br><br><br/><hr color="#0066FF"; style="width:35.5cm"; size="0.5"><br/><br><br>
			
			<center> 
				<table  style="border:3px #000000 solid;padding:5px;" rules="all" cellpadding='5'; >
					<td>
						<div style="width:25cm;height:14cm;overflow-x:hidden;overflow-y:auto;background-color:white;">
							<h1 align="center" valign="center">個人資料蒐集聲明</h1>
								<blockquote><blockquote><blockquote><p>
									一、蒐集機關名稱：國立臺東大學學生會
								</p></blockquote></blockquote></blockquote>
								<blockquote><blockquote><blockquote><p>
									二、蒐集目的：提供競賽徵稿使用
								</p></blockquote></blockquote></blockquote>
								<blockquote><blockquote><blockquote><p>
									三、個人資料將會於取得資訊後二年內予以刪除銷毀。
								</p></blockquote></blockquote></blockquote>
							
								<blockquote><blockquote><blockquote><p>
									四、本校依循個人資料保護法及相關規範要求，提供當事人針對其個人資料行使以下權利：
								</p></blockquote></blockquote></blockquote>
								<blockquote><blockquote><blockquote><blockquote><p>
									(一)查詢或請求閱覽。<br />
									(二)請求製給複製本。<br />
									(三)請求補充或更正。<br />
									(四)請求停止蒐集、處理或利用及請求刪除；若執行上述權利時，將可能導致影響當事人相關權益。本單位未經您同意的情形下，不會將您的個人資料揭露於與本次活動無關之第三人或非上述目的以外之用途。 
								</p></blockquote></blockquote></blockquote>
								<blockquote><blockquote><blockquote><p>
									五、台端不提供個人資料所致權益之影響：台端得自由選擇是否提供相關個人資料，為台端若拒絕提供相關個人資料，本單位將無法提供台端國立臺東大學萬聖系列活動-LOGO徵選活動報名之申請。
								</p></blockquote></blockquote></blockquote>
								<h1 align="center" valign="center">授　權　條　款</h1>
								<blockquote><blockquote><p>
									一、茲同意遵守「國立臺東大學萬聖系列活動-LOGO徵選活動辦法」之各項規定。保證本人提供之作品確係本人設計創作及資料表內容正確無誤，作品如涉及侵犯他人著作權者，由參賽者自行負法律責任並追回獎金。如有違反或失誤，願負一切法律責任，並尊重評選結果，絕無異議。
								</p></blockquote></blockquote>
								<blockquote><blockquote><p>
									二、作品若獲錄取，同意該得獎作品其著作權歸主辦單位所有，並放棄行使著作人格權及著作財產權。主辦單位除保有該得獎作品之刪除、修飾、重組權外，並擁有使用該作品之影像及發表之權利，包括研究、攝影、複製、授權開發相關產品、出版、宣傳、推廣及刊登等權利，並有規劃置放地點之權。若得獎者不願配合或無法配合者，將追回獎項及溢領獎金，由下一名次得獎者遞補。
								</p></blockquote></blockquote>
								<blockquote><blockquote><p>
									三、若參賽作品違反約定涉訟者，參賽者同意以主辦單位所在之地方法院為第一審管轄法院。
								</p></blockquote></blockquote>
								<blockquote><blockquote><p>
									四、我已閱讀及同意上述內容並簽署本授權同意書。
								</p></blockquote></blockquote>
						</div>
					</td>
				</table>
				
				<br><br>
				
				<table>
				<tr>
				<td bgcolor='#000000'><p style="color:#FFFFFF"><br><input type="checkbox" id="agrees" value="1">我已仔細閱讀並同意個人資料蒐集聲明及授權條款<br>&nbsp;<p></td>
				</tr>
				</table>
				
				<br><br><br>
				
				<input type="button" value="確定" onClick="checkform()"/>
		    </center> 
			
		</form>
		</center> 
		
	</body>
</html>

