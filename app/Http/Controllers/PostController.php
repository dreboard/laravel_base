<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Models\Coin;
use App\Http\Models\CoinType;
use Coins\Traits\CoinHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use Coins\Exceptions\UnknownCoinException;

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
    public function ajaxRequestPost()
    {
        $input = request()->all();
        //dd($input);

        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }

}
