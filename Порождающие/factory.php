<?php

class Worker
{
    private string $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

}

class WorkerFactory
{
    public static function make(): Worker
    {
        return new Worker();
    }
}

// Тестирование
$worker = WorkerFactory::make();
$worker->setName('Anton');
var_dump($worker->getName());