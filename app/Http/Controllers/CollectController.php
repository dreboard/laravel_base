<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Models\Coin;
use App\Http\Models\CoinType;
use App\Http\Models\Collection;
use Coins\Exceptions\NotUsersCoinException;
use Coins\Traits\{CoinHelper, CollectionHelper};
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use Coins\Exceptions\UnknownCoinException;

/**
 * Class CollectController
 * @package App\Http\Controllers
 */
class CollectController
{
    use CoinHelper;
    use CollectionHelper;

    protected $thisCoin;

    public function __construct()
    {
        $this->collectModel = new Collection();
    }

    /**
     * Create Coin Category Links
     * @param int $coin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function collectView(int $coin)
    {
        try {
            if (null === $coin || empty($coin)) {
                throw new UnknownCoinException('Coin not found');
            }
            $coinData = $this->collectModel->getCollectedCoin($coin);

            return view(
                'area.collect.collect',
                [
                    'coinData' => $coinData,
                ]
            );
        } catch (UnknownCoinException | NotUsersCoinException | \Throwable $e) {
            return view(
                'error',
                [
                    'message' => $e->getMessage()
                ]
            );
        }
    }



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function postCollectionDamage(Request $request)
    {
        $damages = [];
        //$input = request()->all();
        return response()->json([request()->all()]);
        $holed = $request->input('holed');
        $cleaned = $request->input('cleaned');
        $altered = $request->input('altered');
        $damaged = $request->input('damaged');
        $pvc = $request->input('pvc');
        $corrosion = $request->input('corrosion');
        $bent = $request->input('bent');
        $plugged = $request->input('plugged');
        $polished = $request->input('altered');
        $collectionID = $request->input('collectionID');

        $damages['holed'] = $request->input('holed');
        $damages['cleaned'] = $request->input('cleaned');
        $damages['altered'] = $request->input('altered');
        $damages['damaged'] = $request->input('damaged');
        $damages['pvc'] = $request->input('pvc');
        $damages['corrosion'] = $request->input('corrosion');
        $damages['bent'] = $request->input('bent');
        $damages['plugged'] = $request->input('plugged');
        $damages['polished'] = $request->input('altered');
        $damages['collectionID'] = $request->input('collectionID');
        //$this->collectModel->saveDamages($damages);

//dd($request->input('holed'));
        //$this->collectModel->saveDamages($holed, $cleaned, $altered, $damaged, $pvc, $corrosion, $bent, $plugged, $polished, $collectionID);

        return response()->json($damages);
        //return response()->json([request()->all()]);

        //return response()->json(['holed' => $holed, 'cleaned' => $cleaned, 'altered' => $altered]);
    }

    public function postCollectionDamage2(Request $request)
    {
        $input = request()->all();

        $input2 = [
            'holed' => $request->input('holed'),
            'cleaned' => $request->input('cleaned'),
            'altered' => $request->input('altered'),
            'damaged' => $request->input('damaged'),
            'pvc' => $request->input('pvc'),
            'corrosion' => $request->input('corrosion'),
            'bent' => $request->input('bent'),
            'plugged' => $request->input('plugged'),
            'polished' => $request->input('polished')
        ];

        $coinData = $this->collectModel->saveDamages($input);
        return response()->json(['holed' => $holed, 'cleaned' => $cleaned, 'altered' => $altered]);
        return response()->json([$coinData]);

    }
}
