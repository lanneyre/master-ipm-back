<!DOCTYPE html>
<html lang="fr">

<head>
    @include('components.template.meta')
    <title>New Life Pets</title>
</head>

<body class="admin">
    <nav id="top">
        @include('admin.menu')
    </nav>
    <main>
        @if (session('alert'))
            @include('components.template.alert')
        @endif
        @yield('content')
    </main>

    @yield('scripts')
</body>

</html>
