<?php

class BannerTvTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('banner_tv')->truncate();

		$banner_tv = array(
            array('id' => '1','width' => '100%','height' => '150px','color_background' => '#FFFFFF','color_background_path' => 'packages/assets/image/menu/gradiente46.png','time' => '3000','created_at' => '2015-02-13 00:00:00','updated_at' => '2015-04-14 22:39:05')
		);

		// Uncomment the below to run the seeder
		 DB::table('banner_tv')->insert($banner_tv);
	}

}
