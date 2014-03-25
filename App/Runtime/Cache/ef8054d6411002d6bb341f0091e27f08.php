<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<title><?php echo $list['proj_name']; ?></title>
		<link href="/beginning/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
        <script type="text/javascript" src="/beginning/Public/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="/beginning/Public/bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body style="margin-left: 10px; margin-top: 10px;">
		<img src="__ROOT__<?php echo $list['proj_pic']; ?>" class="img-rounded" />
		<h1><?php echo $list['proj_name']; ?></h1>
		<div class="well"><?php echo $list['proj_intro']; ?></div>
		<div class="well"><?php echo $list['proj_introduction']; ?></div>
		<div class="well">需求金额：<?php echo $list['money']; ?></div>
		<h2>条款</h2>
		<?php for ($i = 0; $i < intval($list['number']); $i++) {?>
			<div class="well">
				条款金额:<span><?php echo $list[$i]['item_money']; ?></span><br />
				预期人数:<span><?php echo $list[$i]['item_people_request']; ?></span><br />
				<span><?php echo $list[$i]['item_return']; ?></span>
			</div>
		<?php } ?>
		<form action="__URL__/admin">
			<input type="submit" value="返回" />
		</form>
	</body>
</html>