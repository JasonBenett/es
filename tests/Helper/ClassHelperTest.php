<?php

declare(strict_types=1);

namespace JasonBenett\ES\Tests\Helper;

use JasonBenett\ES\Helper\ClassHelper;
use PHPUnit\Framework\TestCase;

class ClassHelperTest extends TestCase
{
    public function testGetShortName(): void
    {
        self::assertNotSame('DummyClass', get_class(new DummyClass()));
        self::assertSame('DummyClass', ClassHelper::getShortName(new DummyClass()));
    }
}

class DummyClass {}