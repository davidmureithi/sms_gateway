<?php

namespace backend\controllers; 

use Yii;
use yii\web\Controller;

class UsersController extends Controller
{
	public function actionIndex(){
		return $this->render('index');

	}
}

?>