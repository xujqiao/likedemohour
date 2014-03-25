<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {

    public function getNumOfProjects(){
    	$id = $_GET['id'];
    	$id = intval($id) * 10;
    	$item = new Model('item');
    	$project = new Model('project');
    	$result = $project->where("`status` = '1'")->limit($id, 10)->order('proj_time desc')->select();
    	if ($result != false){
    		$num = count($result);
    		for ($i = 0; $i < $num; $i++)
    		{
    			$str = "`proj_id` = '".$result[$i]['proj_id']."'";
    			$list = $item->where($str)->select();
    			$people_now = 0;
    			$money_now = 0;
    			for ($j = 0; $j < count($list); $j++)
    			{
    				$people_now += $list[$j]['item_people_now'];
    				$money_now += $list[$j]['item_money'] * $list[$j]['item_people_now'];
    			}
    			$t = array('people_now' => $people_now, 'money_now' => $money_now, 'item_number' => count($list));
    			$result[$i] = array_merge($result[$i], $list, $t);
    		}
    		echo json_encode($result);
    	}
    	else{
    		$response['status'] = 0;
    		$response['response'] = "something wrong";
    		echo json_encode($response);
    	}
    }
	
	public function register(){
		$username = $_GET['username'];
		$password = $_GET['password'];
		$email = $_GET['email'];

		$str = $this->checkUsername($username);
		if ($str == "nothing"){
			$str = $this->checkEmail($email);
			if ($str == "nothing"){
				$member = new Model('member');
				$data['username'] = $username;
				$data['password'] = $password;
				$data['email'] = $email;
				$data['mem_time'] = date('Y-m-d H:i:s');
				if (($member->add($data)) != false){
					$response['status'] = 1;
					$response['response'] = "OK";
				}
				else{
					$response['status'] = 0;
					$response['response'] = "add operation something wrong";
				}
			}
			else{
				$response['status'] = 0;
				$response['response'] = $str;
			}
		}
		else{
			$response['status'] = 0;
			$response['response'] = $str;
		}
		
		echo json_encode($response);
	}
	
	private function checkOut($key, $value){
		$member = new Model('member');
		$result = $member->where("`%s` = '%s'", $key, $value)->select();
		if (is_null($result)){
			return false;
		}
		else{
			return true;
		}
	}

	private function checkUsername($username){
		if ($this->checkOut("username", $username)){
			return "This name has been registered";
		}
		else{
			return "nothing";
		}
	}

	private function checkEmail($email){
		if ($this->checkOut("email", $email)){
			return "This mail has been registered";
		}
		else{
			return "nothing";
		}
	}

	public function login(){
		$email = $_GET['email'];
		$password = $_GET['password'];
		$str = $this->checkEmail($email);
		if ($str == "nothing"){
			$response['status'] = 0;
			$response['response'] = "This mail has not been registered";
		}
		else{
			$str = $this->checkPassword($email, $password);
			if ($str == "yes"){
				$member = new Model('member');
				$str = "`email` = '".$email."'";
				$username = $member->where($str)->getField('username');
				$response['status'] = 1;
				$response['response'] = $username;
			}
			else{
				$response['status'] = 0;
				$response['response'] = "wrong password";
			}
		}
		echo json_encode($response);
	}

	private function checkPassword($email, $password){
		$member = new Model('member');
		$result = $member->where("`email` = '%s' and `password` = '%s'", $email, $password)->select();
		if (is_null($result)){
			return "no";
		}
		else{
			return "yes";
		}
	}

	public function getFollowingbyUsername(){
		$username = $_GET['username'];
		$following = new Model('following');
		$list = $following->where("`username` = '%s'", $username)->getField('proj_id', true);
		$str = "";
		foreach ($list as $key => $value) {
			$str = $str."`proj_id` = '".$value."'";
			if ($key != count($list)-1){
				$str = $str." or ";
			}
		}
		$project = new Model('project');
		$item = new Model('item');
		$str = $str."and `status` = '1'";
		$result = $project->where($str)->select();
		if ($result != false){
			$num = count($result);
    		for ($i = 0; $i < $num; $i++)
    		{
    			$str = "`proj_id` = '".$result[$i]['proj_id']."'";
    			$list = $item->where($str)->select();
    			$people_now = 0;
    			$money_now = 0;
    			for ($j = 0; $j < count($list); $j++)
    			{
    				$people_now += $list[$j]['item_people_now'];
    				$money_now += $list[$j]['item_money'] * $list[$j]['item_people_now'];
    			}
    			$t = array('people_now' => $people_now, 'money_now' => $money_now, 'item_number' => count($list));
    			$result[$i] = array_merge($result[$i], $list, $t);
    		}
			echo json_encode($result);
		}
		else{
			$response['status'] = 0;
			$response['response'] = "something wrong";
			echo json_encode($response);
		}
	}

	public function getInvestmentbyUsername(){
		$username = $_GET['username'];
		$investment = new Model('investment');
		$list = $investment->where("`username` = '%s'", $username)->getField('proj_id', true);
		$str = "";
		foreach ($list as $key => $value) {
			$str = $str."`proj_id` = '".$value."'";
			if ($key != count($list)-1){
				$str = $str." or ";
			}
		}
		$item = new Model('item');
		$project = new Model('project');
		$str = $str."and `status` = '1'";
		$result = $project->where($str)->select();
		if ($result != false){
			$num = count($result);
    		for ($i = 0; $i < $num; $i++)
    		{
    			$str = "`proj_id` = '".$result[$i]['proj_id']."'";
    			$list = $item->where($str)->select();
    			$people_now = 0;
    			$money_now = 0;
    			for ($j = 0; $j < count($list); $j++)
    			{
    				$people_now += $list[$j]['item_people_now'];
    				$money_now += $list[$j]['item_money'] * $list[$j]['item_people_now'];
    			}
    			$str = "`proj_id` = '".$result[$i]['proj_id']."' and `username` = '".$username."'";
    			$personal_item_money = $investment->where($str)->getField('invest_money');
    			$t = array('people_now' => $people_now, 'money_now' => $money_now, 'item_number' => count($list), 'personal_item_money' => $personal_item_money);
    			$result[$i] = array_merge($result[$i], $list, $t);
    		}
    		$investment = new Model('investment');
    		$str = "`username` = '".$username."'";
    		$sum = $investment->where($str)->sum('invest_money');
    		$t = array(array('personal_invest_money' => $sum));

			echo json_encode(array_merge($result, $t));
		}
		else{
			$response['status'] = 0;
			$response['response'] = "something wrong";
			echo json_encode($response);
		}
	}

	public function isFollowing(){
		$username = $_GET['username'];
		$proj_id = $_GET['proj_id'];
		$following = new Model('following');
		$result = $following->where("`username` = '%s' and `proj_id` = '%s'", $username, $proj_id)->select();
		if ($result != false){
			$response['status'] = 1;
			$response['response'] = "true";
			echo json_encode($response);
		}
		else{
			$response['status'] = 0;
			$response['response'] = "false";
			echo json_encode($response);
		}
	}

	public function addFollowing(){
		$username = $_GET['username'];
		$proj_id = $_GET['proj_id'];
		$following = new Model('following');
		$data['username'] = $username;
		$data['proj_id'] = $proj_id;
		$data['following_time'] = date('Y-m-d H:i:s');
		$result = $following->add($data);
		if ($result != false){
			$response['status'] = 1;
			$response['response'] = "ok";
			echo json_encode($response);
		}
		else{
			$response['status'] = 0;
			$response['response'] = "something wrong";
			echo json_encode($response);
		}
	}

	public function removeFollowing()
	{
		$username = $_GET['username'];
		$proj_id = $_GET['proj_id'];
		$following = new Model('following');
		$result = $following->where("`username` = '%s' and `proj_id` = '%s'", $username, $proj_id)->delete();
		if ($result == false)
		{
			$response['status'] = 0;
			$response['response'] = "something wrong";
			echo json_encode($response);
		}
		else
		{
			$response['status'] = 1;
			$response['response'] = "OK";
			echo json_encode($response);
		}
	}

	public function addInvestment(){
		$username = $_GET['username'];
		$proj_id = $_GET['proj_id'];
		$invest_money = $_GET['money'];
		$invest_time = date('Y-m-d H:i:s');

		$investment = new Model('investment');
		$following = new Model('following');
		$data['username'] = $username;
		$data['proj_id'] = $proj_id;
		$data['invest_money'] = $invest_money;
		$data['invest_time'] = $invest_time;
		$result = $investment->add($data);
		if ($result != false){
			unset($data);
			$data['username'] = $username;
			$data['proj_id'] = $proj_id;
			$data['following_time'] = $invest_time;
			$result = $following->add($data);
			if ($result != false){
				$response['status'] = 1;
				$response['response'] = "ok";
				echo json_encode($response);
				$item = new Model('item');
				$str = "`proj_id` = '".$proj_id."' AND `item_money` = '".$invest_money."'";
				$item->where($str)->setInc('item_people_now');

			}
			else{
				$response['status'] = 0;
				$response['response'] = "something wrong???";
				echo json_encode($response);
			}
		}
		else{
			$response['status'] = 0;
			$response['response'] = "something wrong";
			echo json_encode($response);
		}
	}

	public function test(){
		$this->display();
	}
}