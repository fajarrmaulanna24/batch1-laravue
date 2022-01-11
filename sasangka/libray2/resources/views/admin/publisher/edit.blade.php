@extends('layouts.admin')
@section('title', 'Publisher')


@section('content')
	<div class="row">    
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Publisher</h3>
              </div>
             
              <form action="{{url('publisher/'.$publisher->id)}}"method="post">
              	@csrf
              	{{method_field('PUT')}}
                <div class="card-body">
                  <div class="form-group">
                    <label for=>Name</label>
                    <input type="text"name="name"class="form-control"  placeholder="Enter name
                     " required="" value="{{$publisher->name}}">
                  </div>
            
            

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
           </div>
          </div>
            <!-- /.card -->
@endsection
