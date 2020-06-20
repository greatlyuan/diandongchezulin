<?php
    function login(){
        header("Content-Type: text/html; charset=utf8");

        //链接数据库
        include("conn.php");
        $db = ConnectMysqli::getIntance();

        //post获得用户名表单值
        $name = $_POST['username'];
        //post获得用户密码单值
        $pwd = $_POST['password'];

        $sql = "select * from user where username = '$name'";
        $list = $db->getRow($sql, 'array');
        if ($list <= 0) {
            $GLOBALS['error_msg'] = '用户不存在';
            return;
        }else{
            //检测数据库是否有对应的username和password的sql
            $sql = "select * from user where username = '$name' and password= '$pwd'";
            $list = $db->getRow($sql,'array');
            if ($list > 0) {
                //如果成功跳转至index.php页面
                $GLOBALS['success_msg'] = '登录成功';
                time_sleep_until(time() + 2);
                header("refresh:0;url=index.php");
                exit;
            } else {
                $GLOBALS['error_msg'] = '密码错误';
                return;
            }
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        login();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="ico.ico" rel="shortcut icon" />
    <title>登录</title>
    <!-- Custom styles for this template -->
    <link href="./css/login.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style type="text/css">
    .container {
        margin-top: 100px;
    }
</style>
<body style="width: 100%; height: 100%; margin: 0; padding: 0; background: url(images/5.jpg) no-repeat;">
<script src="./js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <?php if (isset($error_msg)): ?>
                <div class="alert alert-danger" style="border-top-left-radius: 50px;border-bottom-right-radius: 50px;padding-left: 50px" role="alert"><?php echo $error_msg; ?></div>
            <?php endif ?>
            <?php if (isset($success_msg)): ?>
                <div class="alert alert-success" style="border-top-left-radius: 50px;border-bottom-right-radius: 50px;padding-left: 50px" role="alert"><?php echo $success_msg; ?></div>
            <?php endif ?>
            <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" complete="on">
                <span class="heading">用户登录</span>
                <div class="form-group has-feedback">
                    <div class="input-group">
                        <input type="text" name="username" class="form-control" maxlength="20" id="inputUser" placeholder="用户名" autofocus value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>">
                        <i class="fa fa-user"></i>
                    </div>
                    <span style="color:red;display: none;margin-left: 8px" class="tips"></span>
                    <span style="display: none;right: 5px!important;top: 2px;" class=" glyphicon glyphicon-remove form-control-feedback"></span>
                    <span style="display: none;right: 5px!important;top: 2px;" class="glyphicon glyphicon-ok form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <div class="input-group">
                        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="密　码" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>">
                        <i class="fa fa-lock"></i>
                        <a href="#" class="fa fa-question-circle"></a>
                    </div>
                    <span style="color:red;display: none;margin-left: 8px" class="tips"></span>
                    <span style="display: none;right: 5px!important;top: 2px;" class="glyphicon glyphicon-remove form-control-feedback"></span>
                    <span style="display: none;right: 5px!important;top: 2px;" class="glyphicon glyphicon-ok form-control-feedback"></span>
                </div>
                <div class="form-group">
                    <a class="text" style="cursor: pointer" href="register.php">没有账号？去注册</a>
                    <button type="submit" class="btn btn-default" id="submit">登录</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var regUsername = /^[a-zA-Z_][a-zA-Z0-9_]{4,19}$/;
    var regPasswordSpecial = /[~!@#%&=;':",./<>_\}\]\-\$\(\)\*\+\.\[\?\\\^\{\|]/;
    var regPasswordAlpha = /[a-zA-Z]/;
    var regPasswordNum = /[0-9]/;
    var password;
    var check = [false, false];

    //校验成功函数
    function success(Obj, counter) {
        Obj.parent().parent().removeClass('has-error').addClass('has-success');
        $('.tips').eq(counter).hide();
        $('.glyphicon-ok').eq(counter).show();
        $('.glyphicon-remove').eq(counter).hide();
        check[counter] = true;

    }

    // 校验失败函数
    function fail(Obj, counter, msg) {
        Obj.parent().parent().removeClass('has-success').addClass('has-error');
        $('.glyphicon-remove').eq(counter).show();
        $('.glyphicon-ok').eq(counter).hide();
        $('.tips').eq(counter).text(msg).show();
        check[counter] = false;
    }

    // 匹配字母、数字、特殊字符至少两种的函数
    function atLeastTwo(password) {
        var a = regPasswordSpecial.test(password) ? 1 : 0;
        var b = regPasswordAlpha.test(password) ? 1 : 0;
        var c = regPasswordNum.test(password) ? 1 : 0;
        return a + b + c;
    }

    // 用户名匹配
    $('.container').find('input').eq(0).change(function() {
        if ($('#inputUser').val().length == 0) {
            fail($('#inputUser'), 0, '用户名不能为空');
        }else{
            if (regUsername.test($('#inputUser').val())) {
                success($('#inputUser'), 0);
            } else if ($('#inputUser').val().length < 5) {
                fail($('#inputUser'), 0, '用户名太短，不能少于5个字符');
            } else {
                fail($('#inputUser'), 0, '用户名只能为英文数字和下划线,且不能以数字开头')
            }
        }
    });

    //密码校验
    $('.container').find('input').eq(1).change(function() {
        if ($('#inputPassword').val().length == 0) {
            fail($('#inputPassword'), 1, '密码不能为空');
        }else{
            if ($('#inputPassword').val().length < 8) {
                fail($(this), 1, '密码太短，不能少于8个字符');
            } else {
                if (atLeastTwo($('#inputPassword').val()) < 2) {
                    fail($('#inputPassword'), 1, '密码中至少包含字母、数字、特殊字符的两种')
                } else {
                    success($('#inputPassword'), 1);
                }
            }
        }
    });

    //提交
    $('#submit').click(function(e) {
        //用户名
        if ($('#inputUser').val().length == 0) {
            fail($('#inputUser'), 0, '用户名不能为空');
        }else{
            if (regUsername.test($('#inputUser').val())) {
                success($('#inputUser'), 0);
            } else if ($('#inputUser').val().length < 5) {
                fail($('#inputUser'), 0, '用户名太短，不能少于5个字符');
            } else {
                fail($('#inputUser'), 0, '用户名只能为英文数字和下划线,且不能以数字开头')
            }
        }

        //密码
        if ($('#inputPassword').val().length == 0) {
            fail($('#inputPassword'), 1, '密码不能为空');
        }else{
            if ($('#inputPassword').val().length < 8) {
                fail($(this), 1, '密码太短，不能少于8个字符');
            } else {
                if (atLeastTwo($('#inputPassword').val()) < 2) {
                    fail($('#inputPassword'), 1, '密码中至少包含字母、数字、特殊字符的两种')
                } else {
                    success($('#inputPassword'), 1);
                }
            }
        }

        if (!check.every(function(value) {
            return value == true
        })) {
            e.preventDefault();
            for (key in check) {
                if (!check[key]) {
                    $('.container').find('input').eq(key).parent().parent().removeClass('has-success').addClass('has-error')
                }
            }
        }
    });
</script>
</body>
</html>