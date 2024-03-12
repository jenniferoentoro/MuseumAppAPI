@extends('layouts.app')

@section('title')
<title>Admin Museum Dashboard</title>
@endsection
@section('style')

@endsection
@section('content')
@include('components.navbar')
<div class="container">
    @livewire('museum')
</div>

@endsection
@livewireScripts
@section('script')
<script>
$('#logout').click(function () {
    Swal.fire({
        title: 'Log out?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'OK',
        closeOnConfirm: true,
        closeOnCancel: true
    }).then((result) => { 
        if (result.value===true) {
            $.ajax({
                url: '{{ route('post-logout-admin') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    
                },
                success: function (data) {
                    //prepend to notes_array
                    window.location.href = "{{ route('post-login-admin') }}"
                },
                error: function (error) {
                    alert('Logout failed!');
                }
            }); 
        } 
    }) 
});
</script>


@endsection
