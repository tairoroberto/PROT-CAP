<?php

class MidiaNoticiaTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('midia_noticia')->truncate();

		$midia_noticia = array(
            array('id' => '1','link' => 'packages/assets/image/noticia/b6c6a8da462658a16560a45e59a55492.jpeg','text' => 'packages/assets/image/cardapio/b6c6a8da462658a16560a45e59a55492.jpeg','type' => 'imagem','type_video' => '','video_old_name' => '','image_old_name' => 'image_3_1920x870.jpeg','id_noticia' => '1','created_at' => '2015-05-08 23:43:37','updated_at' => '2015-05-08 23:43:37'),
            array('id' => '2','link' => 'packages/assets/image/noticia/8b3e8db92736a7312977a42be410c770.mp4','text' => '','type' => 'video','type_video' => 'Arquivo','video_old_name' => 'Filme.mp4','image_old_name' => '','id_noticia' => '2','created_at' => '2015-05-08 23:44:05','updated_at' => '2015-05-08 23:44:05'),
            array('id' => '3','link' => 'packages/assets/image/noticia/282492660cfba94d502466d0aa454979.jpeg','text' => 'packages/assets/image/cardapio/282492660cfba94d502466d0aa454979.jpeg','type' => 'imagem','type_video' => '','video_old_name' => '','image_old_name' => 'image_1_1920x870.jpeg','id_noticia' => '3','created_at' => '2015-05-08 23:44:26','updated_at' => '2015-05-08 23:44:26'),
            array('id' => '4','link' => 'packages/assets/image/noticia/e7b3d17717783b3214797cab470a1af7.jpeg','text' => 'packages/assets/image/cardapio/e7b3d17717783b3214797cab470a1af7.jpeg','type' => 'imagem','type_video' => '','video_old_name' => '','image_old_name' => 'image_2_1920x870.jpeg','id_noticia' => '4','created_at' => '2015-05-08 23:44:52','updated_at' => '2015-05-08 23:44:52')
		);

		// Uncomment the below to run the seeder
		DB::table('midia_noticia')->insert($midia_noticia);
	}

}
