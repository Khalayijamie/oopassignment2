<?php

interface DatabaseConfiguration {
    public static function getHost();
    public static function getDBName();
    public static function getUser();
    public static function getPassword();
}

class Config implements DatabaseConfiguration {
    private static $dbHost = 'localhost';
    private static $dbName = 'user_db';
    private static $dbUser = 'root';
    private static $dbPassword = '';

    public static function getHost() {
        return self::$dbHost;
    }

    public static function getDBName() {
        return self::$dbName;
    }

    public static function getUser() {
        return self::$dbUser;
    }

    public static function getPassword() {
        return self::$dbPassword;
    }
}