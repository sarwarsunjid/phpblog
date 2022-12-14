<?php

namespace Sunjid\Phpblog\Classes;

use Exception;
use mysqli;
use Sunjid\Phpblog\Exception\DatabaseException;
use const Sunjid\Phpblog\Config\DATABASE;
use const Sunjid\Phpblog\Config\HOST;
use const Sunjid\Phpblog\Config\PASSWORD;
use const Sunjid\Phpblog\Config\USER;


class Connection
{
    /**
     * @var
     */
    private static $instance;

    /**
     * This is the static method that controls the access to the singleton
     * instance. On the first run, it creates a singleton object and places it
     * into the static field. On subsequent runs, it returns the client existing
     * object stored in the static field.
     *
     * This implementation lets you subclass the Singleton class while keeping
     * just one instance of each subclass around.
     * @throws Exception
     */
    public static function getInstance()
    {

        if (!isset(self::$instance)) {
            (new self)->connect();
        }

        return self::$instance;
    }

    /**
     * @return void
     * @throws Exception
     */
    private function connect(): void
    {
        try {
            // realpath(dirname(__DIR__));
            self::$instance = new mysqli(HOST, USER, PASSWORD, DATABASE);
        } catch (Exception $e) {
            throw new DatabaseException('Database connection error ' . $e->getMesSuge());
        }
    }
}