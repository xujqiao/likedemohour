<?php if (!defined('THINK_PATH')) exit();?><html>
	<body>
		<form method="post" action="__URL__/create" enctype="multipart/form-data">
			工程名字:<input type="text" name="name" /><br />
			工程简介:<textarea cols="30" rows="7" name="intro"></textarea><br />
			工程具体介绍:<textarea cols="45" rows="15" name="introduction"></textarea><br />
			需要的资金:<input type="text" name="money" /><br />
			工程图片：<input type="file" name="pic" /><br />
			<input type="submit" value="提交" /><input type="reset" value="重置" />
		</form>
	</body>
</html>