@extends('layouts.admin')
@section('title')
General System Settings
@endsection

@section('contentheader')
Settings Menu
@endsection

@section('contentheaderactivelink')
<a href="{{ route('admin_panel_settings.edit') }}">Edit General Settings</a>
@endsection

@section('contentheaderactive')
Edit
@endsection

@section('content')
<div class="card">
   <div class="card-header">
      <h3 class="card-title card_title_center">Update General System Settings</h3>
   </div>
   <div class="card-body">
      @if(@isset($data) and !@empty($data))
      <form action="{{ route('admin_panel_settings.update') }}">
         <div class="row">
            @csrf

            <div class="col-md-12">
               <div class="form-group">
                  <label>Company Name</label>
                  <input type="text" name="company_name" id="company_name" class="form-control" value="{{ old('company_name',$data['company_name']) }}">
                  @error('company_name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group">
                  <label>Company Phone</label>
                  <input type="text" name="phones" id="phones" class="form-control" value="{{ old('phones',$data['phones']) }}" placeholder="Enter company phone">
                  @error('phones')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group">
                  <label>Company Address</label>
                  <input type="text" name="address" id="address" class="form-control" value="{{ old('address',$data['address']) }}" placeholder="Enter company address">
                  @error('phones')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group">
                  <label>Company Email</label>
                  <input type="text" name="email" id="email" class="form-control" value="{{ old('email',$data['email']) }}" placeholder="Enter company email">
                  @error('phones')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group">
                  <label>Minutes before counting attendance delay</label>
                  <input type="text" name="after_miniute_calculate_delay" id="after_miniute_calculate_delay" class="form-control" value="{{ old('after_miniute_calculate_delay',$data['after_miniute_calculate_delay']) }}" oninput="this.value=this.value.replace(/[^0-9.]/g,'');">
                  @error('after_miniute_calculate_delay')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group">
                  <label>Minutes before counting early departure</label>
                  <input type="text" name="after_miniute_calculate_early_departure" id="after_miniute_calculate_early_departure" class="form-control" value="{{ old('after_miniute_calculate_early_departure',$data['after_miniute_calculate_early_departure']) }}" oninput="this.value=this.value.replace(/[^0-9.]/g,'');">
                  @error('phones')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group">
                  <label>Total minutes of delay or early departure before deducting a quarter day</label>
                  <input type="text" name="after_miniute_quarterday" id="after_miniute_quarterday" class="form-control" value="{{ old('after_miniute_quarterday',$data['after_miniute_quarterday']) }}" oninput="this.value=this.value.replace(/[^0-9.]/g,'');">
                  @error('after_miniute_quarterday')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group">
                  <label>Number of delays or early departures before deducting half a day</label>
                  <input type="text" name="after_time_half_daycut" id="after_time_half_daycut" class="form-control" value="{{ old('after_time_half_daycut',$data['after_time_half_daycut']) }}" oninput="this.value=this.value.replace(/[^0-9.]/g,'');">
                  @error('after_time_half_daycut')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group">
                  <label>Number of delays or early departures before deducting a full day</label>
                  <input type="text" name="after_time_allday_daycut" id="after_time_allday_daycut" class="form-control" value="{{ old('after_time_allday_daycut',$data['after_time_allday_daycut']) }}" oninput="this.value=this.value.replace(/[^0-9.]/g,'');">
                  @error('after_time_allday_daycut')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group">
                  <label>Monthly vacation balance</label>
                  <input type="text" name="monthly_vacation_balance" id="monthly_vacation_balance" class="form-control" value="{{ old('monthly_vacation_balance',$data['monthly_vacation_balance']) }}" oninput="this.value=this.value.replace(/[^0-9.]/g,'');">
                  @error('monthly_vacation_balance')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group">
                  <label>Number of days before vacation balance starts</label>
                  <input type="text" name="after_days_begin_vacation" id="after_days_begin_vacation" class="form-control" value="{{ old('after_days_begin_vacation',$data['after_days_begin_vacation']) }}" oninput="this.value=this.value.replace(/[^0-9.]/g,'');">
                  @error('after_days_begin_vacation')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group">
                  <label>Initial vacation balance granted when vacation is activated for an employee</label>
                  <input type="text" name="first_balance_begin_vacation" id="first_balance_begin_vacation" class="form-control" value="{{ old('first_balance_begin_vacation',$data['first_balance_begin_vacation']) }}" oninput="this.value=this.value.replace(/[^0-9.]/g,'');">
                  @error('first_balance_begin_vacation')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group">
                  <label>Deduction value after the first absence without permission</label>
                  <input type="text" name="sanctions_value_first_abcence" id="sanctions_value_first_abcence" class="form-control" value="{{ old('sanctions_value_first_abcence',$data['sanctions_value_first_abcence']) }}" oninput="this.value=this.value.replace(/[^0-9.]/g,'');">
                  @error('sanctions_value_first_abcence')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group">
                  <label>Deduction value after the second absence without permission</label>
                  <input type="text" name="sanctions_value_second_abcence" id="sanctions_value_second_abcence" class="form-control" value="{{ old('sanctions_value_second_abcence',$data['sanctions_value_second_abcence']) }}" oninput="this.value=this.value.replace(/[^0-9.]/g,'');">
                  @error('sanctions_value_second_abcence')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group">
                  <label>Deduction value after the third absence without permission</label>
                  <input type="text" name="sanctions_value_thaird_abcence" id="sanctions_value_thaird_abcence" class="form-control" value="{{ old('sanctions_value_thaird_abcence',$data['sanctions_value_thaird_abcence']) }}" oninput="this.value=this.value.replace(/[^0-9.]/g,'');">
                  @error('sanctions_value_thaird_abcence')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
               </div>
            </div>

            <div class="col-md-12">
               <div class="form-group">
                  <label>Deduction value after the fourth absence without permission</label>
                  <input type="text" name="sanctions_value_forth_abcence" id="sanctions_value_forth_abcence" class="form-control" value="{{ old('sanctions_value_forth_abcence',$data['sanctions_value_forth_abcence']) }}" oninput="this.value=this.value.replace(/[^0-9.]/g,'');">
                  @error('sanctions_value_forth_abcence')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
               </div>
            </div>

            <div class="col-md-12 text-center">
               <div class="form-group">
                  <button type="submit" class="btn btn-success">Update</button>
               </div>
            </div>
         </div>
      </form>
      @else
      <p class="bg-danger text-center">Sorry, no data available to display</p>
      @endif
   </div>
</div>
@endsection