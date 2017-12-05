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

/**
 * Class CategoriesController
 * @package App\Http\Controllers
 */
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
    public function getCategory(string $category)
    {
        $category = \strip_tags(str_replace('_', ' ', $category));

        if (\in_array($category, $this->allCategories, true)) {
            $catLinks = \array_map(array($this, 'createCatLink'), $this->allCategories);
            $coinCategory = Coin::where('coinCategory', "{$category}")->orderBy('coinYear', 'desc')->get();
            $totalCollected = $this->categoryCollectedCountByUser($category, 5);

/*            $coinTypes = DB::table('coins')
                ->select('coinType')
                ->where('coinCategory', '=', $category)
                ->distinct('coins.coinType')
                ->orderBy('coinYear', 'desc')
                ->get()->toArray();
            */



            $pdo = DB::getPdo();
            $statement = $pdo->prepare("SELECT DISTINCT coinType FROM coins WHERE coinCategory = :cat ORDER BY coinYear DESC");
            //$statement->setFetchMode(\PDO::FETCH_ASSOC);
            $statement->bindValue(':cat', str_replace('_', ' ', $category), PDO::PARAM_STR);
            $statement->execute();
            $coinTypes = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
            //var_dump(array_values($coinTypes));die;
            $typeLinks = array_map([$this, 'createCatLink'], $coinTypes);
            $typeLinksDisplay = array_combine(array_values($typeLinks), array_values($coinTypes));

            return view('area.coinCategory.categoryview',
                [
                    'totalCollected' => $totalCollected,
                    'coinCategory' => $coinCategory,
                    'catLinks' => $catLinks,
                    'title' => $category, 'coinTypes' => $typeLinksDisplay
                ]
            );
        } else {
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
