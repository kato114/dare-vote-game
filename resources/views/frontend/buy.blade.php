@extends('layout.front')
@section('content')
    <section class="ico_breadcrumb_area">
        <h1>Buy <span>DARE</span> Coin</h1>
    </section>
    <section class="Contact_area padding_140">
        <div class="custom_container">
            <div class="row">
                <div class="col-xl-12 col-sm-12 col-md-12">
                    <div class="ico_contact_center">
                        <div class="contact_top">                               
                            <h1 class="text-center">MAKE YOUR <span>DARE COIN</span></h1>
                            <p class="text-center text-uppercase">Buy DARE coins with Tron</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-sm-12 col-md-12">
                    <div class="row justify-content-center contact_form">
                        <div class="col-xl-3">
                            <img class="img_coin" src="{{ asset('assets/frontend/images/coin_bnb.png') }}" width="50" alt="" />
                            <input id="inp_tron" type="text" placeholder="BNB" />
                        </div>
                        <div class="col-xl-1 text-center">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="col-xl-3">
                            <img class="img_coin" src="{{ asset('assets/frontend/images/coin_dare.png') }}" width="50" alt="" />
                            <input id="inp_dare" type="text" placeholder="DARE" />
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-sm-12 col-md-12">
                    <div class="row justify-content-center contact_form">
                        <button id="btn_buy" class="btn_one" type="button">Buy</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {

        let sync = function(from, to, rate) {
            $("#" + to).val($("#" + from).val() * rate);
        }

        $('#inp_tron').on('keyup', function() {
            sync('inp_tron', 'inp_dare', 1 / tokenRate)
        });

        $('#inp_dare').on('keyup', function() {
            sync('inp_dare', 'inp_tron', tokenRate)
        });

        $("#btn_buy").on('click', async function() {
            if (connected) {
                let amount = $('#inp_tron').val();

                if(amount <= 0) {
                    toastr('Please input correct value')
                    return;
                }

                try {
                    toggleLoader();
                    contract.methods
                        .mint()
                        .send({ from: accounts[0], value: amount * 1e18 }, function (res) {
                            if (res != null) 
                                toggleLoader();
                        })
                        .then(async function (res) {
                            toastr('Success! Check your wallet.', true)
                            toggleLoader(false);
                        })
                        .catch((error) => {
                            toastr('Fail! Please try again later.')
                            toggleLoader(false);
                        });
                } catch (error) {
                    toastr('Fail! Please try again later.', true)
                    toggleLoader(false);
                }
            } else {
                toastr('Please connect MetaMask')
                toggleLoader(false);
            }
        });
    });
</script>
@endsection