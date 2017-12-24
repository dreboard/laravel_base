<?php
/**
 * Traits CoinHelper
 * @package Coins\Interfaces
 */
namespace Coins\Traits;

/**
 * Trait CoinHelper
 * @package Coins\Traits
 */
trait CoinHelper
{


    /**
     * @param array $coins
     * @return array
     */
    public function getCommemorativeVersions(array $coins): array
    {

        
    }

    /**
     * Prevent future date
     * @param string $year
     * @return string
     */
    public function getMaxYear(string $year): string
    {
        if ((int)$year > date('Y') || (int)$year < 1793) {
            return date('Y');
        }
        return $year;
    }

    /**
     * @param array $input_array
     * @return array
     */
    public function flattenDatesArray(array $input_array): array
    {
        $output_array_obj = new \RecursiveIteratorIterator(
            new \RecursiveArrayIterator($input_array)
        );

        $output_array = iterator_to_array($output_array_obj, false);
        array_map('intval', $output_array);
        sort($output_array);
        return $output_array;
    }

    /**
     * Create dates array for coin type
     * @param array $years
     * @return array
     */
    public function createYearArray(array $years)
    {
        $Commemorative_Half_Dollar = ["dates" => "1892,1893,1920-1928,1933-1939,1946-1954,1982,1986,1989,1991-1994,2001,2003,2008,2011"];
        $Flowing_Hair_Large_Cent = ["dates" => "1793"];
        $Morgan_Dollar = ["dates" => "1878-1904,1921"];

        if (strpos($years[0]['dates'], ',')) {
            $makeArray = explode(',', $years[0]['dates']);

            //dd($makeArray);
            foreach ($makeArray as $k => $dates) {
                //echo $k, '-',$dates,'<br>';
                if (strpos($dates, '-')) {
                    $inneryears = explode('-', $dates);
                    $yearList = range($inneryears[0], $inneryears[1]);
                    array_push($makeArray, $yearList);
                    unset($makeArray[$k]);
                    //$makeArray[$k] = $yearList;
                } else {
                    $makeArray[$k] = $dates;
                }
            }
            $makeArray = $this->flattenDatesArray($makeArray);

            return $makeArray;
        }
        if (strpos($years[0]['dates'], '-')) {
            $yearArray = explode('-', $years[0]['dates']);
            $yearList = range($yearArray[0], $yearArray[1]);
            return $yearList;
        }
        return [$years[0]['dates']];
    }
}