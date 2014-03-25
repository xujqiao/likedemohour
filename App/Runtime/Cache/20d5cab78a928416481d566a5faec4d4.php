<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<title>添加工程</title>
		<meta name="viewport" content="width=device-witdh, initial-scale=1.0" />
		<link href="/beginning/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
		
		<script type="text/javascript" src="/beginning/Public/jquery.js"></script>
		<script type="text/javascript" src="/beginning/Public/bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
		<br />
		<form class="form-horizontal" method="post" action="__URL__/create" enctype="multipart/form-data">
			<div class="control-group">
				<label class="control-label" for="inputName">工程名字</label>
				<div class="controls">
					<input type="text" id="inputName" placeholder="工程名字" name="name"></div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputIntro">工程简介</label>
				<div class="controls">
					<textarea id="inputIntro" placeholder="工程简介" rows="5" name="intro"></textarea></div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputIntroduction">工程具体简介</label>
				<div class="controls">
					<textarea id="inputIntroduction" placeholder="工程具体简介" rows="10" name="introduction"></textarea></div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputMoney">工程金额</label>
				<div class="controls">
					<input type="text" id="inputMoney" placeholder="工程金额" name="money"></div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputPic">工程图片</label>
				<div class="controls">
					<input type="file" id="inputPic" name="pic"></div>
			</div>
			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn btn-primary">提交</button>
					<button type="reset" class="btn">重置</button>
				</div>
			</div>
		</form>


	</body>
</html>