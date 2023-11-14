@extends('layouts.app')

@section('content')
<div class="wrapper d-flex align-items-stretch bg-light">
    @include('layouts.sidChef')
    <div class="container m-3">
        <div class="row float-center mb-4">
           
            <div class="col col-md-12 ">
                <h1>Ajouter une nouvelle action</h1>
            </div>
          </div>
        <div class="row">

            <div class="container register">
                <div class="row card p-3">
                
                    <div class="col-md-1 register-left">          
                    </div>
                    <div class="col-md-11 register-right">

                            <form method="POST" action='{{route('chef.storAction')}}'>
                            @csrf
                        
                        
                                <div class="form-section "  id="contraints_div">
                                    <div class="row register-form ">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="titreAction" class="form-label">Titre d'action</label>
                                                <input type="text" name="titreAction" id="titreAction" placeholder="Titre..." class="form-control" required/>
                                            </div>
                                            <div class="form-group">
                                                <label for="dedlin" class="form-label"  >Date début</label>
                                                <input type="date" name="dateDebAction" id="dedlin" class="form-control"/>
                                            </div>   
                                            <div class="form-group">
                                                <label for="descriptionAction" class="form-label">Déscription</label>
                                                <textarea name="descriptionAction" id="descriptionAction" placeholder="..." class="form-control" ></textarea>
                                            </div>                 
                                        </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="priorite_ord" class="form-label">Order de préoritée</label>
                                                    <select name="priorite_ord" id="typeActivite" required class="form-control" >
                                                        <option class="hidden"  selected disabled >Choisie...</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                                </div> 
                                                <div class="form-group">
                                                    <label for="dateFinActivite" class="form-label"  >Date fin</label>
                                                    <input type="date" name="dateFinAction" id="dateFinActivite"  class="form-control"/>
                                                </div> 
                                       
                                            </div>                                   
                                    </div>
                                </div>

                                <div class="form-navigation m-3">
                                    <button type="submit" class="btn btn-success float-right ">Save</button>
                                                                 
                                </div> 
                        </form>

                        
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
<script>
    const selectBtn=document.querySelector(".select-btn"),

      inputCheck=document.querySelectorAll(".inputCheck");
      

      selectBtn.addEventListener("click",()=>{
         selectBtn.classList.toggle("open");
      });

      inputCheck.forEach(item=>{
         item.addEventListener("click",()=>{
             item.classList.toggle("chicked");
             let checked=document.querySelectorAll('.chicked'),
                 btnText=document.querySelector(".btn-text");
                 
                 if(checked && checked.length>0) {
                     btnText.innerText=`${checked.length} Selected`

                 }else{
                     btnText.innerText="Select fonctionnaire"
                 }

         })
      })
      
</script>

@endsection

@section('scripts')
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
@endsection