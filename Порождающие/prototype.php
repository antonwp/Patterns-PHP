<?php
abstract class PeoplePrototype
{
    protected string $name;
    protected string $position;

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

    /**
     * @return string
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * @param string $position
     */
    public function setPosition(string $position): void
    {
        $this->position = $position;
    }
}

class Devops extends PeoplePrototype
{
    protected string $position = 'DevOps';
}

$developer = new Devops();
$developer2 = clone $developer;
$developer2->setName('Boris');

var_dump($developer2->getName());