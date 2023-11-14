<div class="l-navbar" id="nav-bar">     
    <nav class="nav">
      <div>
        <a href="#" class="nav_logo">
          <i class="bx bx-layer nav_logo-icon"></i>
          <span class="nav_logo-name">BBBootstrap</span>
         
        </a>
        <div class="nav_list">
          <a href="{{route('admin')}}" class="nav_link active">
            <i class="bx bx-grid-alt nav_icon"></i>
            <span class="nav_name">Dashboard</span>
          </a>
          <a  href="{{route('user.index')}}" class="nav_link">
          
            <i class='bx bxs-user-account nav_icon'></i>
            <span class="nav_name">Users</span>
          </a>
         
         
          <a href="{{route('service.index')}}" class="nav_link">
        
            <i class='bx bx-receipt nav_icon'></i>
            <span class="nav_name">Service</span>
          </a>
          <a href="{{route('admin.profil.edit')}}" class="nav_link">
            <i class='bx bx-user-check nav_icon'></i>
            <span class="nav_name">Profil</span>
          </a>
        </div>
      </div>
      <a href="{{ route('logout') }}" class="nav_link" onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
        <i class="bx bx-log-out nav_icon"></i>
        <span class="nav_name">SignOut</span>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
      </form>

  
    </nav>
  </div>

<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function (event) {
    const showNavbar = (toggleId, navId, bodyId, headerId) => {
      const toggle = document.getElementById(toggleId),
        nav = document.getElementById(navId),
        bodypd = document.getElementById(bodyId),
        headerpd = document.getElementById(headerId);

      // Validate that all variables exist
      if (toggle && nav && bodypd && headerpd) {
        toggle.addEventListener("click", () => {
          // show navbar
          nav.classList.toggle("show");
          // change icon
          toggle.classList.toggle("bx-x");
          // add padding to body
          bodypd.classList.toggle("body-pd");
          // add padding to header
          headerpd.classList.toggle("body-pd");
        });
      }
    };

    showNavbar("header-toggle", "nav-bar", "body-pd", "header");

    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll(".nav_link");

    function colorLink() {
      if (linkColor) {
        linkColor.forEach((l) => l.classList.remove("active"));
        this.classList.add("active");
      }
    }
    linkColor.forEach((l) => l.addEventListener("click", colorLink));

    // Your code to run since DOM is loaded and ready
  });
</script>