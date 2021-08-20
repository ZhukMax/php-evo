<?php

class User
{
    /** @var string */
    private $name;

    /** @var City|string */
    private $city;

    /** @var DateTimeImmutable|null */
    private $birthday;

    /**
     * @param string $name
     * @param City|string $city
     * @param DateTimeImmutable|null $birthday
     */
    public function __construct($name, $city, $birthday = null)
    {
        $this->name = isset($name) ? $name : '';
        $this->city = $city;
        $this->birthday = $birthday;
    }

    /**
     * @return string
     */
    public function getName()
    {
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
}
