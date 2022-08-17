<?php


class Connection
{
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
    private function connect()
    {
        try {
            $path = realpath(dirname(__DIR__));
            include_once $path . '/config/database.php';
            self::$instance = new mysqli(HOST, USER, PASSWORD, DATABASE);
        } catch (Exception $e) {
            throw new \RuntimeException('Database connection error ' . $e->getMessage());
        }


    }
}