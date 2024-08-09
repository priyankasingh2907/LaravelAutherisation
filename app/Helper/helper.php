<?php

use App\Models\category;

function getCategory(){
   return  category::orderBy('name','desc')
   ->with('subcategory')
   ->where('status',1)->take(4)->get();
}
?>