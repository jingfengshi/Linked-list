<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitecc71c3e02e8d0b55dcb6569049eda10
{
    public static $prefixLengthsPsr4 = array (
        'J' => 
        array (
            'Jasper\\LinkedList\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Jasper\\LinkedList\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitecc71c3e02e8d0b55dcb6569049eda10::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitecc71c3e02e8d0b55dcb6569049eda10::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}