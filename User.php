<?php

class User
{
    /** @var string */
    private $name;

    /** @var DateTimeImmutable|null */
    private $birthday;

    /**
     * @param string $name
     * @param DateTimeImmutable|null $birthday
     */
    public function __construct($name, $birthday = null)
    {
        $this->name = isset($name) ? $name : '';
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
}
