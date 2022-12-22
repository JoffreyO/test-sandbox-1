<?php

namespace App\Services;

class DingService
{

    public function ding(Array $array):Array
    {
        $result = [];

        foreach($array as $nb){

            if($nb %5 == 0 && $nb %7 == 0){
               array_push($result, "ding dong");
            }elseif($nb %5 == 0){
                array_push($result, "ding");
            }elseif($nb %7 == 0 ){
                array_push($result, "dong");
            }else{
                array_push($result, $nb);
            }
        }
        return $result;
        
    }

}