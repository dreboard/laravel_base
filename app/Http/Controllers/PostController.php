<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class PostController
 * @package App\Http\Controllers
 */
class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function ajaxRequest()
    {
        return view('ajaxRequest');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function ajaxRequestPost(Request $request)
    {
        //$input = request()->all();
        $input = [];
        $name = $request->input( 'name' );
        $password = $request->input( 'password' );
        $email = $request->input( 'email' );
        return response()->json(['name' => $name, 'password' => $password, 'email' => $email]);
    }

}
