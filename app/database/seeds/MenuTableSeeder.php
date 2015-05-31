<?php

class MenuTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('menu')->truncate();

		$menu = array(
            array('id' => '1','menu_color' => 'packages/assets/image/menu/gradiente48.png','menu_selected_color' => '#9ACD32','menu_selected_color_path' => 'packages/assets/image/menu/gradiente45.png','menu_titulo_color' => 'rgba(153,204,102,0.9)','menu_titulo_color_path' => 'packages/assets/image/menu/gradiente47.png','menu_font_color' => '#666666','menu_font_color_path' => 'packages/assets/image/menu/gradiente37.png','created_at' => '2015-02-12 21:12:33','updated_at' => '2015-04-14 15:04:07')
		);

		// Uncomment the below to run the seeder
		 DB::table('menu')->insert($menu);
	}

}
