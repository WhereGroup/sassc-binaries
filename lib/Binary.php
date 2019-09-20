<?php

namespace Wheregroup\SasscBinaries;

use Wheregroup\PlatformDetect\Platform;

class Binary
{
    const VERSION_ID = 30100;   // version of bundled binaries

    /**
     * @return string
     */
    public static function pick()
    {
        $basePath = realpath(__DIR__ . '/../dist/');
        $platform = Platform::guess();
        switch ($platform->getFamily()) {
            case Platform::FAMILY_WINDOWS:
                return "{$basePath}/sassc.exe";
            case Platform::FAMILY_MACOS:
                return "{$basePath}/sassc.macosx";
            default:
                if ($platform->getBitness() < 64) {
                    return "{$basePath}/sassc.x86";
                } else {
                    return "{$basePath}/sassc";
                }
        }
    }
}
