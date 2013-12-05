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
        if (count($mas)==0)
        {
            print('<img src="/upload/m5.jpg">');
        } else 
        {
         foreach($mas as $value)
            {

                $result.='<li><img src="'.$value->getImageUrl("share").'" alt="qweqwe"></li>';
            }

        print('<ul class="carusel">'.$result.'</ul>');
        }
        parent::init();
    }
    public function run()
    {
    	parent::run();
    }
}