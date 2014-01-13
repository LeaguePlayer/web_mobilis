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
        $result = '';
        foreach($mas as $value)
        {
            $result.='<li style="height:280px;"><a style="height:280px;" target="_blank" href="/promo/view/id/'.$value->id.'"><img src="'.$value->getImageUrl("share").'" alt="qweqwe"></a></li>';
        }
        if($result)
            print(' <div class="jCarouselLite"><ul class="carusel">'.$result.'</ul></div><div class="rightside"></div><div class="leftside"></div>');
        parent::init();
    }
    public function run()
    {
    	parent::run();
    }
}