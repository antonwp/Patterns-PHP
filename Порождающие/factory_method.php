<?php

interface Cars
{
    public function car();
}

class Audi implements Cars
{
    public function car()
    {
        printf('Create Car Audi');
    }
}

class Bmw implements Cars {

    public function car()
    {
        printf('Create Car BMW');
    }
}

interface CarsFactory
{
    public static function make();
}

class AudiFactory implements CarsFactory
{
    public static function make()
    {
        return new Audi();
    }
}

class BmwFactory implements CarsFactory
{
    public static function make()
    {
        return new Bmw();
    }
}

// Тест
$audi = AudiFactory::make();
$bmw = BmwFactory::make();

$audi->car();
$bmw->car();