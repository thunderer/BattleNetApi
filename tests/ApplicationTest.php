<?php
namespace Thunder\BlizzardApi\Tests;

use Thunder\BlizzardApi\Application;

class ApplicationTest extends \PHPUnit_Framework_TestCase
    {
    public function testApplication()
        {
        $app = new Application('name', 'key', 'secret');
        $this->assertEquals('name', $app->getName());
        $this->assertEquals('key', $app->getKey());
        $this->assertEquals('secret', $app->getSecret());
        }
    }
