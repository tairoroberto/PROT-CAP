<?php
class AniversarioController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $mes = date('m');
        $usersBirthdayArray = array();

        if(!Cache::has("usersBirthday")){

            Artisan::call('get:users');
            $users = UserActiveDirectory::where('pager','!=','')->get();
            foreach($users as $user){
                if(isset($user->pager)){
                    $birthday =  explode('/',$user->pager);
                    if (isset($birthday[1])) {
                        if($birthday[1] == $mes){
                            $usersBirthdayArray[] = $user;
                        }
                    }
                }
            }

            Cache::put("usersBirthday",$usersBirthdayArray,60*12);
        }

        $usersBirthday = Cache::get("usersBirthday");

        return View::make("prot-cap.aniversarios",compact('usersBirthday'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('aniversarios.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('aniversarios.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('aniversarios.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
