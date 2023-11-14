@extends('layouts.app')
@section('content')
<div class="wrapper d-flex align-items-stretch">
    @include('layouts.sidebarAdmin')
    <div class="container">
        <div class="row">
            <div class="col col-md-6">
            <img src="images/imgF.png"/>
        </div>
        </div>
        <dl class="row ">
            <dt class="col-sm-1">Nom:</dt>
            <dd class="col-sm-11">{{$fonctionnaire->nom}}</dd>
          
            <dt class="col-sm-1">Prenom</dt>
            <dd class="col-sm-11">
              {{$fonctionnaire->prenom}} </dd>
                     
            <dt class="col-sm-1">Service</dt>
            <dd class="col-sm-11"> @foreach($services as $item)
                            
                {{$item->nomService}}
            
            @endforeach
            </dd>
          
            <dt class="col-sm-1 text-truncate">Grade</dt>
            <dd class="col-sm-11">{{$fonctionnaire->grade}}</dd>

            <dt class="col-sm-1">Statue</dt>    
            <dd class="col-sm-11">{{$fonctionnaire->statue}}</dd>

            <dt class="col-sm-1">N° SOM</dt>    
            <dd class="col-sm-11">{{$fonctionnaire->N_SOM}}</dd>

            <dt class="col-sm-1">Télephon</dt>    
            <dd class="col-sm-11">{{$fonctionnaire->telephon}}</dd>

            <dt class="col-sm-1">Email</dt>    
            <dd class="col-sm-11">{{$fonctionnaire->email}}</dd>       
        </dl>
    </div>
</div>

@endsection

