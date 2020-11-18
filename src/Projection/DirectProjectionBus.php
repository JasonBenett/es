<?php

declare(strict_types=1);

namespace JasonBenett\ES\Projection;

use JasonBenett\ES\DomainEvent\AbstractDomainEvent;

class DirectProjectionBus
{
    /** @var ProjectionInterface[][] */
    private array $projections;

    public function __construct(ProjectionInterface ...$projections)
    {
        foreach ($projections as $projection) {
            $this->projections[$projection->listenTo()][] = $projection;
        }
    }

    public function dispatch(AbstractDomainEvent $event): void
    {
        $subjectClass = get_class($event);
        $projections  = $this->projections[$subjectClass] ?? null;

        if (null === $projections) {
            return;
        }

        foreach ($projections as $projection) {
            $projection->project($event);
        }
    }
}