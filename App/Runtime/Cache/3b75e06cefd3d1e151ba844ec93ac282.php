<?php if (!defined('THINK_PATH')) exit();?><html>
	<body>
		<table border="0">
			<?php for ($i = 0; $i < count($list); $i++) {?>
			<tr>
				<td><?php echo $list[$i]['proj_name']; ?></td>
				<td>
					<form method="post" action="__URL__/detail">
						<input type="hidden" value="<?php echo $list[$i]['proj_id']; ?>" name="num" />
						<input type="submit" value="详细内容" />
					</form>
				</td>
				<td>
					<form method="post" action="__URL__/pass">
						<input type="hidden" value="<?php echo $list[$i]['proj_id']; ?>" name="item" />
						<input type="hidden" value="<?php echo count($list); ?>" name="amount" /> 
						<input type="submit" value="通过" />
					</form>
				</td>
				<td>
					<form method="post" action="__URL__/fire">
						<input type="hidden" value="<?php echo $list[$i]['proj_id']; ?>" name="number" />
						<input type="hidden" value="<?php echo count($list); ?>" name="amount" /> 
						<input type="submit" value="拒绝" />
					</form>
				</td>
			</tr>
			<?php } ?>
		</table>
	</body>
</html>