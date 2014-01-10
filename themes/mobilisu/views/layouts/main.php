<?php

	$cs = Yii::app()->clientScript;
	$cs->registerCssFile($this->getAssetsUrl().'/css/main.css');
	$cs->registerCssFile($this->getAssetsUrl().'/css/news.css');
	$cs->registerCssFile($this->getAssetsUrl().'/css/fancybox/jquery.fancybox.css');
	$cs->registerCssFile($this->getAssetsUrl().'/css/jquery.ui/overcast/jquery-ui-1.10.3.custom.min.css');
    $cs->registerCssFile($this->getAssetsUrl().'/css/shareCarusel.css');
	//$cs->registerCssFile($this->getAssetsUrl().'/css/fancybox/jquery.fancybox-buttons.css');
	
	$cs->registerCoreScript('jquery');
	$cs->registerCoreScript('jquery.ui');
	$cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.fancybox.js', CClientScript::POS_END);
	//$cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.fancybox-buttons.js', CClientScript::POS_END);
	//$cs->registerScriptFile('http://api-maps.yandex.ru/2.0.27/?load=package.standard&lang=ru-RU', CClientScript::POS_HEAD);
	
	$cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.timepicker.addon.js', CClientScript::POS_END);
	$cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.ui.timepicker.ru.js', CClientScript::POS_END);
	$cs->registerScriptFile($this->getAssetsUrl().'/js/common.js', CClientScript::POS_END);
    
	$cs->registerScriptFile('//ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js', CClientScript::POS_END);
    $cs->registerScriptFile($this->getAssetsUrl().'/js/script.js', CClientScript::POS_END);
    $cs->registerScriptFile($this->getAssetsUrl().'/js/jquery.tools.min.js', CClientScript::POS_END);
    $cs->registerCssFile($this->getAssetsUrl().'/css/gallery.css');
    $cs->registerCssFile($this->getAssetsUrl().'/css/fancybox/jquery.fancybox.css');
    $cs->registerCssFile($this->getAssetsUrl().'/css/fancybox/jquery.fancybox-thumbs.css');
    $cs->registerScriptFile($this->getAssetsUrl().'/js/jCarouselLite.js', CClientScript::POS_END);
    $cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.fancybox.js', CClientScript::POS_END);
    $cs->registerScriptFile($this->getAssetsUrl().'/js/lib/jquery.fancybox-thumbs.js', CClientScript::POS_END);
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title><?php echo $this->title; ?></title>
        <meta name="Keywords" content="<? echo isset($this->Keywords) ? $this->Keywords: $this->title;?>">
        <meta name="Description" content="<? echo isset($this->Description) ? $this->Description:$this->title;?>">
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>favicon.ico" type="image/x-icon">
        <!--[if IE]>
        <link rel="stylesheet" href="style/ie.css"  type="text/css" />
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!--[if IE 6]>
        <link rel="stylesheet" href="style/ie6.css"  type="text/css" />
        <script type="text/javascript" src="js/pngfix.js" ></script>
        <script type="text/javascript" src="js/pngfix-custom.js" ></script>
        <![endif]-->
    </head>
    <body id="homepage">
        <div id="header">
            <div id="logo">
                <a href="/">
                </a>
            </div>
            <div class="front-header">
                <? $this->Widget("application.components.CaruselWidget.CaruselWidget",array());?>
            </div>
        </div>
        <div id="menu-1">
            <div class="clearfix">
                <ul>
                    <li class="addititonal mail"><a href="mailto:mobilisu_tyumen@mail.ru">&nbsp;</a></li>
                    <li><a href="/">Главная</a></li>
                    <li>
                        <a href="/pages/about/">О компании</a>
                    </li>
                    <li>
                        <a href="/mobiliNews/">Новости</a>
                    </li>
                    <li>
                        <a href="/pages/fabrics/">Фабрики</a>
                    </li>
                    <li><a href="/pages/nashi_raboti">Наши работы</a></li>
                    <li>
                        <a href="/pages/adv/">Советы по эксплуатации</a>
                    </li>
                     <li><a href="/pages/contacts/">Контакты</a></li>
                    <li class="last">
                        <a href="/pages/vakancy/">Вакансии</a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="under-menu">
            <div class="inner content">
                <table style="width: 100%;" border="0">
                    <tbody>
                        <tr>
                            <?
								$criteria = new CDbCriteria;
                                $criteria->compare('cat_parent', 0);
                                $criteria->order = 'sort';
                                $data=Category::model()->findAll($criteria);
                                $iCol=round(count($data)/4);
                                $result='';
                                $links='';
                                $counter=0;
                                foreach ($data as $key => $value) {
                                }
                                    for ($i=0; $i <4; $i++) { 
                                        $result='<td style="width: 25%;" valign="top">';
                                        for ($j=0; $j <$iCol ; $j++) {

                                            if (isset($data[$counter]))
                                            {
                                                if (!empty($data[$counter]->wswg_body))
                                                {
                                                    if ($_GET['alias']!=$data[$counter]->alias.'')
                                                    {
                                                        $links.='<a href="/'.$data[$counter]->alias.'">'.$data[$counter]->name.'</a>';
                                                    } else {
                                                        $links.='<a style="font-size: large;color: #ca0901;" href="/'.$data[$counter]->alias.'">'.$data[$counter]->name.'</a>';
                                                    }
                                                }
                                                $counter++;
                                            }
                                        }
                                    $result.=$links.'</td>';
                                    print($result);
                                    $links='';
                                    $result='';
                                }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="body">
            <?php echo $content;?>
        </div>
        <div id="footer">
            <div class="clearfix">
                <div class="c-left">
                    <div class="inner">
                        <p><span style="font-size: large;"><span style="color: #333300;">(3452) 97-07-99<br />(3452) 97-07-93</span></span></p>
                        <p><span style="font-size: large;"><span style="color: #333300;">8-800-5000-850 - звонок бесплатный</span></span></p>
                        <p><span style="font-size: medium;"><a style="text-decoration: none;" href="mailto:mobilisu_tyumen@mail.ru"><span style="font-size: x-small;"><span style="color: #333300;">mobilisu_tyumen@mail.ru</span></span></a></span></p>
                        <p><span style="font-size: medium;"><span style="font-size: x-small;"><span style="color: #333300;"><span style="color: #000000; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 16px;">Магазин</span><span style="color: #000000; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 16px;">&nbsp;</span><span style="color: #000000; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 16px;">мебели</span><span style="color: #000000; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 16px;">&nbsp;</span><span style="color: #000000; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 16px;">в</span><span style="color: #000000; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 16px;">&nbsp;</span><span style="color: #000000; font-family: Arial, Helvetica, sans-serif; font-size: 13px; line-height: 16px;">Тюмени, каталог итальянской мебели</span></span></span></span></p>
                    </div>
                </div>
                <div class="c-right">
                    <div class="inner">
                        <a href="http://amobile-studio.ru/" class="credits" target="_blank">Разработка и продвижение сайтов Тюмень</a>
                        <div class="counter">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
