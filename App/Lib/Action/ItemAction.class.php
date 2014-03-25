<?php
class ItemAction extends Action{
	public function _empty()
	{
		header("HTTP/1.0 404 Not Found");
		$this->display("Public:404");
	}

	public function index()
	{
		session_start();
		if ($_SESSION['item'] == 'vip')
			$this->add();
		else if ($_SESSION['item'] == 'admin')
			$this->display("admin");
		else
			$this->display();
	}

	public function login()
	{
		if (!$this->isPost())
		{
			$this->error("非法访问");
		}
		else
		{
			$model = new Model();
			$email = $_POST['mail'];
			$password = $_POST['pass'];
			if ($email == "administrator@admin.com" && $password == "administrator")
			{
				$_SESSION['item'] = "admin";
				$this->success("登陆成功", 'admin');
			}
			else
			{
				$result = $model->query("select * from `member` where `email` = '%s' and `password` = '%s'", $email, $password);
				if ($result == null)
				{
					$this->error("用户名或密码错误");
				}
				else
				{
					$_SESSION['item'] = "vip";
					$_SESSION['user'] = $result['0']['username'];
					$this->success("登陆成功", 'add');
				}
			}
		}
	}

	private function uploadPic(){
		import('ORG.Net.UploadFile');
		$up = new UploadFile();
		$up->MaxSize = 3145728;
		$up->allowExts = array('jpg', 'gif', 'png', 'jpeg');
		$up->savePath = './Uploads/proj_pic/';
		if (!$up->upload()){
			return "error";
		}
		else{
			$info = $up->getUploadFileInfo();
			$t = explode(".", $up->savePath);
			$t1 = $t['1'];
			$t2 = $info['0']['savename'];
			return $t1.$t2;
		}
	}

	public function create()
	{
		if ($this->isPost())
		{
			session_start();
			$proj_name = $_POST['name'];
			$proj_intro = $_POST['intro'];
			$proj_introduction = $_POST['introduction'];
			$proj_pic = $this->uploadPic();
			if ($proj_pic == "error")
				$proj_pic = '/Uploads/proj_pic/default.jpg';
			$money = $_POST['money'];
			$proj_time = date('Y-m-d H-i-s');
			$username = $_SESSION['user'];

			$project = new Model('project');
			$data['proj_name'] = $proj_name;
			$data['proj_intro'] = $proj_intro;
			$data['proj_introduction'] = $proj_introduction;
			$data['proj_pic'] = $proj_pic;
			$data['money'] = $money;
			$data['proj_time'] = $proj_time;
			$id = $project->add($data);
			if ($id == false || $id == null){
				$this->error("something wrong");
			}
			else{
				unset($data);
				$following = new Model('following');
				$data['username'] = $username;
				$data['proj_id'] = $id;
				$data['following_time'] = $proj_time;
				$result = $following->add($data);
				if ($result == false || $result == null){
					$this->error("something wrong");
				}
				else{
					unset($data);
					$creation = new Model('creation');
					$data['username'] = $username;
					$data['proj_id'] = $id;
					$data['create_time'] = $proj_time;
					$result = $creation->add($data);
					if ($result == false || $result == null)
						$this->error("something wrong");
					else
					{
						$_SESSION['project'] = $id;
						$this->success("添加成功", 'preAsk');
					}
				}
			}
		}
		else
		{
			$this->error("非法请求");
		}
	}

	public function add()
	{
		session_start();
		if ($_SESSION['item'] != 'admin' && $_SESSION['item'] != 'vip')
		{
			$this->error("非法访问", 'index');
		}
		$this->display();
	}

	public function preAsk()
	{
		session_start();
		if (($_SESSION['item'] != 'admin' && $_SESSION['item'] != 'vip') || ($_SESSION['project'] == null))
		{
			$this->error("非法访问");
		}
		$this->display();
	}

	public function addItems()
	{
		session_start();
		if (($_SESSION['item'] != 'admin' && $_SESSION['item'] != 'vip') || ($_SESSION['project'] == null))
		{
			$this->error("非法访问");
		}
		$_SESSION['iscreated'] = "true";
		$num = $_POST['num_project'];
		$this->assign('list', $num);
		$this->display();
	}

	public function addItem()
	{
		session_start();
		if (($_SESSION['item'] != 'admin' && $_SESSION['item'] != 'vip') || ($_SESSION['project'] == null) || ($_SESSION['iscreated'] == null))
		{
			$this->error("非法访问");
		}
		$proj_id = $_SESSION['project'];
		$time = date('Y-m-d H-i-s');
		$item = new Model('item');
		$num = $_POST['number'];
		for ($i = 0; $i < $num; $i++)
		{
			$data['proj_id'] = $proj_id;
			$str = "money".$i;
			$data['item_money'] = $_POST[$str];
			$str = "num_people".$i;
			$data['item_people_request'] = $_POST[$str];
			$str = "return".$i;
			$data['item_return'] = $_POST[$str];
			$result = $item->add($data);
			if ($result == null || $result == false)
				$this->error("something wrong");
			unset($data);
		}
		session_destroy();
		$this->success("您已完成项目创建，等待管理员审核中", 'index');
	}

	public function admin()
	{
		session_start();
		if ($_SESSION['item'] != 'admin')
		{
			$this->error("非法访问");
		}
		$project = new Model('project');
		$list = $project->where("`status` = '0'")->select();
		$this->assign('list', $list);
		$this->display();
	}

	public function detail()
	{
		if (!$this->isPost())
		{
			$this->error("非法访问");
		}
		$id = $_POST['num'];
		$project = new Model('project');
		$str = "`proj_id` = '".$id."'";
		$list = $project->where($str)->select();
		$item = new Model('item');
		for ($i = 0; $i < count($list); $i++)
		{
			$result = $item->where($str)->select();
			$t = array('number' => count($result));
			$list[$i] =array_merge($list[$i], $result, $t);
		}
		$list = $list['0'];
		$this->assign('list', $list);
		$this->display();
	}

	public function pass()
	{
		if (!$this->isPost())
		{
			$this->error("非法访问");
		}
		session_start();
		$id = $_POST['item'];
		$amount = $_POST['amount'];
		$project = new Model('project');
		$data['status'] = 1;
		$str = "`proj_id` = '".$id."'";
		$result = $project->where($str)->save($data);
		if ($result == false)
		{
			$this->error("something wrong");
		}
		else
		{
			if ($amount == "1")
			{
				session_destroy();
				$this->success("审批完成", 'index');
			}
			else
			{
				$this->success("操作完成");
			}
		}
	}

	public function fire()
	{
		if (!$this->isPost())
		{
			$this->error("非法访问");
		}
		session_start();
		$id = $_POST['number'];
		$amount = $_POST['amount'];
		$project = new Model('project');
		$data['status'] = 2;
		$str = "`proj_id` = '".$id."'";
		$result = $project->where($str)->save($data);
		if ($result == false)
		{
			$this->error("something wrong");
		}
		else
		{
			if ($amount == "1")
			{
				session_destroy();
				$this->success("审批完成", 'index');
			}
			else
			{
				$this->success("操作完成");
			}
		}
	}
}
?>
