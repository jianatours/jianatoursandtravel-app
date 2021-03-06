<?php

namespace App\Http\Controllers;

use App\Facility;
use Illuminate\Http\Request;
use App\Hotel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HotelsManagement extends Controller
{
    public function manage() {
        $hotels = auth()->user()->hotels;

        return view('backend.hotel.management.index')->with(['hotels' => $hotels]);
    }

    public function preview($id)
    {
        $hotel         = Hotel::where('id', $id)->first();
        $facilities    = $hotel->facilities;
        $allFacilities = Facility::all();

        if (env('APP_ENV') == 'local') {
            $images = Storage::disk('public')->files('hotel_covers/' . $hotel->id);

            $img_urls = array_map(function ($file) {
                return Storage::url($file);
            }, $images);
        } else if (env('APP_ENV') == 'development') {
            $images = Storage::disk('gcs')->files('hotel_covers/' . $hotel->id);

            $img_urls = array_map(function ($file) {
                return Storage::disk('gcs')->url($file);
            }, $images);
        }

        return view('backend.hotel.management.preview')->with([
            'hotel'     => $hotel,
            'facilities' =>$facilities,
            'facilities' => $facilities,
            'allFacilities' => $allFacilities,
            'images' => $img_urls
            ]);
    }

    public function add_images($id) {
        $hotel = Hotel::where('id', $id)->first();
        return view('backend.hotel.management.add_images')->withHotel($hotel);
    }

    public function update_cover_images($id, Request $request) {
        $this->validate($request, [
            'cover_photo' => 'image|mimes:jpeg,png,jpg'
        ]);

        $hotel = Hotel::where('id', $id)->first();

        if ($request->hasFile('file')) {
            if ($path = $request->file('file')->store('hotel_covers/' . $hotel->id, 'gcs')) {
                $hotel->cover_photos = Storage::disk('gcs')->url($path);
                $hotel->save();
                return response()->json(['message' => 'success']);
            }
        }
    }
}
