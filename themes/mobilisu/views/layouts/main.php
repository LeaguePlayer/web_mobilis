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
    $cs->registerScriptFile($this->getAssetsUrl().'/js/JCarusel.JQuery.js', CClientScript::POS_END);
	$cs->registerScriptFile('//ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js', CClientScript::POS_END);
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title><?php echo $this->title; ?></title>
        <meta name="Keywords" content="">
        <meta name="Description" content="">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />  
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
            <div class="front-header">
                <div class="jCarouselLite">
                    <?
                    $this->Widget("application.components.CaruselWidget.CaruselWidget",array());
                    ?>
                </div>
                <div class="rightside"></div>
                <div class="leftside"></div>
            </div>
        </div>
        <div id="menu-1">
            <div class="clearfix">
                <ul>
                    <li class="addititonal mail"><a href="mailto:mobilisu_tyumen@mail.ru">&nbsp;</a></li>
                    <li><a href="kitchen.html">Главная</a></li>
                    <li>
                        <a href="about.html">О компании</a>
                    </li>
                    <li>
                        <a href="news.html">Новости</a>
                    </li>
                    <li>
                        <a href="fabrics.html">Фабрики</a>
                    </li>
                    <li>
                        <a href="adv.html">Советы по эксплуатации</a>
                        <ul>
                            <li><a href="contacts.html">Контакты</a></li>
                        </ul>
                    </li>
                    <li class="last">
                        <a href="vakancy.html">Вакансии</a>
                    </li>
                </ul>
                </ul>
            </div>
        </div>
        <div id="under-menu">
            <div class="inner content">
                <table style="width: 100%;" border="0">
                    <tbody>
                        <tr>
                            <?
                                
                            ?>
                            <td style="width: 25%;" valign="top"><a style="font-size: large;color: #ca0901;" href="kitchen.html">Кухни</a> <a href="spalni.html">Спальни</a> <a href="kid.html">Детская мебель</a> <a href="soft.html">Мягкая мебель</a> <a href="kabinet.html">Кабинеты</a> <a href="gostin.html">Гостиные</a></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td style="width: 25%;" valign="top"><a href="stolgrup.html">Столовые группы</a> <a href="tv.html">Мебель для TV Hi-Fi</a> <a href="prihoj.html">Прихожие</a> <a href="korpus.html">Корпусная мебель</a> <a href="office.html">Офисная мебель</a> <a href="stolstul.html">Столы, стулья</a></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td style="width: 25%;" valign="top"><a href="biblio.html">Библиотеки</a> <a href="vann.html">Мебель для ванных комнат</a> <a href="predmet.html">Отдельные предметы</a> <a href="svet.html">Свет</a><a href="biblio.html"></a> <a href="accessories.html">Аксессуары</a> <a href="bar.html">Мебель для баров, кафе, ресторанов</a></td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td style="width: 25%;" valign="top"><a href="hotel.html">Гостиничная мебель</a> <a href="panels.html">Декоративные панели-буазери</a> <a href="billiard.html">Мебель для бильярдной</a> <a href="door.html">Двери</a><a href="sale.html">Матрасы</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="body">
            <div class="col-left">
                <div class="clearfix">
                    <div class="c-left">
                        <div class="clearfix">
                            <div class="inner content">
                                <div class="news-list news-list-custom">
                                    <div class="news-item first">
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="c-right">
                        <div class="clearfix">
                            <div class="inner content">
                                <div class="inner content">
                                    <?php echo $content;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                        <a href="http://site4all.ru/" class="credits" target="_blank">Разработка и продвижение сайтов Тюмень</a>
                        <div class="counter">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>