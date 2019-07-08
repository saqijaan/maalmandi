@foreach (['alert-success','alert-danger','alert-warning','alert-info'] as $alert)
    <script>
        @if (Session::has($alert))
            @if( $alert == 'alert-success' )
                toastr.success('{{ Session::get($alert) }}','Success');
            @endif
            @if( $alert == 'alert-danger' )
                toastr.error('{{ Session::get($alert) }}','Success');
            @endif
            @if( $alert == 'alert-warning' )
                toastr.warning('{{ Session::get($alert) }}','Success');
            @endif
            @if( $alert == 'alert-info' )
                toastr.info('{{ Session::get($alert) }}','Success');
            @endif
        @endif
    </script>
@endforeach