<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TutorialController extends Controller
{
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index(  ) {
		$title = 'Tutorial Home';
		$script = "tuts.js";
		return view(
			'tutorial.tut',
			[
				'title' => $title,
				'search' => '',
				'script' => $script
			]);
    }

	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function search(Request $request) {
		$request->validate([
			'search' => 'required',
		]);
		$search = $request->input('search') ?? 'No Value';
		$title = 'Tutorial Home';
		return view(
			'tutorial.tut',
			[
				'title' => $title,
				'search' => $search
			]);
    }
}
