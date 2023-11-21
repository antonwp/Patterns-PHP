<?php

interface SF_Worker
{
    public function work();
}
class SF_Developer implements SF_Worker
{
    public function work()
    {
        printf('im developing');
    }
}

class SF_Designer implements SF_Worker
{
    public function work()
    {
        printf('im designing');
    }
}

class SF_WorkerFactory
{
    public static function make($workerTitle): ?SF_Worker
    {
        $ClassName = strtoupper($workerTitle);

        if (class_exists($ClassName)) {
            return new $ClassName;
        }
        return null;
    }
}

$developer = SF_WorkerFactory::make('SF_Developer');

$developer->work();