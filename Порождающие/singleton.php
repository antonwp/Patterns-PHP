<?php

final class Connection
{
    private static ?self $instance = null;
    private static string $name;

    /**
     * @return string
     */
    public static function getName()
    {
        return self::$name;
    }

    /**
     * @param string $name
     */
    public static function setName($name)
    {
        self::$name = $name;
    }

    /**
     * @return Connection|null
     */
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function __clone(): void
    {
        // TODO: Implement __clone() method.
    }

    public function __wakeup(): void
    {
        // TODO: Implement __wakeup() method.
    }
}