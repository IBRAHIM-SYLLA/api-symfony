<?php

namespace App\Faker\Provider;

use DateTime;
use DateTimeImmutable;
use Faker\Provider\Base as BaseProvider;

final class DatetimeImmutableProvider extends BaseProvider
{
/**
 * @return string Random job title.
 */
    public function DatetimeImmutable(DateTime $dateTime)
    {
        return DatetimeImmutable::createFromMutable($dateTime);
    }
}
?>