@extends('anasayfa.template')

@section('icerik')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Email Adresinizi Onaylayın.') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Yeni bir onay linki Email adresinize gönderilmiştir.') }}
                        </div>
                    @endif

                    {{ __('Devam etmeden önce email adresinize gelen doğrulama linkini kontrol ediniz.') }}
                    {{ __('Eğer email almadıysanız') }}, <a href="{{ route('verification.resend') }}">{{ __('yenisini talep edebilirsiniz.') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
