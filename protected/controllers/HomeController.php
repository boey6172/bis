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
					'SaveResident',
					'SaveHouseHold',
					'viewCertificate',
					'saveBarangaycert',


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
		$vm->houseHold = new HouseHold('search');
		$vm->householdResident = new HouseholdResident('search');
		$vm->certificateRecord = new CertificateRecord('search');
		// $vm->barangayClearance = new BarangayClearance('search');
			
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

	public function actionViewCertificate()
	{
		$vm = (object) array();
		$retMessage = (object) array();
		$vm->certificateRecord = new CertificateRecord('search');
		$vm->resident = new Resident('search');

		



		if (isset( $_POST['CertificateRecord']) && isset( $_POST['Resident']))
		{
			$retVal = 'success';
			$vm->resident = Resident::model()->findByAttributes([
				'resident_id' => $_POST['Resident']['resident_id'],
			]);

			$vm->barangayClearance = new BarangayClearance('search');
			$retMessage->details1 = $this->renderPartial('/certificate/_barangayCertificateForm', array(
				'vm' => $vm,
			), true);
		}
		else
		{
			if($vm->CertificateRecord->hasErrors())
				{
					foreach ($vm->CertificateRecord as $error) {
						$retMessage .= '<br/> - ' . $error[0];
					}
				}
		}
		$this->renderPartial('/json/json_ret', array(
			'retVal' => $retVal,
			'retMessage' => $retMessage,
		));
	}

	public function actionSaveResident()
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
				$retMessage = $vm->resident->resident_id;
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
	public function actionSaveHousehold()
	{
		$retVal = 'error';
		$retMessage = 'Error';

		$vm = (object) array();
		$vm->houseHold = new HouseHold('search');
		$vm->houseHoldResident = new HouseHoldResident('search');
		



		if (isset($_POST['HouseHold']))
		{
			$vm->houseHold->attributes = $_POST['HouseHold'];

			if ($vm->houseHold->save()) 
			{
				$vm->houseHoldResident->resident_id = $vm->houseHold->res_id;
				$vm->houseHoldResident->household_id = $vm->houseHold->household_id;

				if ($vm->houseHoldResident->save()) 
				{
					$retVal = 'success';
					$retMessage = $vm->houseHoldResident->resident_id;
				}
				if($vm->houseHoldResident->hasErrors())
				{
					foreach ($vm->houseHoldResident as $error) {
						$retMessage .= '<br/> - ' . $error;
					}
				}
			}
			else
			{
				if($vm->houseHold->hasErrors())
					{
						foreach ($vm->houseHold as $error) {
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
	public function actionsaveBarangaycert()
	{
		$retVal = 'error';
		$retMessage = 'Error';

		$vm = (object) array();
		$vm->resident = new Resident('search');
		$vm->BarangayClearance = new BarangayClearance('search');


		if (isset($_POST['Resident']) && isset($_POST['CertificateRecord']) && isset($_POST['BarangayClearance']))
		{
			$vm->BarangayClearance->attributes = $_POST['BarangayClearance'];
			$vm->BarangayClearance->resident_id = $_POST['Resident']['resident_id'];
			if ($vm->BarangayClearance->save()) 
			{
				$retVal = 'success';
				$retMessage = $vm->BarangayClearance->barangay_clearance_id;
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

