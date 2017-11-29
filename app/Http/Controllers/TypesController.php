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

class TypesController
{
    protected $typeLinkArr = [];
    protected $allTypes = [
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
     * View Coin Types Page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function typePage() {

        $typeList = $this->allTypes;
        //$typeLinks = $typeList;
        //$typeLinks = array_map(TypesController::createTypeLink($typeList), $this->allTypes);
        $typeLinks = array_map(array($this, 'createTypeLink'), $typeList);

        //dd($typeLinks, $typeList);

        return view( 'area.coinTypes.typelist', ['typeList' => $typeList, 'typeLinks' => $typeLinks] );
    }

    /**
     * @param string $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getType(string $type) {
        $type = strip_tags(str_replace('_', ' ', $type));

        if(in_array($type, $this->allTypes)){
            $typeLinks = array_map(array($this, 'createTypeLink'), $this->allTypes);
            $coinType = Coin::where('coinCategory', "{$type}")->orderBy('coinYear', 'desc')->get();
            return view( 'area.coinTypes.typeview', ['coinType' => $coinType, 'typeLinks' => $typeLinks, 'title' => $type] );
        }else {
            $this->typePage();
        }





    }

    /**
     * @return array
     */
    public function getAllTypes(): array
    {
        return $this->allTypes;
    }

    public function createTypeLink($value)
    {
        return str_replace(' ', '_', $value);
    }

}