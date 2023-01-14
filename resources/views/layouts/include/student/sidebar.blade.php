
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
                        <a href="{{route('student.dashboard') }}" class="dropdown-toggle  no-arrow">
                            <span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
                        </a>

                    </li>


                    @if (Auth::user()->accomdationStatus == 1)


                    <li class="dropdown">
                        {{-- {{ route('paymentView') }} --}}
                        <a href="" class="dropdown-toggle no-arrow">
                            <span class="micon icon-copy ti-wallet"></span><span class="mtext">Pay hostel Fee</span>
                        </a>

                    </li>


                    @endif

                    @if (Auth::user()->portalFee == 'PAID')


                    <li class="dropdown">
                        {{-- {{ route('paymentView') }} --}}
                        <a href="{{ route('book.hostel') }}" class="dropdown-toggle no-arrow">
                            <span class="micon icon-copy ti-book"></span><span class="mtext">Book Hostel</span>
                        </a>

                    </li>

                    @endif

                    @if (Auth::user()->publishStatus == 1)

                    <li class="dropdown">

                        <a href="" class="dropdown-toggle no-arrow">
                            <span class=" micon dw dw-invoice"></span><span class="mtext">Get Receipt</span>
                        </a>

                    </li>

                    @endif



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
                            <li><a href="">Change Password</a></li>
                            <li><a href="{{ route('update.profile') }}">Update photo</a></li>
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
