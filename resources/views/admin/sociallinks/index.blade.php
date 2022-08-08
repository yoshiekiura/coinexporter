@extends('admin.layouts.master')

@section('page_title')
    {{__('sociallink.index.title')}}
@endsection

@section('content')
	<!-- Page Header -->
    

        <div class="page-header">
            <div class="card breadcrumb-card">
                <div class="row justify-content-between align-content-between" style="height: 100%;">
                    <div class="col-md-6">
                        <h3 class="page-title">{{__('sociallink.index.title')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active-breadcrumb">
                                <a href="{{ route('sociallinks.index') }}">{{ __('sociallink.index.title') }}</a>
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
                        <table class="table table-report -mt-2" id="sociallink_table">
                            <thead>
                                <tr>
                                {{-- <th>{{__('default.table.sl')}}</th> --}}	
                                    <th>{{__('Promotors Name')}}</th>
                                    <th>{{__('Promotors Email')}}</th>
                                    <th>{{__('Channel Name')}}</th>
                                    <th>{{__('Channel Link')}}</th>
                                    <th>{{__('default.table.status')}}</th>
                                    <th>{{__('default.table.action')}}</th>
                                </tr>
                            </thead>
                               
                                 <tbody>
                                        @foreach($sociallinks as $key=>$sociallink)
                                        @php
                                            $id = $sociallink->user_id;
                                            $users = App\Models\User::select('users.*')->where('id',$id)->get();
                                            @endphp
                                            @foreach($users as $user)
                                         
                                            <tr>
                                            {{-- <td>{{ $loop->iteration }}</td> --}}        
                                                <td>{{ $user->name }}</td> 
                                                <td>{{ $user->email }}</td>         
                                                <td>{{ $sociallink->channel_name }}</td>
                                                <td>{{ $sociallink->channel_link }}</td>
                                                <td>{{ $sociallink->status }}</td>
                                               

                                                <td>
                                                @if($sociallink->status === 'Verified')
                                                <a href="javascript:void(0)" class="custom-edit-btn mr-1"><i class="fa fa-ban mr-1"></i>{{__('Verified')}}
								                </a>
                                                @else
                                                <a href="{{route('sociallinks.verify', $sociallink->id)}}" class="custom-edit-btn mr-1"><i class="fe fe-check mr-1"></i>{{__('Verify')}}
								                </a>
                                                @endif
                                                @if($sociallink->status === 'Rejected')
                                                <a href="javascript:void(0)" class="custom-edit-btn mr-1" style="background:red"><i class="fa fa-ban mr-1"></i>{{__('Rejected')}}
								                </a>
                                                @else
                                                <a href="{{route('sociallinks.reject', $sociallink->id)}}" class="custom-edit-btn mr-1" style="background:red"><i class="fe fe-trash mr-1"></i>{{__('Reject')}}
								                </a>
                                                @endif
                                                </td>
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
		$('#sociallink_table').DataTable();
	} );
</script>

@endpush