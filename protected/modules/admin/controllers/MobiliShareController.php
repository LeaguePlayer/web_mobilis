<?php

class MobiliShareController extends AdminController
{
	public function actionCreate()
	{
		$model =new MobiliShare;
        
        if(isset($_POST['MobiliShare']))
        {
            $model->attributes = $_POST['MobiliShare'];
			$success = $model->save();
            if( $success ) {
				$this->redirect('list');
			}
        }
        $this->render('create',array('model' => $model));

	}
}
