<?php

class ImagensBannerTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('imagens_banner')->truncate();

		$imagens_banner = array(
            array('id' => '1','image_path' => 'packages/assets/image/banner/09d75341b4041d7a3ad282c5876d6a59.jpeg','old_name' => 'banner1.jpeg','position' => '1','id_banner' => '1','created_at' => '2015-05-08 23:41:30','updated_at' => '2015-05-08 23:42:02'),
            array('id' => '2','image_path' => 'packages/assets/image/banner/75aea15038dd9abe7067293b4b471e11.png','old_name' => 'banne2.png','position' => '2','id_banner' => '1','created_at' => '2015-05-08 23:41:45','updated_at' => '2015-05-08 23:42:06'),
            array('id' => '3','image_path' => 'packages/assets/image/banner/d0dbbcf15fdd6a978529b998dc54d179.jpeg','old_name' => 'banner3.jpeg','position' => '3','id_banner' => '1','created_at' => '2015-05-08 23:41:49','updated_at' => '2015-05-08 23:42:09')
		);

		// Uncomment the below to run the seeder
		 DB::table('imagens_banner')->insert($imagens_banner);
	}

}
