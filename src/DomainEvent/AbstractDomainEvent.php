<?php

declare(strict_types=1);

namespace JasonBenett\ES\DomainEvent;

use DateTimeImmutable;
use JasonBenett\DDD\Domain\ValueObject\Uuid;

abstract class AbstractDomainEvent
{
    private DomainEventUuid $id;

    private Uuid $aggregateRootId;

    private array $payload;

    private string $type;

    private DateTimeImmutable $recordedOn;

    private function __construct(Uuid $aggregateRootId, array $payload)
    {
        $this->id              = new DomainEventUuid();
        $this->aggregateRootId = $aggregateRootId;
        $this->payload         = $payload;
        $this->type            = get_class($this);
        $this->recordedOn      = new DateTimeImmutable();
    }

    public static function occur(Uuid $aggregateRootId, array $payload = []): self
    {
        return new static($aggregateRootId, array_merge($payload, ['id' => $aggregateRootId->getValue()]));
    }

    public function getId(): DomainEventUuid
    {
        return $this->id;
    }

    public function getAggregateRootId(): Uuid
    {
        return $this->aggregateRootId;
    }

    public function getPayload(): array
    {
        return $this->payload;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function recordedOn(): DateTimeImmutable
    {
        return $this->recordedOn;
    }
}