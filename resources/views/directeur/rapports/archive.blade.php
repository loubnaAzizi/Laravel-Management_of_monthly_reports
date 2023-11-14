@extends('layouts.app')


@section('content')
<div class="wrapper d-flex align-items-stretch bg-light">
    @include('layouts.sidDirecteur')
  <div class="container m-3">
    <div class="row">
      <div class="col col-md-8">
        <h4 class="nomArchive">Nom:<span class="text-primary ml-2">{{$employe->nom}} {{$employe->prenom}}</span></h4>
      </div>
    </div>
    <div class="row rowCherch">
      <div class="col col-md-3">
        <p>Chercher par date :</p>
      </div>       
    </div>
    
     <div class="row  rowCherch mb-3">
      <div class="col col-md-3  search">
        <input type="search" name="search" id="myInputSearchNom" class="form-control" placeholder="Chercher..."/>          
      </div>  
     </div>
    <div class="row d-flex justify-content-center  text-center ">
      <div class="col col-md-8 card">
        <table class="table table-hover bg-with">
          <thead >
            <tr class="trArchive">
              <td>Date</td>
              <td>Rapport</td>
            </tr>
          </thead>
          <tbody>
            @if(now()->format('d')==21)
            <tr>
              <td>{{now()->subMonth()->format('m/Y');}}</td>
              <td><a href="{{route('archiveRapport',['id' => $employe->id, 'date' => urlencode(Carbon\Carbon::now()->format('m')) ])}}">Rapport_{{now()->format('M')}}</a></td>
            </tr>
          

          </tbody>
        </table>
      </div>
    </div>
   
    
    @endif
  </div>
</div>
@endsection