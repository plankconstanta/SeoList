<?php

use PHPUnit\Framework\TestCase;
use SeoList\SeoListHelper;

class SeoListTest extends TestCase
{
    public function test_cnt_url()
    {
        $url = 'test.com/test1.html';
        $spy = new SeoListSpy();
        $val = SeoListHelper::countUrl($url, $spy);
        $val = SeoListHelper::countUrl($url, $spy);
        $this->assertSame(2, $val);
    }
}

class SeoListSpy implements \SeoList\SeoListInterface {
    protected $repo = [];

    public function __construct()
    {

    }

    public function set($url)
    {
        if (!isset($this->repo[$url])) {
            $this->repo[$url] = 0;
        }
    }

    public function inc($url)
    {
        if (!isset($this->repo[$url])) {
            $this->repo[$url] = 1;
        } else {
            $this->repo[$url] = $this->repo[$url] + 1;
        }
        return $this->repo[$url];
    }

    public function has($url)
    {
        return (isset($this->repo[$url])) ? 1 : 0;
    }

    public function delete($url)
    {
        unset($this->repo[$url]);
    }

    public function count()
    {
       return count($this->repo);
    }
}
