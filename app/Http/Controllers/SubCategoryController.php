<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Models\{
    Coin, CoinCategory, CoinVersion, SubCategory
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;
use PDO;

/**
 * Class CategoriesController
 * @package App\Http\Controllers
 */
class SubCategoryController
{


    protected $getSubCategory;

    protected $thisSubCategory;

    public function __construct()
    {
        $this->subCatModel = new SubCategory();
    }


    /**
     * View Coin Category Page
     * Create Coin Category Links
     * @param string $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSubCategory(string $subCategory)
    {
        try {
            $this->thisSubCategory = \strip_tags(str_replace('_', ' ', $subCategory));
            $coinSubCatCoins = $this->subCatModel->getSubCategory($this->thisSubCategory);
            $coinCategory = $this->subCatModel->getThisCategory($this->thisSubCategory);
            $coinType = $this->subCatModel->getThisType($this->thisSubCategory);

            return view(
                'area.coinSubCategory.subcategoryview',
                [
                    'coinSubCatCoins' => $coinSubCatCoins,
                    //'totalCollected' => $totalCollected,
                    'coinCategory' => $coinCategory,
                    'coinType' => $coinType,
                    'title' => $this->thisSubCategory
                ]
            );

        } catch (\Throwable $e) {
            return view(
                'error',
                [
                    'message' => $e->getMessage()
                ]
            );
        }
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
