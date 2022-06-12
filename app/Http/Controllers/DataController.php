<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class DataController extends Controller
{
	/**
	 * Function for create GET route which displays blade
	 */
	public function create() {
		return view('create');
	}

	/**
	 * Function for create POST route which stores data in table
	 */
	public function store(Request $request) {
		$data = new Data;

		// check if input is null, throw error if it is, otherwise create
		if (!empty($request->input('name'))) {
			$data->name = $request->input('name');
			$data->save();
			return redirect()->back()->with('success', 'Data Added');
		} else {
			$errors = new MessageBag;
			$errors->add('nullname', 'Name field cannot be null!');
			return redirect()->back()->withErrors($errors);
		}
	}

	/**
	 * Function for display GET route which displays data from table in blade
	 */
	public function display() {
		$data = Data::all();
		return view('display', compact('data'));
	}

	/**
	 * Function for update GET route which displays blade
	 */
	public function update() {
		return view('update');
	}

	/**
	 * Function for update POST route which alters data in table
	 */
	public function alter(Request $request) {
		$data = Data::find($request->input('id'));
		if (!empty($data)) {
			if (!empty($request->input('name'))) {
				$data->update($request->all());
				return redirect()->back()->with('success', 'Data Updated');
			}  else {
                        	$errors = new MessageBag;
                        	$errors->add('nullname', 'Name field cannot be null!');
                        	return redirect()->back()->withErrors($errors);
                	}
		} else {
			$errors = new MessageBag;
			$errors->add('noid', 'Data with given ID not found; please ensure ID matches existing data!');
			return redirect()->back()->withErrors($errors);
		}
	}

	/**
	 * Function for delete GET route which displays blade
	 */
	public function delete() {
		return view('delete');
	}

	/**
	 * Function for delete POST route which deletes data from table
	 */
	public function remove(Request $request) {
		$data = Data::find($request->input('id'));
		if (!empty($data)) {
			$data->delete();
			return redirect()->back()->with('success', 'Data Deleted');
		} else {
			$errors = new MessageBag;
			$errors->add('noid', 'Data with given ID not found; please ensure ID matches existing data!');
			return redirect()->back()->withErrors($errors);
		}
	}
}
