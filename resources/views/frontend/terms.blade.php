@extends('layout.front')
@section('content')
    <section class="ico_breadcrumb_area">
        <h1>DISCLAIMER <span>WARNING</span></h1>
    </section>
    <section class="ico_token" id="token_sale">
        <div class="custom_container">
            <div class="terms_box p-5">
                <p>Welcome to The Dare Platform The First Game Show of Its Kind.</p>
                <p>Please note that dare platform will not tolerate any dares that threaten any of our users physically or mentally. Any dare submitted that implies any harm to any user will be deleted and any tokens spent creating or voting for this dare will be lost. Should a dare get past our security measures and reach the game platform all tokens spent creating or voting for said dare will be burned (No Exceptions)</p>
                <p>This platform is here for everyone to enjoy in a safe environment. Please enjoy responsibly.</p>
            </div>
            <div class="row justify-content-center">
                <div class="row">
                    <div class="col-6">
                        <a href="{{ route('dare') }}" class="btn_one">Agree</a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('home') }}" class="btn_two">Decline</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
