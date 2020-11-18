<?php

declare(strict_types=1);

namespace JasonBenett\ES\Projection;

use JasonBenett\ES\DomainEvent\AbstractDomainEvent;

interface ProjectionInterface
{
    public function project(AbstractDomainEvent $event): void;

    public function listenTo(): string;
}