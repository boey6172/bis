<?php

class HomeController extends Controller
{
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array(
					'Index',
					'createProject',
                ),
				'roles'=>array('rxClient'),
			),

			array('deny',  // deny all other users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
		$vm = (object) array();
		$vm->resident = new Resident('search');
		$vm->houseHold = new Household('search');
			
		$this->render('index', array(
			'vm' => $vm,
		));
	}

	public function actioncreateProject()
	{
		$retVal = 'error';
		$retMessage = 'Error';

		$vm = (object) array();
		$vm->project = new Project('search');

		if (isset($_POST['NewProject']))
		{
			$vm->project->attributes = $_POST['NewProject'];
			$vm->project->budget = str_replace(",","",$_POST['NewProject']['budget']);

			if ($vm->project->save()) 
			{
				$retVal = 'success';
				$retMessage = $vm->project->proj_code;
			}
			else
			{
				if($vm->project->hasErrors())
					{
						foreach ($vm->project as $error) {
							$retMessage .= '<br/> - ' . $error[0];
						}
					}
			}
		}
		else
		{
			$retVal = 'danger';
			$retMessage = 'No Data Entry';
		}

		$this->renderPartial('/json/json_ret', array(
			'retVal' => $retVal,
			'retMessage' => $retMessage,
			
		));
	}
}

