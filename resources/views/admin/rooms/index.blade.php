@extends('admin/master')
@section('content')
<div class="container-fluid">
        {{-- Page heading --}}
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="h3 mb-0 text-gray-800 ">Room List</h1>
                     <a href="{{route('room.create')}}" class="btn btn-danger">Add</a>
                </div>
            </div>
        </div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Room No</th>
                        <th>Room Type</th>
                        <th>Daily Charges</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                     @php $i=1; @endphp
                    @foreach($rooms as $room)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $room->room_no}}</td>
                        <td>{{ $room->room_type}}</td>
                        <td>{{ $room->daily_charges }}</td>
                        <td>
                            <a href="{{route('room.show',$room->id)}}" class="btn btn-primary">Detail</a>

                             <a href="{{route('room.edit',$room->id)}}" class="btn btn-info">Edit</a>
                             
                            <form method="post" action="{{route('room.destroy',$room->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </td>
                    </tr> 
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
    
@endsection