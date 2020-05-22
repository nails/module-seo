<?php

namespace Nails\Seo\Factory\Robots;

use Nails\Environment;
use Nails\Seo\Interfaces;

/**
 * Class UserAgent
 *
 * @package Nails\Seo\Factory\Robots
 */
abstract class UserAgent implements Interfaces\Robots\UserAgent
{
    /**
     * The priority of the definition
     *
     * @return int
     */
    public function priority(): int
    {
        return 1000;
    }

    // --------------------------------------------------------------------------

    /**
     * An array of environments which this user agent applies to
     *
     * @return array
     */
    public static function appliesTo(): array
    {
        return Environment::available();
    }

    // --------------------------------------------------------------------------

    /**
     * The URL patterns to disallow
     *
     * @return string[]
     */
    public function disallow(): array
    {
        return [];
    }

    // --------------------------------------------------------------------------

    /**
     * The URL patterns to allow
     *
     * @return string[]
     */
    public function allow(): array
    {
        return [];
    }

    // --------------------------------------------------------------------------

    /**
     * How long the crawler should wait
     *
     * @return int
     */
    public function crawlDelay(): int
    {
        return 0;
    }
}
