<?php

declare(strict_types=1);

namespace Intervention\Image\Drivers\Vips\Tests\Unit;

use Error;
use Intervention\Image\Drivers\Vips\Source\BufferSource;
use Intervention\Image\Drivers\Vips\Tests\BaseTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

/** @package Intervention\Image\Drivers\Vips\Tests\Unit */
#[CoversClass(BufferSource::class)]
final class BufferSourceTest extends BaseTestCase
{
    public function testCannotCreateDynamicProperty(): void
    {
        $source = new BufferSource('data');

        $this->expectException(Error::class);
        $this->expectExceptionMessage(
            'Cannot create dynamic property ' . BufferSource::class . '::$cache',
        );

        $source->cache = true;
    }
}
