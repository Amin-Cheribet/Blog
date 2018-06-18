<?php

namespace Service;

class Configuration
{
    public static $configuration;

    public function __construct()
    {
        $data = file_get_contents(rootDir().'/config.json');
        static::$configuration = json_decode($data);
    }
}
