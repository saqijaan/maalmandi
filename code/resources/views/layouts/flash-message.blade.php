@foreach (['alert-success','alert-danger','alert-warning','alert-info'] as $alert)
    @if (Session::has($alert))
        <div class="alert {{ $alert }}">
            {{ Session::get($alert) }}
        </div>
        <script>
             @if( $alert == 'alert-success' )
                toastr.success('{{ $alert }}','Success');
             @endif
             @if( $alert == 'alert-danger' )
                toastr.error('{{ $alert }}','Success');
             @endif
             @if( $alert == 'alert-warning' )
                toastr.warning('{{ $alert }}','Success');
             @endif
             @if( $alert == 'alert-info' )
                toastr.info('{{ $alert }}','Success');
             @endif
        </script>
    @endif
@endforeach