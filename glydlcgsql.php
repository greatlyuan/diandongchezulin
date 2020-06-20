

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="width: 100%; height: 100%; margin: 0; padding: 0; ">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="ico.ico" rel="shortcut icon" />
		<title>管理员首页</title>
	</head>

	<body style=" width: 100%; height: 100%; margin: 0; padding: 0;">
		<form id="form1" name="form1" method="post" action="">
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="f6f6f6">
				<tr>
					<td style="width: 100%;" colspan="3" padding="0">
						<img src="images/banner_dlcg.jpg" width="428%" height="136" style="width: 100%; height: auto; overflow: hidden;" />
					</td>
				</tr>
				<tr bgcolor="#b2222b">
					<td align="center" style="width: 20%; border: 1px solid #FFF;">
						<a href="glydlcg.php" style="padding: 6px 0; color: #fff; display: inline-block; width: 20%; height: 100%;float: left;">用户管理</a>					
						<a href="clgl.php" style="padding: 6px 0; color: #fff; display: inline-block; width: 20%; height: 100%;float: left;">车辆管理</a>
						<a href="lxgl.php" style="padding: 6px 0; color: #fff; display: inline-block; width: 20%; height: 100%;float: left;">车辆类型</a>
						<a href="tsjy.php" style="padding: 6px 0; color: #fff; display: inline-block; width: 20%; height: 100%;float: left;">投诉建议</a>
						<a href="glyddgl.php" style="padding: 6px 0; color: #fff; display: inline-block; width: 20%; height: 100%;float: left;">订单管理</a>
					</td>
				</tr>
				<tr>
					<td height="465" colspan="3" align="right" valign="top">
						
                        <table height="431" border="1" align="center" style="width: 100%; margin-top: 30px;">                        	
                        
							<tr>
								<td height="50" colspan="5" align="center">
                                    <label for="textfield">查找用户</label>
                                    <input type="text" name="textfield" id="textfield" placeholder="请输入用户ID"/>
                                    <input type="submit" name="search" id="button" value="查询" />&nbsp;&nbsp;
                                    <span width="60" align="center"> <a href="xzyh.php">新增用户</a></span>
                                </td>
							</tr>
                            
                            <th>用户ID</th>
                        	<th>用户名</th>
                        	<th>注册时间</th>
                        	<th>地区</th>
                        	<th>操作</th>
                            
                            <?php 
							
								$conn=mysqli_connect('localhost','root','123456','diandongchezulin');
																
								$sql = "select * from guanliyuan_yhgl";
								
								$result = mysqli_query($conn,$sql);
								
								while($re = mysqli_fetch_object($result)){
									
									$id = $re-> id;
									
									$name = $re-> name;
									
									$time = $re-> time;
									
									$area = $re-> area;
									
									$oper = $re-> oper;
								?>
									<tr align="center">
                                    
                                    	<td><?php echo $id ?></td>
                                    	<td><?php echo $name ?></td>
                                    	<td><?php echo $time ?></td>
                                    	<td><?php echo $area ?></td>
                                    	<td><?php echo $oper ?></td>
                                    </tr>
                                    
                                    <?php 
										}

											mysqli_close($conn);
                        			?>
                        						
                            
						</table>
				  </td>
				</tr>
			</table>
			<p style="width: 80%; overflow: hidden; margin: 0 auto; text-align: right;">
				<a href="#">首页</a> / <a href="#">上页</a> / <a href="#">下页</a> / <a href="#">尾页</a>
			</p>
			<p style="text-align: center; padding: 5px 0;">© 电动车租赁管理系统版权所有 All Rights Reserved.</p>
			</table>
		</form>
	</body>
</html>
