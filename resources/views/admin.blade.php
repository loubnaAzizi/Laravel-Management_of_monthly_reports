@extends('layouts.app')


@section('content')

    @include('layouts.testSid')

   
    <div class="row p-5">
        <div class="col col-md-4">
            <a href="{{route('user.index')}}" >
               <img src="{{url('/images/userGroup.png')}}" class="fotoDashAdmin"/>
               <h2>Users</h2>
              </a>
            
        </div>
        <div class="col col-md-4">
            <a href="{{route('service.index')}}" >
                <img src="{{url('/images/servc.png')}}" class="fotoDashAdmin"/>
                <h2>Services</h2>              
              </a>
              
        </div>
      
       
        <div class="col col-md-4 ">
            <a href="{{route('admin.profil.edit')}}" >
                <img src="{{url('/images/profile.png')}}" class="fotoDashAdmin "/>
                <h2>Profil</h2>
              </a>
             
        </div>
       
                     
    </div>


@endsection
