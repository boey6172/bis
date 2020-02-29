<?php

class ResidentController extends Controller
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
					'new',
					'save',
					'View',
					'ViewResident',	
					'ViewNewResident',		

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
		//$vm->houseHold = new HouseHold('search');
		
		$this->render('index', array(
			'vm' => $vm,
		));
	}

	public function actionView()
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
				
			$retMessage = $this->renderPartial('_viewResident', array(
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
				
			$retMessage = $this->renderPartial('_newResidentProfile', array(
				'vm' => $vm,
			), true, true);
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
	public function actionViewNewResident()
	{
		$vm = (object) array();
		$retMessage = (object) array();
		$vm->resident = new Resident('search');
		$retVal = 'success';

			$retMessage = $this->renderPartial('_newResidentProfile', array(
				'vm' => $vm,
			), true, true);
		
		$this->renderPartial('/json/json_ret', array(
			'retVal' => $retVal,
			'retMessage' => $retMessage,
		));
	}
	




    public function actionNew()
	{
		$vm = (object) array();
		$vm->resident = new Resident('search');
		$vm->houseHold = new HouseHold('search');
		// $vm->listProject = new Project('search');
			
		$this->render('new', array(
			'vm' => $vm,
		));
	}

	public function actionSave()
	{
		$retVal = 'error';
		$retMessage = 'Error';

		$vm = (object) array();
		$vm->resident = new Resident('search');

		if (isset($_POST['Resident']))
		{
			$vm->resident->attributes = $_POST['Resident'];

			if ($vm->resident->save()) 
			{
				$retVal = 'success';
				$retMessage = 'success';
			}
			else
			{
				if($vm->resident->hasErrors())
					{
						foreach ($vm->resident as $error) {
							$retMessage .= '<br/> - ' . $error;
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

