<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd0d92d187df0ee243b11c3ccc1730ead
{
    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'Esteban\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Esteban\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitd0d92d187df0ee243b11c3ccc1730ead::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd0d92d187df0ee243b11c3ccc1730ead::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd0d92d187df0ee243b11c3ccc1730ead::$classMap;

        }, null, ClassLoader::class);
    }
}
