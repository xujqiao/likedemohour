<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<title>预设置</title>
		<link href="/beginning/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
        <script type="text/javascript" src="/beginning/Public/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="/beginning/Public/bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
		<form method="post" action="__URL__/addItems" style="margin-left: 10px;">
			<fieldset>
				<legend>条款个数</legend>
				<label>请输入要添加的个数：</label>
				<input style="height: 30px;" type="text" placeholder="如：1 或 2..." name="num_project" /><br />
				<button type="submit" class="btn btn-larg btn-primary">确认</button>
			</fieldset>
		</form>
	</body>
</html>