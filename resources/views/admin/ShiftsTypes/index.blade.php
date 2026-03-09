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
View
@endsection

@section('content')
<div class="col-12">
   <div class="card">
      <div class="card-header">
         <h3 class="card-title card_title_center">
            Employee Shift Types
            <a href="{{ route('ShiftsTypes.create') }}" class="btn btn-sm btn-warning">Add New</a>
         </h3>
      </div>

      <div class="row" style="padding: 5px;">
         <div class="col-md-3">
            <div class="form-group">
               <label>Shift Type</label>
               <select name="type_search" id="type_search" class="form-control">
                  <option value="all">Search All</option>
                  <option value="1">Morning</option>
                  <option value="2">Evening</option>
               </select>
            </div>
         </div>

         <div class="col-md-3">
            <div class="form-group">
               <label>From Total Hours</label>
               <input type="text" name="hour_from_range" id="hour_from_range" class="form-control" value="" oninput="this.value=this.value.replace(/[^0-9.]/g,'');">
            </div>
         </div>

         <div class="col-md-3">
            <div class="form-group">
               <label>To Total Hours</label>
               <input type="text" name="hour_to_range" id="hour_to_range" class="form-control" value="" oninput="this.value=this.value.replace(/[^0-9.]/g,'');">
            </div>
         </div>
      </div>

      <div class="card-body" id="ajax_responce_serachDiv">
         @if(@isset($data) and !@empty($data) and count($data)>0)
         <table id="example2" class="table table-bordered table-hover">
            <thead class="custom_thead">
               <th>Shift Type</th>
               <th>Start Time</th>
               <th>End Time</th>
               <th>Total Hours</th>
               <th>Status</th>
               <th>Added By</th>
               <th>Updated By</th>
               <th></th>
            </thead>
            <tbody>
               @foreach ($data as $info)
               <tr>
                  <td>@if($info->type==1) Morning @else Evening @endif</td>
                  <td>
                     @php
                     $time = date("h:i", strtotime($info->from_time));
                     $newDateTime = date("A", strtotime($info->from_time));
                     $newDateTimeType = (($newDateTime == 'AM') ? 'AM' : 'PM');
                     @endphp
                     {{ $time }}
                     {{ $newDateTimeType }}
                  </td>
                  <td>
                     @php
                     $time = date("h:i", strtotime($info->to_time));
                     $newDateTime = date("A", strtotime($info->to_time));
                     $newDateTimeType = (($newDateTime == 'AM') ? 'AM' : 'PM');
                     @endphp
                     {{ $time }}
                     {{ $newDateTimeType }}
                  </td>
                  <td>{{ $info->total_hour*1 }}</td>
                  <td @if($info->active==1) class="bg-success" @else class="bg-danger" @endif>
                     @if($info->active==1) Active @else Inactive @endif
                  </td>
                  <td>
                     @php
                     $dt = new DateTime($info->created_at);
                     $date = $dt->format("Y-m-d");
                     $time = $dt->format("h:i");
                     $newDateTime = date("A", strtotime($info->created_at));
                     $newDateTimeType = (($newDateTime == 'AM') ? 'AM' : 'PM');
                     @endphp
                     {{ $date }} <br>
                     {{ $time }}
                     {{ $newDateTimeType }} <br>
                     {{ $info->added->name }}
                  </td>
                  <td>
                     @if($info->updated_by>0)
                     @php
                     $dt = new DateTime($info->updated_at);
                     $date = $dt->format("Y-m-d");
                     $time = $dt->format("h:i");
                     $newDateTime = date("A", strtotime($info->updated_at));
                     $newDateTimeType = (($newDateTime == 'AM') ? 'AM' : 'PM');
                     @endphp
                     {{ $date }} <br>
                     {{ $time }}
                     {{ $newDateTimeType }} <br>
                     {{ $info->updatedby->name }}
                     @else
                     None
                     @endif
                  </td>
                  <td>
                     <a href="{{ route('ShiftsTypes.edit',$info->id) }}" class="btn btn-success btn-sm">Edit</a>
                     <a href="{{ route('ShiftsTypes.destroy',$info->id) }}" class="btn are_you_shur btn-danger btn-sm">Delete</a>
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
         <p class="bg-danger text-center">Sorry, no data available to display</p>
         @endif
      </div>
   </div>
</div>
@endsection

@section('script')
<script>
   $(document).ready(function(){

      $(document).on('change','#type_search',function(e){
         ajax_search();
      });

      $(document).on('input','#hour_from_range',function(e){
         ajax_search();
      });

      $(document).on('input','#hour_to_range',function(e){
         ajax_search();
      });

      function ajax_search(){
         var type_search = $("#type_search").val();
         var hour_from_range = $("#hour_from_range").val();
         var hour_to_range = $("#hour_to_range").val();

         jQuery.ajax({
            url:'{{ route('ShiftsTypes.ajax_search') }}',
            type:'post',
            dataType:'html',
            cache:false,
            data:{
               "_token":'{{ csrf_token() }}',
               type_search:type_search,
               hour_from_range:hour_from_range,
               hour_to_range:hour_to_range
            },
            success: function(data){
               $("#ajax_responce_serachDiv").html(data);
            },
            error:function(){
               alert("Sorry, an error occurred");
            }
         });
      }

      $(document).on('click','#ajax_pagination_in_search a',function(e){
         e.preventDefault();

         var type_search = $("#type_search").val();
         var hour_from_range = $("#hour_from_range").val();
         var hour_to_range = $("#hour_to_range").val();
         var linkurl = $(this).attr("href");

         jQuery.ajax({
            url:linkurl,
            type:'post',
            dataType:'html',
            cache:false,
            data:{
               "_token":'{{ csrf_token() }}',
               type_search:type_search,
               hour_from_range:hour_from_range,
               hour_to_range:hour_to_range
            },
            success: function(data){
               $("#ajax_responce_serachDiv").html(data);
            },
            error:function(){
               alert("Sorry, an error occurred");
            }
         });
      });

   });
</script>
@endsection