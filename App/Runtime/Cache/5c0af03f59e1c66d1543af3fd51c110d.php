<?php if (!defined('THINK_PATH')) exit();?><html>
	<body>
		<form method="post" action="__URL__/addItem">
			<?php for ($i = 0; $i < intval($list); $i++) {?>
				条款<?php echo $i+1; ?>:<br />
				条款金额:<input type="text" name="money<?php echo $i; ?>" /><br />
				期待人数:<input type="text" name="num_people<?php echo $i; ?>" /><br />
				给予回报:<textarea cols="30" rows="7" name="return<?php echo $i; ?>"></textarea><br />
				<br />
			<?php  }?>
			<input type="hidden" value="<?php echo intval($list); ?>" name="number" />
			<?php if ($list != null) {?>
				<input type="submit" value="提交" /><input type="reset" value="重置" />
			<?php  }?>
		</form>
	</body>
</html>