<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit63f7f5463fa6f76deb6c6851237bd307
{
    public static $prefixLengthsPsr4 = array (
        'C' =>
        array (
            'Config\\' => 7,
        ),
        'A' =>
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Config\\' =>
        array (
            0 => __DIR__ . '/../..' . '/Config',
        ),
        'App\\' =>
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'App\\Controllers\\DayDiaryControllers' => __DIR__ . '/../..' . '/App/Controllers/DayDiaryControllers.php',
        'App\\Controllers\\UserControllers' => __DIR__ . '/../..' . '/App/Controllers/UserControllers.php',
        'App\\Models\\DayDiary' => __DIR__ . '/../..' . '/App/Models/Day_Diary.php',
        'App\\Models\\HoursDetail' => __DIR__ . '/../..' . '/App/Models/hours_detail.php',
        'App\\Models\\HoursDiary' => __DIR__ . '/../..' . '/App/Models/Hours_Diary.php',
        'App\\Models\\HumanBodyParts' => __DIR__ . '/../..' . '/App/Models/human_dody_parts.php',
        'App\\Models\\Order' => __DIR__ . '/../..' . '/App/Models/Order.php',
        'App\\Models\\OrderDetail' => __DIR__ . '/../..' . '/App/Models/OrderDetail.php',
        'App\\Models\\Services' => __DIR__ . '/../..' . '/App/Models/Services.php',
        'App\\Models\\User' => __DIR__ . '/../..' . '/App/Models/User.php',
        'App\\ServiceSql\\DayDiaryServiceSql' => __DIR__ . '/../..' . '/App/ServiceSql/DayDiaryServiceSql.php',
        'App\\ServiceSql\\HoursDetailServiceSql' => __DIR__ . '/../..' . '/App/ServiceSql/HoursDetailServiceSql.php',
        'App\\ServiceSql\\HoursDiaryServiceSql' => __DIR__ . '/../..' . '/App/ServiceSql/HoursDiaryServiceSql.php',
        'App\\ServiceSql\\HumanBodyPartsServiceSql' => __DIR__ . '/../..' . '/App/ServiceSql/HumanBodyPartsServiceSql.php',
        'App\\ServiceSql\\OrderServiceSql' => __DIR__ . '/../..' . '/App/ServiceSql/OrderServicesSql.php',
        'App\\ServiceSql\\ServicesServiceSql' => __DIR__ . '/../..' . '/App/ServiceSql/ServicesServiceSql.php',
        'App\\ServiceSql\\UserServiceSql' => __DIR__ . '/../..' . '/App/ServiceSql/UserServiceSql.php',
        'Config\\Database\\DbProvider' => __DIR__ . '/../..' . '/Config/Database/DbProvider.php',
        'Config\\Request' => __DIR__ . '/../..' . '/Config/Request.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit63f7f5463fa6f76deb6c6851237bd307::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit63f7f5463fa6f76deb6c6851237bd307::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit63f7f5463fa6f76deb6c6851237bd307::$classMap;

        }, null, ClassLoader::class);
    }
}
