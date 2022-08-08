@extends('admin.layouts.master')

@section('page_title')
    {{__('joblists.index.title')}}
@endsection

@section('content')
	<!-- Page Header -->
    

        <div class="page-header">
            <div class="card breadcrumb-card">
                <div class="row justify-content-between align-content-between" style="height: 100%;">
                    <div class="col-md-6">
                        <h3 class="page-title">{{__('joblists.index.title')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active-breadcrumb">
                                <a href="{{ route('joblists.index') }}">{{ __('joblists.index.title') }}</a>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </div><!-- /card finish -->	
        </div><!-- /Page Header -->

       
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <table class="table table-report -mt-2" id="jobspaces_table">
                            <thead>
                                <tr>
                                {{-- <th>{{__('default.table.sl')}}</th> --}}	
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Email')}}</th>
                                    <th>{{__('Job ID')}}</th>
                                    <th>{{__('Job Name')}}</th>
                                    <th>{{__('Earning')}}</th>
                                    <th>{{__('default.table.status')}}</th>
                                </tr>
                            </thead>
                               
                                 <tbody>
                                        @foreach($jobspaces as $key=>$jobspace)
                                        @php
                                            $id = $jobspace->user_id;
                                            $users = App\Models\User::select('users.*')->where('id',$id)->get();
                                            @endphp
                                            @foreach($users as $user)
                                         
                                            <tr>
                                            {{-- <td>{{ $loop->iteration }}</td> --}}        
                                                <td>{{ $user->name }}</td> 
                                                <td>{{ $user->email }}</td>         
                                                <td>{{ $jobspace->id }}</td>         
                                                <td>{{ $jobspace->campaign_name }}</td>
                                                <td>${{ $jobspace->campaign_earning }}</td>
                                                <td>{{ $jobspace->status }}</td>
                                            </tr> 
                                        @endforeach
                                        @endforeach
                                </tbody>
                               		
                        </table>
                    </div>
                </div>

            </div> <!-- /col-md-12 -->
        </div> <!-- /row -->
    
@endsection



@push('scripts')
<script>
	$(document).ready( function () {
		$('#jobspaces_table').DataTable();
	} );
</script>

@endpush