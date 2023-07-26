<footer class="bg-main text-white">
{{--     <div class="py-16 relative border-b-2 overflow-hidden relative flex items-center">
        <div class="text-2xl font-semibold flex items-center absolute animate-marquee" style="animation-delay: -4s">
            <span>Contact</span>
            <i class="fa-solid fa-circle text-xs ml-16"></i>
        </div>
        <div class="text-2xl font-semibold flex items-center absolute animate-marquee" style="animation-delay: -8s">
            <span>Contact</span>
            <i class="fa-solid fa-circle text-xs ml-16"></i>
        </div>
        <div class="text-2xl font-semibold flex items-center absolute animate-marquee" style="animation-delay: -12s">
            <span>Contact</span>
            <i class="fa-solid fa-circle text-xs ml-16"></i>
        </div>
    </div> --}}
    <x-marquee-contact />
    <section class="flex flex-col items-center gap-16 sm:p-16 p-8 border-b-2">
        <p class="sm:text-2xl text-xl text-center">
            Une idée ? Un projet sur lequel vous avez besoin d'aide ? Une question ?
        </p>
        <p class="sm:text-6xl text-4xl text-center uppercase">
            contactez-moi
        </p>
        <a 
            href="mailto:contact@axelweb.fr?subject=Contact%20depuis%20Portfolio%20!"
            class="sm:text-2xl text-xl"
        >
            contact@axelweb.fr
        </a>
        <div class="flex gap-8">
            <x-social-media 
                class="fa-brands fa-linkedin"
                href="https://www.linkedin.com/in/axel-paillaud/"
            >
                LinkedIn
            </x-social-media>
            <x-social-media 
                class="fa-regular fa-file"
                href="/assets/cv/AxelPaillaud.pdf"
            >
                CV
            </x-social-media>
            <x-social-media 
                class="fa-brands fa-github"
                href="https://github.com/axel-paillaud"
            >
                GitHub
            </x-social-media>
        </div>
    </section>
    <div class="p-8">
        Made with <i class="fa-solid fa-heart"></i> by Axel
    </div>
</footer>