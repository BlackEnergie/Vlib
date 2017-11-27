<?php

class stations
{

    private $LesStations = array();

    public function __construct($lesStations)
    {
        $this->LesStations = $lesStations;
    }

    public static function chercher($lesStations ,$id){
        foreach ($lesStations as $station){
            if($station->getNUMS() == $id){
                return $station;
            }
        }
        return false;
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