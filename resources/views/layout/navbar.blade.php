<div class="kindof-navbar d-flex">
    <i class="bi bi-list toggle-sidebar-btn text-primary-dark"></i>
    <div class="kindof-breadcrumb text-primary-dark">
            Home > Surat > Pengajuan
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
              <img src="{{ asset('assets/img/messages-1.jpg') }}" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
              <img src="{{ asset('assets/img/messages-2.jpg') }}" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
              <img src="{{ asset('assets/img/messages-3.jpg') }}" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <!-- {{--<img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">--}} -->
            <i class="fa-solid fa-user"></i>
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ $user->nama }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ $user->nama }}</h6>
              <span>{{ $user->role }}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <!-- <li> -->
            <!--   <a class="dropdown-item d-flex align-items-center" href="users-profile.html"> -->
            <!--     <i class="bi bi-person"></i> -->
            <!--     <span>My Profile</span> -->
            <!--   </a> -->
            <!-- </li> -->
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->
</div>

<style>
    .kindof-navbar .toggle-sidebar-btn {
    }

    .kindof-breadcrumb {
        margin-top: 11px;
        margin-left: 20px;
    }
</style>

