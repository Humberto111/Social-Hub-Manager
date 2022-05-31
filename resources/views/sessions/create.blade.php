<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 border p-8 border-gray-200 rounded-xl">
            <h1 class="text-center font-bold text-xl">Log In</h1>

            <form method="POST" action="/login" class="mt-10">
                @csrf

                <div class="mb-6 font-semibold">
                    <label for="">Email</label>
                    <input class="border border-gray-200 p-2 w-full rounded" id="email" name="email">

                </div>

                <div class="mb-6 font-semibold">
                    <label for="">Password</label>
                    <input class="border border-gray-200 p-2 w-full rounded" type="password" id="password"
                        name="password">
                </div>

                <button type="submit" class="bg-blue-500 text-white uppercase font-semibold
            text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Log In</button>
            </form>
        </main>
    </section>
</x-layout>