<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"
          type="text/css">
    @livewireStyles
    @stack('styles')
</head>

<body class="position-relative">

@yield('content')

<form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>

@livewireScripts

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        showCloseButton: true,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    window.addEventListener('alert', ({detail: {type, message}}) => {
        Toast.fire({
            icon: type,
            title: message
        })
    })
</script>

@yield('scripts')
@stack('scripts')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://webpixels.io/js/app.js?id=8cd624330d1f28f68b66f99aa3045bd8"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<footer class="bg-blue-100 bottom-0 end-0 mt-20 position-absolute start-0">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-md-between pt-4 pb-4 m-0">
            <div class="col-md-12">
                <div class="copyright text-sm text-center  text-dark">
                    Powered by <a href="#" class="h6 text-sm font-bold text-dark">IQwing</a>.
                </div>
            </div>
        </div>
    </div>
</footer>
</body>

</html>