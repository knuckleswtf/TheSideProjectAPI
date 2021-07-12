<?php

namespace Tests;

use AjCastro\ScribeTdd\Tests\ScribeTddSetup;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, ScribeTddSetup;

    public function setUp(): void
    {
        parent::setUp();

        $this->setUpScribeTdd();
    }
}
