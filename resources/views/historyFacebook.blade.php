<x-layout>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <section class="py-8 mx-48">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr class="mt-12">
                                    <th class="px-6 py-4 whitespace-nowrap">Comment</th>
                                    <th class="px-6 py-4 whitespace-nowrap">Date</th>
                                </tr>
                                @foreach ($posts as $post)
                                <tr class="mt-12">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $post['message'] }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $post['created_time'] }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                @endforeach

                                <!-- More people... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>