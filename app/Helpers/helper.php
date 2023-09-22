<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\ProductCategory;
use App\Models\SalesType;
use App\Models\Salessource;

use App\Models\Client;
use App\Models\Product;
use App\Models\Leads;
use App\Models\Todo;

if (!function_exists('getCategoryName')) {

    function getCategoryName(string $id)
    {
        $category = ProductCategory::findOrFail($id);
        return $category->category;
    }
}

if (!function_exists('getStateName')) {
    function getStateName(string $id)
    {
        $type = Salestype::findOrFail($id);
        return $type->type;
    }
}

if (!function_exists('getClientName')) {

    function getClientName(string $id)
    {
        $client = Client::findOrFail($id);
        return $client->name;
    }
}

if (!function_exists('getProductName')) {

    function getProductName(string $id)
    {
        $product = Product::findOrFail($id);
        return $product->name;
    }
}

if (!function_exists('getSourceName')) {

    function getSourceName(string $id)
    {
        $source = Salessource::findOrFail($id);
        return $source->source;
    }
}

if (!function_exists('getLeadByDate')) {

    function getLeadByDate(string $date)
    {
        $leads = Leads::where('user_id', Auth::user()->id)
            ->where('executionDate', $date)
            ->orderBy('executionTime', 'asc')
            ->get();
        return $leads;
    }
}

if (!function_exists('getTodoByDate')) {
    
    function getTodoByDate(string $date)
    {
        $todos = Todo::where('user_id', Auth::user()->id)
            ->where('date', $date)
            ->orderBy('order','asc')
            ->get();
        return $todos;
    }
}

if (!function_exists('slugify')) {

    function slugify($text){
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicated - symbols
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
        return 'n-a';
        }

        return $text;
    }
}