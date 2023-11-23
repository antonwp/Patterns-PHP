<?php

interface Renderable {
    public function render(): string;
}

class Mail implements Renderable
{
    private array $parts = [];

    public function render(): string
    {
        $result = '';
        foreach ($this->parts as $part) {
            $result .= $part->render();
        }
        return $result;
    }

    /**
     * @param array $parts
     */
    public function addParts(Renderable $parts): void
    {
        $this->parts[] = $parts;
    }
}

abstract class Part
{
    private string $text;

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text . PHP_EOL;
    }

    /**
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }
}

class Header extends Part implements Renderable
{
    public function render(): string
    {
        return $this->getText();
    }
}

class Body extends Part implements Renderable
{
    public function render(): string
    {
        return $this->getText();
    }
}

class Footer extends Part implements Renderable
{
    public function render(): string
    {
        return $this->getText();
    }
}

$mail = new Mail();
$mail->addParts(new Header('Header'));
$mail->addParts(new Body('Body'));
$mail->addParts(new Footer('Footer'));

var_dump($mail->render());