<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function update(Request $request): RedirectResponse
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
}

/* Bonjour ! Je suis Axel Paillaud, développeur web passionné. Explorez mon portfolio pour en savoir plus sur mon travail ! */