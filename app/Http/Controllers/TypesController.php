<?php
/**
 * Coin Types Controller
 * Routing class for coin types
 * @since v0.1.1
 * @package App\Http\Controllers
 */

namespace App\Http\Controllers;

use App\Http\Models\Coin;
use App\Http\Models\{CoinType, CoinTypeCollected};
use Coins\Traits\CoinHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

/**
 * Class TypesController
 * @package App\Http\Controllers
 */
class TypesController
{
    use CoinHelper;

    protected $typeLinkArr = [];

    protected $typeModel;

    protected $typeCollectedModel;

    protected $thisType;

    public function __construct()
    {
        $this->typeModel = new CoinType();
        $this->typeCollectedModel = new CoinTypeCollected();
    }

    /**
     * View Coin Types Page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function typePage()
    {

        $typeList = $this->allTypes;
        //$typeLinks = $typeList;
        //$typeLinks = array_map(TypesController::createTypeLink($typeList), $this->allTypes);
        $typeLinks = array_map(array($this, 'createTypeLink'), $typeList);

        //dd($typeLinks, $typeList);

        return view('area.coinTypes.typelist', ['typeList' => $typeList, 'typeLinks' => $typeLinks]);
    }

    /**
     * Get this coin type
     * @param string $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getType(string $type)
    {
        try {
            $this->thisType = strip_tags(str_replace('_', ' ', $type));
            //$typeLinks = array_map(array($this, 'createTypeLink'), $this->allTypes);

            $category = $this->getThisCategory($this->thisType);
            $coins = $this->typeModel->getCoinType($this->thisType);
            $list = $this->typeModel->getYearList($this->thisType);
            $designTypes = $this->typeModel->getDesignTypesList($this->thisType);
            $designs = $this->typeModel->getDesignsList($this->thisType);
            $collected = $this->typeCollectedModel->getCoinTypeCollected($this->thisType);
            if($collected[0] === "None"){
                //echo 'None';
                //die;
            }
//dd($collected[0]['userID']);
            //$typeYears = $this->createYearArray($list);

            //$coins = Coin::where('coinType', "{$type}")->orderBy('coinYear', 'desc')->get();
            return view('area.coinTypes.typeview', [
                'coinType' => $this->thisType,
                'typeLink' => str_replace(' ', '_', $this->thisType),
                'typeYears' => $list,
                'title' => $this->thisType,
                'coins' => $coins,
                'designs' => $designs,
                'designTypes' => $designTypes,
                'category' => $this->getThisCategory($this->thisType),
                'catLink' => str_replace(' ', '_', $this->getThisCategory($this->thisType))
            ]);
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
     * Get this coin type
     * @param string $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getTypeByYear(string $type, string $year)
    {
        try {
            $this->thisType = strip_tags(str_replace('_', ' ', $type));

            $category = $this->getThisCategory($this->thisType);
            $coins = $this->typeModel->getYearCoinType($this->thisType, $year);
            $list = $this->typeModel->getYearList($this->thisType);
            $designs = $this->typeModel->getDesignTypesList($this->thisType);

            return view('area.coinTypes.typeYearView', [
                'coinType' => $this->thisType,
                'title' => $this->thisType,
                'coins' => $coins,
                'typeYears' => $list,
                'category' => $category,
                'coinYear' => (int)$year,
                'designs' => $designs,
                'catLink' => str_replace(' ', '_', $this->getThisCategory($this->thisType))
            ]);
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
     * @param string $value
     * @return string
     */
    public function createTypeLink(string $value): string
    {
        return str_replace(' ', '_', $value);
    }

    /**
     * Get Category for this type
     * @param $type
     * @return string
     */
    public function getThisCategory(string $type): string
    {
        $pdo = DB::getPdo();
        $statement = $pdo->prepare("call TypesGetThisCategory(:type)");
        //$statement->setFetchMode(\PDO::FETCH_ASSOC);
        $statement->bindValue(':type', str_replace('_', ' ', $type), PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchColumn();
    }
}