<div class="container">
    <div class="row">
        @if (Session::has('success'))
            <div class="alert alert-success ">
                <b>{{ Session::get('success') }}</b>
                {{ Session::forget('success') }}
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger">
                <b>{{ Session::get('error') }}</b>
                {{ Session::forget('error') }}

            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger validation">

                <ul class="text-left mb-0 {{ count($errors) == 1 ? 'list-unstyled' : '' }}">
                    @foreach ($errors->all() as $error)
                        <li>
                            <b>{{ $error }}</b>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
