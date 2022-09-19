<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitdf90a9f6e0f9dee16244aac65fed88cd
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitdf90a9f6e0f9dee16244aac65fed88cd', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitdf90a9f6e0f9dee16244aac65fed88cd', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitdf90a9f6e0f9dee16244aac65fed88cd::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
