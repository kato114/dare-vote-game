@extends('layout.front')
@section('content')
    <section class="ico_breadcrumb_area">
        <h1>POST <span>DARE</span></h1>
    </section>
    <section class="Contact_area padding_140">
        <div class="custom_container">
            <div class="row">
                <div class="col-xl-12 col-sm-12 col-md-12">
                    <div class="ico_contact_center">
                        <div class="contact_top">                               
                            <h1 class="text-center">POST <span>YOUR OWN</span> DARE</h1>
                            <p class="text-center text-uppercase">Please remember any dare posted that does not abid by rules will be lost (NO EXCEPTIONS).</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-sm-12 col-md-12">
                    <div class="contact_form">
                        <form action="{{ route('create') }}" method="post">
                        	{{ csrf_field() }}
                            <textarea placeholder="AREA YOU CAN TYPE IN YOUR OWN DARE" id="inp_content"></textarea>
                            <div>
                                <span class="float-left text-white pt-3">Dare Cost : 100</span>
                                <button id="btn_post" class="btn_one float-right" type="button">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $("#btn_post").on('click', async function() {
            if (connected) {
                alert('Are you sure to post a new dare? It will cost 100 DARE.');

                try {
                    toggleLoader(true);
                    contract.methods
                        .balanceOf(accounts[0])
                        .call()
                        .then(async function (balance) {
                            if(balance >= 100 * 1e18) {
                                contract.methods
                                    .post($("#inp_content").val())
                                    .send({ from: accounts[0], value: 0 }, function (res) {
                                        if (res != null) 
                                            toggleLoader();
                                    })
                                    .then(async function (res) {
                                        $.ajax({
                                            url : '{{ route("create") }}',
                                            type : 'POST',
                                            data : {
                                                "_token": "{{ csrf_token() }}",
                                                "data" : res
                                            },
                                            dataType:'json',
                                            success : function(data) {
                                                $("#inp_content").val('');
                                                toastr('Success! Your dare is posted.', true)
                                                toggleLoader(false);
                                            },
                                            error : function(request,error)
                                            {
                                                toastr('Fail! Please try again.')
                                                toggleLoader(false);
                                            }
                                        });
                                    })
                                    .catch((error) => {
                                        toastr('Fail! Please try again later.')
                                        toggleLoader(false);
                                    });
                            } else {
                                toastr('Low balance. Please buy coin first.')
                                toggleLoader(false);
                            }
                        })
                        .catch((error) => {
                            toastr('Fail! Please try again later.')
                            toggleLoader(false);
                        });
                } catch (error) {
                    toastr('Fail! Please try again later.')
                    toggleLoader(false);
                }
            } else {
                toastr('Please connect MetaMask')
            }
        });
    });
</script>
@endsection