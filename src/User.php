<?php

class User
{
    public const CUSTOMER = 'customer';
    public const ADMIN = 'admin';

    private string $role;
    private LoggerInterface $logger;

    public function __construct(
        private string $name,
        private City|string $city,
        private ?DateTimeImmutable $birthday = null
    ) {}

    public function getName(): string
    {
        if ($this->logger) {
            $this->logger->log('Someone get my name');
        }

        return $this->name;
    }

    public function getBirthday(): ?DateTimeImmutable
    {
        return $this->birthday;
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
        return $this->role;
    }

    public function setRole(string $role = self::CUSTOMER): void
    {
        $this->role ??= $role;
    }

    public function getAvatar(): string
    {
        switch ($this->role) {
            case self::CUSTOMER:
                return '/images/customer.png';

            case self::ADMIN:
                return '/images/admin.png';

            default:
                return '/images/avatar.png';
        }
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
