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
		<!-- <form class="form-horizontal" method="post" action="__URL__/create" enctype="multipart/form-data">
			<div>
				<span class="control-group" >
					<lable class="control-lable" for="inputName">工程名字</lable>
					<input type="text" name="name" id="inputName" />
				</span>
			</div>
			<br />
			<div>
				<span class="control-group" >
					<lable class="control-lable" for="inputIntro">工程简介</lable>
					<textarea cols="30" rows="7" name="intro" id="inputIntro" ></textarea>
				</span>
			</div>
			<br />
			<div>
				<span class="control-group" >
					<lable class="control-lable" for="inputIntroduction">工程具体简介</lable>
					<textarea cols="45" rows="15" name="introduction" id="inputIntroduction" ></textarea>
				</span>
			</div>
			<br />
			<div>
				<span class="control-group" >
					<lable class="control-lable" for="inputMoney">需要的资金</lable>
					<input type="text" name="money" id="inputMoney" />
				</span>
			</div>
			<br />
			<div>
				<span class="control-group" >
					<lable class="control-lable" for="inputPic">工程图片</lable>
					<input type="file" name="pic" id="inputPic" />
				</span>
			</div>
			<br />
			<div class="form-acitons">
				<button type="submit" class="btn btn-primary">提交</button>
				<button type="reset" class="btn">重置</button>
			</div>
		</form> -->
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