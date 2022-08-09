@extends('admin.layouts.master')

@section('page_title')
    {{__('transaction.index.title')}}
@endsection

@section('content')
	<!-- Page Header -->
    

        <div class="page-header">
            <div class="card breadcrumb-card">
                <div class="row justify-content-between align-content-between" style="height: 100%;">
                    <div class="col-md-6">
                        <h3 class="page-title">{{__('transaction.index.title')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active-breadcrumb">
                                <a href="{{ route('transactions.index') }}">{{ __('transaction.index.title') }}</a>
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
                    <div id="successmsg"></div>
                        <table class="table table-report -mt-2" id="transaction_table">
                            <thead>
                                <tr>
                                 <th>{{__('default.table.sl')}}</th> 
                                    <th>{{__('Date')}}</th>
                                    <th>{{__('User Name')}}</th>
                                    <th>{{__('User Email')}}</th>
                                    <th>{{__('Wallet Address')}}</th>
                                    <th>{{__('Transaction Amount')}}</th>
                                    <th>{{__('Transaction Type')}}</th>
                                    {{--<th>{{__('Approved Amount')}}</th>
                                    <th>{{__('default.table.status')}}</th>
                                    <th>{{__('default.table.action')}}</th>--}}
                                </tr>
                            </thead>
                               
                                 <tbody>
                                        @foreach($transactions_log as $key=>$transaction)
                                        @php
                                            $id = $transaction->user_id;
                                            $user = App\Models\User::select('users.*')->where('id',$id)->first();
                                            @endphp
                                           
                                         
                                            <tr>
                                             <td>{{ $loop->iteration }}</td>   
                                                <td>{{ date("d-M-Y", strtotime($transaction->created_at)) }}</td>     
                                                <td>{{ $user->name }}</td> 
                                                <td>{{ $user->email }}</td> 
                                                <td>{{ $user->wallet_address }}</td>
                                                @if(($transaction->approved_amount) < 0)        
                                                <td>${{ round((-$transaction->approved_amount),2) }}</td>
                                                @else
                                                <td>${{ round($transaction->approved_amount,2) }}</td>
                                                @endif
                                                <td>{{ $transaction->transaction_type }}</td>
                                            </tr> 
                                             
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
		$('#transaction_table').DataTable();
	} );
</script>

@endpush