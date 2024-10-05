@extends('hotel.layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Hotely</h2>
    <div class="card-body">
        
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('hotel.create') }}"><i class="fa fa-plus"></i> Create New Hotel</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Name</th>
                    <th>content</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>

            <tbody>
                @php $i = 0; @endphp 
                @forelse ($hotels as $hotel)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $hotel->title }}</td>
                        <td>{{ $hotel->description }}</td>
                        <td>
                            <form action="{{ route('hotel.destroy',$hotel->id) }}" method="POST">
                                <a class="btn btn-info btn-sm" href="{{ route('hotel.show',$hotel->id) }}"><i class="fa-solid fa-list"></i> Show</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('hotel.edit',$hotel->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">There are no data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        {!! $hotel->links() !!}

    </div>
</div>  

@endsection