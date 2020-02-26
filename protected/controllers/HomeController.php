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
					'ViewResident',
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

	public function actionViewResident()
	{
		$vm = (object) array();
		$retMessage = (object) array();
		$vm->resident = new Resident('search');


		if (isset( $_POST['Resident']))
		{
			$retVal = 'success';
			$vm->resident = Resident::model()->findByAttributes([
				'resident_id' => $_POST['Resident']['resident_id'],
			]);

			$retMessage->details1 = $this->renderPartial('/resident/_viewResident', array(
				'vm' => $vm,
			), true);
		}
		else
		{
			if($vm->resident->hasErrors())
				{
					foreach ($vm->resident as $error) {
						$retMessage .= '<br/> - ' . $error[0];
					}
				}
		}
		$this->renderPartial('/json/json_ret', array(
			'retVal' => $retVal,
			'retMessage' => $retMessage,
		));
	}
}

