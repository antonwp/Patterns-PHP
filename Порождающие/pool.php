<?php

class WorkerPool {
    private array $freeWorkers = [];

    /**
     * @return array
     */
    public function getFreeWorkers(): array
    {
        return $this->freeWorkers;
    }

    /**
     * @param array $freeWorkers
     */
    public function setFreeWorkers(array $freeWorkers): void
    {
        $this->freeWorkers = $freeWorkers;
    }

    /**
     * @return array
     */
    public function getBusyWorkers(): array
    {
        return $this->busyWorkers;
    }

    /**
     * @param array $busyWorkers
     */
    public function setBusyWorkers(array $busyWorkers): void
    {
        $this->busyWorkers = $busyWorkers;
    }
    private array $busyWorkers = [];
    public function getWorker(): Rabotnik
    {
        if (count($this->freeWorkers) === 0) {
            $rabotnik = new Rabotnik();
        } else {
            $rabotnik = array_pop($this->freeWorkers);
        }

        $this->busyWorkers[spl_object_hash($rabotnik)] = $rabotnik;
        return $rabotnik;
    }

    public function release(Rabotnik $rabotnik)
    {
        $key = spl_object_hash($rabotnik);
        if(isset($this->busyWorkers[$key])) {
            unset($this->busyWorkers[$key]);
            $this->freeWorkers[$key] = $rabotnik;
        }
    }
}

class Rabotnik
{
    public function work()
    {
        printf('Im working');
    }
}

// Тест
$pool = new WorkerPool();
$rabotnik = $pool->getWorker();
$rabotnik2 = $pool->getWorker();
$rabotnik3 = $pool->getWorker();
$rabotnik->work();
echo PHP_EOL;
var_dump($pool->getBusyWorkers());
$pool->release($rabotnik3);
echo PHP_EOL;
var_dump($pool->getFreeWorkers());