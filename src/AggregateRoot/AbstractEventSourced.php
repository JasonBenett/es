<?php

declare(strict_types=1);

namespace JasonBenett\ES\AggregateRoot;

use JasonBenett\DDD\Domain\Aggregate\AggregateRootInterface;
use JasonBenett\ES\DomainEvent\AbstractDomainEvent;
use JasonBenett\ES\DomainEvent\DomainEventCollection;
use JasonBenett\ES\Helper\ClassHelper;

abstract class AbstractEventSourced implements AggregateRootInterface
{
    private DomainEventCollection $domainEvents;

    protected function __construct()
    {
        $this->domainEvents = new DomainEventCollection();
    }

    public function pullDomainEvents(): DomainEventCollection
    {
        $pendingEvents      = $this->domainEvents;
        $this->domainEvents = new DomainEventCollection();

        return $pendingEvents;
    }

    final protected function recordDomainEvent(AbstractDomainEvent $domainEvent): self
    {
        $this->domainEvents->attach($domainEvent);

        return $this;
    }

    public static function reconstitutionFrom(DomainEventCollection $domainEvents): AggregateRootInterface
    {
        $aggregate = new static();

        foreach ($domainEvents as $domainEvent) {
            $aggregate->apply($domainEvent);
        }

        return $aggregate;
    }

    final private function apply(AbstractDomainEvent $domainEvent): void
    {
        $eventShortName = ClassHelper::getShortName($domainEvent);

        $method = 'apply' . $eventShortName;

        if (method_exists($this, $method)) {
            $this->$method($domainEvent);
        }
    }
}