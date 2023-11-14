 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="wrapper d-flex align-items-stretch">
 
    <nav id="sidebar" class="active">
       
<ul class="list-unstyled components mb-5">
  <li>
    <button type="button" id="sidebarCollapse" class="btn btn-primary">
      <i class="fa fa-bars"></i>
      <span class="sr-only">Toggle Menu</span>
    </button>
  </li>
  <li class="active">
    <a href="{{route('admin')}}"><span class="fa fa-home"></span> Home</a>
  </li>
  <li>
      <a href="{{route('user.index')}}"><span class="mdi mdi-account-settings-variant"></span> Users</a>
  </li>

  <li>
    <a href="{{route('service.index')}}"><i class="mdi mdi-briefcase-check"></i> Services</a>
  </li>

  <li>
   
    <a href="{{route('admin.profil.edit')}}"> <span class="fa fa-cogs"></span>profile</a>
  </li>
 
 
 
</ul>



<div>
    <p>
              Copyright &copy;<script>document.write(new Date().getFullYear());</script> 
            </p>
</div>
</nav>






