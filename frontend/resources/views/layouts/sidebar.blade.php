<aside class="main-sidebar sidebar-dark-primary elevation-4"
       style="position: fixed; height: 100% !important; background-color: #190C3D">
    <a href="#"
       class="flex justify-center items-center text-white gap-2 pt-3">
        <img src="{{asset('images/axios.png')}}"
             alt="logo"
             class=""
             style="width: 130px; opacity: .8">
    </a>
    <hr class="opacity-35 mb-2 mt-2 border-t border-white">
    <div class="sidebar">
        <!-- User Panel -->
        <div class="user-panel d-flex mb-3 mt-3 pb-3 pl-[0.8rem]">
            <img src="{{ asset('images/avatar.jpg') }}"
                 class="img-circle elevation-2"
                 alt="User Image">
            <div class="info">
                <a href="{{ route('profile.edit') }}"
                   class="d-block"
                   style="text-decoration: none">{{ auth()->user()->getFullname() }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                @if (auth()->user()->user_type == 3)
                    <li class="nav-item has-treeview">
                        <a href="{{ route('userHome') }}"
                           class="nav-link">
                            <i class="nav-icon fas fa-house"></i>
                            <p>
                                Point of Sale
                            </p>
                        </a>
                    </li>
                    <hr class="opacity-35 mb-2 mt-2 border-t border-white">
                @endif


                @if (auth()->user()->user_type != 3)
                    <li class="nav-item has-treeview">
                        <a href="{{ route('dashboard') }}"
                           class="nav-link">
                            <i class="nav-icon fas fa-house"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <hr class="opacity-35 mb-2 mt-2 border-t border-white">
                    <li class="nav-item has-treeview">
                        <a href="{{ route('customer') }}"
                           class="nav-link">
                            <i class="nav-icon fas fa-user-alt"></i>
                            <p>
                                Customer
                            </p>
                        </a>
                    </li>
                    <hr class="opacity-35 mb-2 mt-2 border-t border-white">
                    <li class="nav-item has-treeview">
                        <a href="{{ route('employee') }}"
                           class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Employee
                            </p>
                        </a>
                    </li>
                    <hr class="opacity-35 mb-2 mt-2 border-t border-white">
                    <li class="nav-item has-treeview">
                        <a href="{{ route('product') }}"
                           class="nav-link">
                            <i class="nav-icon fas fa-box-archive"></i>
                            <p>
                                Product
                            </p>
                        </a>
                    </li>
                    <hr class="opacity-35 mb-2 mt-2 border-t border-white">
                    <li class="nav-item has-treeview">
                        <a href="{{ route('inventory') }}"
                           class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                Inventory
                            </p>
                        </a>
                    </li>
                    <hr class="opacity-35 mb-2 mt-2 border-t border-white">
                    <li class="nav-item has-treeview">
                        <a href="{{ route('invoice') }}"
                           class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Invoices
                            </p>
                        </a>
                    </li>
                    <hr class="opacity-35 mb-2 mt-2 border-t border-white">
                    <li class="nav-item has-treeview">
                        <a href="{{ route('supplier') }}"
                           class="nav-link">
                            <i class="nav-icon fas fa-boxes-packing"></i>
                            <p>
                                Supplier
                            </p>
                        </a>
                    </li>
                    <hr class="opacity-35 mb-2 mt-2 border-t border-white">
                    <li class="nav-item has-treeview">
                        <a href="{{ route('accounts') }}"
                           class="nav-link">
                            <i class="nav-icon fas fa-address-book"></i>
                            <p>
                                Accounts
                            </p>
                        </a>
                    </li>
                    <hr class="opacity-35 mb-2 mt-2 border-t border-white">
                @endif
                <li class="nav-item">
                    <a href="#"
                       class="nav-link"
                       onclick="document.getElementById('logout-form').submit()">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                        <form action="{{ route('logout') }}"
                              method="POST"
                              id="logout-form">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
