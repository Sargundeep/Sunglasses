<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdb5f6693f9e04dd92190d9460b74a9e1
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdb5f6693f9e04dd92190d9460b74a9e1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdb5f6693f9e04dd92190d9460b74a9e1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdb5f6693f9e04dd92190d9460b74a9e1::$classMap;

        }, null, ClassLoader::class);
    }
}