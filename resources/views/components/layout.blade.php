<!doctype html>

<title>Social Hub Manager</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<!-- Latest minified bootstrap css -->


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Latest minified bootstrap js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script languague="javascript">
    $( function() {
    $("#select").change( function() {
        if ($(this).val() === "queue") {
            div = document.getElementById('flotante');
                    div.style.display = '';
                    let html = `<p id ="status"></p>`
                    document.getElementById("status").innerHTML = html;
        } else {
            $("#id_input").prop("disabled", false);
        }
    });
});
</script>

<style>
html {
    scroll-behavior: smooth;
}

/* body{
    background: linear-gradient(to right, rgb(0, 17, 255), rgb(255, 0, 0));
} */

.clamp {
    display: -webkit-box;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.clamp.one-line {
    -webkit-line-clamp: 1;
}
</style>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/mainpage">
                    <img src="/img/descarga.png" alt="La-bahia-del-pirata Logo" width="110" height="2">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                @auth
                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="text-xs font-bold uppercase">Welcome {{ auth()->user()->name }}</button>
                    </x-slot>
                    <x-dropdown-item href="/dashboard" :active="request()->is('dashboard')">Connect</x-dropdown-item>
                    <x-dropdown-item href="/publishing" :active="request()->is('publishing')">Publishing</x-dropdown-item>
                    <x-dropdown-item href="/getFacebook" :active="request()->is('getFacebook')">Facebook</x-dropdown-item>
                    <x-dropdown-item href="/getTweets" :active="request()->is('getTweets')">Twitter</x-dropdown-item>
                    <x-dropdown-item href="" x-data="{}"
                        @click.prevent="document.querySelector('#logout-form').submit()">Log Out</x-dropdown-item>

                    <form id="logout-form" method="POST" action="/logout" class="hidden">
                        @csrf
                    </form>
                </x-dropdown>


                @else
                <a href="/register" class="text-xs font-bold uppercase">Register</a>
                <a href="/" class="ml-6 text-xs font-bold uppercase">Log In</a>
                @endauth

                <a href="#newsletter"
                    class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    More info
                </a>
            </div>
        </nav>

        {{$slot}}

        <footer id="newsletter"
            class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <h5 class="text-3xl">Social Hub Manager</h5>
            <p class="text-sm mt-3">Manage your social networks here.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/img/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <div>
                                <input id="email" name="email" type="text" placeholder="Your email address"
                                    class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">

                                @error('email')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>
    <x-flash />

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
</body>