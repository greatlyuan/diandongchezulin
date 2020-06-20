<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="width: 100%; height: 100%; margin: 0; padding: 0; ">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="ico.ico" rel="shortcut icon" />
<title>用户首页</title>
</head>

<body style=" width: 100%; height: 100%; margin: 0; padding: 0;">
<table border="0" align="center" cellspacing="0" cellpadding="0" bgcolor="f6f6f6">
  <tr>
    <td colspan="3" padding="0"><img src="images/banner_dlcg.jpg" style="width: 100%; height: auto; overflow: hidden;" /></td>
  </tr>
  <tr bgcolor="#b2222b">
    <td style="width: 50%; border: 1px solid #FFF;" align="center"><a href="YHdlcg.php" style="padding: 6px 0; color: #fff; display: inline-block; width: 100%; height: 100%;"">在线租赁</a></td>
    <td style="
						 width: 50%; border: 1px solid #FFF;" align="center"><a href="ddgl.php" style="padding: 6px 0; color: #fff; display: inline-block; width: 100%; height: 100%;">订单管理</a></td>
  </tr>
  <tr>
  <tr>
    <td height="465" colspan="3" align="right" valign="top"><table style="width: 80%; margin-top: 30px;" border="1" align="center">
        <tr>
          <td colspan="5" align="center">在线选车</td>
        </tr>
        <tr>
          <td align="center">编号</td>
          <td align="center">车型</td>
          <td align="center">价格</td>
          <td width="90" align="center">电量</td>
          <td align="center">操作</td>
        </tr>
        <tr align="center">
          <td>1</td>
          <td><img src="images/001.jpg" alt="" width="66" height="66"></td>
          <td>￥：999.00 / 周</td>
          <td>80%</td>
          <td>
          	<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal" style="padding: 0.3rem;font-size: 12px;">租赁</button>
          </td>
          </tr>
        <tr align="center">
          <td>2</td>
          <td><img src="images/002.jpg" alt="" width="68" height="59"></td>
          <td>￥：888.00 / 周</td>
          <td>100%</td>
<td>
          	<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal" style="padding: 0.3rem;font-size: 12px;">租赁</button>
          </td>        </tr>
        <tr align="center">
          <td>3</td>
          <td><img src="images/003.jpg" alt="" width="67" height="67"></td>
          <td>￥：777.00 / 周</td>
          <td>80%</td>
<td>
          	<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal" style="padding: 0.3rem;font-size: 12px;">租赁</button>
          </td>        </tr>
        <tr align="center">
          <td>4</td>
          <td><img src="images/004.jpg" alt="" width="58" height="67"></td>
          <td>￥：888.00 / 周</td>
          <td>20%</td>
<td>
          	<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal" style="padding: 0.3rem;font-size: 12px;">租赁</button>
          </td>        </tr>
        <tr align="center">
          <td>5</td>
          <td><img src="images/005.jpg" alt="" width="73" height="51"></td>
          <td>￥：999.00 / 周</td>
          <td>90%</td>
          <td>
          	<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal" style="padding: 0.3rem;font-size: 12px;">租赁</button>
          </td>
        </tr>
      </table></td>
  </tr>
</table>
<p style="width: 80%; overflow: hidden; margin: 0 auto; text-align: right;">
    <a href="#">首页</a> / <a href="#">上页</a> / 
    <a href="#">下页</a> / <a href="#">尾页</a>
</p>
<p style="text-align: center; padding: 5px 0;">© 电动车租赁管理系统版权所有 All Rights Reserved.</p>


<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script> 
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> 

<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="margin: 10% auto; width:300px;">
    <div class="modal-content">
      <div class="modal-header">        
        <h4 class="modal-title" id="myModalLabel"> 租赁提示 </h4>
      </div>
      <div class="modal-body"> 恭喜你，租赁成功！ </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭 </button>
        <button type="button" class="btn btn-success" data-dismiss="modal"> 确定 </button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
