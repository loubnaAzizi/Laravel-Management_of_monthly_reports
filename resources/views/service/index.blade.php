@extends('layouts.app')
@section('content')
<div class="wrapper d-flex align-items-stretch">

  @include('layouts.testSid')
  <div class="container-fluid m-3">


    <div class="row headServc ">

        <div class="mb-4">
          <a class="btn btn-primary" href="{{route('service.create')}}">Add new service</a>
         </div>
     
        
    </div>

    <div class="row">
        <div class="col col-lg-12 col-sm-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h1>Services informations</h1>
                
                <table class="table table-striped" id="tableService">
                  <thead class="text-center">
                    <tr>
                      <th>
                        N°
                      </th>
                      <th>
                        Intitulé
                      </th>
                    
                      <th>
                        Options
                      </th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    @foreach ($services as  $service)
                    <tr>
                                            
                      <td>{{$service->id}}</td>
                      <td>{{$service->nomService}}</td>
                      
                    
                      <td class="d-flex justify-content-center align-items-center">
                     
                        
                          <a href="{{route('service.edit',$service->id)}}"
                              class="btn btn-sm btn-warning mx-2 ">
                              <i class="mdi mdi-pen
                              \f4d9"></i>  
                        </a>
                        
                      <form action="{{ route('service.destroy', $service->id) }}" method="Post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger " value="{{$service->id}}" onclick="return confirm('are you sure you want to delete this data ?')" ><i class="mdi mdi-close-box
                            \f24d"></i>  </button>
                      </form> 
                          
                      </td>
        
                  </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="d-flex">
                    {{ $services->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}

@endsection




