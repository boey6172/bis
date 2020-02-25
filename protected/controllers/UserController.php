<?php

class UserController extends Controller
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
					'index',

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
		//$vm->user = new User('search');
		$vm = (object) array();
		$id =Yii::app()->user->id;
		$vm->user =  User::model()->findByPk($id);
			
		$this->render('view', array(
			'vm' => $vm,
		));
	}



}

