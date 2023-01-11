@section('footer')
    <footer id="footer" class="footer px-md-0 border-top">
        <div class="container text-center">
            <p>セラピスト国試エキスパート</p>
        </div>
    </footer>
    {{-- TODO:CDNではなくインストールして使用する。 --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
    @yield('pageJs')
@endsection
