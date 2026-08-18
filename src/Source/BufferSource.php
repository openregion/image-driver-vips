<?php

declare(strict_types=1);

namespace Intervention\Image\Drivers\Vips\Source;

use Error;

/**
 * The original buffer the image was decoded from, plus the libvips
 * option-string the decoder used. Stashed on Core after a clean decode so
 * that resize-family modifiers can swap to libvips' combined load+resize
 * `thumbnail_buffer()` instead of `thumbnail_image()`.
 */
final class BufferSource
{
    public function __construct(
        public readonly string $buffer,
        public readonly string $optionString = '',
    ) {
        //
    }

    /**
     * Reject dynamic properties to preserve readonly class semantics.
     *
     * @throws Error
     */
    public function __set(string $name, mixed $value): void
    {
        throw new Error('Cannot create dynamic property ' . self::class . '::$' . $name);
    }
}
