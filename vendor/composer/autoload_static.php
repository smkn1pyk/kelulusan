<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd2a9e0331725d0dce73293a25ef58efc
{
    public static $prefixLengthsPsr4 = array (
        'c' => 
        array (
            'chriskacerguis\\RestServer\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'chriskacerguis\\RestServer\\' => 
        array (
            0 => __DIR__ . '/..' . '/chriskacerguis/codeigniter-restserver/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd2a9e0331725d0dce73293a25ef58efc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd2a9e0331725d0dce73293a25ef58efc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd2a9e0331725d0dce73293a25ef58efc::$classMap;

        }, null, ClassLoader::class);
    }
}
