<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('backend/img/sidebar-1.jpg')}}">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
         Leenbo
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {{Request::is('admin/dashboard*') ? 'active' :''}}  ">
            <a class="nav-link" href="{{route('admin.dashboard')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{Request::is('admin/slider*') ? 'active' :''}} ">
            <a class="nav-link" href="{{route('slider.index')}}">
              <i class="material-icons">slideshow</i>
              <p>Slider</p>
            </a>
          </li>
          <li class="nav-item {{Request::is('admin/category*') ? 'active' :''}} ">
            <a class="nav-link" href="{{route('category.index')}}">
              <i class="material-icons">library_books</i>
              <p>Category</p>
            </a>
          </li>
          <li class="nav-item {{Request::is('admin/sampleVideo*') ? 'active' :''}} ">
            <a class="nav-link" href="{{route('sampleVideo.index')}}">
              <i class="material-icons">important_devices</i>
              <p>Sample Videos</p>
            </a>
          </li>

            <li class="nav-item {{Request::is('admin/item*') ? 'active' :''}} ">
                <a class="nav-link" href="{{route('item.index')}}">
                    <i class="material-icons">unarchive</i>
                    <p>Videos</p>
                </a>
            </li>

            <li class="nav-item {{Request::is('admin/reservation*') ? 'active' :''}} ">
                <a class="nav-link" href="{{route('reservation.index')}}">
                    <i class="material-icons">chrome_reader_mode</i>
                    <p>Subscriber</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('admin/price*') ? 'active' :''}} ">
                <a class="nav-link" href="{{route('price.index')}}">
                    <i class="material-icons">chrome_reader_mode</i>
                    <p>Pice Plan</p>
                </a>
            </li>
          <li class="nav-item {{Request::is('admin/settings*') ? 'active' :''}} ">
            <a class="nav-link" href="{{route('settings.index')}}">
              <i class="material-icons">settings</i>
              <p>Settings</p>
            </a>
          </li>

        </ul>
      </div>
    </div>
