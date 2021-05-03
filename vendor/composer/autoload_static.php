<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5f432c87fccb0f4dc59e9b12263d2d8f
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PhpRouter\\Src\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PhpRouter\\Src\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5f432c87fccb0f4dc59e9b12263d2d8f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5f432c87fccb0f4dc59e9b12263d2d8f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5f432c87fccb0f4dc59e9b12263d2d8f::$classMap;

        }, null, ClassLoader::class);
    }
}
