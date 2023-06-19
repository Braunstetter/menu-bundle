<?php

declare(strict_types=1);

namespace Braunstetter\MenuBundle\Test\trait;

use Braunstetter\MenuBundle\Test\app\src\TestKernel;

trait TestKernelTrait
{
    protected ?Testkernel $kernel = null;

    protected function setUp(): void
    {
        parent::setUp();

        $kernel = new TestKernel('dev', true);
        $kernel->boot();

        $this->kernel = $kernel;
    }
}
