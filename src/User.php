<?php

class User
{
    public const CUSTOMER = 'customer';
    public const ADMIN = 'admin';

    /** @var string */
    private $name;

    /** @var City|string */
    private $city;

    /** @var DateTimeImmutable|null */
    private $birthday;

    /** @var string */
    private $role;

    /** @var LoggerInterface */
    private $logger;

    /**
     * @param City|string $city
     */
    public function __construct(string $name, $city, ?DateTimeImmutable $birthday = null)
    {
        $this->name = $name ?? '';
        $this->city = $city;
        $this->birthday = $birthday;
    }

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

    /**
     * @return City|string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param City|string $city
     */
    public function setCity($city): void
    {
        $this->city = $city;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role = self::CUSTOMER): void
    {
        $this->role = $this->role ?? $role;
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
