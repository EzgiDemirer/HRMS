@extends('layouts.admin')

@section('title')
Employee Data
@endsection

@section('contentheader')
Settings Menu
@endsection

@section('contentheaderactivelink')
<a href="{{ route('Employees.index') }}">Employees</a>
@endsection

@section('contentheaderactive')
View
@endsection

@section('content')

<div class="col-12">
   <div class="card">

      <div class="card-header">
         <h3 class="card-title card_title_center">
            Employees Data
            <a href="{{ route('Employees.create') }}" class="btn btn-sm btn-success">Add New</a>
         </h3>
      </div>

      <div class="card-body" id="ajax_responce_serachDiv">

         @if(@isset($data) && !@empty($data) && count($data) > 0)

         <table id="example2" class="table table-bordered table-hover">
            <thead class="custom_thead">
               <tr>
                  <th>Code</th>
                  <th>Fingerprint Code</th>
                  <th>Employee Name</th>
                  <th>Gender</th>
                  <th>Salary</th>
                  <th>Hire Date</th>
                  <th>Added By</th>
                  <th>Updated By</th>
                  <th>Action</th>
               </tr>
            </thead>

            <tbody>
               @foreach ($data as $info)
               <tr>
                  <td>{{ $info->employees_code }}</td>
                  <td>{{ $info->zketo_code }}</td>
                  <td>{{ $info->emp_name }}</td>
                  <td>
                     @if($info->emp_gender == 1)
                     Male
                     @elseif($info->emp_gender == 2)
                     Female
                     @else
                     -
                     @endif
                  </td>
                  <td>{{ $info->emp_sal }}</td>
                  <td>{{ $info->emp_start_date ?? '-' }}</td>

                  <td>
                     @if(!empty($info->created_at))
                     @php
                     $dt = new DateTime($info->created_at);
                     $date = $dt->format("Y-m-d");
                     $time = $dt->format("h:i");
                     $newDateTime = date("A", strtotime($info->created_at));
                     $newDateTimeType = (($newDateTime == 'AM') ? 'AM' : 'PM');
                     @endphp

                     {{ $date }} <br>
                     {{ $time }} {{ $newDateTimeType }} <br>
                     {{ $info->added->name ?? '-' }}
                     @else
                     -
                     @endif
                  </td>

                  <td>
                     @if(!empty($info->updated_by) && !empty($info->updated_at))
                     @php
                     $dt = new DateTime($info->updated_at);
                     $date = $dt->format("Y-m-d");
                     $time = $dt->format("h:i");
                     $newDateTime = date("A", strtotime($info->updated_at));
                     $newDateTimeType = (($newDateTime == 'AM') ? 'AM' : 'PM');
                     @endphp

                     {{ $date }} <br>
                     {{ $time }} {{ $newDateTimeType }} <br>
                     {{ $info->updatedby->name ?? '-' }}
                     @else
                     None
                     @endif
                  </td>

                  <td>
                     <a href="{{ route('Employees.edit', $info->id) }}" class="btn btn-success btn-sm">Edit</a>
                     <a href="{{ route('Employees.destroy', $info->id) }}" class="btn are_you_shur btn-danger btn-sm">Delete</a>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>

         <br>

         <div class="col-md-12 text-center">
            {{ $data->links('pagination::bootstrap-5') }}
         </div>

         @else

         <p class="bg-danger text-center">
            Sorry, no data available to display
         </p>

         @endif

      </div>

   </div>
</div>

@endsection