<?php
declare(strict_types=1);
/**
 * Category Controller
 * Routing class for coin category
 * @since v0.1.1
 * @package App\Http\Controllers
 */

namespace App\Http\Controllers;

use App\Http\Models\{Coin, CoinCategory};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use App\Http\Controllers\Auth;
use PDO;
use Coins\Exceptions\UnknownCoinCategoryException;
use PDOException \Throwable;

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
        'Half Cent'
    ];

    protected $getCoinCategory;

    protected $categoryModel;

    protected $thisCategory;

    public function __construct()
    {
        $this->getCoinCategory = new CoinCategory();
        $this->categoryModel = new CoinCategory();
    }

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
     * View Coin Category Page
     * Create Coin Category Links
     * @param string $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws UnknownCoinCategoryException
     */
    public function getCategory(string $category)
    {
        try {
            $this->thisCategory = \strip_tags(str_replace('_', ' ', $category));
            if (\in_array($this->thisCategory, config('coins.coinCategories'), true)) {
                $catLinks = \array_map(array($this, 'createCatLink'), $this->allCategories);
                $coinCategory = Coin::where('coinCategory', "{$this->thisCategory}")->orderBy('coinYear', 'desc')->get();
                $coins = $this->categoryModel->getCoinCategory($this->thisCategory);
                $totalCollected = $this->categoryCollectedCountByUser($this->thisCategory, Auth::id());
                //dd($totalCollected);
                $lastCollected = $this->categoryModel->categoryLastCountByUser($this->thisCategory);
                //$catDetails = $this->getCoinCategory->getCategoryDetails($this->thisCategory);

                $coinTypes = $this->getCoinCategory->getTypesByCategory($this->thisCategory);
                $typeLinks = array_map([$this, 'createCatLink'], $coinTypes);
                $typeLinksDisplay = array_combine(array_values($typeLinks), array_values($coinTypes));

                return view(
                    'area.coinCategory.categoryview',
                    [
                        'totalCollected' => $totalCollected,
                        'coins' => $coins,
                        'lastCollected' =>$lastCollected,
                        'catLinks' => $catLinks,
                        //'catDetails' => $catDetails,
                        'title' => str_replace('_', ' ', $category), 'coinTypes' => $typeLinksDisplay
                    ]
                );
            } else {
                throw new UnknownCoinCategoryException('Unknown coin category');
            }

        } catch (UnknownCoinCategoryException | \Throwable $e) {
            return view(
                'error',
                [
                    'message' => $e->getMessage()
                ]
            );
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


    /**
     * View Coin Types Page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function categoryPage() {

    }
}
