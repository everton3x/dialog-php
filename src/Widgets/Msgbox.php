<?php
namespace Dialog\Widgets;

class Msgbox extends \Dialog\Options\Box
{
    
    public function __construct(string $text)
    {
        parent::__construct('msgbox', $text, 0, 0);
    }
    
    public function parseToString(): string
    {
        return $box_options = parent::parseToString();
    }
}
