<?
class CaruselWidget extends CWidget
{
    public $params;
    public $data;
	protected function registerClientScript()
    {
        
    }
    public function init()
    {
        $param=new MobiliShare;
        $mas=$param->findAll('hidden=1');
         foreach($mas as $value)
            {
                $result.='<li style="height:280px;"><a style="height:280px;" target="_blank" href="/MobiliShare/view/'.$value->name.'.html?id='.$value->id.'"><img src="'.$value->getImageUrl("share").'" alt="qweqwe"></a></li>';
            }
        print('<ul class="carusel">'.$result.'</ul>');
        parent::init();
    }
    public function run()
    {
    	parent::run();
    }
}