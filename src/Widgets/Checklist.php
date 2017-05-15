<?php
namespace Dialog\Widgets;

class Checklist extends \Dialog\Widgets\Buildlist
{
    
    public function __construct(string $text, int $list_height = 0, \Dialog\Options\Item ...$items)
    {
        parent::__construct($text, $list_height, ...$items);
        $this->widget = 'checklist';
    }
    
    public function parseToString(): string
    {
        $box_options = parent::parseToString();
        
        return $box_options;
    }
    
    public function items(): array
    {
        $selected = $this->output();
        if ($this->common_options->separate_output === true) {
            if ($this->common_options->separator === null) {
                $separator = PHP_EOL;
            } else {
                $separator = $this->common_options->separator;
            }

            $selected = explode($separator, $selected);
            array_pop($selected);
        } else {
            $selected = explode(" ", $selected);
        }

        return $selected;
    }
    
}