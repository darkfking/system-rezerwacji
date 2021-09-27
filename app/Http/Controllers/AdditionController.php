<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addition;

class AdditionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create()
    {
        $additions = Addition::all();
        return view('addition.create', compact('additions'));
    }

    public function store(Request $request)
    {
        Addition::create($request->all());

        return redirect()->route('addition.create')->with('message', 'Usługa została dodana!');
    }

    public function destroy(Addition $add)
    {
        $add->delete();
        return redirect()->route('addition.create');
    }
}
