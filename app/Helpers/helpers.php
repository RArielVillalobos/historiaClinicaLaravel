<?php
/**
 * Created by PhpStorm.
 * User: ariel
 * Date: 5/may/2019
 * Time: 21:35
 */
if(!function_exists('active_class')){
    function active_class($url){
        //url actual
        $current_url=url()->current();
        if($url==$current_url){
            return 'active';
        }



    }
}