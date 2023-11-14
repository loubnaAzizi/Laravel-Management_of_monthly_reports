@extends('layouts.app')

@vite(['resources/step.css'])
@section('content')
<div class="wrapper d-flex align-items-stretch bg-light">
    @include('layouts.sidChef')
    <div class="container m-3">
        {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    <div class="row mb-4">
       
         
        <div class="col col-md-12 ">
            <h1>Ajouter une nouvelle activités</h1>
        </div>
      </div>
     
                <div class="row card p-3">
                
                   
                    <div class="col-md-11 ">
                        <form method="POST" action="{{route('chef.storActivite')}}"  id="add_mor" class="employee-form">
                            @csrf
                        
                        
                                <div class="form-section "  id="contraints_div">
                                    <div class="row register-form ">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nomActivite" class="form-label">Nom d'activité</label>
                                                <input type="text" name="nomActivite"  id="nomActivite" placeholder="Intitulé..." class="form-control @error('nomActivite') is-invalid @enderror"  required/> 
                                                @error('nomActivite')
                                                <p class=" text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="dateDebutActivite" class="form-label">Date début</label>
                                                <input type="date" name="dateDebutActivite" id="dateDebutActivite" class="form-control"  required />
                                            </div>   
                                            <div class="form-group">
                                                <label for="descriptionActivite" class="form-label">Déscription</label>
                                                <textarea name="descriptionActivite" id="descriptionActivite" placeholder="..." class="form-control" required></textarea>
                                            </div>                 
                                        </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="typeActivite" class="form-label">Type d'activité</label>
                                                    <select name="typeActivite" id="typeActivite" class="form-control"  required>
                                                        <option class="hidden"  selected disabled >Choisie...</option>
                                                        <option value="Principale">Principale</option>
                                                        <option value="Supplimentaire">Supplimentaire</option>
                                                    </select>
                                                </div> 
                                                <div class="form-group">
                                                    <label for="dateFinActivite" class="form-label">Date fin</label>
                                                    <input type="date" name="dateFinActivite" id="dateFinActivite"  class="form-control" required/>
                                                </div>  
                                              
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
        //  items=document.querySelectorAll(".item")
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