<?
class KitchenController extends CController
{	
	public function actionIndex()
	{
		$model=Pages::model()->FindByAlias("kitchen");
		print_r($model);
		die();
		
		
	}
}