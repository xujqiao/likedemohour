<?php
class ItemModel extends Model
{
	protected $_map = array(
		'mail' => 'email',
		'pass' => 'password',
	);

	protected $dbName = 'member';
}
?>