@extends('layouts.admin')

@section('title')
Job Categories
@endsection

@section('contentheader')
Settings Menu
@endsection

@section('contentheaderactivelink')
<a href="{{ route('jobs_categories.index') }}">Jobs</a>
@endsection

@section('contentheaderactive')
Edit
@endsection

@section('content')

<div class="col-12">
   <div class="card">

      <div class="card-header">
         <h3 class="card-title card_title_center">
            Edit Job Category
         </h3>
      </div>

      <div class="card-body">

         <form action="{{ route('jobs_categories.update',$data['id']) }}" method="post">
            @csrf

            <div class="col-md-12">
               <div class="form-group">
                  <label>Job Name</label>
                  <input type="text" name="name" id="name" class="form-control" value="{{ old('name',$data['name']) }}">
                  @error('name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group">
                  <label>Status</label>
                  <select name="active" id="active" class="form-control">
                     <option @if(old('active',$data['active'])==1) selected @endif value="1">Active</option>
                     <option @if(old('active',$data['active'])==0) selected @endif value="0">Inactive</option>
                  </select>
                  @error('active')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group text-center">
                  <button class="btn btn-sm btn-success" type="submit" name="submit">
                     Update Job
                  </button>

                  <a href="{{ route('jobs_categories.index') }}" class="btn btn-danger btn-sm">
                     Cancel
                  </a>
               </div>
            </div>

         </form>

      </div>
   </div>
</div>

@endsection