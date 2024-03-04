<?php 
class UtilService
{
    public static function decodeArrayToUtf8($array)
    {
        $arr=[];
        foreach($array as $k => $v) {
            $arr[$k] = utf8_decode($v);
        }
        return $arr; 
    }
}