@extends('dashboard.hotel.layout')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   

    <style>


    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

    * {
        font-family: "Roboto", sans-serif !important;
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        background-color: #f5f5f5;
    }



    .create-new-hotel{
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        background-color: yellow;
        border: none;
        font-weight: bold;
        text-align: center;
        display: grid;
    }

    #tabledata th{
        width: 100px;
        padding: 10px;
        margin-bottom: 20px;
        border: none;
        font-weight: bold;
        text-align: center;
        border: 1px solid black;
    }

    .thbarvayellow{
        background-color: #019a97 !important;
    }

    .thbarvared{
        background-color: #00db00 !important;
    }

    .thbarvablue{
        background-color: #019a97 !important;
    }

    .thbarvagreen{
        background-color: #00db00 !important;
    }


    .td1center{
        width: 5%;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        background-color: #b2fcfa !important;
        border: none;
        font-weight: bold;
        text-align: center;
        border: 1px solid black;
    }


    .td2center{
        width: 8px;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        background-color: #a8ffa8 !important;
        border: none;
        font-weight: bold;
        text-align: center;
        border: 1px solid black;
    }


    .td3center{
        width: 20px;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        background-color: #b2fcfa !important;
        border: none;
        font-weight: normal;
        text-align: center;
        font-size: 12px;
        border: 1px solid black;
    }


    .button-group {
        display: flex;
        gap: 10px;
        margin-right: 0px;
        display: grid;
        margin-top: 10px;
        margin-bottom: 10px;
        width: 10px;
    }

    .show-btn {
        background-color: lightgreen !important;
        padding: 10px;
        border-radius: 5px;
        font-weight: bold;
        border: 1px solid black;
        text-align: center;
    }

    .edit-btn {
        background-color: yellow !important;
        padding: 10px;
        border-radius: 5px;
        font-weight: bold;
        border: 1px solid black;
        text-align: center;
    }

    .delete-btn {
        background-color: #ffb2b2 !important;
        padding: 10px;
        border-radius: 5px;
        font-weight: bold;
        border: 1px solid black;
        text-align: center;
    }


    .carka{
        background-color: black !important;
        width: 100px;
        height: 1px;
        display: grid;
        margin-top: 0px;
    }



    </style>



















</head>

<x-header/>
<div class="card mt-5">
    <!-- <h2 class="card-header">Hotely</h2> -->
    <div class="card-body">
        
        @if(session('success'))
            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('dashboard.hotel.create') }}"><text class="create-new-hotel">Create New Hotel</text></a>
        </div>

        <table id="tabledata" class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th class="thbarvayellow" width="80px">No</th>
                    <th class="thbarvared">Name</th>
                    <th class="thbarvablue">Description</th>
                    <th class="thbarvagreen" width="250px">Action</th>
                </tr>
            </thead>

            <tbody>
                @php $i = 0; @endphp 
                @forelse ($hotels as $hotel)
                    <tr>
                        <td class="td1center">{{ ++$i }}</td>
                        <td class="td2center">{{ $hotel->name }}</td>
                        <td class="td3center">{{ $hotel->description }}</td>
                        <td>
                            <!-- <form action="{{ route('dashboard.hotel.destroy',$hotel->id) }}" method="POST">
                                <a class="btn btn-info btn-sm" href="{{ route('hotel.show',$hotel->slug) }}"><i class="fa-solid fa-list"></i> Show</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('dashboard.hotel.edit', $hotel->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                            </form> -->

                            <form action="{{ route('dashboard.hotel.destroy',$hotel->id) }}" method="POST" class="button-group">
                                <a class="btn btn-info btn-sm show-btn" href="{{ route('hotel.show',$hotel->slug) }}">
                                    <i class="fa-solid fa-list"></i> Show
                                </a>

                                <a class="btn btn-primary btn-sm edit-btn" href="{{ route('dashboard.hotel.edit', $hotel->id) }}">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </button>

                                <div class="carka"></div>
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
    </div>
</div>  

@endsection
</html>