<?php

declare(strict_types=1);

namespace Intervention\Image\Drivers\Vips\Source;

use Error;

/**
 * The original file path the image was decoded from, plus the libvips
 * option-string the decoder used. Stashed on Core after a clean decode so
 * that resize-family modifiers can swap to libvips' combined load+resize
 * `thumbnail()` instead of `thumbnail_image()`.
 */
final class PathSource
{
    public function __construct(
        public readonly string $path,
        public readonly string $optionString = '',
    ) {
        //
    }

    /**
     * Build the path argument including the option-string suffix that
     * libvips file loaders accept (e.g. "/foo/bar.jpg[n=-1]").
     */
    public function pathWithOptions(): string
    {
        return $this->optionString === '' ? $this->path : $this->path . '[' . $this->optionString . ']';
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
