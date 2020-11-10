<?php

declare(strict_types=1);

namespace JasonBenett\ES\Helper;

use ReflectionClass;

class ClassHelper
{
    public static function getShortName(object $object): string
    {
        $reflectedClass = new ReflectionClass($object);

        return $reflectedClass->getShortName();
    }
}