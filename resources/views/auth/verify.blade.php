@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifique seu email</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            O link de verificação foi enviado para sua caixa de e-mail
                        </div>
                    @endif
                    Antes de avançar, por favor verifique sua caixa de email o link de verificação.
                    Se voce nao recebeu o e-mail
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Clique aqui para reenviar o email</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
