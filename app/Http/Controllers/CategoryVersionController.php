<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Models\{Coin, CoinCategory, CoinVersion};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;
use PDO;

/**
 * Class CategoriesController
 * @package App\Http\Controllers
 */
class CategoryVersionController
{


    protected $getCoinCategory;

    protected $thisVersion;

    public function __construct()
    {
        $this->versionModel = new CoinVersion();
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
     */
    public function getVersion(string $version)
    {
        try {
            $this->thisVersion = \strip_tags(str_replace('_', ' ', $version));
            $coinVersions = $this->versionModel->getCoinVersions($this->thisVersion);
            $coinCategory = $this->versionModel->getThisCategory($this->thisVersion);
            $coinType = $this->versionModel->getThisType($this->thisVersion);

            return view(
                'area.coinVersion.versionview',
                [
                    'coinVersions' => $coinVersions,
                    //'totalCollected' => $totalCollected,
                    'coinCategory' => $coinCategory,
                    'coinType' => $coinType,
                    'title' => str_replace('_', ' ', $version)
                ]
            );

        } catch (\Throwable $e) {
            $this->categoryPage();
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
