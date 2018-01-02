<?php
/**
 * Notes Controller
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

/**
 * Class NotesController
 * @package App\Http\Controllers
 */
class NotesController
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getNotebook()
    {
        try {


            return view(
                'area.notes.notebook',
                [
                    'title' => 'Notebook'
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
     * View Coin Category Page
     * Create Coin Category Links
     * @param string $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getDesignType(string $dt)
    {
        try {
            $this->thisDesignType = \strip_tags(str_replace('_', ' ', $dt));
            $coinDesigns = $this->designModel->getCoinDesignType($this->thisDesignType);
            $designCategories = $this->designModel->getDesignCategories($this->thisDesignType);
            $designTypes = $this->designModel->getDesignTypes($this->thisDesignType);
            $coinType = $this->designModel->getCoinTypeFromDesign($this->thisDesignType);
//dd($coinType);
            return view(
                'area.coinDesign.designTypeView',
                [
                    'coinVersions' => $coinDesigns,
                    //'totalCollected' => $totalCollected,
                    'coinCategory' => $designCategories,
                    'coinType' => $coinType,
                    'title' => $this->thisDesignType
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