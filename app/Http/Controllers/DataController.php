<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
	/**
	 * Function for GET route which displays blade
	 */
	public function create() {
		return view('create');
	}

	/**
	 * Function for POST route which stores data in table
	 */
	public function store(Request $request) {
		$data = new Data;
		if (!empty($request->input('name'))) {
			$data->name = $request->input('name');
			$data->save();
			return redirect()->back()->with('status', 'Data Added');
		} else {
			return redirect()->back()->with('status', 'Failed to Add Data: Name cannot be null');
		}
	}
}
