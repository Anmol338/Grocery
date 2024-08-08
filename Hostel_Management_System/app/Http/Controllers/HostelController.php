<?php

namespace App\Http\Controllers;

use App\Models\Hostel;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class HostelController extends Controller
{
    /**
     * Display a listing of the hostels.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $hostels = Hostel::all();
        return view('hostel.hostel', compact('hostels'));
    }

    /**
     * Show the form for creating a new hostel.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('hostel.create');
    }

    /**
     * Store a newly created hostel in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'description' => 'string',
        ]);

        // Retrieve the user manually
        $user = User::where('id', $request->user_id)->first();

        if (!$user) {
            // Handle the case where the user does not exist
            return redirect()->back()->withErrors(['user_id' => 'The selected user does not exist.']);
        }

        // Proceed with storing the hostel
        $data = $request->all();

        $data['user_id'] = $user->id;

        // Insert data into the database
        Hostel::create($data);

        return redirect()->route('hostel');
    }
}
