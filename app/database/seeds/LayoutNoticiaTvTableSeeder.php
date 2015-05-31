<?php

class LayoutNoticiaTvTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('layout_noticia_tv')->truncate();

		$layout_noticia_tv = array(
            array('id' => '1','width_main' => '75%','height_main' => '530px','show_title_main' => 'block','show_subtitle_main' => 'block','width_side' => '25%','height_side' => '125px','show_main' => 'block','show_side' => 'block','background_color' => '#FFFFFF','color_background_path' => 'packages/assets/image/menu/gradiente46.png','color_title' => '#D40000','color_title_path' => 'packages/assets/image/menu/gradiente11.png','color_subtitle' => '#333333','color_subtitle_path' => 'packages/assets/image/menu/gradiente37.png','created_at' => '2015-02-18 18:45:04','updated_at' => '2015-02-20 21:06:12')
		);

		// Uncomment the below to run the seeder
		 DB::table('layout_noticia_tv')->insert($layout_noticia_tv);
	}

}
