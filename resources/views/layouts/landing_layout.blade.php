<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/flowbite@2.3.0/dist/flowbite.bundle.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    @vite('resources/css/app.css')
    <title>@yield('title', 'Landing Page')</title>
</head>

<body class="">
    @yield('content')

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

{{-- <script src="https://website-widgets.pages.dev/dist/sienna.min.js" defer></script> --}}
<script> window.addEventListener("load", (event) => { setTimeout(() => { let aioa_script_tag = document.createElement("script"); aioa_script_tag.src = "https://www.skynettechnologies.com/accessibility/js/all-in-one-accessibility-js-widget-minify.js?colorcode=#420083&token=&position=bottom_right"; aioa_script_tag.id = "aioa-adawidget"; document.getElementsByTagName("body")[0].appendChild(aioa_script_tag); }, 3000) }); </script>

{{-- <script src="https://astral-accessibility.pages.dev/main.js"></script>
<script>
    initializeAstral();
</script> --}}

</body>
</html>
