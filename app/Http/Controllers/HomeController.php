<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Models\Coin;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('area.home', ['coins' => config('coins.default')]);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function testFunc()
    {

        $coins = Coin::where('coinType', 'Lincoln Memorial')->orderBy('coinYear', 'desc')->get();

        return view('area.home', ['coins' => $coins]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function profile(Request $request)
    {
        $data = $request->session()->all();
        return view('profile.view', ['data' => $data]);
    }
}
