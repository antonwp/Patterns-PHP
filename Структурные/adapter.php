<?php

interface NativeWorker
{
    public function countSalary();
}

interface OutsourceWorker
{
    public function countSalaryByHour($hour);
}

class NativeDeveloper implements NativeWorker
{
    public function countSalary(): float|int
    {
        return 3000 * 20;
    }
}

class OutsourceDeveloper implements OutsourceWorker
{
    public function countSalaryByHour($hour): float|int
    {
        return $hour * 500;
    }
}

class OutsourceWorkerAdapter implements NativeWorker
{
    private OutsourceWorker $outsourceWorker;

    /**
     * @param OutsourceWorker $outsourceWorker
     */
    public function __construct(OutsourceWorker $outsourceWorker)
    {
        $this->outsourceWorker = $outsourceWorker;
    }

    public function countSalary(): int
    {
        return $this->outsourceWorker->countSalaryByHour(80);
    }
}

$nativeDeveloper = new NativeDeveloper();
$outsourceDeveloper = new OutsourceDeveloper();

$outsourceWorkerAdapter = new OutsourceWorkerAdapter($outsourceDeveloper);

var_dump($outsourceWorkerAdapter->countSalary());