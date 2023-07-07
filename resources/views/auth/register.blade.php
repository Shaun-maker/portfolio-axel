@extends('layouts.auth')

@section('content')
<div class="h-[calc(100vh-130px)] flex justify-center items-center">
    <x-auth-form action="register">
        <div class="flex flex-col gap-2">
            <label for="name">Nom</label>
            <input 
                class="border border-neutral-300 py-3.5 px-4 focus-visible:outline-main"
                type="text" required name="name" id="name"
            >
        </div>
        <div class="flex flex-col gap-2">
            <label for="email">Email</label>
            <input 
                class="border border-neutral-300 py-3.5 px-4 focus-visible:outline-main"
                type="text" required name="email" id="email"
            >
        </div>
        <div class="flex flex-col gap-2">
            <label for="password">Mot de passe</label>
            <input
                class="py-3.5 px-4 border border-neutral-300 focus-visible:outline-main" 
                type="password" required name="password" id="password"
            >
        </div>
        <div class="flex flex-col gap-2">
            <label for="password_confirmation">Confirmation du mot de passe</label>
            <input
                class="py-3.5 px-4 border border-neutral-300 focus-visible:outline-main" 
                type="password" required name="password_confirmation" id="password_confirmation"
            >
        </div>
        <div class="flex justify-center">
            <x-cta-button class="self-center">
                Connexion
            </x-cta-button>
        </div>
    </x-auth-form>
</div>

@endsection