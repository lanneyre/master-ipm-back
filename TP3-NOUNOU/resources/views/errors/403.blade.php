<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.template.meta')
    <title>Document</title>
</head>

<body>
    <nav id="top">
        @include('components.template.nav')
    </nav>
    <main id="403">
        <div class="flex min-h-screen items-center justify-center p-6">
            <div class="text-center mr-10">
                <h1 class="text-7xl font-bold text-gray-800">403</h1>
                <p class="mt-4 text-2xl font-semibold text-gray-700">Oups ! Cette page est interdite.</p>
                <p class="mt-2 text-gray-500">Il semble que vous n'ayez pas le droit d'acceder à cette page.</p>
                <a href="{{ url('/') }}"
                    class="mt-6 inline-block rounded-lg btn btn-vertpale btnsmall px-6 py-3 text-white shadow-md transition hover:bg-blue-700">
                    Retour à l'accueil
                </a>
            </div>

            <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="none" class="ml-10" width="200px"
                height="200px">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path fill="#DDF1CF" fill-rule="evenodd"
                        d="M5.781 4.414a7 7 0 019.62 10.039l-9.62-10.04zm-1.408 1.42a7 7 0 009.549 9.964L4.373 5.836zM10 1a9 9 0 100 18 9 9 0 000-18z">
                    </path>
                </g>
            </svg>
        </div>
    </main>

</body>

</html>
