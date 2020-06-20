<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>bootstrap用户注册界面表单验证-jq22.com</title>
    <script src="https://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <style>
        /* track base Css */
        .container {
            margin-top:15px;
        }
        .red {
            color:red;
        }
        #ehong-code-input {
            width:42px;
            letter-spacing:2px;
            margin:0px 8px 0px 0px;
        }
        .ehong-idcode-val {
            position:relative;
            padding:1px 4px 1px 4px;
            top:0px;
            *top:-3px;
            letter-spacing:4px;
            display:inline;
            cursor:pointer;
            font-size:16px;
            font-family:"Courier New",Courier,monospace;
            text-decoration:none;
            font-weight:bold;
        }
        .ehong-idcode-val0 {
            border:solid 1px #A4CDED;
            background-color:#ECFAFB;
        }
        .ehong-idcode-val1 {
            border:solid 1px #A4CDED;
            background-color:#FCEFCF;
        }
        .ehong-idcode-val2 {
            border:solid 1px #6C9;
            background-color:#D0F0DF;
        }
        .ehong-idcode-val3 {
            border:solid 1px #6C9;
            background-color:#DCDDD8;
        }
        .ehong-idcode-val4 {
            border:solid 1px #6C9;
            background-color:#F1DEFF;
        }
        .ehong-idcode-val5 {
            border:solid 1px #6C9;
            background-color:#ACE1F1;
        }
        .ehong-code-val-tip {
            font-size:12px;
            color:#1098EC;
            top:0px;
            *top:-3px;
            position:relative;
            margin:0px 0px 0px 4px;
            cursor:pointer;
        }
    </style>
</head>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="container">
    <div class="col-md-6 col-md-offset-3">
        <form action="http://wwww.baidu.com" class="">

            <div class="form-group has-feedback">
                <div class="input-group">
                    <input id="username" class="form-control" placeholder="请输入用户名" maxlength="20" type="text">
                </div>
                <span style="color:red;display: none;" class="tips"></span>
                <span style="display: none;" class=" glyphicon glyphicon-remove form-control-feedback"></span>
                <span style="display: none;" class="glyphicon glyphicon-ok form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <div class="input-group">
                    <input id="password" class="form-control" placeholder="请输入密码" maxlength="20" type="password">
                </div>
                <span style="color:red;display: none;" class="tips"></span>
                <span style="display: none;" class="glyphicon glyphicon-remove form-control-feedback"></span>
                <span style="display: none;" class="glyphicon glyphicon-ok form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <div class="input-group">
                    <input id="passwordConfirm" class="form-control" placeholder="请再次输入密码" maxlength="20" type="password">
                </div>
                <span style="color:red;display: none;" class="tips"></span>
                <span style="display: none;" class="glyphicon glyphicon-remove form-control-feedback"></span>
                <span style="display: none;" class="glyphicon glyphicon-ok form-control-feedback"></span>
            </div>

            <div class="form-group">
                <input class="form-control btn btn-primary" id="submit" value="立&nbsp;&nbsp;即&nbsp;&nbsp;注&nbsp;&nbsp;册" type="submit">
            </div>

            <div class="form-group">
                <input value="重置" id="reset" class="form-control btn btn-danger" type="reset">
            </div>
        </form>
    </div>
</div>

<script>
    var regUsername = /^[a-zA-Z_][a-zA-Z0-9_]{4,19}$/;
    var regPasswordSpecial = /[~!@#%&=;':",./<>_\}\]\-\$\(\)\*\+\.\[\?\\\^\{\|]/;
    var regPasswordAlpha = /[a-zA-Z]/;
    var regPasswordNum = /[0-9]/;
    var password;
    var check = [false, false, false];

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

    // 用户名匹配
    $('.container').find('input').eq(0).change(function() {
        if (regUsername.test($(this).val())) {
            success($(this), 0);
        } else if ($(this).val().length < 5) {
            fail($(this), 0, '用户名太短，不能少于5个字符');
        } else {
            fail($(this), 0, '用户名只能为英文数字和下划线,且不能以数字开头')
        }

    });



    // 密码匹配

    // 匹配字母、数字、特殊字符至少两种的函数
    function atLeastTwo(password) {
        var a = regPasswordSpecial.test(password) ? 1 : 0;
        var b = regPasswordAlpha.test(password) ? 1 : 0;
        var c = regPasswordNum.test(password) ? 1 : 0;
        return a + b + c;

    }

    $('.container').find('input').eq(1).change(function() {
        password = $(this).val();
        if ($(this).val().length < 8) {
            fail($(this), 1, '密码太短，不能少于8个字符');
        } else {
            if (atLeastTwo($(this).val()) < 2) {
                fail($(this), 1, '密码中至少包含字母、数字、特殊字符的两种')
            } else {
                success($(this), 1);
            }
        }
    });

    // 再次输入密码校验
    $('.container').find('input').eq(2).change(function() {

        if ($(this).val() == password) {
            success($(this), 2);
        } else {

            fail($(this), 2, '两次输入的密码不一致');
        }

    });

    //提交
    $('#submit').click(function(e) {
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

    //重置
    $('#reset').click(function() {
        $('input').slice(0, 6).parent().parent().removeClass('has-error has-success');
        $('.tips').hide();
        $('.glyphicon-ok').hide();
        $('.glyphicon-remove').hide();
        check = [false, false, false];
    });
</script>

</body>
</html>
