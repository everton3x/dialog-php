<?php
namespace Dialog\Widgets;

class Tailbox extends \Dialog\Options\Box
{
    public function __construct(string $file)
    {
        parent::__construct('tailbox', $file, 0, 0);
    }
    
    public function parseToString(): string
    {
        return "--{$this->widget} '{$this->text}' {$this->height} {$this->width}";
    }
}
