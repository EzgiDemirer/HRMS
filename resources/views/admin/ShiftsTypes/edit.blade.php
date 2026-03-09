@extends('layouts.admin')

@section('title')
Shift Types
@endsection

@section('contentheader')
Settings Menu
@endsection

@section('contentheaderactivelink')
<a href="{{ route('ShiftsTypes.index') }}">Shift Types</a>
@endsection

@section('contentheaderactive')
Edit
@endsection

@section('content')
<div class="col-12">
   <div class="card">
      <div class="card-header">
         <h3 class="card-title card_title_center">
            Edit Shift Data
         </h3>
      </div>

      <div class="card-body">
         <form action="{{ route('ShiftsTypes.update',$data['id']) }}" method="post">
            @csrf

            <div class="col-md-12">
               <div class="form-group">
                  <label>Shift Type</label>
                  <select name="type" id="type" class="form-control">
                     <option value="">Select Type</option>
                     <option @if(old('type',$data['type'])==1) selected @endif value="1">Morning</option>
                     <option @if(old('type',$data['type'])==2) selected @endif value="2">Evening</option>
                     <option @if(old('type',$data['type'])==3) selected @endif value="3">Full Day</option>
                  </select>
                  @error('type')
                  <span class="text-danger">{{ $message }}</span> 
                  @enderror
               </div>
            </div>

            <div class="form-group">
               <div class="col-md-12">
                  <div class="form-group">
                     <label>Start Time</label>
                     <input type="time" name="from_time" id="from_time" class="form-control" value="{{ old('from_time',$data['from_time']) }}">
                     @error('from_time')
                     <span class="text-danger">{{ $message }}</span> 
                     @enderror
                  </div>
               </div>
            </div>

            <div class="form-group">
               <div class="col-md-12">
                  <div class="form-group">
                     <label>End Time</label>
                     <input type="time" name="to_time" id="to_time" class="form-control" value="{{ old('to_time',$data['to_time']) }}">
                     @error('to_time')
                     <span class="text-danger">{{ $message }}</span> 
                     @enderror
                  </div>
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group">
                  <label>Total Hours</label>
                  <input type="text" name="total_hour" id="total_hour" class="form-control" value="{{ old('total_hour',$data['total_hour']) }}" oninput="this.value=this.value.replace(/[^0-9.]/g,'');">
                  @error('total_hour')
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
                  <button class="btn btn-sm btn-success" type="submit" name="submit">Update Shift</button>
                  <a href="{{ route('ShiftsTypes.index') }}" class="btn btn-danger btn-sm">Cancel</a>
               </div>
            </div>

         </form>
      </div>
   </div>
</div>
@endsection