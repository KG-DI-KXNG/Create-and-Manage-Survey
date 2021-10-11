<x-app-layout>
    <x-slot name="header">
        @include('layouts.navigation')
    </x-slot>

<!-- component -->
<link
	href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
	rel="stylesheet">


<div class="flex items-center justify-center min-h-screen bg-gray-200">
	<div class="col-span-12">
		<div class="overflow-auto lg:overflow-visible ">
			<table class="table text-gray-400 border-separate space-y-6 text-sm">
				<thead class="bg-white text-gray-900">
					<tr>
						<th class="p-3">Created By</th>
						<th class="p-3 text-left">Survey Name</th>
						<th class="p-3 text-left">Date Created</th>
						<th class="p-3 text-left hidden md:table-cell">Question Amount</th>
						<th class="p-3 text-left hidden md:table-cell">Status</th>
						<th class="p-3 text-left hidden md:hidden lg:table-cell">Allowed Participant</th>
						<th class="p-3 text-left">Action</th>
					</tr>
				</thead>
				<tbody>
                    {{-- {{dd($survey)}} --}}
                    @forelse ($survey as $item)
                        <tr class="bg-white">
                            <td class="p-3">
                                <div class="flex align-items-center">
                                    <img class="rounded-full h-12 w-12  object-cover" src="https://images.unsplash.com/photo-1613588718956-c2e80305bf61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=634&q=80" alt="unsplash image">
                                    <div class="ml-3">
                                        <div class="">{{$item->users->name}}</div>
                                        <div class="text-gray-500">{{$item->users->email}}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-3">
                                {{$item->name}}
                            </td>
                            <td class="p-3 font-bold">
                                {{ date("M d, Y",strtotime($item->created_at)) }}
                            </td>
                            <td class="p-3 font-bold hidden md:table-cell">
                                {{count($item->questions)}}
                            </td>
                            
                            <td class="p-3 hidden md:table-cell">
                                <span class="bg-green-400 text-gray-50 rounded-md px-2">available</span>
                            </td>
                            <td class="p-3 hidden lg:table-cell">
                                <span class="text-gray-900 rounded-md px-2">{{$item->settings["limit-per-participant"] }}</span>
                            </td>
                            <form>@csrf
                            <td class="p-3  flex flex-nowrap ">
                                
                                    <button
                                        formmethod="post"
                                        formaction="{{route('survey.dosurvey')}}"
                                        class="text-gray-400 hover:text-gray-100 mr-2"
                                        name="surveyId"
                                        value="{{$item->id}}"

                                    
                                    ><i class="material-icons-outlined text-base">visibility</i></button>
                                
                                <a href="#" class="text-gray-400 hover:text-gray-100  mx-2">
                                    <i class="material-icons-outlined text-base">edit</i>
                                </a>
                                    <button
                                        formmethod="post"
                                        formaction="{{ route('survey.delete',['id'=>$item->id]) }}"
                                        class="text-gray-400 hover:text-gray-100 mr-2"
                                        name="_method"
                                        value="DELETE"                                    
                                    >
                                
                                    <i class="material-icons-round text-base">delete_outline</i>
                                    </button>
                            </form>
                            </td>
                        </tr>
                        
                    @empty
                        
                    @endforelse
                    <tr><td colspan="7">{{$survey->links()}}</td></tr>
				
				</tbody>
			</table>
		</div>
	</div>
</div>


</x-app-layout>