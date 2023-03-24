<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="col py-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('front.home') }}">{{ $li_1 ?? __('translation.home') }}</a></li>

                        @stack('breadcrumb_additions')

                        <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
