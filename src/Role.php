<?php

enum Role: string
{
    case CUSTOMER = 'customer';
    case ADMIN = 'admin';

    public function getAvatar(): string
    {
        return match ($this) {
            self::CUSTOMER => '/images/customer.png',
            self::ADMIN => '/images/admin.png'
        };
    }
}
