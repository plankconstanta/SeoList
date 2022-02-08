<?php

use PHPUnit\Framework\TestCase;


class SeoListDbTest extends TestCase
{
    public function testHash()
    {
        $str = 'test string';
        $this->assertSame(crc32($str), SeoListDb::hash($str));
    }
}
