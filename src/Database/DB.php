<?php


namespace MyProject\Database;
use MyProject\Core\App;
/**
 *
 * @return \mysqli
 * @throws \Exception
 */

class DB
{
    private static $self;

    public static function makeConnection() {
        if (empty(self::$self)) {
            self::$self = new \mysqli(
              App::get('config/app')['database']['host'],
              App::get('config/app')['database']['username'],
              App::get('config/app')['database']['password'],
              App::get('config/app')['database']['database']
            );
        }

        return self::$self;
    }
}