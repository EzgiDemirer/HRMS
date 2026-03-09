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
View
@endsection

@section('content')

<div class="col-12">
   <div class="card">

      <div class="card-header">
         <h3 class="card-title card_title_center">
            Branch Data
            <a href="{{ route('branches.create') }}" class="btn btn-sm btn-warning">Add New</a>
         </h3>
      </div>

      <div class="card-body">

         @if(@isset($data) and !@empty($data))

         <table id="example2" class="table table-bordered table-hover">

            <thead class="custom_thead">
               <th>Branch ID</th>
               <th>Name</th>
               <th>Address</th>
               <th>Phone</th>
               <th>Email</th>
               <th>Status</th>
               <th>Added By</th>
               <th>Updated By</th>
               <th></th>
            </thead>

            <tbody>

               @foreach ($data as $info)

               <tr>

                  <td>{{ $info->id }}</td>
                  <td>{{ $info->name }}</td>
                  <td>{{ $info->address }}</td>
                  <td>{{ $info->phones }}</td>
                  <td>{{ $info->email }}</td>

                  <td @if ($info->active==1) class="bg-success" @else class="bg-danger" @endif>
                     @if ($info->active==1)
                     Active
                     @else
                     Inactive
                     @endif
                  </td>

                  <td>{{ $info->added->name }}</td>

                  <td>
                     @if($info->updated_by>0)
                     {{ $info->updatedby->name }}
                     @else
                     None
                     @endif
                  </td>

                  <td>
                     <a href="{{ route('branches.edit',$info->id) }}" class="btn btn-success btn-sm">
                        Edit
                     </a>

                     <a href="{{ route('branches.destroy',$info->id) }}" class="btn are_you_shur btn-danger btn-sm">
                        Delete
                     </a>
                  </td>

               </tr>

               @endforeach

            </tbody>

         </table>

         @else

         <p class="bg-danger text-center">
            Sorry, no data available to display
         </p>

         @endif

      </div>

   </div>
</div>

@endsection