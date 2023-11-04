<?php

namespace App\Http\Controllers;

use App\Models\Shahrestan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getChildShahrestans(Request $request)
    {
        //geting shahrestans by ajax request
        if(! $request->ajax()) {
            return response()->json([
                'status' => 'not ajax request',
            ]);
        }
        $valid_data=$request->validate([
            'ostan_id'=>['required']
        ]);
        $childShahrestans=Shahrestan::where('ostan',$valid_data['ostan_id'])->get();
        return $childShahrestans;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
