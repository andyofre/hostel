

    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="index.html">
                <img src="{{ asset('vendors/images/custom/logo.png') }}" alt="" class="dark-logo">
                <img src="{{ asset('vendors/images/custom/logo-light.png') }}" alt="" class="light-logo">
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <li class="dropdown">
                        <a href="{{route('admin.dashboard') }}" class="dropdown-toggle  no-arrow">
                            <span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
                        </a>

                    </li>

                    <li class="dropdown">

                        <a href="{{ route('registrationView') }}" class="dropdown-toggle  no-arrow">
                            <span class="micon icon-copy ti-user"></span><span class="mtext">Registration</span>
                        </a>

                    </li>
                    <li class="dropdown">
                        {{-- {{ route('paymentView') }} --}}
                        <a href="" class="dropdown-toggle no-arrow">
                            <span class="micon icon-copy ti-wallet"></span><span class="mtext">Payment</span>
                        </a>

                    </li>
                    <li class="dropdown">

                        <a href="{{ route('hostelView') }}" class="dropdown-toggle no-arrow">
                            <span class=" micon dw dw-apartment"></span><span class="mtext">Hostel</span>
                        </a>

                    </li>
                    <li>
                        <a href="{{ route('roomView') }}" class="dropdown-toggle no-arrow">
                            <span class="micon icon-copy ti-harddrives"></span><span class="mtext">Room</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle no-arrow">
                            <span class="micon icon-copy ti-medall"></span><span class="mtext"> Allocate </span>
                        </a>

                    </li>

{{--

                    <li>
                        <a href="" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-chat3"></span><span class="mtext">Instructor rating</span>
                        </a>
                    </li> --}}

                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <div class="sidebar-small-cap">Settings</div>
                    </li>
                    <li>
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-edit-2"></span><span class="mtext">Profile</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="introduction.html">Change Password</a></li>
                            <li><a href="getting-started.html">Update photo</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="" target="_blank" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-logout "></span>
                            <span class="mtext">Logout </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
