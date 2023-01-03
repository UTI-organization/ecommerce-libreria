<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit19d8cc98f2729e4e77cbe3a118ba3182
{
    public static $files = array (
        '7b11c4dc42b3b3023073cb14e519683c' => __DIR__ . '/..' . '/ralouphie/getallheaders/src/getallheaders.php',
        'c964ee0ededf28c96ebd9db5099ef910' => __DIR__ . '/..' . '/guzzlehttp/promises/src/functions_include.php',
        '6e3fae29631ef280660b3cdad06f25a8' => __DIR__ . '/..' . '/symfony/deprecation-contracts/function.php',
        '37a3dc5111fe8f707ab4c132ef1dbc62' => __DIR__ . '/..' . '/guzzlehttp/guzzle/src/functions_include.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
            'Psr\\Http\\Client\\' => 16,
            'PaymentPlugins\\WooCommerce\\PPCP\\' => 32,
            'PaymentPlugins\\PayPalSDK\\' => 25,
            'PaymentPlugins\\PPCP\\WooFunnels\\' => 31,
            'PaymentPlugins\\PPCP\\Stripe\\' => 27,
            'PaymentPlugins\\PPCP\\MondialRelay\\' => 33,
            'PaymentPlugins\\PPCP\\CheckoutWC\\' => 31,
            'PaymentPlugins\\PPCP\\Blocks\\' => 27,
        ),
        'G' => 
        array (
            'GuzzleHttp\\Psr7\\' => 16,
            'GuzzleHttp\\Promise\\' => 19,
            'GuzzleHttp\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
            1 => __DIR__ . '/..' . '/psr/http-factory/src',
        ),
        'Psr\\Http\\Client\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-client/src',
        ),
        'PaymentPlugins\\WooCommerce\\PPCP\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'PaymentPlugins\\PayPalSDK\\' => 
        array (
            0 => __DIR__ . '/..' . '/paymentplugins/paypal-php-sdk/src',
        ),
        'PaymentPlugins\\PPCP\\WooFunnels\\' => 
        array (
            0 => __DIR__ . '/../..' . '/packages/woofunnels/src',
        ),
        'PaymentPlugins\\PPCP\\Stripe\\' => 
        array (
            0 => __DIR__ . '/../..' . '/packages/stripe/src',
        ),
        'PaymentPlugins\\PPCP\\MondialRelay\\' => 
        array (
            0 => __DIR__ . '/../..' . '/packages/mondial-relay/src',
        ),
        'PaymentPlugins\\PPCP\\CheckoutWC\\' => 
        array (
            0 => __DIR__ . '/../..' . '/packages/checkoutwc/src',
        ),
        'PaymentPlugins\\PPCP\\Blocks\\' => 
        array (
            0 => __DIR__ . '/../..' . '/packages/blocks/src',
        ),
        'GuzzleHttp\\Psr7\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/psr7/src',
        ),
        'GuzzleHttp\\Promise\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/promises/src',
        ),
        'GuzzleHttp\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/guzzle/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit19d8cc98f2729e4e77cbe3a118ba3182::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit19d8cc98f2729e4e77cbe3a118ba3182::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit19d8cc98f2729e4e77cbe3a118ba3182::$classMap;

        }, null, ClassLoader::class);
    }
}
