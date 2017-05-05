<?php
namespace Dialog\Widget;

use Dialog\Box;
use DateTime;

class Calendar extends Box
{

	protected $date = null;
	protected $box_string = '--calendar';

	public function __construct(DateTime $date = null)
	{
		$this->text = 'Calendar';
		if(!is_null($date)){
			$this->date = $date;
		}else{
			$this->date = new DateTime();
		}

	}

	public function getBoxOptionString(): string
	{
		$str = $this->box_string;

		$str .= " '{$this->text}' {$this->height} {$this->width}";

		$day = $this->date->format('d');
		$month = $this->date->format('m');
		$year = $this->date->format('Y');

		$str .= " $day $month $year";


		return $str;
	}
}
