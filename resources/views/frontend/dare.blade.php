@extends('layout.front')
@section('content')
    <section class="ico_breadcrumb_area">
        <h1><span>DARE</span></h1>
    </section>
    <section class="page_feature_area">
        <div class="custom_container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6">
                            <div class="sn_pg_feature">
                                <div class="sn_pg_ftr_inner">
                                    <span class="flaticon-information"></span>
                                    <h3>10,000,000</h3>
                                    <p>TOTAL TOKENS WON</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="sn_pg_feature">
                                <div class="sn_pg_ftr_inner">
                                    <span class="flaticon-cogwheel"></span>
                                    <h3>10,000,000</h3>
                                    <p>TOTAL TOKENS BURNED</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="sn_pg_feature">
                                <div class="sn_pg_ftr_inner">
                                    <span class="flaticon-computer"></span>
                                    <h3>10,000,000</h3>
                                    <p>TOTAL DARES TO DATE</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <div class="sn_pg_feature">
                                <div class="sn_pg_ftr_inner">
                                    <span class="flaticon-shopping-online-support"></span>
                                    <h3>10,000,000</h3>
                                    <p>TOTAL VOTES TO DATES</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ico_market_area padding_140">
        <div class="custom_container">
            <div class="row">
                <div class="col-12">
                    <div class="ico_market_left text-center">
                        <h1>SUBMIT <span>YOUR OWN </span>DARE</h1>
                        <p>Don't see the are you like. Submit your own dare. See how many votes you can get!</p>
                        <a href="{{ route('post') }}" class="btn_one">submit now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="progress_area padding_140">
        <div class="custom_container">
            <div class="section_title">
                <h1>VOTE OTHERS <span>FUNNY</span> DARE</h1>
                <p>Check these dares and vote them if you like. Enjoy these.</p>
            </div>
            <div class="row justify-content-center mb-1">
                <div class="col-xl-8">
                    <p class="text-white pt-2">Total : {{ $votes_count }} votes</p>
                </div>
                <div class="col-xl-2">
                    <div class="input-group has-success">
                        <label class="text-white pr-3 pt-2">Sort by: </label>
                        <select id="sel_orderby" class="form-control">
                            <option value="created_at,desc">Latest</option>
                            <option value="created_at,asc">Oldest</option>
                            <option value="vote_count,desc">Max Votes</option>
                            <option value="vote_count,asc">Min Votes</option>
                            <option value="vote_amount,desc">Max Tokens</option>
                            <option value="vote_amount,asc">Min Tokens</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div id="dare_list" class="col-xl-10"></div>
            </div>
            <div id="dare_loader" class="text-center d-none">
                <img src="{{ asset('assets/frontend/images/spinner-loading.gif') }}" width="100">
            </div>
        </div>
    </section>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        let loading_status = false
        let param_page = 1;

        $("#dare_list").on('click', '.btn_vote', async function() {
            if (connected) {
                try {
                    let dareId = $(this).attr('dareid');
                    let amount = $(this).parent().find('input').val();

                    if(amount <= 0) {
                        toastr('Input vote amount correctly!');
                        return;
                    }

                    toggleLoader();
                    contract.methods
                        .balanceOf(accounts[0])
                        .call()
                        .then(async function (balance) {
                            if(balance >= amount * 1e18) {
                                contract.methods
                                    .vote(dareId, amount)
                                    .send({ from: accounts[0], value: 0 }, function (res) {
                                        if (res != null) 
                                            toggleLoader(false);
                                    })
                                    .then(async function (res) {
                                        $.ajax({
                                            url : '{{ route("vote") }}',
                                            type : 'POST',
                                            data : {
                                                "_token": "{{ csrf_token() }}",
                                                "data" : res
                                            },
                                            dataType:'json',
                                            success : function(data) {
                                                $(".inp_content").val('');
                                                toastr('Success! Your vote is succeed.', true)
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

        $("#sel_orderby").on('change', function() {
            param_page = 1;
            loadVotes();
        });

        let loadVotes = () => {
            if(loading_status) return;
            loading_status = true;

            $("#dare_loader").toggleClass('d-none');

            $.ajax({
                type: "GET",
                url: "{{ route('get_dares') }}",
                data: {
                    page: param_page,
                    order: $("#sel_orderby").val(),
                },
                dataType: 'json',
                success: function (data) {
                    if(param_page == 1) $("#dare_list").empty();
                    
                    for(var i = 0; i < data.length; i++) {
                        var dare = data[i];
                        $("#dare_list").append('<div class="dare">\
                            <div class="detail row">\
                                <div class="col-xs-12 col-sm-6 col-md-3">\
                                    <span class="flaticon-database"></span>\
                                    <b>ID</b> #' + dare.id + 
                                '</div>\
                                <div class="col-xs-12 col-sm-6 col-md-3">\
                                    <span class="flaticon-database-1"></span>\
                                    <b>Total Votes</b> : ' + dare.vote_count + 
                                '</div>\
                                <div class="col-xs-12 col-sm-6 col-md-3">\
                                    <span class="flaticon-database-2"></span>\
                                    <b>Total Tokens</b> : ' + dare.vote_amount + 
                                '</div>\
                                <div class="col-xs-12 col-sm-6 col-md-3">\
                                    <span class="flaticon-shape"></span>\
                                    <b>Ranking</b> # ' + ((param_page - 1) * 20 + i + 1) + 
                                '</div>\
                            </div>\
                            <div>\
                                <p>' + dare.content + '</p>\
                            </div>\
                            <div class="votes">\
                                <input  class="inp_amount" type="number" placeholder="Enter number of votes you want to submit to this dare" name="">\
                                <button  class="btn_vote" dareID="' + dare.id + '">Vote</button>\
                            </div>\
                        </div>');
                    }

                    param_page++;
                    loading_status = false;

                    $("#dare_loader").toggleClass('d-hidden');
                }
            });
        };

        window.addEventListener("scroll", function() {
            if($(".dare:last").get(0) != undefined) {
                const triggerBottom = window.innerHeight;
                const blogBottom = $(".dare:last").get(0).getBoundingClientRect().bottom;

                if(triggerBottom < blogBottom + 100)
                    return;
            }

            loadVotes();
        });

        loadVotes();
    });
</script>
@endsection