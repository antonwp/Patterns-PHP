<?php

interface AbstractFactory
{
    public static function makeToyotaAuto(): ToyotaAuto;
    public static function makeHondaAuto(): HondaAuto;
}

class PetrolAutoFactory implements AbstractFactory
{
    public static function makeToyotaAuto(): ToyotaAuto
    {
        return new PetrolToyotaAuto();
    }

    public static function makeHondaAuto(): HondaAuto
    {
        return new PetrolHondaAuto();
    }
}

class DieselAutoFactory implements AbstractFactory
{
    public static function makeToyotaAuto(): ToyotaAuto
    {
        return new DieselToyotaAuto();
    }

    public static function makeHondaAuto(): HondaAuto
    {
        return new DieselHondaAuto();
    }
}

interface Auto
{
    public function carsinfo();
}
interface ToyotaAuto extends Auto
{

}
interface HondaAuto extends Auto
{

}

class PetrolToyotaAuto implements ToyotaAuto
{
    public function carsinfo()
    {
        printf('Toyota on petrol engine');
    }
}

class DieselToyotaAuto implements ToyotaAuto
{
    public function carsinfo()
    {
        printf('Toyota on diesel engine');
    }
}

class PetrolHondaAuto implements HondaAuto
{
    public function carsinfo()
    {
        printf('Honda on petrol engine');
    }
}

class DieselHondaAuto implements HondaAuto
{
    public function carsinfo()
    {
        printf('Honda on diesel engine');
    }
}

// Тест
$petrolToyota = PetrolAutoFactory::makeToyotaAuto();
$dieselToyota = DieselAutoFactory::makeToyotaAuto();
$petrolHonda = PetrolAutoFactory::makeHondaAuto();
$dieselHonda = DieselAutoFactory::makeHondaAuto();

$petrolToyota->carsinfo();