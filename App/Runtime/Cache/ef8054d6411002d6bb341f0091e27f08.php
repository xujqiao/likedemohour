<?php if (!defined('THINK_PATH')) exit();?><html>
	<body>
		<img src="__ROOT__<?php echo $list['proj_pic']; ?>">
		<h1><?php echo $list['proj_name']; ?></h1>
		<p><?php echo $list['proj_intro']; ?></p>
		<p><?php echo $list['proj_introduction']; ?></p>
		<p>需求金额：<?php echo $list['money']; ?></p>
		<h2>条款</h2>
		<?php for ($i = 0; $i < intval($list['number']); $i++) {?>
			<span><?php echo $list[$i]['item_money']; ?></span>
			<span><?php echo $list[$i]['item_people_request']; ?></span>
			<p><?php echo $list[$i]['item_return']; ?></p>
		<?php } ?>
		<form action="__URL__/admin">
			<input type="submit" value="返回" />
		</form>
	</body>
</html>