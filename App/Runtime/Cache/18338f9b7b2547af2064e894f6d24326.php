<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title>登陆</title>
        <link href="/beginning/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
        <script type="text/javascript" src="/beginning/Public/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="/beginning/Public/bootstrap/js/bootstrap.min.js"></script>
        <style type="text/css">
            #login{
                width: 500px;
                height: 150px;
                margin: 220px auto auto 50px;
                padding: 5px;
            }
            label{
                font-size: 30px;
            }
        </style>
    </head>
    <body>
        <div id="login">
            <form class="form-horizontal" method="post" action="__URL__/login">
                <div class="control-group">
                    <label class="control-label" for="inputEmail">邮箱</label>
                    <div class="controls">
                        <input type="email" id="inputEmail" name="mail" placeholder="Email">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputPassword">密码</label>
                    <div class="controls">
                        <input type="password" id="inputPassword" name="pass" placeholder="Password">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-large btn-primary">Sign in</button>
                        <button type="reset" class="btn btn-large btn-primary">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>