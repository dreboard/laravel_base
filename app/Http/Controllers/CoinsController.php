<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Models\Coin;
use App\Http\Models\CoinType;
use Coins\Traits\CoinHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;
use PDO;
use Coins\Exceptions\UnknownCoinException;

/**
 * Class CoinsController
 * @package App\Http\Controllers
 */
class CoinsController
{
    use CoinHelper;

    protected $thisCoin;

    public function __construct()
    {
        $this->coinModel = new Coin();
        $this->typeModel = new CoinType();
    }

    /**
     * Create Coin Category Links
     * @param int $coin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCoin(int $coin)
    {
        try {
            if (null === $coin || empty($coin)) {
                throw new UnknownCoinException('Coin not found');
            }
            $coinData = $this->coinModel->getCoinByID($coin);
            $mintMarks = $this->coinModel->yearMintMarks($coinData['coinYear'], $coinData['coinType']);

            return view(
                'area.coins.coinview',
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
     * Certified grade report by coin
     * @param int $coin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
