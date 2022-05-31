<x-layout>
    <form method="POST" action="/send">
        @csrf
        <div class="mx-auto py-20 mt-12 bg-gray-200 w-3/5 border-solid border-4 border-blue-500">
            <div class="mb-12 text-center text-3xl">
            <h1 class="border-blue-500">Connect a new channel</h1>
            </div>
            <div class="mb-12 text-center text-3xl">
                <div class="lg:grid lg:grid-cols-6">
                    <article
                        class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl col-span-3">
                        <div class="py-6 px-5">
                            <div>
                                <img class="w-40 mx-auto" src="/img/twitter.png" alt="twitter">
                            </div>

                            <div class="mt-8 flex flex-col justify-between">
                                <div class="font-bold text-xl mb-2">Twitter</div>

                                @if($twitter)
                                <a class="bg-green-500 text-white uppercase font-semibold
                                text-xs py-2 px-10 rounded-2xl hover:bg-green-600" href="/twitter"><button>You are Connect</button></a>
                                @endif
                                @if($twitter === null)
                                <a class="bg-blue-500 text-white uppercase font-semibold
                                text-xs py-2 px-10 rounded-2xl hover:bg-blue-600" href="/twitter"><button>Pending</button></a>
                                @endif
                            </div>
                        </div>
                    </article>
                    <article
                        class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl col-span-3">
                        <div class="py-6 px-5">
                            <div>
                                <img class="w-40 mx-auto" src="/img/facebook.png" alt="facebook">
                            </div>

                            <div class="mt-8 flex flex-col justify-between">
                                <div class="font-bold text-xl mb-2">Facebook</div>
                                <a class="bg-blue-500 text-white uppercase font-semibold
                                text-xs py-2 px-10 rounded-2xl hover:bg-blue-600" href="/twitter"><button>Connect</button></a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </form>
</x-layout>