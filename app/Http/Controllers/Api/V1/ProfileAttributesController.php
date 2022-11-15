<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\ProfileAttributes;
use App\Http\Requests\StoreProfileAttributesRequest;
use App\Http\Requests\UpdateProfileAttributesRequest;
use App\Http\Resources\V1\ProfileAttributesResource;
use App\Http\Resources\V1\ProfileAttributesCollection;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProfileResource;
use App\Services\V1\ProfileAttributesQuery;
use Illuminate\Http\Request;

class ProfileAttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = new ProfileAttributesQuery();
        $filterItems = $filter->transform($request);

        $includeInterests = $request->query('includeInterests');
        $profileAttributes = ProfileAttributes::where($filterItems);

        if ($includeInterests) {
            $profileAttributes = $profileAttributes->with('interest');
        }
        return new ProfileAttributesCollection($profileAttributes->paginate()->appends($request->query()));
        // return new ProfileAttributesCollection(ProfileAttributes::all());
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
     * @param  \App\Http\Requests\StoreProfileAttributesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfileAttributesRequest $request)
    {
        return new ProfileAttributesResource(ProfileAttributes::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfileAttributes  $profileAttributes
     * @return \Illuminate\Http\Response
     */
    public function show(ProfileAttributes $profileAttributes)
    {
        return new ProfileAttributesResource($profileAttributes);
        // return ProfileAttributes::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfileAttributes  $profileAttributes
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfileAttributes $profileAttributes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfileAttributesRequest  $request
     * @param  \App\Models\ProfileAttributes  $profileAttributes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileAttributesRequest $request, ProfileAttributes $profileAttributes)
    {
        return $profileAttributes->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfileAttributes  $profileAttributes
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileAttributes $profileAttributes)
    {
        //
    }
}
