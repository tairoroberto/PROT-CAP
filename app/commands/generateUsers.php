<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Database\Schema\Blueprint;

class generateUsers extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'get:users';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Comando pra pegar usuarios do Active Directory e inserir na base de dados mysql.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
        $activeDirectory = new ActiveDirectory();
        $users = $activeDirectory->getUsers();

        Schema::dropIfExists('users_ad');
        Schema::create('users_ad', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('department');
            $table->string('company');
            $table->string('mail');
            $table->string('mobile');
            $table->string('telephonenumber');
            $table->string('pager');
            $table->timestamps();
        });

        try{
               foreach($users as $user){
                   $userAd = new UserActiveDirectory();
                   if(isset($user['cn'][0])){
                       $userAd->name = $user['cn'][0];
                   }
                   if(isset($user['department'][0])){
                       $userAd->department = $user['department'][0];
                   }
                   if(isset($user['company'][0])){
                       $userAd->company = $user['company'][0];
                   }
                   if(isset($user['mail'][0])){
                       $userAd->mail = $user['mail'][0];
                   }
                   if(isset($user['mobile'][0])){
                       $userAd->mobile = $user['mobile'][0];
                   }
                   if(isset($user['telephonenumber'][0])){
                       $userAd->telephonenumber = $user['telephonenumber'][0];
                   }
                   if(isset($user['pager'][0])){
                       $userAd->pager = $user['pager'][0];
                   }

                   $userAd->save();
               }
                return $this->info("Commando executado com sucesso!");
            }catch (Exception $e){
                return $this->info("Commando não pode ser executado!");
        }
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
        return [];
	}

}
