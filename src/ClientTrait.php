<?php

namespace Aguimaraes\TraySoap;

trait ClientTrait
{
    public function getFromToday()
    {
        return $this->get(array(
            'data_inicial' => date('Y-m-d'),
            'data_final' => date('Y-m-d'),
            'hora_inicial' => '0000',
            'hora_final' => '2359'
        ));
    }

    public function getFromYesterday()
    {
        $obj = new \DateTime();
        $obj->modify('yesterday');
        $yesterday = $obj->format('Y-m-d');
        return $this->get(array(
            'data_inicial' => $yesterday,
            'data_final' => $yesterday,
            'hora_inicial' => '0000',
            'hora_final' => '2359'
        ));
    }

    public function getFromCurrentWeek()
    {
        $obj = new \DateTime();
        $obj->modify('last sunday');
        $lastSunday = $obj->format('Y-m-d');
        return $this->get(array(
            'data_inicial' => $lastSunday,
            'data_final' => date('Y-m-d'),
            'hora_inicial' => '0000',
            'hora_final' => '2359'
        ));
    }
    /**
     * Get from specific date and time
     * @param  DateTime      $fromDate
     * @param  DateTime|null $toDate
     * @return array
     */
    public function getFromSpecificDateAndTime(DateTime $fromDate, DateTime $toDate = null)
    {
        return $this->get(array(
            'data_inicial' => $fromDate->format('Y-m-d'),
            'data_final' => empty($toDate) ? date('Y-m-d') : $toDate->format('Y-m-d'),
            'hora_inicial' => '0000',
            'hora_final' => '2359'
        ));
    }
}
