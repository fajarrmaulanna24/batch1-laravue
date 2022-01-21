@extends('layouts.admin')
@section('header','Books')

@section('css')
	
@endsection
@endsection
@section('content')
<div class="container" id="controller">
    <div class="row">
		<div class="row w-100 mb-3">
			<div class="col-md-5 ml-auto">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-search"></i></span>
					</div>
					<input type="text" class="form-control" autocomplete="off" placeholder="Search from title" >
				</div>
			</div>
			<div class="col-md-2 mr-auto">
				<button @click="addData()" class="btn btn-primary">Create a new book</button>
			</div>
		</div>
    </div>
	
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <div class="info-box-content">
                <span class="info-box-text h3">Lorem Ipsum</span>
                <span class="info-box-number">Rp.0,-<small></small></span>
              </div>
            </div>
        </div>
    </div>
    
</div>
@endsection