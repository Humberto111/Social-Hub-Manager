<x-layout>
	<section class="px-6 py-8 ml-40">
		<!-- Button to trigger modal -->
		<button type="button"
			class="focus:outline-none openModal text-white text-sm py-2.5 px-5 mt-5 mx-5  rounded-md bg-green-500 hover:bg-green-600 hover:shadow-lg">Create
			Post</button>
		<!-- This example requires Tailwind CSS v2.0+ -->
		<div class="fixed z-10 inset-0 invisible overflow-y-auto" aria-labelledby="modal-title" role="dialog"
			aria-modal="true" id="interestModal">
			<div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
				<div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
				<span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
				<div
					class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
					<div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
						<div class="sm:flex sm:items-start">
							<main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
								<h1 class="text-center font-bold text-xl">Create Post!</h1>
								<form method="POST" action="/post" class="mt-10">
									@csrf

									<div class="mb-6">
										<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
											Comment
										</label>

										<input class="border border-gray-400 p-2 w-full" type="text" name="comment"
											id="comment" value="{{ old('Comment') }}" required>

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
												id="facebook" type="checkbox">
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
										<select class="border border-gray-400 p-2 w-full" name="select" id="select">
											<option class="border border-gray-400 p-2 w-full" value="now" selected>
												Share Now</option>
											<option class="border border-gray-400 p-2 w-full" value="queue">Add to
												Queue</option>
										</select>
										@error('name')
										<p class="text-red-500 text-xs mt-1">{{$message}}</p>
										@enderror

									</div>
									<div class="mb-6" id="flotante" style="display:none;">
											<input class="border border-gray-400 p-2 w-full" id="date" type="date" name="date">
											<input class="border border-gray-400 p-2 w-full" type="time" name="hour">
									
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
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		<div class="fixed z-10 inset-0 invisible overflow-y-auto" aria-labelledby="modal-title" role="dialog"
			aria-modal="true" id="interestEdit">
			<div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
				<div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
				<span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
				<div
					class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
					<div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
						<div class="sm:flex sm:items-start">
							<main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
								<h1 class="text-center font-bold text-xl">Create Post!</h1>
								<form method="POST" action="/publish" class="mt-10">
									@csrf

									<div class="mb-6">
										<label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
											Commentdasdasdasd
										</label>

										<input class="border border-gray-400 p-2 w-full" type="text" name="comment"
											id="comment" value="{{ old('Comment') }}" required>

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
												id="facebook" type="checkbox">
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
										<button type="submit"
											class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
											Submit
										</button>
										<button type="button"
											class="closeEdit bg-red-400 text-white rounded py-2 px-4 hover:bg-red-500">
											Cancel
										</button>
									</div>
								</form>
							</main>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>

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
									<th class="px-6 py-4 whitespace-nowrap">Time</th>
									<th class="px-6 py-4 whitespace-nowrap">Status</th>
								</tr>
								@foreach ($post as $posts)
								<tr class="mt-12">
									<td class="px-6 py-4 whitespace-nowrap">
										<div class="flex items-center">
											<div class="ml-4">
												<div class="text-sm font-medium text-gray-900">
													{{ $posts->comment }}
												</div>
											</div>
										</div>
									</td>
									<td class="px-6 py-4 whitespace-nowrap">
										<div class="flex items-center">
											<div class="ml-4">
												<div class="text-sm font-medium text-gray-900">
													{{ $posts->date }}
												</div>
											</div>
										</div>
									</td>
									<td class="px-6 py-4 whitespace-nowrap">
										<div class="flex items-center">
											<div class="ml-4">
												<div class="text-sm font-medium text-gray-900">
													{{ $posts->hour }}
												</div>
											</div>
										</div>
									</td>
									<td class="px-6 py-4 whitespace-nowrap">
										<div class="flex items-center">
											<div class="ml-4">
												<div class="text-sm font-medium text-gray-900">
													{{ $posts->status }}
												</div>
											</div>
										</div>
									</td>
									@if($posts->status === "pending")
									<td class="whitespace-nowrap text-center text-sm font-medium">
											<a href="/edit/{{ $posts->id }}" class=" OpenEdit bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 border border-green-500 rounded">Edit</a>
											<a href="/delete/{{ $posts->id }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Delete</a>
						
									</td>
									@endif
										@endforeach

									<!-- More people... -->
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script type="text/javascript">
		$(document).ready(function () {
            $('.openModal').on('click', function(e){
                $('#interestModal').removeClass('invisible');
            });
            $('.closeModal').on('click', function(e){
                $('#interestModal').addClass('invisible');
            });
			$('.openEdit').on('click', function(e){
                $('#interestEdit').removeClass('invisible');
            });
            $('.closeEdit').on('click', function(e){
                $('#interestEdit').addClass('invisible');
            });
        });
	</script>
</x-layout>