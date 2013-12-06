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
	
	public function actionSet()
	{
		$models=Pages::model()->findAll(array('order'=>'parent_id'));
		for ($i=1;$i<count($models);$i++)
		{
			if ($models[$i-1]->id==$models[$i]->parent_id)
			{
				$models[$i]->lvl=$models[$i]->lvl+1;
				$models[$i]->save();	
			}
		}
	}
}
