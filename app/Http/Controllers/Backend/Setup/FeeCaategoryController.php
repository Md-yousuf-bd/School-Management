<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Model\FeeCategory;
use Illuminate\Http\Request;

class FeeCaategoryController extends Controller
{
    public function view()
    {
        $data['allData'] = FeeCategory::all();
        return view('backend.setup.fee_category.view-fee-category', $data);
    }

    public function add()
    {
        return view('backend.setup.fee_category.add-fee-category');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:fee_categories,name'
        ]);

        $data = new FeeCategory();
        $data->name = $request->name;
        $data->save();

        return redirect()->route('setups.fee.category.view')->with('success', 'Data Inserted Successfully');
    }

    public function edit($id)
    {
        $data['editData'] = FeeCategory::find($id);
        return view('backend.setup.fee_category.add-fee-category', $data);
    }

    public function update(Request $request, $id)
    {
        $data = FeeCategory::find($id);

        $this->validate($request, [
            'name' => 'required|unique:fee_categories,name,' . $data->id
        ]);

        $data->name = $request->name;
        $data->save();

        return redirect()->route('setups.fee.category.view')->with('success', 'Data Updated Successfully');
    }

    public function delete(Request $request)
    {
        $data = FeeCategory::find($request->id);
        $data->delete();

        return redirect()->route('setups.fee.category.view')->with('success', 'Data Deleted Successfully');
    }

}
