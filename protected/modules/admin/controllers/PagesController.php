<?php

class PagesController extends AdminController
{
	public function actionChange() {
		$contents = Pages::model()->findAll(array('order' => 'id'));
		echo "<pre>";
		foreach ($contents as $item) {
			//$data = preg_replace('!s:(\d+):"(.*?)";!se', "'s:'.strlen('$2').':\"$2\";'", $item->wswg_body ); 
			$data = unserialize($item->wswg_body);
			//print_r($data);
			if(isset($data['text'])) 
				$item->wswg_body = $data['text'];
			else
				$item->wswg_body = '';
			$item->save(false);
		}
		echo "</pre>";
	}
	/*public function actionCreate()
	{
		$model =new Pages;
		if (isset($_POST['Pages']))
		{
			$model->attributes=$_POST['Pages'];
			if ($model->validate())
			{
				$model_R=Pages::model()->findByAttributes(array('id'=>$model->parent_id));
				print_r($model_R);
			}
		}
		$this->render('_form',array('model'=>$model));
	}*/
}
