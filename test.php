<?php
require_once __DIR__ . '/vendor/autoload.php';

//use module\SeoList;

echo SeoListHelper::clearUrl('test').PHP_EOL;
echo SeoListDb::hash('test').PHP_EOL;
die;


/**
 * счетчик просмотров страниц (сохраняем или в Redis или в Mysql)
 * если значение мешьше порогового - скрываем от поисковиков
 */

sfLoader::loadHelpers('Rediska', 'SeoList');
$url = sfContext::getInstance()->getRequest()->getUri();
$url = SeoListHelper::clearUrl($url);
$list = SeoListHelper::getList();

if ($list && $list->count()) {
    if (!$list->has($url)) {
        $list->set($url);
    }

    $val = $list->inc($url);

    if ($val < SeoListHelper::LIMIT_VISITS) {
        // black list
         { $this->getResponse()->addMeta('robots', 'none'); }
    } else {
        // white list
    }
}
?>