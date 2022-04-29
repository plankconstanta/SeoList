<?php
namespace SeoList;

class SeoListHelper {
    const LIMIT_VISITS = 100;

    /**
     * create list
     * @return SeoListInterface
     */
    public static function getList() {
        if ($r = get_rediska_instance()) {
            $list = new SeoListRedis($r);
        } else {
            $list = new SeoListDb();
        }
        return $list;
    }

    /**
     * @param string $url
     * @return string
     */
    public static function clearUrl($url) {
        $url = trim(str_replace(array('https://', 'http://', 'www.'), '', $url));
        $url = explode("?", $url)[0];
        return $url;
    }

    public static function countUrl(string $url, SeoListInterface $seolist) {
        if ($seolist->has($url)) {
            $val = $seolist->inc($url);
        } else {
            $seolist->set($url);
            $val = $seolist->int($url);
        }
        return $val;
    }
}
?>