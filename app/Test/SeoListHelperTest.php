<?php

use PHPUnit\Framework\TestCase;
use SeoList\SeoListHelper;

class SeoListHelperTest extends TestCase
{
    /**
     * @dataProvider urlProvider
     */
    public function test_clear_url($url_dirty, $url_clear)
    {
        $this->assertSame($url_clear, SeoListHelper::clearUrl($url_dirty));
    }

    public function urlProvider()
    {
        return  [
            'http://www.' => ['http://www.test.com/test.html', 'test.com/test.html'],
            'https://www.' => ['https://www.test.com/test.html', 'test.com/test.html'],
            'http://' => ['http://test.com/test.html', 'test.com/test.html'],
            'https://' => ['https://test.com/test.html', 'test.com/test.html'],
            'no changes' => ['test.com/test.html', 'test.com/test.html'],
            'www.' => ['www.test.com/test.html', 'test.com/test.html']
        ];
    }


}
