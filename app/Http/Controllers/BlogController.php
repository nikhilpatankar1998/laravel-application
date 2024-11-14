<?php

namespace App\Http\Controllers;

use App\Traits\SampleTraits;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use SampleTraits;

    public function index(){

        $title = 'THis is test title';
        $slug = $this->genrate($title);

        return $slug;
        
        
    }
}
