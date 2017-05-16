<?php
namespace Dialog\Widgets;

class Yesno extends \Dialog\Options\Box
{
    
    public function __construct(string $text)
    {
        parent::__construct('yesno', $text, 0, 0);
    }
    
    public function parseToString(): string
    {
        return $box_options = parent::parseToString();
    }
}
