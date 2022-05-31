<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Create Post!</h1>

            <form method="POST" action="/update/{{ $post->id }}" class="mt-10">
                @csrf
            
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                        Comment
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="text" name="comment"
                        id="comment" value="{{ $post->comment }}" required>

                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                        Image
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="file" name="attachment"
                        id="attachment" accept="image/*">

                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="flex">
                    <div class="mb-6 ml-40">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            for="email">
                            Facebook
                        </label>
                        <input class="border border-gray-400 p-2 w-full" name="facebook"
                            id="facebook" type="checkbox" aria-selected="true">
                    </div>
                    <div class="pl-7 mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            for="email">
                            Twitter
                        </label>
                        <input class="border border-gray-400 p-2 w-full" name="twitter" id="twitter"
                            type="checkbox">

                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="share">
                        Share Type
                    </label>
                    <select class="border border-gray-400 p-2 w-full" name="select" id="select" disabled>
                        <option class="border border-gray-400 p-2 w-full" value="now">
                            Share Now</option>
                        <option class="border border-gray-400 p-2 w-full" value="queue" selected>Add to
                            Queue</option>
                    </select>
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>
                <div class="mb-6" id="flotante">
                        <input class="border border-gray-400 p-2 w-full" id="date" type="date" name="date" value="{{ $post->date }}">
                        <input class="border border-gray-400 p-2 w-full" type="time" name="hour" value="{{ $post->hour }}">
                
                </div>  
                <div class="mb-6">
                    <button type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Submit
                    </button>
                    <button type="button"
                        class="closeModal bg-red-400 text-white rounded py-2 px-4 hover:bg-red-500">
                        Cancel
                    </button>
                </div>
            </form>

        </main>
    </section>
</x-layout>