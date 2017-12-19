<?php
/**
 * Design Controller
 * Routing class for design types
 * @since v0.1.2
 * @package App\Http\Controllers
 */
namespace App\Http\Controllers;

use App\Http\Models\Coin;
use App\Http\Models\CoinDesign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

class DesignController
{
    protected $typeLinkArr = [];

    protected $designModel;

    protected $thisDesign;

    public function __construct()
    {
        $this->designModel = new CoinDesign();
    }

    /**
     * View Coin Category Page
     * Create Coin Category Links
     * @param string $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDesign(string $version)
    {
        try {
            $this->thisDesign = \strip_tags(str_replace('_', ' ', $version));
            $coinDesigns = $this->designModel->getCoinDesign($this->thisDesign);
            $designCategories = $this->designModel->getDesignCategories($this->thisDesign);
            $designTypes = $this->designModel->getDesignTypes($this->thisDesign);
//dd($coinDesigns);
            return view(
                'area.coinDesign.designview',
                [
                    'coinVersions' => $coinDesigns,
                    //'totalCollected' => $totalCollected,
                    'coinCategory' => $designCategories,
                    'coinType' => $designTypes,
                    'title' => $this->thisDesign
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