<?php

/**
 * Generates SEO routes
 *
 * @package     Nails
 * @subpackage  module-seo
 * @category    Controller
 * @author      Nails Dev Team
 */

namespace Nails\Seo;

use Nails\Common\Interfaces\RouteGenerator;

/**
 * Class Routes
 *
 * @package Nails\Seo
 */
class Routes implements RouteGenerator
{
    /**
     * Returns an array of routes for this module
     *
     * @return array
     */
    public static function generate(): array
    {
        return [
            'robots\.txt' => 'seo/robots/index',
        ];
    }
}
