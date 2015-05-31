<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('CardapioTableSeeder');
		$this->call('BannerTableSeeder');
		$this->call('LayoutNoticiaTableSeeder');
		$this->call('LayoutNoticiaTvTableSeeder');
		$this->call('MenuTableSeeder');		
		$this->call('BannerTvTableSeeder');
		$this->call('ImagensBannerTableSeeder');
		$this->call('ImagensBannerTvTableSeeder');
		$this->call('NoticiaTableSeeder');
		$this->call('MidiaNoticiaTableSeeder');
		$this->call('LinksTableSeeder');
		$this->call('DocumentoTableSeeder');
		$this->call('LogDocumentoTableSeeder');
	}

}
