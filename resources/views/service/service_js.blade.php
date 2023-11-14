

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script>
    $(document).ready(function(){
          $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
       });
    

        var form=$('#addServiceModal')[0];
        $('#save').click(function(){
          $('.error_message').html('');
          
           var formData= new FormData(form);

           $.ajax({
            url:'{{route("service.store")}}',
            method:'POST',
            processData:false,
            contentType:false,
            data:formData,
            

            success: function(response){
              jQuery.noConflict();
            
                
              if(response){
                  swal("Success!",response.success, "success");
                }
                
            },
            error:function(error){
                if(error){
                  console.log(error.responseJSON.errors.nomService);
                  $('#nameError').html(error.responseJSON.errors.nomService)
                }
            }
           })
          

        });
        
         
    });

</script>