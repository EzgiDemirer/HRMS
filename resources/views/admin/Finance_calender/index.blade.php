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
            Financial Years Data
            <a href="{{ route('finance_calender.create') }}" class="btn btn-sm btn-warning">Add New</a>
         </h3>
      </div>

      <div class="card-body">

         @if(@isset($data) and !@empty($data) )

         <table id="example2" class="table table-bordered table-hover">

            <thead class="custom_thead">
               <th>Year Code</th>
               <th>Year Description</th>
               <th>Start Date</th>
               <th>End Date</th>
               <th>Added By</th>
               <th>Updated By</th>
               <th></th>
            </thead>

            <tbody>

               @foreach ($data as $info)

               <tr>

                  <td>{{ $info->FINANCE_YR }}</td>
                  <td>{{ $info->FINANCE_YR_DESC }}</td>
                  <td>{{ $info->start_date }}</td>
                  <td>{{ $info->end_date }}</td>

                  <td>
                     {{ $info->added->name }}
                  </td>

                  <td>
                     @if($info->updated_by>0)
                     {{ $info->updatedby->name }}
                     @else
                     None
                     @endif
                  </td>

                  <td>

                     @if($info->is_open==0)

                        @if($CheckDataOpenCounter==0)
                        <a href="{{ route('finance_calender.do_open',$info->id) }}" class="btn btn-primary btn-sm">Open</a>
                        @endif

                        <a href="{{ route('finance_calender.edit',$info->id) }}" class="btn btn-success btn-sm">Edit</a>

                        <a href="{{ route('finance_calender.delete',$info->id) }}" class="btn are_you_shur btn-danger btn-sm">Delete</a>

                        <button class="btn btn-sm btn-info show_year_monthes" data-id="{{ $info->id }}">View Months</button>

                     @else

                     Financial Year is Open

                     @endif

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


<div class="modal fade" id="show_year_monthesModal">
   <div class="modal-dialog modal-xl">

      <div class="modal-content bg-info">

         <div class="modal-header">
            <h4 class="modal-title">View Months for Financial Year</h4>
            <button type="button" class="close" data-dismiss="modal">
               <span>&times;</span>
            </button>
         </div>

         <div class="modal-body" id="show_year_monthesModalBody">

         </div>

         <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-outline-light">Save changes</button>
         </div>

      </div>

   </div>
</div>

@endsection


@section('script')

<script>

$(document).ready(function(){

   $(document).on('click','.show_year_monthes',function(){

      var id=$(this).data('id');

      jQuery.ajax({

         url:'{{ route('finance_calender.show_year_monthes') }}',
         type:'post',
         dataType:'html',
         cache:false,

         data:{
            "_token":'{{ csrf_token() }}',
            'id':id
         },

         success:function(data){

            $("#show_year_monthesModalBody").html(data);
            $("#show_year_monthesModal").modal("show");

         },

         error:function(){

         }

      });

   });

});

</script>

@endsection