<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2b92b987cdb2f2aad6e6130f5cedb10e
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'FPDF' => __DIR__ . '/..' . '/setasign/fpdf/fpdf.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit2b92b987cdb2f2aad6e6130f5cedb10e::$classMap;

        }, null, ClassLoader::class);
    }
}