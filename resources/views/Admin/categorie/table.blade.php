@extends('layouts.frontend')
@section('content')

<div class="container my-5">

    <div class="card">
        <div class="card-header text-center bg-info">Liste categorie <a href="">Add</a></div>
        <div class="card-body">
            <div class="row">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>statut</th>
                            <th>populaire</th>
                            <th>image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($categorie as $item)
                       <tr>
                        <td>{{ $item->id }}</td>
                          <td>{{ $item->name }}</td>
                          <td>@if($item->status==1){{ 'oui' }} @else {{ 'nom' }} @endif</td> 
                          <td>@if($item->popular==1){{ 'oui' }} @else {{ 'nom' }} @endif</td>  
                          <td><img src="{{ asset('images/categories/'.$item->images) }}" width="100px" height="100px"></td>
                          <td> <a href="{{ url('edter-categorie/'.$item->id) }}"><span class="badge bg-warning text-dark">editer</span></a></td>
                          <td> <a href="{{ url('delete-categorie/'.$item->id) }}"><span class="badge bg-danger text-white"><i class="fa-solid fa-trash-can"></i></span></a></td>

                         
                       </tr> 
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection