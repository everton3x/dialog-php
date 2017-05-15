<?php
namespace Dialog\Widgets;

class Passwordbox extends \Dialog\Widgets\Inputbox
{
    public function __construct(string $text, string $init = '')
    {
        parent::__construct($text, $init);
        $this->widget = 'passwordbox';
    }
    
}