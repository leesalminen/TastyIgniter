<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd0fdf28971fd195c6c1ca04dfe42995f
{
    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'Mailchimp' => 
            array (
                0 => __DIR__ . '/..' . '/mailchimp/mailchimp/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Mailchimp' => __DIR__ . '/..' . '/mailchimp/mailchimp/src/Mailchimp.php',
        'Mailchimp_Campaigns' => __DIR__ . '/..' . '/mailchimp/mailchimp/src/Mailchimp/Campaigns.php',
        'Mailchimp_Conversations' => __DIR__ . '/..' . '/mailchimp/mailchimp/src/Mailchimp/Conversations.php',
        'Mailchimp_Ecomm' => __DIR__ . '/..' . '/mailchimp/mailchimp/src/Mailchimp/Ecomm.php',
        'Mailchimp_Folders' => __DIR__ . '/..' . '/mailchimp/mailchimp/src/Mailchimp/Folders.php',
        'Mailchimp_Gallery' => __DIR__ . '/..' . '/mailchimp/mailchimp/src/Mailchimp/Gallery.php',
        'Mailchimp_Goal' => __DIR__ . '/..' . '/mailchimp/mailchimp/src/Mailchimp/Goal.php',
        'Mailchimp_Helper' => __DIR__ . '/..' . '/mailchimp/mailchimp/src/Mailchimp/Helper.php',
        'Mailchimp_Lists' => __DIR__ . '/..' . '/mailchimp/mailchimp/src/Mailchimp/Lists.php',
        'Mailchimp_Mobile' => __DIR__ . '/..' . '/mailchimp/mailchimp/src/Mailchimp/Mobile.php',
        'Mailchimp_Neapolitan' => __DIR__ . '/..' . '/mailchimp/mailchimp/src/Mailchimp/Neapolitan.php',
        'Mailchimp_Reports' => __DIR__ . '/..' . '/mailchimp/mailchimp/src/Mailchimp/Reports.php',
        'Mailchimp_Templates' => __DIR__ . '/..' . '/mailchimp/mailchimp/src/Mailchimp/Templates.php',
        'Mailchimp_Users' => __DIR__ . '/..' . '/mailchimp/mailchimp/src/Mailchimp/Users.php',
        'Mailchimp_Vip' => __DIR__ . '/..' . '/mailchimp/mailchimp/src/Mailchimp/Vip.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInitd0fdf28971fd195c6c1ca04dfe42995f::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitd0fdf28971fd195c6c1ca04dfe42995f::$classMap;

        }, null, ClassLoader::class);
    }
}
