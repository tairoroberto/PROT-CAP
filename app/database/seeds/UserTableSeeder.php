<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('users')->truncate();

		$user = array(
            array('id' => '1','username' => 'Admin','password' => '$2y$10$bgpc3jaUh6fry9/UCsVCT.ddrruILIe1NX.aVuFJxhUxSnlEJkh1W','email' => 'admin@nowsolucoes.com.br','full_name' => 'Admin','department' => 'tecnology','company' => 'my company','phone' => '(99)99999-9999','remember_token' => '6PHeko4aT9qXTHg19EAChohZkmQQO2WRoeWHwXCSUw5pF1303NkOc35DMMEI','created_at' => '2015-03-11 00:00:00','updated_at' => '2015-03-12 18:04:42')
		);

		// Uncomment the below to run the seeder
		DB::table('users')->insert($user);
	}

}
