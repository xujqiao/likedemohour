<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<title>添加条款</title>
		<link href="/beginning/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
        <script type="text/javascript" src="/beginning/Public/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="/beginning/Public/bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
		<form class="form-horizontal" method="post" action="__URL__/addItem" style="margin-top: 30px;">
			<?php for ($i = 0; $i < intval($list); $i++) {?>
				<div class="control-group">
					<label class="control-label" for="inputMoney">条款<?php echo $i+1; ?>金额:</label>
					<div class="controls">
						<input type="text" id="inputMoney" name="money<?php echo $i; ?>" placeholder="金额">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputPeople">期待人数:</label>
					<div class="controls">
						<input type="text" id="inputPeople" name="num_people<?php echo $i; ?>" placeholder="数字">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputReturn">给予回报:</label>
					<div class="controls">
						<textarea rows="7" id="inputReturn" name="return<?php echo $i; ?>" placeholder="给予回报"></textarea>
					</div>
				</div>
			<?php } ?>
			<input type="hidden" value="<?php echo intval($list); ?>" name="number" />
				<div class="control-group">
					<div class="controls">
						<?php if ($list != null) {?>
							<button type="submit" class="btn btn-larg btn-primary">确认提交</button>
							<button type="reset" class="btn btn-larg btn-primary">重置</button>
						<?php }?>
					</div>
				</div>
		</form>
	</body>
</html>