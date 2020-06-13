<?php 

namespace App;

class Action
{
	protected $actions = [];

	public function __construct($action,callable $actionFunction)
	{
		$this->actions[$action] = $actionFunction;		
	}
}

 ?>