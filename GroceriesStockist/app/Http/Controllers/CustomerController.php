<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::get();
        return view('customer.customer', compact('customers'));
    }

    public function create(){
        return view('customer.create');
    }

    public function insert(Request $request){
        // Validate the request
        $request->validate([
            'name' =>'required|min:3,max:50|string',
            'email' =>'required|email|unique:customers,email',
            'contact' =>'required|unique:customers|min:10,max:14|string',
            'address' =>'required|max:255|string'
        ]);

        // Insert data into the database
        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'address' => $request->address
        ]);

        return redirect('customer')->with('status', 'Category created successfully.');
    }

    public function edit($id){
        $customers = Customer::findorfail($id);
        return view('customer.edit', compact('customers'));
    }

    public function update(Request $request, $id){
        // Validate the request
        $request->validate([
            'name' =>'required|min:3,max:50|string',
            'email' =>'required|email|unique:customers,email',
            'contact' =>'required|unique:customers|min:10,max:14|string',
            'address' =>'required|max:255|string'
        ]);

        // Update data into the database
        $customers = Customer::findorfail($id);
        $customers->update([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'address' => $request->address
        ]);

        return redirect('customer')->with('status', 'Customer updated successfully.');
    }

    public function delete($id){
        $customers = Customer::findorfail($id);
        $customers->delete();
        return redirect('customer')->with('status', 'Customer deleted successfully.');
    }
}
