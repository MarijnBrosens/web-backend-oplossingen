<?php 

	Class TodosTableSeeder extends Seeder {

		public function run()
		{
			DB::table( 'todos' )->delete();

			$todos = array(

				array(

					'userId' => 1,
					'todoTitle' => 'title1',
					'todoDetails' => 'details1',
					'isDone' => false,
					'isArchived' => false

				),

				array(

					'userId' => 1,
					'todoTitle' => 'title2',
					'todoDetails' => 'details2',
					'isDone' => true,
					'isArchived' => false

				),

				array(

					'userId' => 1,
					'todoTitle' => 'title3',
					'todoDetails' => 'details3',
					'isDone' => false,
					'isArchived' => false

				)

			);

			DB::table( 'todos' )->insert( $todos );
		}

	}


 ?>