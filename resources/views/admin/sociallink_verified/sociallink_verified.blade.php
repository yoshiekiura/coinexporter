@extends('admin.layouts.master')

@section('page_title')
    {{__('sociallink_verified.index.title')}}
@endsection

@section('content')
	<!-- Page Header -->
    

        <div class="page-header">
            <div class="card breadcrumb-card">
                <div class="row justify-content-between align-content-between" style="height: 100%;">
                    <div class="col-md-6">
                        <h3 class="page-title">{{__('sociallink_verified.index.title')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active-breadcrumb">
                                <a href="{{ route('sociallink_verified.sociallink') }}">{{ __('sociallink_verified.index.title') }}</a>
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
                                                <td> <span id="status{{$key+1}}">{{ $sociallink->status }}</span></td>
                                               

                                                <td>
                                               <a href="{{route('sociallink_verified.suspend', $sociallink->id)}}" class="custom-edit-btn mr-1" style="background:#FFC300">{{__('Suspend')}}
								                </a>
                                                <a href="{{route('sociallink_verified.restrict', $sociallink->id)}}" class="custom-edit-btn mr-1" style="background:red">{{__('Restrict')}}
								                </a>
                                                
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

@endpush