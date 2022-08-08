@extends('admin.layouts.master')
@section('page_title')
    {{__('campaigntype.index.title')}}
@endsection
@section('content')
	<!-- Page Header -->
	<div class="page-header">
		<div class="card breadcrumb-card">
			<div class="row justify-content-between align-content-between" style="height: 100%;">
				<div class="col-md-6">
					<h3 class="page-title">{{__('campaigntype.index.title')}}</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="{{ route('dashboard') }}">Dashboard</a>
						</li>
						<li class="breadcrumb-item active-breadcrumb">
							<a href="{{ route('campaigntypes.index') }}">{{ __('campaigntype.index.title') }}</a>
						</li>
					</ul>
				</div>
					<div class="col-md-3">
						<div class="create-btn pull-right">
							<a href="{{ route('campaigntypes.create') }}" class="btn custom-create-btn">{{ __('campaigntype.form.add-button') }}</a>
						</div>
					</div>
			</div>
		</div><!-- /card finish -->	
	</div><!-- /Page Header -->

	<div class="row">
		<div class="col-md-12">
			<div class="card">

				<div class="card-body">
					<table class="table table-report" id="role_table">
						<thead>
							<tr>
								<th>{{__('default.table.sl')}}</th>
								<th>{{__('default.table.name')}}</th>
								<th>{{__('default.table.status')}}</th>
								<th>{{__('default.table.action')}}</th>
							</tr>
						</thead>

						<tbody>
							@foreach($campaigntypes as $campaigntype)
								<tr>
									<td>{{$campaigntype->id}}</td>
									<td>{{$campaigntype->campaign_category_name}}</td>
									<td>{{$campaigntype->campaign_category_status}}</td>

									<td>
											<a href="{{route('campaigntypes.edit', $campaigntype->id)}}" class="custom-edit-btn mr-1">
												<i class="fe fe-pencil"></i>
													{{__('default.form.edit-button')}}
											</a>
									
											<span class="flex justify-center items-center">
												<button class="custom-delete-btn remove-campaigntype" data-id="{{ $campaigntype->id }}" data-action="/admin/campaigntypes/destroy">
													<i class="fe fe-trash"></i>
													{{__('default.form.delete-button')}}
												</button>
											</span>
										
									</td>
								</tr>
							@endforeach
							
						</tbody>
						
					</table>
				</div>
			</div>




		</div>

	</div>
@endsection




@push('scripts')
<script>
	$(document).ready( function () {
		$('#role_table').DataTable();
	} );
</script>

<script type="text/javascript">
	$("body").on("click",".remove-campaigntype",function(){
		var current_object = $(this);
		swal({
			title: "Are you sure?",
			text: "You will not be able to recover this data!",
			type: "error",
			showCancelButton: true,
			dangerMode: true,
			cancelButtonClass: '#DD6B55',
			confirmButtonColor: '#dc3545',
			confirmButtonText: 'Delete!',
		},function (result) {
			if (result) {
				var action = current_object.attr('data-action');
				var token = jQuery('meta[name="csrf-token"]').attr('content');
				var id = current_object.attr('data-id');

				$('body').html("<form class='form-inline remove-form' method='POST' action='"+action+"'></form>");
				$('body').find('.remove-form').append('<input name="_method" type="hidden" value="post">');
				$('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
				$('body').find('.remove-form').append('<input name="id" type="hidden" value="'+id+'">');
				$('body').find('.remove-form').submit();
			}
		});
	});
</script>
@endpush