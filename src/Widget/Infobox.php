<?php
namespace Dialog\Widget;

use Dialog\Box;

class Infobox extends Box
{
	protected $text = null;
	protected $box_string = '--infobox';

	public function __construct(string $text)
	{
		$this->text = $text;
	}

	public function getBoxOptionString(): string
	{
		$str = $this->box_string;

		$str .= " '{$this->text}' {$this->height} {$this->width}";

		return $str;
	}
}
