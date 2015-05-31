<?php

class CardapioTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('cardapio')->truncate();

		$cardapio = array(
            array('id' => '1','image_path' => 'packages/assets/image/cardapio/467be8be5c6c7b3a3d438c65b63a3128.jpeg','old_name' => 'Cardapio.jpeg','width' => '100%','height' => '630px','created_at' => '2015-02-19 00:00:00','updated_at' => '2015-05-08 23:40:58')
		);

		// Uncomment the below to run the seeder
		 DB::table('cardapio')->insert($cardapio);
	}

}
