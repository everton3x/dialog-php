<?php
namespace Dialog;

abstract class Box
{
	protected $text = false;
	protected $height = 0;
	protected $width = 0;

	public function setText(string $text): void
	{
		$this->text = $text;
		return;
	}

	public function setHeight(int $height): void
	{
		$this->height = $height;
		return;
	}

	public function setWidth(int $width): void
	{
		$this->width = $width;
		return;
	}

	abstract public function getBoxOptionString(): string;
}
