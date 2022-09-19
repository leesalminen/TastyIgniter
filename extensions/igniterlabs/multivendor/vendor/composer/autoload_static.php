<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0cb212ce9cb8ecdc1b6bd3378e930e75
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'IgniterLabs\\CommissionCalculator\\' => 33,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'IgniterLabs\\CommissionCalculator\\' => 
        array (
            0 => __DIR__ . '/..' . '/igniter-labs/commission-calculator/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'IgniterLabs\\CommissionCalculator\\Calculator' => __DIR__ . '/..' . '/igniter-labs/commission-calculator/src/Calculator.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0cb212ce9cb8ecdc1b6bd3378e930e75::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0cb212ce9cb8ecdc1b6bd3378e930e75::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0cb212ce9cb8ecdc1b6bd3378e930e75::$classMap;

        }, null, ClassLoader::class);
    }
}
