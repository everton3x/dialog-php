<?php
namespace Dialog\Widgets;

class Passwordform extends \Dialog\Widgets\Form
{
    public function __construct(string $text, int $formheight = 0, \Dialog\Options\Field ...$items)
    {
        parent::__construct($text, $formheight, ...$items);
        $this->widget = 'passwordform';
    }
}
