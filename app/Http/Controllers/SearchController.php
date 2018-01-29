<?php
/**
 * Search Controller
 * Search database for requested item from search form
 * or advanced search form.
 * @since v0.1.1
 * @package App\Http\Controllers
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Models\Search;

/**
 * Class SearchController
 * @package App\Http\Controllers
 */
class SearchController extends Controller
{
    private $searchModel;

    /**
     * SearchController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->searchModel = new Search();
    }

    /**
     * Search post handling.
     * @param Request $request
     * @param \Illuminate\Validation\Factory $validator
     * @return \Illuminate\Http\RedirectResponse
     * @todo add alpha_num with spaces validator
     * @throws \App\Http\Models\UnknownCoinCategoryException
     */
    public function searching(Request $request, \Illuminate\Validation\Factory $validator)
    {
        $validation = $validator->make(
            $request->all(),
            [
                'search' => 'required|max:30|min:2'
            ]
        );
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }
        $item = $request->input('search');
        $results = $this->searchModel->findItem($item);
        //dd($results);
        $count = $this->searchModel->countSearchItem($item) ?? 0;

        return view(
            'area.search',
            [
                'search' => $results,
                'term' => $item,
                'count' => $count
            ]
        );
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
}
