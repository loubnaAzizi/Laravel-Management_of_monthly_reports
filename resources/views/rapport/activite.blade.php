@extends('layouts.app')

@vite(['resources/step.css'])
@section('content')
<div class="wrapper d-flex align-items-stretch bg-light">
    @include('layouts.sidFonct')
    <div class="container m-3">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row rowBack">
        <div class="col col-md-3">
          <div class="text text-center">Hover over the arrow</div>
          <button class="btn btn-lg text-center btnBack"> <a class="nav-link" href="{{route('fonctionnaireDash')}}"><span><i class="bx bx-arrow-back fa-3x"></i></span></a></button>
        </div>
        <div class="col col-md-6 titrAddAct">
            <h1>Ajouter une nouvelle activités</h1>
        </div>
      </div>
  
                <div class="row card p-3">
                
                   
                    <div class="col-md-11 ">
                        <form method="POST" action="{{route('StorActivite')}}"  id="add_mor" class="employee-form">
                            @csrf
                        
                        
                                <div class="form-section "  id="contraints_div">
                                    <div class="row register-form ">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nomActivite" class="form-label">Nom d'activité</label>
                                                <input type="text" name="nomActivite"  id="nomActivite" placeholder="Intitulé..." class="form-control"  required/> 
                                            </div>
                                            <div class="form-group">
                                                <label for="dateDebutActivite" class="form-label">Date début</label>
                                                <input type="date" name="dateDebutActivite" id="dateDebutActivite" class="form-control"   required/>
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
                                                {{-- <div class="form-group ">
                                                    <label  class="form-label">Fonctionnaire(s)</label>
                                                
                                                    <div class=" select-btn">
                                                    
                                                    <span class="btn-text">Select fonctionnaire</span>
                                                    <span class="arrow-dwn">
                                                        <i class="fa fa-solid fa-chevron-down"></i>
                                                    </span>
                                                
                                                    </div>
                                                    <ul class="list-items">
                                                        @foreach($fonctionnaires as $fon)
                                                        <li class="item">
                                                            <input class="form-check-input inputCheck" type="checkbox" value="{{$fon->id}}" name="fonctionnaire[{{$fon->id}}]">
                                                            <label class="form-check-label"  >{{$fon->nom}} {{$fon->prenom}}
                                                        </li>
                                                        <hr>
                                                        @endforeach
                                                    </ul>
                                                </div>                                   --}}
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
    $(function() {
      

        var i=0;
        $('.add_item_btn').click(function(){
            ++i;
            $("#show-item").prepend('<div class="form border shadow-sm mb-4"><label for="nomActivite" class="form-label">Nom activité</label><input type="text" name="nomActivite[]" id="nomActivite" placeholder="Intitulé..." required/><label for="typeActivite" class="form-label">Type activité</label><select name="typeActivite[]" id="typeActivite" required><option value="" >Type</option><option value="Principale">Principale</option><option value="Supplimentaire">Supplimentaire</option></select> <label for="descriptionActivite" class="form-label">Déscription</label><textarea name="descriptionActivite[]" id="descriptionActivite" placeholder="..." required></textarea><label for="dateDebutActivite" class="form-label">Date début</label><input type="date" name="dateDebutActivite[]" id="dateDebutActivite" required /><label for="dateFinActivite" class="form-label">Date fin</label><input type="date" name="dateFinActivite[]" id="dateFinActivite"  required/><button type="button" class="btn btn-danger remove_item_btn">Remove</button>')
        })

        $(document).on('click','.remove_item_btn', function(e){
            e.preventDefault();
            let row_item = $(this).parent();
            $(row_item).remove();
        });

        });


  

</script>


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