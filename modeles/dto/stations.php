<?php

class stations
{
    private $LesStations = array();

    public function __construct($lesStations)
    {
        $this->LesStations = $lesStations;
    }

    /**
     * @return array
     */
    public function getLesStations()
    {
        return $this->LesStations;
    }

    /**
     * @param array $LesStations
     */
    public function setLesStations($LesStations)
    {
        $this->LesStations = $LesStations;
    }


}