@extends('layouts.app')

@section('content')

{{-- Presentation section --}}
<section class="text-2xl flex px-32 pb-16 bg-light">

    {{-- Bloc 1 : Name and stack --}}

    <div class="flex flex-col justify-evenly">
        <p>Axel Paillaud, 28 ans</p>
        <h3>
            Fullstack<br>
            PHP/Laravel<br>
            Javascript,<br>
            & more
        </h3>
    </div>

    {{-- Bloc 2 : Pictures and social media --}}

    <div>
        <picture>
            <img src="" alt="">
        </picture>
        <div>
            <a href="#" target="_blank">
                <i class="fa-brands fa-github"></i>
                <p>GitHub</p>
            </a>
            <a href="#" target="_blank">
                <i class="fa-brands fa-linkedin"></i>
                <p>LinkedIn</p>
            </a>
        </div>
    </div>

    {{-- Bloc 3 : CTA button and geographic mobility --}}

    <div>
        <a href="#">Voir mes projets</a>
        <h3>
            Développeur web sur Orléans, Loiret. Mobile sur Tours, Blois, Paris.
            Ouvert au full remote.
        </h3>
    </div>
</section>

@endsection
