<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\ProductCategory;

class Helpers extends Controller
{
    public static function getCategoryName(string $id)
    {
        $category = ProductCategory::findOrFail($id);
        return $category->category;
    }

    public static function formatDesc(string $string)
    {
        $string = nl2br($string);
        return $string;
    }
}
