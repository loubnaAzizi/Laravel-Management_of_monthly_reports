@extends('layouts.app')
@section('content')
<div class="wrapper d-flex align-items-stretch">
    @include('layouts.sidebarAdmin')
    <div class="container">

<div class="row">
    <div class="col col-md-4">
      <button type="button" class="btn btn-gradient-info btn-icon-text mt-4" >
        <a class="nav-link" href="{{route('user.create')}}">

          <i class="mdi mdi-account-plus
          \f113"></i> 
        </a>
      </button>
    </div>
</div>
<div class="row">
<div class="col col-lg-12 col-sm-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h1 >Fonctionnaire informations</h1>
        
        <table class="table table-striped">
          <thead class="text-center">
            <tr>
              <th>
                Number
              </th>
              <th>
                Nom
              </th>
              <th>
                Prenom
              </th>
              <th>
                Service
              </th>
            
              <th>
                Options
              </th>
            </tr>
          </thead>
          <tbody class="text-center">
            @foreach ($fonctionnaires as  $fonctionnaire)
            <tr>
                                    
              <td>{{$fonctionnaire->id}}</td>
              <td>{{$fonctionnaire->nom}}</td>
              <td>{{$fonctionnaire->prenom}}</td>
              <td>{{$fonctionnaire->nomService}}</td>
             
              <td class="d-flex justify-content-center align-items-center">
                  <a href="{{ route('fonctionnaire.show', $fonctionnaire->id) }}"
                       class="btn btn-sm btn-primary">
                       <i class="mdi mdi-eye \f2fd"></i>  
                  </a>
                  <a href="{{route('fonctionnaire.edit', $fonctionnaire->id) }}"
                      class="btn btn-sm btn-warning mx-2">
                    
                      <i class="mdi mdi-border-color
                      \f1bf"></i> 
                 </a>
                 
              <form action="{{ route('fonctionnaire.destroy', $fonctionnaire->id) }}" method="Post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger " value="{{$fonctionnaire->id}}" onclick="return confirm('are you sure you want to delete this data ?')"><i class='mdi mdi-account-remove
                    \f114'></i> </button>
              </form> 
                  
              </td>

          </tr>
            @endforeach
          </tbody>
        </table>
        {{-- <div class="d-flex">
            {{ $users->links() }}
        </div> --}}
      </div>
    </div>
  </div>
</div>
</div>

</div>

</div>

@endsection