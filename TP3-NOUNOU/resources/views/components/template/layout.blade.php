<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.template.meta')
    <title>Document</title>
</head>

<body>
    <nav>
        @include('components.template.nav')
    </nav>
    <main>
        @foreach ($pages as $page)
            @include('components.pages.' . explode('.', $page)[0])
        @endforeach
    </main>
</body>

</html>
