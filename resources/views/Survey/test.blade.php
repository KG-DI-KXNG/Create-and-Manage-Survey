<x-app-layout>
    <x-slot name="header">
        @include('layouts.navigation')
    </x-slot>

<!-- component -->
<link
	href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
	rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    @if (session('success'))
        <div class="alert alert-success"> {{session('success')}} </div>
    @endif


<div class="flex justify-center min-h-screen bg-gray-200">
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
						{{-- <th class="p-3 text-left hidden md:hidden lg:table-cell">Allowed Participant</th> --}}
						<th class="p-3 text-left">Action</th>
					</tr>
				</thead>
				<tbody>
                    {{-- {{dd($survey)}} --}}
                    @forelse ($survey as $item)
                        <tr class="bg-white" id="tableRow">
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
                            
                            <form>@csrf
                            <td class="p-3  flex flex-nowrap ">
                                
                                    <button
                                        formmethod="post"
                                        formaction="{{route('survey.dosurvey')}}"
                                        class="text-gray-400 hover:text-gray-100 mr-2"
                                        name="surveyId"
                                        value="{{$item->id}}"

                                    
                                    ><i class="material-icons-outlined text-base">visibility</i></button>
                                   
                                <a href="" class="text-gray-400 hover:text-gray-100  mx-2">
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
                                </td>
                                
                                <td id="tableSend"> 
                                    <x-button
                                    formmethod="post"
                                    formaction="{{ route('survey.view',['surveyid'=>$item->id]) }}" 
                                                              
                                    >
                                    {{__('Send')}}
                                </x-button></td>
                            </tr>
                        </form>
                        
                    @empty
                    <tr><td colspan="7"><center>No records</center></td></tr>

                        
                    @endforelse
                    <tr><td colspan="7">{{$survey->links()}}</td></tr>
				
				</tbody>
			</table>
		</div>
	</div>
</div>

@if (session()->has('surveylink'))

    
<div class="fixed top-0 right-0 bottom-0 left-0  bg-black bg-opacity-25" >
    <div id="form-div">
        <button type="button" class="absolute top-0 right-0 p-3" onclick="closeModal()" ><i class="fas fa-times w-8"></i></button>
        
    <form action="{{route('mail.survey')}}" method="post" class="form" id="form1">@csrf
        
        <p class="name">
        <input name="name" type="text" class="feedback-input" placeholder="Name" id="name" />
        </p>
        
        <p class="email">
        <input name="email" type="text" required class="feedback-input" id="email" placeholder="Email" />
        </p>
        
        <p class="text">
        <input readonly name="url" class="feedback-input" id="comment"  value="{{session('surveylink')}}" >
        </p>
        
        
        <div class="submit">
        <input type="submit" value="SEND" id="button-blue"/>
        <div class="ease"></div>
        </div>
    </form>
    </div>
</div>
   
@endif

    </div>


</x-app-layout>