<?php 


	class Bieren extends Controller
	{
		public function __construct()
		{
			var_dump("hallo vanuit de bieren controller");
			$this->bierenOverzicht();
		}

		private function bierenOverzicht()
		{
			var_dump("hallo vanuit bierenoverzicht");
			$bierenModel = new Bieren_Model;
		}
	}


 ?>