<?php
/**
 * Metal Controller
 * Routing class for design types
 * @since v0.1.2
 * @package App\Http\Controllers
 */
namespace App\Http\Controllers;

use App\Http\Models\Coin;
use App\Http\Models\CoinMetal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

/**
 * Class MetalController
 * @package App\Http\Controllers
 */
class MetalController
{
    protected $typeLinkArr = [];

    protected $metalModel;

    protected $thisMetal;

    public function __construct()
    {
        $this->metalModel = new CoinMetal();
    }

    /**
     * View Coin Category Page
     * Create Coin Category Links
     * @param string $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getMetal(string $metal)
    {
        try {
            $this->thisMetal = \strip_tags(str_replace('_', ' ', $metal));
            $coinDesigns = $this->metalModel->getCoinMetal($this->thisMetal);
            $designCategories = $this->metalModel->getMetalCategories($this->thisMetal);
            $designTypes = $this->metalModel->getMetalTypes($this->thisMetal);
//dd($coinDesigns);
            return view(
                'area.coinDesign.designview',
                [
                    'coinVersions' => $coinDesigns,
                    //'totalCollected' => $totalCollected,
                    'coinCategory' => $designCategories,
                    'coinType' => $designTypes,
                    'title' => $this->thisMetal
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
}