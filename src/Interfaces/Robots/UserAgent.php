<?php

/**
 * The Robots UserAgent interface
 *
 * @package     Nails
 * @subpackage  module-seo
 * @category    Interface
 * @author      Nails Dev Team
 */

namespace Nails\Seo\Interfaces\Robots;

/**
 * Interface UserAgent
 *
 * @package Nails\Seo\Interfaces\Robots
 */
interface UserAgent
{
    /**
     * The name of this useragent
     *
     * @return string
     */
    public function userAgent(): string;

    // --------------------------------------------------------------------------

    /**
     * The priority of the definition
     *
     * @return int
     */
    public function priority(): int;

    // --------------------------------------------------------------------------

    /**
     * An array of environments which this user agent applies to
     *
     * @return array
     */
    public static function appliesTo(): array;

    // --------------------------------------------------------------------------

    /**
     * The URL patterns to disallow
     *
     * @return string[]
     */
    public function disallow(): array;

    // --------------------------------------------------------------------------

    /**
     * The URL patterns to allow
     *
     * @return string[]
     */
    public function allow(): array;

    // --------------------------------------------------------------------------

    /**
     * How long the crawler should wait
     *
     * @return int
     */
    public function crawlDelay(): int;
}
