@extends('frontend.layouts.admin')
<link href="https://unpkg.com/@webpixels/css@1.2.6/dist/index.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<!-- NAVIGATION -->
<nav class="navbar bg-danger pt-0 pb-0">
    <div class="container-fluid pt-0 pb-0">
        <a href="index.html" class="navbar-brand pt-0 pb-0"><img src="https://iqwing.s3.ap-south-1.amazonaws.com/cms/results/2024-03/1710910341513.png" class="img-fluid h-18"></a>
        @auth
        <div class="dropdown float-right ms-lg-4">
            <a class="d-block p-0" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-sm bg-primary rounded-circle text-white">
                    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="">
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <div class="dropdown-header">
                    <div class="d-flex align-items-center h6 mb-0">
                        <span class="text-lg me-3">👋</span> Hey, {{Auth::user()->name}}
                    </div>
                </div>
                <a class="dropdown-item px-5 font-bold" href="{{route('exam-list')}}">MyTest</a>
                <a class="dropdown-item px-5 font-bold" href="{{route('student-detail')}}">My Profile</a>

                <a href="#" class="dropdown-item px-5 font-bold" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">Logout</a>
            </div>
        </div>
        @endauth
        @guest
            <div class="float-right d-flex ms-lg-4">
            <div class="navbar-nav me-4 align-items-lg-center mt-1 mt-lg-0">
                <a class="nav-item nav-link p-2 rounded" href="{{route('login')}}">Sign in</a>
            </div>
            <!-- Action -->
            <div class="d-flex align-items-lg-center mt-1 mt-lg-0">
                <a href="{{route('register')}}" class="btn btn-sm btn-neutral w-full w-lg-auto">
                    Register
                </a>
            </div>
            </div>
        @endguest
    </div>
    <!-- Avatar -->

</nav>
<div class="modal" id="mobile_nav" tabindex="-1" aria-labelledby="mobile_nav" style="display: none;" aria-hidden="true">
    <div class="modal-dialog w-auto max-w-full m-3">
        <div class="modal-content rounded-xl">
            <div class="p-1">
                <div class="px-6 pt-4 position-relative">

                    <!-- Logo -->
                    <a class="navbar-brand" href="/">
                        <div class="w-md-auto  text-dark">
                            <svg class="w-auto h-8" viewBox="0 0 1000 1000" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 500C0 223.858 223.858 0 500 0C776.142 0 1000 223.858 1000 500C1000 776.142 776.142 1000 500 1000C223.858 1000 0 776.142 0 500Z" fill="currentColor"></path>
                                <path d="M200.586 392.877C181.963 360.623 193.015 319.379 225.269 300.757C257.524 282.135 298.767 293.186 317.39 325.44L494.411 632.051C513.033 664.305 501.982 705.549 469.728 724.171C437.473 742.793 396.229 731.742 377.607 699.488L200.586 392.877Z" fill="white"></path>
                                <path d="M453.948 392.877C435.326 360.623 446.377 319.379 478.631 300.757C510.886 282.135 552.129 293.186 570.752 325.44L747.773 632.051C766.395 664.305 755.344 705.549 723.09 724.171C690.835 742.793 649.591 731.742 630.969 699.488L453.948 392.877Z" fill="white"></path>
                                <path d="M673.592 334.475C673.592 297.231 703.784 267.039 741.029 267.039C778.273 267.039 808.465 297.231 808.465 334.475C808.465 371.72 778.273 401.912 741.029 401.912C703.784 401.912 673.592 371.72 673.592 334.475Z" fill="white"></path>
                            </svg>
                        </div>
                    </a>

                    <div class="position-absolute top-4 end-4 text-xs">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" fdprocessedid="96lnno"></button>
                    </div>
                </div>
                <div class="px-6 pb-4">
                    <ul class="navbar-nav flex-row flex-wrap pt-4 py-lg-0">
                        <li class="nav-item col-6 col-lg-auto">
                            <a class="nav-link py-2" href="https://webpixels.io">Home</a>
                        </li>
                        <li class="nav-item col-6 col-lg-auto">
                            <a class="nav-link py-2" href="https://webpixels.io/start">Start</a>
                        </li>
                        <li class="nav-item col-6 col-lg-auto">
                            <a class="nav-link py-2" href="https://webpixels.io/components">Components</a>
                        </li>
                        <li class="nav-item col-6 col-lg-auto">
                            <a class="nav-link py-2" href="https://webpixels.io/templates">Templates</a>
                        </li>
                        <li class="nav-item col-6 col-lg-auto">
                            <a class="nav-link py-2" href="https://webpixels.io/plans">Pricing</a>
                        </li>
                        <li class="nav-item col-6 col-lg-auto">
                            <a class="nav-link py-2" href="https://webpixels.io/marketplace?type=kits">Starter Kits</a>
                        </li>
                        <li class="nav-item col-6 col-lg-auto">
                            <a class="nav-link py-2 active" href="https://webpixels.io/docs">Docs</a>
                        </li>
                        <li class="nav-item col-6 col-lg-auto">
                            <a class="nav-link py-2" href="https://webpixels.io/blog">Blog</a>
                        </li>
                    </ul>
                    <hr class="my-4">
                    <ul class="navbar-nav flex-row flex-wrap ms-llg-auto">
                        <li class="nav-item col-6 col-llg-auto">
                            <a class="nav-link py-2" href="https://github.com/webpixels" target="_blank" rel="noopener">
                                <i class="fab fa-github"></i>
                                <small class="d-llg-none ms-2">GitHub</small>
                            </a>
                        </li>
                        <li class="nav-item col-6 col-llg-auto">
                            <a class="nav-link py-2" href="https://dribbble.com/webpixels" target="_blank" rel="noopener">
                                <i class="fab fa-dribbble"></i>
                                <small class="d-llg-none ms-2">Dribbble</small>
                            </a>
                        </li>
                        <li class="nav-item col-6 col-llg-auto">
                            <a class="nav-link py-2" href="https://twitter.com/webpixels_" target="_blank" rel="noopener">
                                <i class="fab fa-twitter"></i>
                                <small class="d-llg-none ms-2">Twitter</small>
                            </a>
                        </li>
                        <li class="nav-item col-6 col-llg-auto">
                            <a class="nav-link py-2" href="https://discord.gg/Ea9n7bpW" target="_blank" rel="noopener">
                                <i class="fab fa-discord"></i>
                                <small class="d-llg-none ms-2">Discord</small>
                            </a>
                        </li>
                    </ul>
                    <hr class="my-4">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link py-2" href="https://webpixels.io/account/settings">
                                Settings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-2" href="https://webpixels.io/account/billing">
                                Billing
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-2" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <form id="logout-form" action="https://webpixels.io/logout" method="POST" style="display: none;">
        <input type="hidden" name="_token" value="mkVRbBsItsu5PMkg8MN917E4u4nWqH4A02o4AgCQ">	</form>
</div>