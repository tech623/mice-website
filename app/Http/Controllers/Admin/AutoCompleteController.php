<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venue;

class AutoCompleteController extends Controller
{
    public function autocompletesearch(Request $request)
    {
          $query = $request->get('query');
          $filterResult = Venue::where('name', 'LIKE', '%'. $query. '%')->get();
          return response()->json($filterResult);
    }
}
