<?php

namespace App\Http\Controllers;

use App\Models\rickMorty;
use Illuminate\Http\Request;
use App\Traits\ApiProcessor;

class RickMortyController extends Controller
{
    use ApiProcessor;

    public function index(Request $request)
    {
        return response()->json(['response' => $request]);
    }
    
    public function store(Request $request)
    {
        $className = class_basename(__CLASS__);
        $processedRecords =  $this->saveOnDB($request, $className);     

        return response()->json(['records' => $processedRecords]);
    }
}
