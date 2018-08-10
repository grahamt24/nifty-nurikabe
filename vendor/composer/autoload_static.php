<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf1b08a22d05389f8a2c55686a6398647
{
    public static $prefixLengthsPsr4 = array (
        'N' => 
        array (
            'Nurikabe\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Nurikabe\\' => 
        array (
            0 => __DIR__ . '/../..' . '/lib/Nurikabe',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf1b08a22d05389f8a2c55686a6398647::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf1b08a22d05389f8a2c55686a6398647::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}