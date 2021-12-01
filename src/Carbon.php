<?php

/**
 * FR Holidays Wrapper for the Carbon DateTime Library.
 * 
 * @category Carbon
 * @package  FrHolidays
 * @author   agence ADaKa <contact@adaka.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     https://gitlab.adaka.fr/plugins/php/carbon-fr-holidays
 */

namespace FrHolidays;

/**
 * FR Holidays Wrapper for the Carbon DateTime Library.
 * 
 * @category Carbon
 * @package  FrHolidays
 * @author   agence ADaKa <contact@adaka.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     https://gitlab.adaka.fr/plugins/php/carbon-fr-holidays
 */
class Carbon extends \Carbon\Carbon {

    private static $_cacheHolidays = [];

    /**
     * Return Paques for the passed years, or the current year if null
     *
     * @param null|int    $year
     * @param null|string $timezone
     * 
     * @return \Carbon\Carbon
     */
    public static function getPaques($year = null, $timezone = null) {
        $year = is_null($year) ? date('Y') : $year;

        $a = $year % 19;
        $b = floor($year / 100);
        $c = $year % 100;
        $d = floor($b / 4);
        $e = $b % 4;
        $f = floor(($b + 8) / 25);
        $g = floor(($b - $f + 1) / 3);
        $h = (19 * $a + $b - $d - $g + 15) % 30;
        $i = floor($c / 4);
        $k = $c % 4;
        $l = (32 + 2 * $e + 2 * $i - $h - $k) % 7;
        $m = floor(($a + 11 * $h + 22 * $l) / 451);
        $n0 = ($h + $l + 7 * $m + 114);
        $n = floor($n0 / 31) - 1;
        $p = $n0 % 31 + 1;
        return \Carbon\Carbon::create($year, $n, $p, 0, 0, 0, $timezone);
    }

    /**
     * Return lundiDePaques for the passed years, or the current year if null
     *
     * @param null|int            $year
     * @param null|string         $timezone
     * @param null|\Carbon\Carbon $paques
     * 
     * @return \Carbon\Carbon
     */
    public static function getLundiDePaques($year = null, $timezone = null, $paques = null) {
        return self::getPaques($year, $timezone).add(1, 'days');
    }

    /**
     * Return ascension for the passed years, or the current year if null
     *
     * @param null|int            $year
     * @param null|string         $timezone
     * @param null|\Carbon\Carbon $paques
     * 
     * @return \Carbon\Carbon
     */
    public static function getAscension($year = null, $timezone = null, $paques = null) {
        return self::getPaques($year, $timezone).add(39, 'days');
    }

    /**
     * Return pentecote for the passed years, or the current year if null
     *
     * @param null|int            $year
     * @param null|string         $timezone
     * @param null|\Carbon\Carbon $paques
     * 
     * @return \Carbon\Carbon
     */
    public static function getPentecote($year = null, $timezone = null, $paques = null) {
        return self::getPaques($year, $timezone).add(50, 'days');
    }

    /**
     * Return jourDeLAn for the passed years, or the current year if null
     *
     * @param null|int    $year
     * @param null|string $timezone
     * 
     * @return \Carbon\Carbon
     */
    public static function getJourDeLAn($year = null, $timezone = null) {
        $year = is_null($year) ? date('Y') : $year;
        return \Carbon\Carbon::create($year, 1, 1, 0, 0, 0, $timezone);
    }

    /**
     * Return feteDuTravail for the passed years, or the current year if null
     *
     * @param null|int    $year
     * @param null|string $timezone
     * 
     * @return \Carbon\Carbon
     */
    public static function getFeteDuTravail($year = null, $timezone = null) {
        $year = is_null($year) ? date('Y') : $year;
        return \Carbon\Carbon::create($year, 5, 1, 0, 0, 0, $timezone);
    }

    /**
     * Return feteDuTravail for the passed years, or the current year if null
     *
     * @param null|int    $year
     * @param null|string $timezone
     * 
     * @return \Carbon\Carbon
     */
    public static function getVictoireDeAllies($year = null, $timezone = null) {
        $year = is_null($year) ? date('Y') : $year;
        return \Carbon\Carbon::create($year, 5, 8, 0, 0, 0, $timezone);
    }

    /**
     * Return feteNationale for the passed years, or the current year if null
     *
     * @param null|int    $year
     * @param null|string $timezone
     * 
     * @return \Carbon\Carbon
     */
    public static function getFeteNationale($year = null, $timezone = null) {
        $year = is_null($year) ? date('Y') : $year;
        return \Carbon\Carbon::create($year, 7, 14, 0, 0, 0, $timezone);
    }

    /**
     * Return assomption for the passed years, or the current year if null
     *
     * @param null|int    $year
     * @param null|string $timezone
     * 
     * @return \Carbon\Carbon
     */
    public static function getAssomption($year = null, $timezone = null) {
        $year = is_null($year) ? date('Y') : $year;
        return \Carbon\Carbon::create($year, 8, 15, 0, 0, 0, $timezone);
    }

    /**
     * Return toussaint for the passed years, or the current year if null
     *
     * @param null|int    $year
     * @param null|string $timezone
     * 
     * @return \Carbon\Carbon
     */
    public static function getToussaint($year = null, $timezone = null) {
        $year = is_null($year) ? date('Y') : $year;
        return \Carbon\Carbon::create($year, 11, 1, 0, 0, 0, $timezone);
    }

    /**
     * Return armistice for the passed years, or the current year if null
     *
     * @param null|int    $year
     * @param null|string $timezone
     * 
     * @return \Carbon\Carbon
     */
    public static function getArmistice($year = null, $timezone = null) {
        $year = is_null($year) ? date('Y') : $year;
        return \Carbon\Carbon::create($year, 11, 11, 0, 0, 0, $timezone);
    }

    /**
     * Return noel for the passed years, or the current year if null
     *
     * @param null|int    $year
     * @param null|string $timezone
     * 
     * @return \Carbon\Carbon
     */
    public static function getNoel($year = null, $timezone = null) {
        $year = is_null($year) ? date('Y') : $year;
        return \Carbon\Carbon::create($year, 12, 25, 0, 0, 0, $timezone);
    }

    /**
     * Return all holidays for the passed years, or the current year if null
     *
     * @param null|int    $year
     * @param null|string $timezone
     * 
     * @return \Carbon\Carbon[]
     */
    public static function getHolidays($year = null, $timezone = null) {
        $year = is_null($year) ? date('Y') : $year;
        if (isset(self::$_cacheHolidays[$year])) {
            return self::$_cacheHolidays[$year];
        }

        $paques = self::getPaques($year, $timezone);
        self::$_cacheHolidays[$year] = [
            'paques' => $paques,
            'lundiDePaques' => self::getLundiDePaques($year, $timezone, $paques),
            'ascension' => self::getAscension($year, $timezone, $paques),
            'pentecote' => self::getPentecote($year, $timezone, $paques),
            'jourDeLAn' => self::getJourDeLAn($year, $timezone),
            'feteDuTravail' => self::getFeteDuTravail($year, $timezone),
            'victoireDeAllies' => self::getVictoireDeAllies($year, $timezone),
            'feteNationale' => self::getFeteNationale($year, $timezone),
            'assomption' => self::getAssomption($year, $timezone),
            'toussaint' => self::getToussaint($year, $timezone),
            'armistice' => self::getArmistice($year, $timezone),
            'noel' => self::getNoel($year, $timezone)
        ];
        
        return self::$_cacheHolidays[$year];
    }


    /**
     * Return all holidays for the passed years, or the current year if null
     *
     * @param string      $from
     * @param string      $to
     * @param null|string $timezone
     * 
     * @return \Carbon\Carbon[]
     */
    public static function getHolidaysRange($from, $to, $timezone = null) {
        $fromYear = (new self($from, $timezone))->year;
        $toYear = (new self($to, $timezone))->year;
        
        $holidays = [];
        for ($year=$fromYear; $year<=$toYear; $year++) {
            $holidays = array_merge(
                $holidays,
                self::getHolidays($year, $timezone)
            );
        }
        return $holidays;
    }
    

    /**
     * Check if its an french holiday. Comparing the date/month values of the two dates.
     *
     * @return bool
     */
    public function isHoliday() {
        foreach (self::getHolidays($this->year, $this->getTimezone()) as $holiday) {
            if ($this->isSameDay($holiday['date'])) {
                return true;
            }
        }
        
        return false;
    }
}
