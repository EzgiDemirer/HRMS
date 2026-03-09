@extends('layouts.admin')

@section('title')
Employee Data
@endsection

@section("css")
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('contentheader')
Employees Data
@endsection

@section('contentheaderactivelink')
<a href="{{ route('Employees.index') }}">Employees</a>
@endsection

@section('contentheaderactive')
Add
@endsection

@section('content')

<div class="col-12">
   <div class="card">
      <div class="card-header">
         <h3 class="card-title card_title_center">Add New Employee</h3>
      </div>

      <div class="card-body">
         <form action="{{ route('Employees.store') }}" method="post">
            @csrf

            <div class="card card-primary card-outline">
               <div class="card-header">
                  <h3 class="card-title">
                     <i class="fas fa-edit"></i>
                     Required Employee Data
                  </h3>
               </div>

               <div class="card-body">
                  <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" id="personal_data_tab" data-toggle="pill" href="#personal_data" role="tab">Personal Data</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="job_data_tab" data-toggle="pill" href="#job_data" role="tab">Job Data</a>
                     </li>
                  </ul>

                  <div class="tab-content pt-3">

                     <div class="tab-pane fade show active" id="personal_data" role="tabpanel">
                        <div class="row">

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Employee Fingerprint Code</label>
                                 <input autofocus type="text" name="zketo_code" id="zketo_code" class="form-control" value="{{ old('zketo_code') }}">
                                 @error('zketo_code')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Full Employee Name</label>
                                 <input type="text" name="emp_name" id="emp_name" class="form-control" value="{{ old('emp_name') }}">
                                 @error('emp_name')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Gender</label>
                                 <select name="emp_gender" id="emp_gender" class="form-control">
                                    <option value="1" @if(old('emp_gender') == 1) selected @endif>Male</option>
                                    <option value="2" @if(old('emp_gender') == 2) selected @endif>Female</option>
                                 </select>
                                 @error('emp_gender')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Employee Branch</label>
                                 <select name="branch_id" id="branch_id" class="form-control select2">
                                    <option value="">Select Branch</option>
                                    @if(isset($other['branches']) && !empty($other['branches']))
                                       @foreach ($other['branches'] as $info)
                                       <option value="{{ $info->id }}" @if(old('branch_id') == $info->id) selected @endif>{{ $info->name }}</option>
                                       @endforeach
                                    @endif
                                 </select>
                                 @error('branch_id')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Email</label>
                                 <input type="text" name="emp_email" id="emp_email" class="form-control" value="{{ old('emp_email') }}">
                                 @error('emp_email')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Home Phone</label>
                                 <input type="text" name="emp_home_tel" id="emp_home_tel" class="form-control" value="{{ old('emp_home_tel') }}">
                                 @error('emp_home_tel')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Work Phone</label>
                                 <input type="text" name="emp_work_tel" id="emp_work_tel" class="form-control" value="{{ old('emp_work_tel') }}">
                                 @error('emp_work_tel')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                              </div>
                           </div>

                           <div class="col-md-8">
                              <div class="form-group">
                                 <label>Current Address</label>
                                 <input type="text" name="staies_address" id="staies_address" class="form-control" value="{{ old('staies_address') }}">
                                 @error('staies_address')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                              </div>
                           </div>

                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Employee Notes</label>
                                 <textarea name="notes" id="notes" class="form-control">{{ old('notes') }}</textarea>
                                 @error('notes')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                              </div>
                           </div>

                        </div>
                     </div>

                     <div class="tab-pane fade" id="job_data" role="tabpanel">
                        <div class="row">

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Hire Date</label>
                                 <input type="date" name="emp_start_date" id="emp_start_date" class="form-control" value="{{ old('emp_start_date') }}">
                                 @error('emp_start_date')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Employment Status</label>
                                 <select name="Functiona_status" id="Functiona_status" class="form-control">
                                    <option value="1" @if(old('Functiona_status') == 1) selected @endif>Working</option>
                                    <option value="0" @if(old('Functiona_status') == 0 && old('Functiona_status') !== null) selected @endif>Out of Service</option>
                                 </select>
                                 @error('Functiona_status')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Employee Department</label>
                                 <select name="emp_Departments_code" id="emp_Departments_code" class="form-control select2">
                                    <option value="">Select Department</option>
                                    @if(isset($other['departements']) && !empty($other['departements']))
                                       @foreach ($other['departements'] as $info)
                                       <option value="{{ $info->id }}" @if(old('emp_Departments_code') == $info->id) selected @endif>{{ $info->name }}</option>
                                       @endforeach
                                    @endif
                                 </select>
                                 @error('emp_Departments_code')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Employee Job</label>
                                 <select name="emp_jobs_id" id="emp_jobs_id" class="form-control select2">
                                    <option value="">Select Job</option>
                                    @if(isset($other['jobs']) && !empty($other['jobs']))
                                       @foreach ($other['jobs'] as $info)
                                       <option value="{{ $info->id }}" @if(old('emp_jobs_id') == $info->id) selected @endif>{{ $info->name }}</option>
                                       @endforeach
                                    @endif
                                 </select>
                                 @error('emp_jobs_id')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Shift Type</label>
                                 <select name="shift_type_id" id="shift_type_id" class="form-control select2">
                                    <option value="">Select Shift</option>
                                    @if(isset($other['shifts_types']) && !empty($other['shifts_types']))
                                       @foreach ($other['shifts_types'] as $info)
                                       <option value="{{ $info->id }}" @if(old('shift_type_id') == $info->id) selected @endif>
                                          @if($info->type == 1)
                                          Morning
                                          @elseif($info->type == 2)
                                          Evening
                                          @else
                                          Full Day
                                          @endif
                                       </option>
                                       @endforeach
                                    @endif
                                 </select>
                                 @error('shift_type_id')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Monthly Salary</label>
                                 <input type="text" name="emp_sal" id="emp_sal" class="form-control" value="{{ old('emp_sal') }}">
                                 @error('emp_sal')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                              </div>
                           </div>

                        </div>
                     </div>

                  </div>
               </div>
            </div>

            <div class="col-md-12 mt-3">
               <div class="form-group text-center">
                  <button class="btn btn-sm btn-success" type="submit" name="submit">Add Employee</button>
                  <a href="{{ route('Employees.index') }}" class="btn btn-danger btn-sm">Cancel</a>
               </div>
            </div>

         </form>
      </div>
   </div>
</div>

@endsection

@section("script")
<script src="{{ asset('assets/admin/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
   $('.select2').select2({
      theme: 'bootstrap4'
   });
</script>
@endsection