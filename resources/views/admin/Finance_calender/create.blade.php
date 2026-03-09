@extends('layouts.admin')

@section('title')
Financial Years
@endsection

@section('contentheader')
Settings Menu
@endsection

@section('contentheaderactivelink')
<a href="{{ route('finance_calender.index') }}">Financial Years</a>
@endsection

@section('contentheaderactive')
View
@endsection

@section('content')

<div class="col-12">
   <div class="card">

      <div class="card-header">
         <h3 class="card-title card_title_center">
            Add New Financial Year
         </h3>
      </div>

      <div class="card-body">

      <form action="{{ route('finance_calender.store') }}" method="post">
      @csrf

            <div class="col-md-12">
               <div class="form-group">
                  <label>Financial Year Code</label>
                  <input type="text" name="FINANCE_YR" id="FINANCE_YR" class="form-control" value="{{ old('FINANCE_YR') }}">
                  @error('FINANCE_YR')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group">
                  <label>Financial Year Description</label>
                  <input type="text" name="FINANCE_YR_DESC" id="FINANCE_YR_DESC" class="form-control" value="{{ old('FINANCE_YR_DESC') }}">
                  @error('FINANCE_YR_DESC')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group">
                  <label>Financial Year Start Date</label>
                  <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}">
                  @error('start_date')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group">
                  <label>Financial Year End Date</label>
                  <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}">
                  @error('end_date')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group text-center">
               <button class="btn btn-sm btn-success" type="submit" name="submit">Add Financial Year</button>
               </div>
            </div>

      </form>

      </div>
   </div>
</div>

@endsection