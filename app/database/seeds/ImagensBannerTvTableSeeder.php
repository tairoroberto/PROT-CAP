<?php

class ImagensBannerTvTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('imagens_banner_tv')->truncate();

		$imagens_banner_tv = array(
            array('id' => '1','image_path' => 'packages/assets/image/banner/tv/630bd13c461302be894cba7ca52d0281.jpeg','old_name' => 'banner1.jpeg','position' => '1','id_banner_tv' => '1','created_at' => '2015-05-08 23:42:16','updated_at' => '2015-05-08 23:42:29'),
            array('id' => '2','image_path' => 'packages/assets/image/banner/tv/b28229e2e9e6ac0c65deea3a3648fd10.png','old_name' => 'banner2.png','position' => '2','id_banner_tv' => '1','created_at' => '2015-05-08 23:42:22','updated_at' => '2015-05-08 23:42:32'),
            array('id' => '3','image_path' => 'packages/assets/image/banner/tv/bfb5bf436c35ba9eba1dc3ae71c73aa3.jpeg','old_name' => 'banner3.jpeg','position' => '3','id_banner_tv' => '1','created_at' => '2015-05-08 23:42:26','updated_at' => '2015-05-08 23:42:34')
		);

		// Uncomment the below to run the seeder
		 DB::table('imagens_banner_tv')->insert($imagens_banner_tv);
	}

}
