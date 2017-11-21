<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware( 'auth' );
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view( 'area.home' );
	}


	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function smallCent() {

		return view( 'area.smallCent' );
	}

	/**
	 * @param Request $request
	 * @param \Illuminate\Validation\Factory $validator
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function searching(Request $request, \Illuminate\Validation\Factory $validator) {
		$validation = $validator->make( $request->all(),
			[
				'search' => 'required|max:22|alpha_num|min:2'
			]
		);
		if($validation->fails()){
			return redirect()->back()->withErrors($validation);
		}
		return view( 'area.search', ['search' => $request->input('search')] );
		//return view( 'area.search', ['search' => $request->input('search')] );
		return redirect()
			->route('displaySearch');
			//->with('info', "You searched for {$request->input('search')}");
		/*$this->validate($request,[
			'search'=>'required|max:22',
		]);*/
		//$search = $request->input('search');
		//return redirect('area.search', ['search' => $search])->with('status', 'You have successfully searched!');
		//
	}

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	protected function profile(Request $request) {
		$data = $request->session()->all();
		return view( 'profile.view', ['data' => $data] );
	}
}
