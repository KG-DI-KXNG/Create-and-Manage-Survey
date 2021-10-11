<x-app-layout>
    <x-slot name="header">
        @include('layouts.navigation')
    </x-slot>

<form action="{{route('survey.dosurvey')}}" method="post">
    @csrf
    <div class="col-lg-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <div class="card-tools">
                    <a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="{{route('dashboard')}}"><i class="fa fa-plus"></i> Add New Survey</a>
                </div>
            </div>
            <div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
                <colgroup>
					<col width="5%">
					<col width="20%">
					<col width="20%">
					<col width="20%">
					<col width="20%">
					<col width="15%">
				</colgroup>
				<thead>
                    <tr>
						<th class="text-center">#</th>
						<th>Title</th>
						<th>Description</th>
						<th>Date Created</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
               
                    @foreach ($survey as $item)
                    {{-- <option value="{{$item->id}}">{{$item->name}}</option> --}}
					
					<tr>
                        <th class="text-center"></th>
						<td><b>{{$item->name}}</b></td>
						<td><b class="truncate">{{$item->name}}</b></td>
						<td><b>{{$item->created_at}}</b></td>
						<td><b></b></td>
						<td class="text-center">
                            <!-- <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                Action
		                    </button>
		                    <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="./index.php?page=edit_survey&id= ">Edit</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item delete_survey" href="javascript:void(0)" data-id="">Delete</a>
		                    </div> -->
		                    <div class="btn-group">
                                <a href="./index.php?page=edit_survey&id={{$item->id}}" class="btn btn-primary btn-flat">
                                    <i class="fas fa-edit"></i>
		                        </a>
		                        <a  href="./index.php?page=view_survey&id={{$item->name}}" class="btn btn-info btn-flat">
                                    <i class="fas fa-eye"></i>
		                        </a>
		                        <button type="button" class="btn btn-danger btn-flat delete_survey" data-id="{{$item->name}}">
                                    <i class="fas fa-trash"></i>
		                        </button>
                            </div>
						</td>
					</tr>	
                    @endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
</form>

</x-app-layout>