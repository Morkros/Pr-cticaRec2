<?php

namespace App\Http\Controllers;

use App\Models\randomUser;
use App\Traits\ApiProcessor;
use Illuminate\Http\Request;

class RandomUserController extends Controller
{
    use ApiProcessor;

    public function index(Request $request)
    {
        return response()->json(['response' => $request]);
    }

    public function store(Request $request)
    {
        $className = class_basename(__CLASS__);
        $processedRecords = $this->saveOnDB($request, $className);

        return response()->json(['records' => $processedRecords]);
    }
}
