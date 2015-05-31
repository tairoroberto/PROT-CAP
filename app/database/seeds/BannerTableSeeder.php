<?php

class BannerTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('banner')->truncate();

		$banner = array(
            array('id' => '1','width' => '100%','height' => '150px','color_background' => '#FFFFFF','color_background_path' => 'packages/assets/image/menu/gradiente46.png','time' => '3000','created_at' => '2015-02-12 00:00:00','updated_at' => '2015-04-14 22:29:50')
		);

		// Uncomment the below to run the seeder
		 DB::table('banner')->insert($banner);
	}

}
