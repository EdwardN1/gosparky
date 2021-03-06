<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita2122d1682b254ec2f79d7ce958b8d2f
{
    public static $files = array (
        'c2a38f3c111752c08b9c635b74c5c062' => __DIR__ . '/../..' . '/includes/core.php',
        '5eec9d9e411935cf3bf6a02a459e8cac' => __DIR__ . '/../..' . '/includes/functions.php',
        'de80a375a1171e99660481287e3d90b0' => __DIR__ . '/../..' . '/includes/settings-api.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Prodcut_Gallery_Sldier\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Prodcut_Gallery_Sldier\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita2122d1682b254ec2f79d7ce958b8d2f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita2122d1682b254ec2f79d7ce958b8d2f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
