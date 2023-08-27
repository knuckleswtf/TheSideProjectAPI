<?php

namespace App\Docs\Attributes;

use Attribute;
use Knuckles\Scribe\Attributes\QueryParam;

#[Attribute(Attribute::TARGET_FUNCTION | Attribute::TARGET_METHOD | Attribute::TARGET_CLASS)]
class HasPaginationParameters extends QueryParam
{
    public function __construct(
        public string $name = 'page',
        public ?string $type = 'string',
        public ?string $description = '',
        public ?bool $required = true,
    ) {
    }

    public function toArray()
    {
        return [
            "name" => 'page',
            "type" => 'integer',
            'description' => 'Page number to return. This parameter was added by a custom strategy.',
            'required' => false,
            'example' => 1,
        ];
    }
}
