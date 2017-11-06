@extends('admin.layout.erp1')
@section('banner')
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
<img src="{{ URL::asset('new_heading.png') }}" class="img-responsive">
</div>
@endsection
@section('sidebar')
@include('admin.partial.header')
@include('admin.partial.aside')
@endsection
@section('body')
<div class="bg-light lter b-b wrapper-md">
	<h1 class="m-n font-thin h3">Partial Withdrawal</h1>
</div>

{{-- 	@foreach ($data as $datas)
 --}}	<div class="wrapper-md">
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading ">                  
								PDF
							</div>
							<div class="panel-body">
								<iframe src="{{URL::to('/')}}/admin/partialWithdraw/view/pdf/{{$id}}" width="100%" height="800">
									
								</iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	
                   
@endsection
@section('jquery')


@endsection