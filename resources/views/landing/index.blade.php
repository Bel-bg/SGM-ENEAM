<!DOCTYPE html>
<html lang="fr">
    @include('includes.head')
    <body>
        @include('includes.header')

        <main>
            @include('includes.hero')
            @include('includes.topmemoire')
            @include('includes.faq')
            @yield('content')
        </main>

        @include('includes.footer')
    </body>
</html>
