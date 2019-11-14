<div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;margin: 10px" >
    <div style="position: absolute; {{ config('laravel-bootstrap-toasts.position_x','right') }}: 0; {{ config('laravel-bootstrap-toasts.position_y','top') }}: 0;">
        @foreach (session('toasts', collect())->toArray() as $toast)
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000"
                 @if (!$toast['autohide']) data-autohide="false" @endif>
                @if($toast["title"] )
                    <div class="toast-header">
                        <strong class="mr-auto">{{ $toast['title'] }}</strong>
                        @if (!$toast['autohide'])
                            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        @endif
                    </div>
                @else
                    @if (!$toast['autohide'])
                        <div>
                            <button type="button" class="ml-2 mr-1 mb-1 close text-light" data-dismiss="toast"
                                    aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                @endif
                <div class="toast-body bg-{{ $toast['level'] }} text-light">
                    {!! $toast['message'] !!}
                </div>
            </div>
        @endforeach

    </div>
</div>

<script>
    $('.toast').toast("show");
</script>

{{ session()->forget('toasts') }}
