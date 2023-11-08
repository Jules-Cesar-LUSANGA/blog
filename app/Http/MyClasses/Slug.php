<?php
namespace App\Http\MyClasses;

class Str {
    public static function makeSlug(String $text)
    {
        return \Str::slug($text);
    }
}