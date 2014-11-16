<?php 

	class Percent{


		public $absolute;
		public $relative;
		public $hundred;
		public $nominal;

		public function __construct($new,$unit)
		{ 
			/*fout: $this->$absolute 	= $this->formatNumber($new/$unit);*/
			/*			   $            */
			/*juist:$this->absolute 	= $this->formatNumber($new/$unit);	*/		
			$this->absolute 	= $this->formatNumber($new/$unit);
			$this->relative 	= $this->formatNumber($this->absolute-1);
			/*fout: $this->relative 	= $this->formatNumber($this->$absolute-1);*/
			/*			   									 		 $            */
			/*juist:$this->relative 	= $this->formatNumber($this->absolute-1); */	
			$this->hundred		= $this->formatNumber($this->relative*100);


			$this->nominal 		=	"status-quo";

			if ( $this->hundred > 0)
			{
				$this->nominal	=	"positive";
			}
			elseif ( $this->hundred < 0 )
			{
				$this->nominal	=	"negative";
			}
		}	

	 	public function formatNumber( $number )
		{
			return number_format($number, 2, '.', ' ');
		}
	}

?>