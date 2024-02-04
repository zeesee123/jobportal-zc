<?php

namespace Framework;

class Validation{

    public static function string($value,$min=1,$max=INF){
        
        if(is_string($value)){
        
            $value=trim($value);
            $length=strlen($value);

            return $length>=$min && $length<=$max;

        }

        return false;
    }

    public static function email($value){

        $value=trim($value);

        return filter_var($value,FILTER_VALIDATE_EMAIL);
    }

    public static function match($val1,$val2){

        $val1=trim($val1);
        $val2=trim($val2);

        return $val1===$val2;
    }
}