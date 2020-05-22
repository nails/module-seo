<?php

/**
 * This class renders the robots.txt file
 *
 * @package     Nails
 * @subpackage  module-seo
 * @category    Controller
 * @author      Nails Dev Team
 */

use App\Controller\Base;
use Nails\Seo\Interfaces;

/**
 * Class Robots
 */
class Robots extends Base
{
    public function index()
    {
        $aUserAgents = [];
        foreach (\Nails\Components::available() as $oComponent) {

            $aClasses = $oComponent
                ->findClasses('Seo\\Robots\\UserAgent')
                ->whichImplement(Interfaces\Robots\UserAgent::class);

            /** @var Interfaces\Robots\UserAgent $sClass */
            foreach ($aClasses as $sClass) {
                if (in_array(\Nails\Environment::get(), $sClass::appliesTo())) {
                    $aUserAgents[] = new $sClass();
                }
            }
        }

        if (empty($aUserAgents)) {
            show404();
        }

        usort($aUserAgents, function (Interfaces\Robots\UserAgent $oA, Interfaces\Robots\UserAgent $oB) {
            return $oA->priority() <=> $oB->priority();
        });

        /** @var Interfaces\Robots\UserAgent $oUserAgent */
        foreach ($aUserAgents as $oUserAgent) {
            echo 'User-Agent: ' . $oUserAgent->userAgent() . "\n";
            foreach ($oUserAgent->disallow() as $sUrl) {
                echo 'Disallow: ' . $sUrl . "\n";
            }
            foreach ($oUserAgent->allow() as $sUrl) {
                echo 'Allow: ' . $sUrl . "\n";
            }
            echo 'crawl-delay: ' . $oUserAgent->crawlDelay() . "\n";
            echo "\n";
        }
    }
}
