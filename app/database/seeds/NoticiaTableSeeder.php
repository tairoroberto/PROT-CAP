<?php

class NoticiaTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('noticia')->truncate();

		$noticia = array(
            array('id' => '1','title' => 'Dicas','subtitle' => 'Dicas para seu dia render melhor','position' => '4','created_at' => '2015-05-08 23:43:37','updated_at' => '2015-05-08 23:45:30'),
            array('id' => '2','title' => 'Novo Video Institucional','subtitle' => 'No ar, a nova sede da PROT-CAP','position' => '1','created_at' => '2015-05-08 23:44:05','updated_at' => '2015-05-08 23:44:59'),
            array('id' => '3','title' => 'Politica','subtitle' => 'Politica de qualidade','position' => '2','created_at' => '2015-05-08 23:44:26','updated_at' => '2015-05-08 23:45:20'),
            array('id' => '4','title' => 'Preparem-se','subtitle' => 'Auditória interna de certificação','position' => '3','created_at' => '2015-05-08 23:44:52','updated_at' => '2015-05-08 23:45:26')
		);

		// Uncomment the below to run the seeder
		DB::table('noticia')->insert($noticia);
	}

}
