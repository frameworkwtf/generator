<?php

declare(strict_types=1);

namespace App\Tests{{namespace}};

use PHPUnit\Framework\TestCase;

class {{name}}Test extends TestCase
{
    /**
     * @var \Slim\Container
     */
    protected $container;

    /**
     * @var \Wtf\App
     */
    protected $app;

    protected function setUp(): void
    {
        $dir = __DIR__.'{{subdir}}/data/config';
        $this->app = new \Wtf\App(['config_dir' => $dir]);
        $this->container = $app->getContainer();
    }

    public function testAnything(): void
    {
        $this->assertEquals(true, true);
    }
}

