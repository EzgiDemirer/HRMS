@extends('layouts.admin')

@section('title')
Official Occasions
@endsection

@section('contentheader')
Settings Menu
@endsection

@section('contentheaderactivelink')
<a href="{{ route('occasions.index') }}">Occasions</a>
@endsection

@section('contentheaderactive')
Add
@endsection

@section('content')

<div class="col-12">
   <div class="card">

      <div class="card-header">
         <h3 class="card-title card_title_center">
            Add Official Occasion
         </h3>
      </div>

      <div class="card-body">

         <form action="{{ route('occasions.store') }}" method="post">
            @csrf

            <div class="col-md-12">
               <div class="form-group">
                  <label>Occasion Name</label>
                  <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                  @error('name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group">
                  <label>Start Date</label>
                  <input type="date" name="from_date" id="from_date" class="form-control" value="{{ old('from_date') }}">
                  @error('from_date')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group">
                  <label>End Date</label>
                  <input type="date" name="to_date" id="to_date" class="form-control" value="{{ old('to_date') }}">
                  @error('to_date')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group">
                  <label>Number of Days</label>
                  <input type="text" name="days_counter" id="days_counter"
                     oninput="this.value=this.value.replace(/[^0-9.]/g,'');"
                     class="form-control"
                     value="{{ old('days_counter') }}">
                  @error('days_counter')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group">
                  <label>Status</label>
                  <select name="active" id="active" class="form-control">
                     <option @if(old('active')==1) selected @endif value="1">Active</option>
                     <option @if(old('active')==0 and old('active')!='') selected @endif value="0">Inactive</option>
                  </select>
                  @error('active')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group text-center">
                  <button class="btn btn-sm btn-success" type="submit" name="submit">
                     Add Occasion
                  </button>

                  <a href="{{ route('occasions.index') }}" class="btn btn-danger btn-sm">
                     Cancel
                  </a>
               </div>
            </div>

         </form>

      </div>
   </div>
</div>

@endsection