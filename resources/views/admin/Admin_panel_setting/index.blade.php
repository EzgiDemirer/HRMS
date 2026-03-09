@extends('layouts.admin')

@section('title')
General System Settings
@endsection

@section('contentheader')
Settings Menu
@endsection

@section('contentheaderactivelink')
<a href="{{ route('admin_panel_settings.index') }}">General Settings</a>
@endsection

@section('contentheaderactive')
View
@endsection

@section('content')
<div class="col-12">
   <div class="card">
      <div class="card-header">
         <h3 class="card-title card_title_center">General System Settings Data</h3>
      </div>

      <div class="card-body">
         @if(@isset($data) and !@empty($data))

         <table id="example2" class="table table-bordered table-hover">

            <tr>
               <td class="width30">Company Name</td>
               <td>{{ $data['company_name'] }}</td>
            </tr>

            <tr>
               <td class="width30">System Status</td>
               <td>
                  @if($data['saysem_status']==1)
                  Active
                  @else
                  Inactive
                  @endif
               </td>
            </tr>

            <tr>
               <td class="width30">Company Phone</td>
               <td>{{ $data['phones'] }}</td>
            </tr>

            <tr>
               <td class="width30">Company Address</td>
               <td>{{ $data['address'] }}</td>
            </tr>

            <tr>
               <td class="width30">Company Email</td>
               <td>{{ $data['email'] }}</td>
            </tr>

            <tr>
               <td class="width30">Minutes before counting attendance delay</td>
               <td>{{ $data['after_miniute_calculate_delay'] }}</td>
            </tr>

            <tr>
               <td class="width30">Minutes before counting early departure</td>
               <td>{{ $data['after_miniute_calculate_delay'] }}</td>
            </tr>

            <tr>
               <td class="width30">Total minutes of delay or early departure before deducting a quarter day</td>
               <td>{{ $data['after_miniute_quarterday'] }}</td>
            </tr>

            <tr>
               <td class="width30">Number of delays or early departures before deducting half day</td>
               <td>{{ $data['after_time_half_daycut'] }}</td>
            </tr>

            <tr>
               <td class="width30">Number of delays or early departures before deducting full day</td>
               <td>{{ $data['after_time_allday_daycut'] }}</td>
            </tr>

            <tr>
               <td class="width30">Monthly Vacation Balance</td>
               <td>{{ $data['monthly_vacation_balance'] }}</td>
            </tr>

            <tr>
               <td class="width30">Days before vacation balance starts</td>
               <td>{{ $data['after_days_begin_vacation'] }}</td>
            </tr>

            <tr>
               <td class="width30">Initial vacation balance when activating employee vacation</td>
               <td>{{ $data['first_balance_begin_vacation'] }}</td>
            </tr>

            <tr>
               <td class="width30">Deduction value after first absence without permission</td>
               <td>{{ $data['sanctions_value_first_abcence'] }}</td>
            </tr>

            <tr>
               <td class="width30">Deduction value after second absence without permission</td>
               <td>{{ $data['sanctions_value_second_abcence'] }}</td>
            </tr>

            <tr>
               <td class="width30">Deduction value after third absence without permission</td>
               <td>{{ $data['sanctions_value_thaird_abcence'] }}</td>
            </tr>

            <tr>
               <td class="width30">Deduction value after fourth absence without permission</td>
               <td>{{ $data['sanctions_value_forth_abcence'] }}</td>
            </tr>

            <tr>
               <td colspan="2" class="text-center">
                  <a href="{{ route('admin_panel_settings.edit') }}" class="btn btn-sm btn-danger">
                     Edit
                  </a>
               </td>
            </tr>

         </table>

         @else
         <p class="bg-danger text-center">Sorry, no data available to display</p>
         @endif

      </div>
   </div>
</div>
@endsection