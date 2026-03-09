@if(@isset($finance_cln_periods) and !@empty($finance_cln_periods))
<table id="example2" class="table table-bordered table-hover">
   <thead class="custom_thead">
      <th>Month Name (Arabic)</th>
      <th>Month Name (English)</th>
      <th>Start Date</th>
      <th>End Date</th>
      <th>Number of Days</th>
      <th>Month Status</th>
      <th>Added By</th>
      <th>Updated By</th>
   </thead>
   <tbody>
      @foreach ($finance_cln_periods as $info)
      <tr>
         <td>{{ $info->Month->name }}</td>
         <td>{{ $info->Month->name_en }}</td>
         <td>{{ $info->START_DATE_M }}</td>
         <td>{{ $info->END_DATE_M }}</td>
         <td>{{ $info->number_of_days }}</td>
         <td>
            @if($info->is_open==1)
               Open
            @elseif($info->is_open==2)
               Archived
            @else
               Closed
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
      </tr>
      @endforeach
   </tbody>
</table>
@else
<p class="bg-danger text-center">Sorry, no data available to display</p>
@endif