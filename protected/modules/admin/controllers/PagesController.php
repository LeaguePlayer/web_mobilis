<?php

class PagesController extends AdminController
{
	public function actionChange() {
		$contents = Pages::model()->findAll(array('order' => 'id'));
		foreach ($contents as $item) {
			$data = preg_replace('!s:(\d+):"(.*?)";!se', "'s:'.strlen('$2').':\"$2\";'", $item->wswg_body ); 
			$data = unserialize($data);
			if(isset($data['text'])) 
				$item->wswg_body = $data['text'];
			else
				$item->wswg_body = '';
			$item->save(false);
		}
	}
}
