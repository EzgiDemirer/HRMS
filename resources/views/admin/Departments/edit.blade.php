@extends('layouts.admin')

@section('title')
Departments
@endsection

@section('contentheader')
Settings Menu
@endsection

@section('contentheaderactivelink')
<a href="{{ route('departments.index') }}">Departments</a>
@endsection

@section('contentheaderactive')
Edit
@endsection

@section('content')

<div class="col-12">
   <div class="card">

      <div class="card-header">
         <h3 class="card-title card_title_center">
            Edit Department Data
         </h3>
      </div>

      <div class="card-body">

         <form action="{{ route('departments.update',$data['id']) }}" method="post">
            @csrf

            <div class="col-md-12">
               <div class="form-group">

                  <label>Department Name</label>

                  <input type="text" name="name" id="name" class="form-control"
                  value="{{ old('name',$data['name']) }}">

                  @error('name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror

               </div>
            </div>


            <div class="col-md-12">
               <div class="form-group">

                  <label>Department Phone</label>

                  <input type="text" name="phones" id="phones" class="form-control"
                  value="{{ old('phones',$data['phones']) }}">

                  @error('phones')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror

               </div>
            </div>


            <div class="col-md-12">
               <div class="form-group">

                  <label>Department Notes</label>

                  <input type="text" name="notes" id="notes" class="form-control"
                  value="{{ old('notes',$data['notes']) }}">

                  @error('notes')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror

               </div>
            </div>


            <div class="col-md-12">
               <div class="form-group">

                  <label>Status</label>

                  <select name="active" id="active" class="form-control">

                     <option @if(old('active',$data['active'])==1) selected @endif value="1">
                        Active
                     </option>

                     <option @if(old('active',$data['active'])==0) selected @endif value="0">
                        Inactive
                     </option>

                  </select>

                  @error('active')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror

               </div>
            </div>


            <div class="col-md-12">
               <div class="form-group text-center">

                  <button class="btn btn-sm btn-success" type="submit" name="submit">
                     Update Department
                  </button>

                  <a href="{{ route('departments.index') }}" class="btn btn-danger btn-sm">
                     Cancel
                  </a>

               </div>
            </div>

         </form>

      </div>

   </div>
</div>

@endsection