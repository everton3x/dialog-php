<?php
namespace Dialog\Widgets;

class Infobox extends \Dialog\Options\Box
{
    
    public function __construct(string $text)
    {
        parent::__construct('infobox', $text, 0, 0);
    }
    
    public function parseToString(): string
    {
        return $box_options = parent::parseToString();
        
    }
    
}