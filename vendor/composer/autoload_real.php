<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitbbb4b26c7d3217dc76c88b260fab02ae
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

        spl_autoload_register(array('ComposerAutoloaderInitbbb4b26c7d3217dc76c88b260fab02ae', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitbbb4b26c7d3217dc76c88b260fab02ae', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitbbb4b26c7d3217dc76c88b260fab02ae::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
