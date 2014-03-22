<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0032)http://goldencis.cn/z/cis-login/ -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=GBK">
<meta charset="gb2312">
<title>登录</title>
<link rel="stylesheet" type="text/css" href="/beginning/App/Tpl/Item/index/login.css">
<script type="text/javascript" src="/beginning/App/Tpl/Item/index/jquery-1.8.3.min.js"></script><style type="text/css"></style>
<script type="text/javascript" src="/beginning/App/Tpl/Item/index/login.js"></script> 
</head>

<body style="">
<div> 
    <div class="t_logo"></div>
    <div class="login_box"> 
        <div class="login_row"> 
            <div> 
                <form name="flogin" id="flogin" method="post" action="__URL__/login">
                    <div class="f_row_name"> 
                        <input id="fname" name="mail" type="email" class="fm_user"> 
                    </div>
                    <div class="f_row_pwd"> 
                       <input id="fpwd" name="pass" type="password" class="fm_pwd"> 
                    </div>
                    <div class="f_row_sub"> 
                         <input id="sub" name="sub" type="submit" value="登录" class="fm_sub"> 
                    </div> 
                    <div id="logErr" class="f_row_err"></div>
                </form>
            </div>
        </div>
    </div>
</div>





<div id="transit-notify-list"><ul class="transit-list-inner"></ul></div><div class="vimiumReset vimiumHUD" style="right: 150px; opacity: 0; display: none;"></div></body></html>