<?php
/**
 * Created by PhpStorm.
 * User: owner
 * Date: 11/27/2017
 * Time: 10:34 PM
 */

namespace App\Http\Controllers;

use App\Http\Models\Coin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController
{
    protected $typeLinkArr = [];
    protected $allCategories = [
        'One Hundred Dollar',
        'Fifty Dollar',
        'Twenty Five Dollar',
        'Twenty Dollar',
        'Ten Dollar',
        'Five Dollar',
        'Four Dollar',
        'Three Dollar',
        'Quarter Eagle',
        'Dollar',
        'Gold Dollar',
        'No Coin',
        'Commemorative Dollar',
        'Silver Dollar',
        'Commemorative Half Dollar',
        'Half Dollar',
        'Quarter',
        'Twenty Cent',
        'Dime',
        'Nickel',
        'Half Dime',
        'Three Cent',
        'Two Cent',
        'Large Cent',
        'Small Cent',
    ];

    /**
     * View Coin Categories Page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function catPage() {
        $catList = $this->allCategories;
        $catLinks = array_map(array($this, 'createCatLink'), $catList);
        return view( 'area.coinCategory.catlist', ['catList' => $catList, 'catLinks' => $catLinks] );
    }

    /**
     * Create Coin Category Links
     * @param string $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCategory(string $category) {
        $category = strip_tags(str_replace('_', ' ', $category));

        if(\in_array($category, $this->allCategories, true)){
            $catLinks = array_map(array($this, 'createCatLink'), $this->allCategories);
            $coinCategory = Coin::where('coinCategory', "{$category}")->orderBy('coinYear', 'desc')->get();

            $coinTypes = DB::table('coins')
                ->select('coinType')
                ->where('coinCategory', '=', $category)
                ->distinct('coins.coinType')
                ->orderBy('coinYear', 'desc')
                ->get();

            return view( 'area.coinCategory.categoryview',
                [
                'coinCategory' => $coinCategory,
                'catLinks' => $catLinks,
                'title' => $category, 'coinTypes'=> $coinTypes
            ]
            );
        }else {
            $this->typePage();
        }
    }

    /**
     * @return array
     */
    public function getAllCategories(): array
    {
        return $this->allCategories;
    }


    /**
     * @param string $value
     * @return string
     */
    public function createCatLink(string $value):string
    {
        return str_replace(' ', '_', $value);
    }

}