<?php
/**
 * Commemorative Controller
 * Routing class for Commemoratives
 * @since v0.1.4
 * @package App\Http\Controllers
 */
namespace App\Http\Controllers;

use App\Http\Models\Coin;
use App\Http\Models\Commemorative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;
use Coins\Traits\CoinHelper;

/**
 * Class CommemorativeController
 * @package App\Http\Controllers
 */
class CommemorativeController
{
    use CoinHelper;

    protected $typeLinkArr = [];

    protected $commemorativeModel;

    protected $thisCommemorativeDesign;

    public function __construct()
    {
        $this->commemorativeModel = new Commemorative();
    }

    /**
     * View Coin Commemoratives Page
     * Create Coin Category Links
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCommemoratives()
    {
        try {
            $coins = $this->commemorativeModel->getAll();
            $types = $this->commemorativeModel->getAllTypes();
            return view(
                'area.coinCommemorative.commemorativeview',
                [
                    'coins' => $coins,
                    'types' => $types,
                    'title' => 'Commemoratives'
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
     * Get this coin type
     * @param string $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCommemorativeType(string $type)
    {
        try {
            $this->thisType = strip_tags(str_replace('_', ' ', $type));
            //$typeLinks = array_map(array($this, 'createTypeLink'), $this->allTypes);

            $category = $this->getThisCategory($this->thisType);
            $coins = $this->typeModel->getCoinType($this->thisType);

            //$coins = Coin::where('coinType', "{$type}")->orderBy('coinYear', 'desc')->get();
            return view('area.coinTypes.typeview', [
                'coinType' => $this->thisType,
                'title' => $this->thisType,
                'coins' => $coins,
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

}