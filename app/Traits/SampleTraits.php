<?php
namespace App\Traits;

trait SampleTraits {

    public function genrate(string $string){
        
        return \Str::slug($string);
    }
}