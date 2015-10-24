<?php

namespace App\Http\Controllers\Host;

use App\Offer;
use App\Picture;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Auth::user()->host->offers;

        return view('host.offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('host.offers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->getValidation());
        $offer = new Offer($request->all());
        Auth::user()->host->offers()->save($offer);

        foreach($request->file('pictures', []) as $file) {
            if(!$file) break;
            $picture = new Picture();
            $picture->extension = $file->getClientOriginalExtension();
            $offer->pictures()->save($picture);
            $file->move(storage_path('app/pictures'), 'pic_' . $picture->id);
        }
        flash()->success('Gespeichert');

        return redirect('host/offers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer = Offer::findOrFail($id)->isOwnedOrFail();

        return view('host.offers.edit', compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $offer = Offer::findOrFail($id)->isOwnedOrFail();
        $this->validate($request, $this->getValidation());
        $offer->update($request->all());

        $keepPictures = $request->input('keep_pictures', []);
        $pictures = $offer->pictures()->lists('id');

        foreach($pictures->diff($keepPictures) as $pictureId) {
            $picture = Picture::findOrFail($pictureId);
            unlink(storage_path('app/pictures/pic_' . $picture->id));
            $picture->delete();
        }

        foreach($request->file('pictures', []) as $file) {
            if(!$file) break;
            $picture = new Picture();
            $picture->extension = $file->getClientOriginalExtension();
            $offer->pictures()->save($picture);
            $file->move(storage_path('app/pictures'), 'pic_' . $picture->id);
        }

        return redirect('host/offers');
    }

    public function delete($id)
    {
        $offer = Offer::findOrFail($id)->isOwnedOrFail();

        return view('host.offers.delete', compact('offer'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer = Offer::findOrFail($id)->isOwnedOrFail();
        foreach($offer->pictures as $picture) {
            unlink(storage_path('app/pictures/pic_' . $picture->id));
            $picture->delete();
        }
        $offer->delete();
        flash()->success('Gelöscht.');

        return redirect('host/offers');
    }

    protected function getValidation() {
        return [
            'location' => 'required|max:5',
            'type' => 'required|in:' . implode(',', array_keys(getOfferTypes())),
            'rooms' => 'required|numeric',
            'rent' => 'required',
            'available' => 'required|date_format:d.m.Y'
        ];
    }
}
