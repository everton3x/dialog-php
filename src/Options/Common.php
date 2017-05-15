<?php
namespace Dialog\Options;

class Common extends \Dialog\Options
{
    public function __construct(?array ...$option)
    {
        parent::__construct(...$option);
    }
}