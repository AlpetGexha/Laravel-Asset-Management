<?php

namespace App\Enums;

class HardwareStatus
{
    const ACTIVE = 'active';

    const INACTIVE = 'inactive';

    const FAULTY = 'Faulty';

    const OUT_OF_SERVICE = 'Out Service';

    const UNDER_MAINTENANCE = 'Under Mantenance';

    const OFFLINE = 'Offline';

    const ONLINE = 'Online';

    const PENDING = 'Pending';

    const DECOMMISSIONED = 'Decommissioned';

    const UPGRADING = 'Upgrading';

    const UNAVAILABLE = 'Unavailable';

    const ERROR = 'Error';

    const READY = 'Ready';

    const UNKNOWN = 'Uknown';

    public static function all(): array
    {
        return [
            self::ACTIVE,
            self::INACTIVE,
            self::FAULTY,
            self::OUT_OF_SERVICE,
            self::UNDER_MAINTENANCE,
            self::OFFLINE,
            self::ONLINE,
            self::PENDING,
            self::DECOMMISSIONED,
            self::UPGRADING,
            self::UNAVAILABLE,
            self::ERROR,
            self::READY,
            self::UNKNOWN,
        ];
    }

    public static function options(): array
    {
        $options = [];

        foreach (self::all() as $case => $value) {
            $options[$case] = ucfirst($value);
        }

        return $options;
    }
}
