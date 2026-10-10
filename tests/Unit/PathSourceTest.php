<?php

declare(strict_types=1);

namespace Intervention\Image\Drivers\Vips\Tests\Unit;

use Error;
use Intervention\Image\Drivers\Vips\Source\PathSource;
use Intervention\Image\Drivers\Vips\Tests\BaseTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(PathSource::class)]
final class PathSourceTest extends BaseTestCase
{
    public function testCannotCreateDynamicProperty(): void
    {
        $source = new PathSource('image.jpg');

        $this->expectException(Error::class);
        $this->expectExceptionMessage(
            'Cannot create dynamic property ' . PathSource::class . '::$cache',
        );

        $source->cache = true;
    }
}
