<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Services\ImageProcessor;
use Imagick;

class ProfileController extends Controller
{
    public function update_intro(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'intro.title' => ['max:255', 'required'],
            'intro.description' => ['required'],
            'intro.available' => ['max:255', 'required']
        ]);

        $profile = Profile::first();

        //dd($request['intro']['title']);

        $profile->update($attributes['intro']);

        return redirect('/')->with('success', 'L\'introduction a bien été modifiée.');
    }

    public function update_presentation(Request $request): RedirectResponse
    {
        $profile = Profile::first();

        $attributes = $request->validate([
            'presentation-stack' => ['required'],
            'presentation-location' => ['required']
        ]);

        if ($request->hasFile('presentation-image') && 
            $request->file('presentation-image')->isValid()
        ) {
            $path = $request->file('presentation-image')->store('images/profiles');

            $imageProcessor = new ImageProcessor(new Imagick($path), $path);

            $cloneImagePath = $imageProcessor
                ->resizeImage(0, 800)
                ->convertImage('webp')
                ->autoRotateImage()
                ->cloneImage()
                ->destroy();

            $profile->update(['url_image' => $path]);
            $profile->update(['url_image_webp' => $cloneImagePath]);
        };


        $profile->update([
            'stack' => $attributes['presentation-stack'],
            'location' => $attributes['presentation-location'],
        ]);

        return redirect('/')->with('success', 'La section présentation a bien été modifiée.');
    }
}
