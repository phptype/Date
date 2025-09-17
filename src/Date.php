<?php
declare(strict_types=1);

namespace ScriptFUSION\Type;

use ScriptFUSION\StaticClass;

final class Date
{
    use StaticClass;

    /**
     * Adaptively transforms the specified date, producing a relative or absolute date depending upon how recent it is.
     *
     * @param string|\DateTimeInterface $date Date.
     * @param string $format Optional. The format to use when the number of days is greater than 30.
     *
     * @return string Absolute or relative date.
     */
    public static function adapt(string|\DateTimeInterface $date, string $format = 'M Y'): string
    {
        $date = is_string($date) ? new \DateTimeImmutable($date) : $date;
        $diff = (new \DateTime)->diff($date);
        // If diff less than one whole second from the next day, round up to a whole day.
        $absDays = ($diff->days + (int)(($diff->h * 60 ** 2 + $diff->i * 60 + $diff->s + ceil($diff->f)) / 86400));
        $days = $absDays * ($diff->invert ? -1 : 1);

        // Absolute.
        if ($absDays > 30) {
            return $date->format($format);
        }

        // Relative.
        return match ($days) {
            -1 => 'yesterday',
            0 => 'today',
            1 => 'tomorrow',
            default => "$absDays days" . ($days < 0 ? ' ago' : ''),
        };
    }
}
