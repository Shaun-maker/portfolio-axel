<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function update_intro(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'intro-title' => ['max:255', 'required'],
            'intro-description' => ['required'],
            'intro-available' => ['max:255', 'required']
        ]);

        $profile = Profile::first();

        // We have to associate column name with form input, because form input
        // doesn't have the same name, to avoid conflict with others forms on the page
        $profile->update([
            'title' => $attributes['intro-title'],
            'description' => $attributes['intro-description'],
            'available' => $attributes['intro-available']
        ]);

        return redirect('/')->with('success', 'L\'introduction a bien été modifiée.');
    }

    public function update_presentation(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'presentation-stack' => ['required'],
            'presentation-location' => ['required']
        ]);

        //dd($request->file('presentation-image')); OK

        if ($request->hasFile('presentation-image')) {
            dd($request->file('presentation-image'));
        };

        $profile = Profile::first();

        $profile->update([
            'stack' => $attributes['presentation-stack'],
            'location' => $attributes['presentation-location'],
        ]);

        return redirect('/')->with('success', 'La section présentation a bien été modifiée.');
    }
}

/* Bonjour ! Je suis Axel Paillaud, développeur web passionné. Explorez mon portfolio pour en savoir plus sur mon travail ! */