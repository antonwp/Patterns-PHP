<?php

class ControllerConfiguration
{
    private string $name;
    private string $action;

    /**
     * @param string $name
     * @param string $action
     */
    public function __construct(string $name, string $action)
    {
        $this->name = $name;
        $this->action = $action;
    }

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
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction(string $action): void
    {
        $this->action = $action;
    }
}

class Controller
{
    private ControllerConfiguration $controllerConfiguration;

    /**
     * @param ControllerConfiguration $controllerConfiguration
     */
    public function __construct(ControllerConfiguration $controllerConfiguration)
    {
        $this->controllerConfiguration = $controllerConfiguration;
    }

    /**
     * @return ControllerConfiguration
     */
    public function getControllerConfiguration(): string
    {
        return $this->controllerConfiguration->getName() . '@' . $this->controllerConfiguration->getAction();
    }
}

$configuration = new ControllerConfiguration('postController', 'index');

$controller = new Controller($configuration);

var_dump($controller->getControllerConfiguration());