@extends('layouts.app')


@section('content')
<div class="wrapper d-flex align-items-stretch bg-light">
    @include('layouts.sidDirecteur')
  <div class="container m-3">
    <div class="row mt-4">
        <div class="col col-md-12">
            <h3>Liste des rapports</h1>
        </div>
    </div>

    <div class="row rowCherch">
        <div class="col col-md-3">
          <p>Chercher par date :</p>
        </div>       
      </div>
      
       <div class="row  rowCherch">
        <div class="col col-md-3  search">
          <input type="search" name="search" id="myInputSearchNom" class="form-control" placeholder="Chercher..."/>          
        </div>  
       </div>
       <div class="row">
        <div class="col col-md-12">
            @if(now()->format('d')==28 OR now()->format('d')==29 OR now()->format('d')==30 OR now()->format('d')==31 )
                <p>hello</p>
            @endif

        </div>
       </div>

       <div class="row mt-4 card">
        <div class="col col-md-12">
          <table class="table">
           
            <tbody class=" alldata">
                @if(now()->format('d')==28 OR now()->format('d')==10 OR now()->format('d')==30 OR now()->format('d')==31 )
                <tr>                          
                    <td>{{now()}}</td>
                  <td><a href="#">rapport du moi fevrier</a></td>
                  <td class="d-flex justify-content-center align-items-center">
                      <a href="#"
                           class="btn btn-sm btn-warning mr-2">
                           <i class="mdi mdi-eye \f2fd"></i>  
                      </a> 
                  </td>
              </tr>
                @endif

            </tbody>
            <tbody id="content" class="searchdata text-center"></tbody>
          </table>
       
        </div>
        </div>
          </div>
      </div>

  </div>
</div>

@endsection