<!doctype html>
<html lang="fr">
    
    @include('includes.head')

    <body>
        <!-- Barre de navigation -->
        @include('includes.header')

        <!-- Contenu principal -->
        @include('catalogue.main')

        
        @include('includes.footer')

        <!-- PDF.js -->
        @include('catalogue.pdf-js')
    </body>
</html>


<!-- PDF -->
@include('catalogue.pdf-js')