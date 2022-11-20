<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index(Request $request)
    {
        $search = $request->get('q');

        $publishers = Publisher::query()
            ->where('name', 'like', '%'.$search.'%')
            ->paginate(10)
            ->appends('p', $search);
        return view('admin.publishers.index', [
            'publishers' => $publishers,
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        return view('admin.publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     *

     */
    public function store(Request $request)
    {
        Publisher::create($request->except('_token'));


        return redirect()->route('publishers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function show(Publisher $publisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *

     */
    public function edit(Publisher $publisher)
    {
//
    }

    /**
     * Update the specified resource in storage.
     *

     */
    public function update(UpdatePublisherRequest $request, Publisher $publisher)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     *
     */
    public function destroy(Publisher $publisher)
    {

    }
}
