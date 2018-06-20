<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Models\Coin;
use App\Http\Models\CoinType;
use App\Http\Models\Collection;
use Coins\Exceptions\NotUsersCoinException;
use Coins\Traits\CoinHelper;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Coins\Exceptions\UnknownCoinException;

/**
 * Class CoinsController
 * @package App\Http\Controllers
 */
class CoinsController extends Controller
{
    use CoinHelper;

    protected $thisCoin;
    protected $coinModel;
    protected $typeModel;
    protected $collectModel;

    public function __construct()
    {
        $this->coinModel = new Coin();
        $this->typeModel = new CoinType();
        $this->collectModel = new Collection();

    }

    /**
     * Create Coin Category Links
     * @param int $coin
     * @return Factory|\Illuminate\View\View
     */
    public function getCoin(int $coin)
    {
        try {
            //throw new \Exception('User defined');
            if (null === $coin || empty($coin)) {
                throw new UnknownCoinException('Coin not found');
            }
            $collected = $this->collectModel->getCollectedCoinByID($coin);
            $coinData = $this->coinModel->getCoinByID($coin);
            $coinObj = $this->coinModel->getCoin($coin);
            //dd($coinObj);
            $mintMarks = $this->coinModel->yearMintMarks($coinData['coinYear'], $coinData['coinType']);
//dd($collected);
            return view(
                'area.coins.coinview',
                [
                    'coinData' => $coinData,
                    'mintMarks' => $mintMarks,
                    'collected' => $collected,
                    'coinObj' => $coinObj
                ]
            );
        } catch (UnknownCoinException | NotUsersCoinException | \Throwable $e) {
            if ($e instanceof UnknownCoinException || $e instanceof NotUsersCoinException) {
                return view(
                    'error',
                    [
                        'message' => $e->getMessage()
                    ]
                );
            }
            Log::error($e->getMessage(), ['id' => Auth::id()]);
            return view(
                'error',
                [
                    'message' => 'Could not retrieve that coin'
                ]
            );
        }
    }

    /**
     * Certified grade report by coin
     * @param int $coin
     * @return Factory|\Illuminate\View\View
     */
    public function getCertfiedCoin(int $coin)
    {
        try {
            if (null === $coin || empty($coin)) {
                throw new UnknownCoinException('Coin not found');
            }
            $coinData = $this->coinModel->getCoinByID($coin);
            $mintMarks = $this->coinModel->yearMintMarks($coinData['coinYear'], $coinData['coinType']);

            return view(
                'area.coins.coinGradeView',
                [
                    'coinData' => $coinData,
                    'mintMarks' => $mintMarks
                ]
            );
        } catch (UnknownCoinException | \Throwable $e) {
            return view(
                'error',
                [
                    'message' => $e->getMessage()
                ]
            );
        }
    }

    /**
     * @param int $year
     * @return Factory|\Illuminate\View\View
     */
    public function getYear(string $year)
    {
        try {
            if (null === $year || empty($year)) {
                throw new UnknownCoinException('Coin not found');
            }
            $coinData = $this->coinModel->getAllFromYear($year);

            return view(
                'area.coins.coinYearView',
                [
                    'coinData' => $coinData,
                    'year' => $this->getMaxYear($year),
                    'next' => $this->getMaxYear($year) + 1,
                    'prev' => $this->getMaxYear($year) -1
                ]
            );
        } catch (UnknownCoinException | \Throwable $e) {
            return view(
                'error',
                [
                    'message' => $e->getMessage()
                ]
            );
        }
    }

    /**
     * @param int $year
     * @return Factory|\Illuminate\View\View
     */
    public function getReport()
    {
        try {
            return view(
                'area.detail',
                [
                    'title' => 'Coin Detail Report',
                ]
            );
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return view(
                'error',
                [
                    'message' => $e->getMessage()
                ]
            );
        }
    }

    /**
     * Find all coins from year.
     * @param Request $request
     * @return Factory|\Illuminate\View\View
     * @throws UnknownCoinException
     */
    public function findYear(Request $request)
    {
        if (null === $request->input('coinYear') || empty($request->input('coinYear'))) {
            $year = date('Y');
        } else {
            $year = $request->input('coinYear');
        }

        $coinData = $this->coinModel->getAllFromYear($year);

        return view(
            'area.coins.coinYearView',
            [
                'coinData' => $coinData,
                'year' => $this->getMaxYear($year),
                'next' => $this->getMaxYear($year) + 1,
                'prev' => $this->getMaxYear($year) -1
            ]
        );
    }

    /**
     * Create Coin Category Links
     * @param int $coin
     * @return Factory|\Illuminate\View\View
     */
    public function getCoinColor(int $coin)
    {
        try {
            if (null === $coin || empty($coin)) {
                throw new UnknownCoinException('Coin not found');
            }
            $coinData = $this->coinModel->getCoinByID($coin);
            $mintMarks = $this->coinModel->yearMintMarks($coinData['coinYear'], $coinData['coinType']);

            return view(
                'area.coins.coinColorview',
                [
                    'coinData' => $coinData,
                    'mintMarks' => $mintMarks
                ]
            );
        } catch (UnknownCoinException | \Throwable $e) {
            return view(
                'error',
                [
                    'message' => $e->getMessage()
                ]
            );
        }
    }


    /**
     * Create Coin Category Links
     * @param int $coin
     * @return Factory|\Illuminate\View\View
     */
    public function addCoin(int $coin)
    {
        try {
            if (null === $coin || empty($coin)) {
                throw new UnknownCoinException('Coin not found');
            }
            $coinData = $this->coinModel->getCoinByID($coin);
            $mintMarks = $this->coinModel->yearMintMarks($coinData['coinYear'], $coinData['coinType']);

            return view(
                'area.coins.coinIDAdd',
                [
                    'coinData' => $coinData,
                    'mintMarks' => $mintMarks
                ]
            );
        } catch (UnknownCoinException | \Throwable $e) {
            return view(
                'error',
                [
                    'message' => $e->getMessage()
                ]
            );
        }
    }

}
