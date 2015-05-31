<?php

class LinksTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('links')->truncate();

		$links = array(
            array('id' => '1','title' => 'RH online','link' => 'http://portalrh.protcap.com.br:8181/ ','created_at' => '2015-03-31 16:15:09','updated_at' => '2015-03-31 16:15:09'),
            array('id' => '2','title' => 'Help desk','link' => 'http://helpdesk.protcap.com.br:8585/glpi/','created_at' => '2015-03-31 16:15:25','updated_at' => '2015-03-31 16:15:25'),
            array('id' => '3','title' => 'Site Protcap','link' => 'http://protcap.com.br','created_at' => '2015-05-08 23:38:58','updated_at' => '2015-05-08 23:38:58'),
            array('id' => '4','title' => 'Site Bunzl','link' => 'http://bunzl.com.br','created_at' => '2015-05-08 23:39:11','updated_at' => '2015-05-08 23:39:11')
		);

		// Uncomment the below to run the seeder
		 DB::table('links')->insert($links);
	}

}
