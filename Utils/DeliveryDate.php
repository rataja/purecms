<?php

namespace Rataja\pfcms;

/**
 * Description of DeliveryDate
 *
 * @author mratajsky
 */
class DeliveryDate {

    /**
     * List of days of holidays in Czech Republic
     * @var <array>
     */
    private $holidayDates = [];

    /**
     * Date to start adding working day 
     * @var <date>
     */
    private $date;

    /**
     * How many working days should add
     * @var <int> 
     */
    private $addWorkingDays;

    /**
     * 
     * @param <date> $date Y-m-d format
     * @param <int> $addWorkingDays how many working days add to $date
     */
    public function __construct($date, $addWorkingDays = 2) {
        $this->date = $date;
        $this->addWorkingDays = $addWorkingDays;
        $this->setHolidays();
        var_dump($this->holidayDates);
    }

    private function setHolidays() {
        //Nový rok
        array_push($this->holidayDates, date("Y-01-01"));

        //Velký pátek - promenlivy datum
        array_push($this->holidayDates, '2019-04-19');
        array_push($this->holidayDates, '2020-04-10');
        array_push($this->holidayDates, '2021-04-02');
        array_push($this->holidayDates, '2022-04-15');
        array_push($this->holidayDates, '2023-04-07');

        //Velikonoční pondělí - promenlivy datum
        array_push($this->holidayDates, '2019-04-22');
        array_push($this->holidayDates, '2020-04-13');
        array_push($this->holidayDates, '2021-04-05');
        array_push($this->holidayDates, '2022-04-18');
        array_push($this->holidayDates, '2023-04-10');

        //Svátek práce
        array_push($this->holidayDates, date("Y-05-01"));

        //Den vítězství
        array_push($this->holidayDates, date("Y-05-08"));

        //Den slovanských věrozvěstů Cyrila a Metoděje
        array_push($this->holidayDates, date("Y-07-05"));

        //Den upálení mistra Jana Husa
        array_push($this->holidayDates, date("Y-07-06"));

        //Den české státnosti
        array_push($this->holidayDates, date("Y-09-28"));

        //Den vzniku samostatného československého státu
        array_push($this->holidayDates, date("Y-10-28"));

        //Den boje za svobodu a demokracii
        array_push($this->holidayDates, date("Y-11-17"));

        //Štědrý den
        array_push($this->holidayDates, date("Y-12-24"));

        //1. svátek vánoční
        array_push($this->holidayDates, date("Y-12-25"));

        //2. svátek vánoční
        array_push($this->holidayDates, date("Y-12-26"));
    }

    /**
     * Return date + x working days
     * @return <date> d.m.Y
     */
    public function getDeliveryDate() {
        $countWD = 0;
        $temp = strtotime($this->date); //example as today is 2019-03-23 00:00:00
        while ($countWD < $this->addWorkingDays) {
            $next1WD = strtotime('+1 weekday', $temp);
            $next1WDDate = date('Y-m-d', $next1WD);
            if (!in_array($next1WDDate, $this->holidayDates)) {
                $countWD++;
            }
            $temp = $next1WD;
        }

        $next5WD = date("d.m.Y", $temp);

        return $next5WD;
    }

}
