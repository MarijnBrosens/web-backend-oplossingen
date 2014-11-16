<?php 

class Percent{

	public $absolute;
	public $relative;
	public $hundred;
	public $nominal;

	public function __construct($new,$unit)
	{
		$this->$absolute 	= formatNumber($new/$unit);
		$this->$relative 	= formatNumber($this->$absolute-1);
		$this->$hundred		= formatNumber($this->$absolute*100);
		$this->$nominal		= '';

		if ($this->$absolute > 1) {
			$this->$nominal = 'positive';
		}elseif ($this->$absolute == 1) {
			$this->nominal = 'status quo';
		}else{
			$this->nominal = 'negative';
		}

		public function formatNumber($number)
		{
			number_format($number,2);
		}
}



?>