<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;

class BiodataController extends Controller
{

    private $bio;

    public function __construct(Biodata $bio)
    {
        $this->bio = $bio;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bio = $this->bio->all();
        return $this->onSuccess('Biodata', $bio, 'Founded');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $bio = $this->bio->create($request->all());
            return $this->onSuccess('Biodata', $bio, 'Created');
        } catch (\Exception $e) {
            return $this->onError($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bio = $this->bio->find($id);
        return $this->onSuccess('Biodata', $bio, 'Founded');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function edit(Biodata $biodata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $bio = $this->bio->where('id', $id)->update($request->all());
            $biodata = $this->bio->find($id);
            return $this->onSuccess('Biodata', $biodata, 'Updated');
        } catch (\Exception $e) {
            return $this->onError($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Biodata  $biodata
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $biodata = $this->bio->find($id);
        $bio = $this->bio->destroy($id);
        return $this->onSuccess('Biodata', $biodata, 'Deleted');
    }
}
