<?php

namespace J4kim\Cadeau;

class Config
{
    private static object $configOject;

    public static function loadConfig(): void
    {
        if (!isset(self::$configOject)) {
            $strConfig = file_get_contents("../config.json");
            self::$configOject = json_decode($strConfig);
        }
    }

    public static function __callStatic(string $property, ?array $arguments): mixed
    {
        self::loadConfig();
        $default = @$arguments[0] ?? null;
        return @self::$configOject->$property ?? $default;
    }

    public static function store(array $settings): void
    {
        self::loadConfig();
        $merged = array_merge((array) self::$configOject, $settings);
        file_put_contents("../config.json", json_encode($merged, JSON_PRETTY_PRINT));
    }
}
