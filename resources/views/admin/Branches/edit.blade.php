@extends('layouts.admin')

@section('title')
Branches
@endsection

@section('contentheader')
Settings Menu
@endsection

@section('contentheaderactivelink')
<a href="{{ route('branches.index') }}">Branches</a>
@endsection

@section('contentheaderactive')
Edit
@endsection

@section('content')

<div class="col-12">
   <div class="card">

      <div class="card-header">
         <h3 class="card-title card_title_center">
            Edit Branch Data
         </h3>
      </div>

      <div class="card-body">

         <form action="{{ route('branches.update',$data['id']) }}" method="post">
            @csrf

            <div class="form-group">
               <div class="col-md-12">
                  <div class="form-group">

                     <label>Branch Name</label>

                     <input type="text" name="name" id="name" class="form-control"
                     value="{{ old('name',$data['name']) }}">

                     @error('name')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror

                  </div>
               </div>
            </div>


            <div class="col-md-12">
               <div class="form-group">

                  <label>Branch Address</label>

                  <input type="text" name="address" id="address" class="form-control"
                  value="{{ old('address',$data['address']) }}">

                  @error('address')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror

               </div>
            </div>


            <div class="col-md-12">
               <div class="form-group">

                  <label>Branch Phone</label>

                  <input type="text" name="phones" id="phones" class="form-control"
                  value="{{ old('phones',$data['phones']) }}">

                  @error('phones')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror

               </div>
            </div>


            <div class="col-md-12">
               <div class="form-group">

                  <label>Branch Email</label>

                  <input type="email" name="email" id="email" class="form-control"
                  value="{{ old('email',$data['email']) }}">

                  @error('email')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror

               </div>
            </div>


            <div class="col-md-12">
               <div class="form-group">

                  <label>Status</label>

                  <select name="active" id="active" class="form-control">

                     <option {{ old('active',$data['active'])==1 ? 'selected':'' }} value="1">
                        Active
                     </option>

                     <option {{ old('active',$data['active'])==0 ? 'selected':'' }} value="0">
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
                     Update Branch
                  </button>

                  <a href="{{ route('branches.index') }}" class="btn btn-danger btn-sm">
                     Cancel
                  </a>

               </div>
            </div>

         </form>

      </div>

   </div>
</div>

@endsection