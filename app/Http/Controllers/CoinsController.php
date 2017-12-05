<?php
declare(strict_types=1);
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
use App\Http\Controllers\Auth;
use PDO;
use App\Exceptions\UnknownCoinException;

/**
 * Class CategoriesController
 * @package App\Http\Controllers
 */
class CoinsController
{

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
     * @param int $coin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCoin(int $coin)
    {
        $coin = $coin;
        if(null === $coin || empty($coin)){
            throw new UnknownCoinException();
        }

        try {

            $pdo = DB::getPdo();
            $statement = $pdo->prepare("call CoinsGetByID(:id)");
            $statement->bindValue(':id', $coin, PDO::PARAM_INT);
            $statement->execute();
            $coinData = $statement->fetch(PDO::FETCH_ASSOC);

            //dd($coinData);
            return view('area.coins.coinview',
                [
                    'coinData' => $coinData
                ]
            );
        } catch(App\NoCoinException $e) {
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
        return \str_replace(' ', '_', $value);
    }

    public function getThisCategory()
    {

    }

    /**
     * @param string $category
     * @param int $userID
     * @return mixed
     */
    public function categoryCollectedCountByUser(string $category, int $userID)
    {
       /* $result = DB::select('call CategoryCollectedCountByUser(?, ?)', [$category, $userID]);
        $count = collect($result)->toArray();
        return $count[0]->catCount;*/
//dd(\Auth::user()->id);
        $pdo = DB::getPdo();
        $statement = $pdo->prepare("call CategoryUserTotalInvestmentSumAll(:id, :cat)");

        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        $statement->execute([$userID, $category]);
        //$results = $statement->fetchAll();
        //return $results[0]['catCount'];
        return $statement->fetchColumn();


    }

}
