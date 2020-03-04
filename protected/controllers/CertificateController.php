<?php

class CertificateController extends Controller
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
                    'BarangayCertificate',


                ),
				'roles'=>array('rxClient'),
			),

			array('deny',  // deny all other users
				'users'=>array('*'),
			),
		);
	}

	public function actionBarangayCertificate($id)
	{
		$vm = (object) array();
		$vm->resident = new Resident('search');
		$vm->houseHold = new HouseHold('search');
		$vm->householdResident = new HouseholdResident('search');
        $vm->certificateRecord = new CertificateRecord('search');
        // $vm->BarangayClearance = new BarangayClearance('search');
        
        $vm->BarangayClearance = BarangayClearance::model()->findByAttributes([
            'barangay_clearance_id' => $id,
        ]);
			
		$this->render('barangaycertificate', array(
			'vm' => $vm,
		));
	}

	
}

