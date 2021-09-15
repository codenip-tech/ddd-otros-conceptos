<?php

namespace App\Infrastructure\Mapping\Type;

use App\Domain\Value\PriceCents;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\IntegerType;

class PriceCentsType extends IntegerType
{
    private const PRICE_CENTS = 'price_cents';
    
    public function getName()
    {
        return self::PRICE_CENTS;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return $value === null ? null : new PriceCents($value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if ($value !== null && !$value instanceof PriceCents) {
            throw new \LogicException(sprintf(
                'Expected %s but got %s', 
                PriceCents::class, 
                gettype($value)
            ));
        }

        return $value->value();
    }
}
