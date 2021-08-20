<?php

class User
{
    const CUSTOMER = 'customer';
    const ADMIN = 'admin';

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
     * @param DateTimeImmutable|null $birthday
     */
    public function __construct(string $name, $city, $birthday = null)
    {
        $this->name = isset($name) ? $name : '';
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

    /**
     * @return DateTimeImmutable|null
     */
    public function getBirthday()
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
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string|null
     */
    public function getRole()
    {
        return $this->role;
    }

    public function setRole(string $role = self::CUSTOMER)
    {
        $this->role = isset($this->role) ? $this->role : $role;
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

    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
}
