<?
	$images=$data->getGallery()->galleryPhotos;	
				print('<div class="kitchen"><div class="view">');
				if($images[0]['rank'])
				{
					print('<a rel="'.$data->id.'" href="/'.$images[0]['galleryDir'].'/'.$images[0]['rank'].'medium.'.$images[0]['ext'].'" rel="'.$key_d.'"><img style="width=323;height=216;	" src="/'.$images[0]['galleryDir'].'/'.$images[0]['rank'].'cat_list_large.'.$images[0]['ext'].'" ></a></div><div class="thumbs">');
					foreach($images as $key=>$img)
					{
						if ($key!=0)
						if (!empty($img['rank'])){
							print('<a rel="'.$data->id.'" href="/'.$img['galleryDir'].'/'.$img['rank'].'medium.'.$img['ext'].'" rel="'.$key_d.'"><img src="/'.$img['galleryDir'].'/'.$img['rank'].'cat_list_small.'.$img['ext'].'" ></a>');
						}
					}
				print('</div>');
				}
				print('<a href="/goods/'.$data->name.'/"><p class="kname">'.$data->name.'</p></a>');
				
				print('<p class="kprice">'.$price=($data->price>0?'Цена:'.$data->price.'руб.':'') .'</p></div>');
?>