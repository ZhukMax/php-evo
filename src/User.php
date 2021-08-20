<?php

use JetBrains\PhpStorm\Pure;

class User
{
    private Role $role;
    private LoggerInterface $logger;

    public function __construct(
        private string $name,
        private City|string $city,
        public readonly ?DateTimeImmutable $birthday = null
    ) {}

    public function getName(): string
    {
        $this->logger?->log('Someone get my name');

        return $this->name;
    }

    public function getCity(): City|string
    {
        return $this->city;
    }

    public function setCity(City|string $city): void
    {
        $this->city = $city;
    }

    public function getRole(): ?string
    {
        return $this->role->value;
    }

    public function setRole(Role $role = Role::CUSTOMER): void
    {
        $this->role ??= $role;
    }

    #[Pure] public function getAvatar(): string
    {
        return $this->role->getAvatar() ?? '/images/avatar.png';
    }

    public function setLogger(?LoggerInterface $logger = null): void
    {
        $this->logger = $logger ?? new class implements LoggerInterface {
                public function log($message)
                {
                    echo $message;
                }
            };
    }
}
