<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="theme-color" content="#ffffff">

		<title>Dare Vote Game </title>

		<!--==== GOOGLE FONTS ====-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

		<!--==== BASE CSS ====-->
		<link href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/frontend/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/frontend/css/flaticon.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">
		<link href="{{ asset('assets/frontend/style.css') }}" rel="stylesheet">
	</head>
	<body>
		<div class="crypto_ico_home">
			<header class="header_area">
				<div class="custom_container">
					<div class="row">
						<div class="col-auto mr-auto">
							<div class="header_logo">
								<a href="{{ route('home') }}">
									<img src="{{ asset('assets/frontend/images/logo.svg') }}" alt="" width="140">
								</a>
							</div>
						</div>
						<div class="col-auto">
							<nav class="mainmenu">
								<ul>
                                    @if(\Route::current()->getName() == 'home')      
                                    <li>
                                        <a href="#">En</a>
                                        <ul class="sub_menu">
                                            <li>
                                                <a href="#">English</a>
                                            </li>
                                            <li>
                                                <a href="#">Chinese</a>
                                            </li>
                                        </ul>
                                    </li>   
                                    <li>
                                        <a href="{{ route('terms') }}">Launch</a>
                                    </li>
                                    @elseif(\Route::current()->getName() == 'terms')  
                                    <li>
                                        <a href="#">En</a>
                                        <ul class="sub_menu">
                                            <li>
                                                <a href="#">English</a>
                                            </li>
                                            <li>
                                                <a href="#">Chinese</a>
                                            </li>
                                        </ul>
                                    </li>  
                                    <li class="d-none">
                                        <a href="{{ route('terms') }}">Launch</a>
                                    </li>
                                    @else
                                    <li class="{{ \Request::is('dare') ? 'current_page_item' : '' }}">
                                        <a href="{{ route('dare') }}">Dare</a>
                                    </li>
                                    <!-- <li class="{{ \Request::is('voting') ? 'current_page_item' : '' }}">
                                        <a href="{{ route('voting') }}">Voting</a>
                                    </li> -->
                                    <li class="{{ \Request::is('buy') ? 'current_page_item' : '' }}">
                                        <a href="{{ route('buy') }}">Buy</a>
                                    </li>
                                    <li class="{{ \Request::is('wpaper') ? 'current_page_item' : '' }}">
                                        <a href="{{ asset('assets/whitepaper.pdf') }}" target="_blank">Whitepaper</a>
                                    </li>
                                    <li class="{{ \Request::is('works') ? 'current_page_item' : '' }}">
                                        <a href="{{ route('works') }}">How it works</a>
                                    </li>
                                    <li>
                                        <a href="#">En</a>
                                        <ul class="sub_menu">
                                            <li>
                                                <a href="#">English</a>
                                            </li>
                                            <li>
                                                <a href="#">Chinese</a>
                                            </li>
                                        </ul>
                                    </li>   
                                    <li>
                                        <a href="#" class="btn_connect">Connect</a>
                                    </li>
                                    @endif
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</header>
			<!-- Mobile Menu -->
            <section id="mobile-nav-wrap" class="clearfix">
                <div class="custom_container">
                   <div class="bottom_nav">
                        <div id="mobile-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('assets/frontend/images/logo.svg') }}" alt="" width="100">
                            </a>
                        </div>
                        <div class="toggle-inner"></div>
                   </div>
                </div>
            </section>
            <section class="mobile-menu-inner">
                <div class="mobile_accor_togo">
                    <div class="mobile_accor_logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/frontend/images/logo.svg') }}" alt="" width="100">
                        </a>
                    </div>
                    <div class="close-menu">
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <nav id="accordian">
                    <ul class="accordion-menu">
                        @if(\Route::current()->getName() == 'home')      
                        <li>
                            <a href="#">En</a>
                            <ul class="sub_menu">
                                <li>
                                    <a href="#">English</a>
                                </li>
                                <li>
                                    <a href="#">Chinese</a>
                                </li>
                            </ul>
                        </li>   
                        <li>
                            <a href="{{ route('terms') }}">Launch</a>
                        </li>
                        @elseif(\Route::current()->getName() == 'terms')  
                        <li>
                            <a href="#">En</a>
                            <ul class="sub_menu">
                                <li>
                                    <a href="#">English</a>
                                </li>
                                <li>
                                    <a href="#">Chinese</a>
                                </li>
                            </ul>
                        </li>  
                        <li class="d-none">
                            <a href="{{ route('terms') }}">Launch</a>
                        </li>
                        @else
                        <li class="{{ \Request::is('dare') ? 'current_page_item' : '' }}">
                            <a href="{{ route('dare') }}">Dare</a>
                        </li>
                        <!-- <li class="{{ \Request::is('voting') ? 'current_page_item' : '' }}">
                            <a href="{{ route('voting') }}">Voting</a>
                        </li> -->
                        <li class="{{ \Request::is('buy') ? 'current_page_item' : '' }}">
                            <a href="{{ route('buy') }}">Buy</a>
                        </li>
                        <li class="{{ \Request::is('wpaper') ? 'current_page_item' : '' }}">
                            <a href="{{ asset('assets/whitepaper.pdf') }}" target="_blank">Whitepaper</a>
                        </li>
                        <li class="{{ \Request::is('works') ? 'current_page_item' : '' }}">
                            <a href="{{ route('works') }}">How it works</a>
                        </li>
                        <li>
                            <a href="#">En</a>
                            <ul class="sub_menu">
                                <li>
                                    <a href="#">English</a>
                                </li>
                                <li>
                                    <a href="#">Chinese</a>
                                </li>
                            </ul>
                        </li>   
                        <li>
                            <a href="#" class="btn_connect">Connect</a>
                        </li>
                        @endif
                    </ul>
                </nav>
            </section>
            <!-- Mobile Menu -->
			<!-- ========== Start Header Area ============= -->

            @yield('content')


            <div id="metamask_warning" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content border border-white border-lg">
                        <div class="modal-body text-center">
                            <h6 class="text-white mt-1">
                                This website requires Metamask to interact with the smart contract. Click wallet button below.
                            </h6>
                            <a href="https://chrome.google.com/webstore/detail/metamask/nkbihfbeogaeaoehlefnkodbefgpgknn?hl=en" target="_blank">
                                <img class="my-3" src="https://docs.metamask.io/metamask-fox.svg" width="100">
                            </a>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
		</div>
        <div class="loader active">
            <img src="{{ asset('assets/frontend/images/loader.png') }}" alt="" />
            <p>Loading...</p>
        </div>
        <div class="alert_list"></div>
		<!--==== JAVASCRIPT FILES ====-->
		<script src="{{ asset('assets/frontend/js/jquery-2.1.4.min.js') }}"></script>
		<script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
		<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/frontend/js/particles.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>
		<script src="{{ asset('assets/frontend/js/main.js') }}"></script>
        <script type="text/javascript">
            let contractAddress = '{{ env("CONTRACT_ADDRESS") }}'

            let tokenRate = 0

            let connected = null
            let chainID = null
            let accounts = null
            let contract = null

            let tokenABI = [
                {
                    "inputs": [
                        {
                            "internalType": "contract DARECoin",
                            "name": "_token",
                            "type": "address"
                        }
                    ],
                    "stateMutability": "nonpayable",
                    "type": "constructor"
                },
                {
                    "anonymous": false,
                    "inputs": [
                        {
                            "indexed": true,
                            "internalType": "address",
                            "name": "user",
                            "type": "address"
                        },
                        {
                            "indexed": false,
                            "internalType": "uint256",
                            "name": "amount",
                            "type": "uint256"
                        }
                    ],
                    "name": "Deposited",
                    "type": "event"
                },
                {
                    "inputs": [],
                    "name": "mint",
                    "outputs": [],
                    "stateMutability": "payable",
                    "type": "function"
                },
                {
                    "anonymous": false,
                    "inputs": [
                        {
                            "indexed": true,
                            "internalType": "address",
                            "name": "previousOwner",
                            "type": "address"
                        },
                        {
                            "indexed": true,
                            "internalType": "address",
                            "name": "newOwner",
                            "type": "address"
                        }
                    ],
                    "name": "OwnershipTransferred",
                    "type": "event"
                },
                {
                    "anonymous": false,
                    "inputs": [
                        {
                            "indexed": false,
                            "internalType": "address",
                            "name": "token",
                            "type": "address"
                        },
                        {
                            "indexed": false,
                            "internalType": "uint256",
                            "name": "amount",
                            "type": "uint256"
                        }
                    ],
                    "name": "Recovered",
                    "type": "event"
                },
                {
                    "anonymous": false,
                    "inputs": [
                        {
                            "indexed": false,
                            "internalType": "uint256",
                            "name": "dareId",
                            "type": "uint256"
                        },
                        {
                            "indexed": false,
                            "internalType": "address",
                            "name": "fr",
                            "type": "address"
                        },
                        {
                            "indexed": false,
                            "internalType": "address",
                            "name": "to",
                            "type": "address"
                        },
                        {
                            "indexed": false,
                            "internalType": "uint256",
                            "name": "amount",
                            "type": "uint256"
                        },
                        {
                            "indexed": false,
                            "internalType": "uint256",
                            "name": "typ",
                            "type": "uint256"
                        },
                        {
                            "indexed": false,
                            "internalType": "uint256",
                            "name": "_time",
                            "type": "uint256"
                        }
                    ],
                    "name": "paidFor",
                    "type": "event"
                },
                {
                    "inputs": [
                        {
                            "internalType": "string",
                            "name": "content",
                            "type": "string"
                        }
                    ],
                    "name": "post",
                    "outputs": [],
                    "stateMutability": "nonpayable",
                    "type": "function"
                },
                {
                    "anonymous": false,
                    "inputs": [
                        {
                            "indexed": false,
                            "internalType": "uint256",
                            "name": "dareId",
                            "type": "uint256"
                        },
                        {
                            "indexed": false,
                            "internalType": "address",
                            "name": "poster",
                            "type": "address"
                        },
                        {
                            "indexed": false,
                            "internalType": "string",
                            "name": "content",
                            "type": "string"
                        },
                        {
                            "indexed": false,
                            "internalType": "uint256",
                            "name": "_time",
                            "type": "uint256"
                        }
                    ],
                    "name": "postDare",
                    "type": "event"
                },
                {
                    "inputs": [
                        {
                            "internalType": "address",
                            "name": "tokenAddress",
                            "type": "address"
                        },
                        {
                            "internalType": "uint256",
                            "name": "tokenAmount",
                            "type": "uint256"
                        }
                    ],
                    "name": "recover",
                    "outputs": [],
                    "stateMutability": "nonpayable",
                    "type": "function"
                },
                {
                    "inputs": [],
                    "name": "releaseFunds",
                    "outputs": [],
                    "stateMutability": "nonpayable",
                    "type": "function"
                },
                {
                    "inputs": [],
                    "name": "renounceOwnership",
                    "outputs": [],
                    "stateMutability": "nonpayable",
                    "type": "function"
                },
                {
                    "inputs": [
                        {
                            "internalType": "uint256",
                            "name": "_count",
                            "type": "uint256"
                        }
                    ],
                    "name": "setCoinRate",
                    "outputs": [],
                    "stateMutability": "nonpayable",
                    "type": "function"
                },
                {
                    "inputs": [
                        {
                            "internalType": "address payable",
                            "name": "_address",
                            "type": "address"
                        }
                    ],
                    "name": "setMasterAddress",
                    "outputs": [],
                    "stateMutability": "nonpayable",
                    "type": "function"
                },
                {
                    "inputs": [
                        {
                            "internalType": "uint256",
                            "name": "_cost",
                            "type": "uint256"
                        }
                    ],
                    "name": "setPostCost",
                    "outputs": [],
                    "stateMutability": "nonpayable",
                    "type": "function"
                },
                {
                    "inputs": [
                        {
                            "internalType": "address",
                            "name": "newOwner",
                            "type": "address"
                        }
                    ],
                    "name": "transferOwnership",
                    "outputs": [],
                    "stateMutability": "nonpayable",
                    "type": "function"
                },
                {
                    "inputs": [
                        {
                            "internalType": "uint256",
                            "name": "dareId",
                            "type": "uint256"
                        },
                        {
                            "internalType": "uint256",
                            "name": "amount",
                            "type": "uint256"
                        }
                    ],
                    "name": "vote",
                    "outputs": [],
                    "stateMutability": "nonpayable",
                    "type": "function"
                },
                {
                    "anonymous": false,
                    "inputs": [
                        {
                            "indexed": false,
                            "internalType": "uint256",
                            "name": "dareId",
                            "type": "uint256"
                        },
                        {
                            "indexed": false,
                            "internalType": "address",
                            "name": "voter",
                            "type": "address"
                        },
                        {
                            "indexed": false,
                            "internalType": "uint256",
                            "name": "amount",
                            "type": "uint256"
                        },
                        {
                            "indexed": false,
                            "internalType": "uint256",
                            "name": "_time",
                            "type": "uint256"
                        }
                    ],
                    "name": "voteDare",
                    "type": "event"
                },
                {
                    "stateMutability": "payable",
                    "type": "receive"
                },
                {
                    "inputs": [
                        {
                            "internalType": "address",
                            "name": "account",
                            "type": "address"
                        }
                    ],
                    "name": "balanceOf",
                    "outputs": [
                        {
                            "internalType": "uint256",
                            "name": "",
                            "type": "uint256"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "inputs": [],
                    "name": "coinRate",
                    "outputs": [
                        {
                            "internalType": "uint256",
                            "name": "",
                            "type": "uint256"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "inputs": [
                        {
                            "internalType": "uint256",
                            "name": "",
                            "type": "uint256"
                        }
                    ],
                    "name": "dareList",
                    "outputs": [
                        {
                            "internalType": "uint256",
                            "name": "id",
                            "type": "uint256"
                        },
                        {
                            "internalType": "address",
                            "name": "poster",
                            "type": "address"
                        },
                        {
                            "internalType": "string",
                            "name": "content",
                            "type": "string"
                        },
                        {
                            "internalType": "uint256",
                            "name": "voteCount",
                            "type": "uint256"
                        },
                        {
                            "internalType": "uint256",
                            "name": "voteAmount",
                            "type": "uint256"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "inputs": [],
                    "name": "depositedAmount",
                    "outputs": [
                        {
                            "internalType": "uint256",
                            "name": "",
                            "type": "uint256"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "inputs": [
                        {
                            "internalType": "address",
                            "name": "",
                            "type": "address"
                        }
                    ],
                    "name": "deposits",
                    "outputs": [
                        {
                            "internalType": "uint256",
                            "name": "",
                            "type": "uint256"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "inputs": [],
                    "name": "getCoinRate",
                    "outputs": [
                        {
                            "internalType": "uint256",
                            "name": "",
                            "type": "uint256"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "inputs": [],
                    "name": "getDepositAmount",
                    "outputs": [
                        {
                            "internalType": "uint256",
                            "name": "",
                            "type": "uint256"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "inputs": [],
                    "name": "getMasterAddress",
                    "outputs": [
                        {
                            "internalType": "address",
                            "name": "",
                            "type": "address"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "inputs": [],
                    "name": "getPostCost",
                    "outputs": [
                        {
                            "internalType": "uint256",
                            "name": "",
                            "type": "uint256"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "inputs": [],
                    "name": "lastID",
                    "outputs": [
                        {
                            "internalType": "uint256",
                            "name": "",
                            "type": "uint256"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "inputs": [],
                    "name": "master",
                    "outputs": [
                        {
                            "internalType": "address payable",
                            "name": "",
                            "type": "address"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "inputs": [],
                    "name": "owner",
                    "outputs": [
                        {
                            "internalType": "address",
                            "name": "",
                            "type": "address"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "inputs": [],
                    "name": "postCost",
                    "outputs": [
                        {
                            "internalType": "uint256",
                            "name": "",
                            "type": "uint256"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "inputs": [],
                    "name": "token",
                    "outputs": [
                        {
                            "internalType": "contract DARECoin",
                            "name": "",
                            "type": "address"
                        }
                    ],
                    "stateMutability": "view",
                    "type": "function"
                }
            ]

            const init = async () => {
                toggleLoader()

                if(window.ethereum == undefined) {
                    $("#metamask_warning").modal()
                    toggleLoader(false)
                    return
                }

                chainID = await window.ethereum.request({ method: 'eth_chainId' })
                accounts = await window.ethereum.request({ method: 'eth_accounts' })

                if (chainID == 56 && accounts.length > 0) {
                    connected = true

                    window.web3 = new Web3(window.ethereum)
                    contract = new window.web3.eth.Contract(tokenABI, contractAddress)

                    contract.methods
                        .getCoinRate()
                        .call()
                        .then(function (rate) {
                            tokenRate = rate / 1e18
                            toggleLoader(false)
                        })

                    $('.btn_connect').text('Connected')
                    $('.btn_connect').addClass('connected')
                } else {
                    connected = false
                    toggleLoader(false)
                }

            }

            const connect = async () => {
                if(window.ethereum == undefined) {
                    $("#metamask_warning").modal()
                    toggleLoader(false)
                    return
                }

                let chainID = await window.ethereum.request({ method: 'eth_chainId' })
                if (chainID != 56) {
                    toastr('Please change network as Binance Smart Chain.')
                    return
                }

                if (window.ethereum && window.ethereum.isMetaMask && window.ethereum.isConnected()) {
                    window.web3 = new Web3(window.ethereum)
                    window.ethereum.enable()
                    return true
                }
                return false
            }

            const toggleLoader = (flag = true) => {
                if(flag)
                    $(".loader").addClass('active')
                else
                    $(".loader").removeClass('active')
            }

            const toastr = (msg, type) => {
                let alert_lsit = document.querySelector('.alert_list')
                let alert = document.createElement('div')

                alert.innerHTML = msg
                alert_lsit.appendChild(alert)

                if(type == true)
                    alert.classList.add('alert_success')

                setTimeout(() => {
                    alert.remove()
                }, 2500)
            }

            if(window.ethereum != undefined) {
                window.ethereum.on('accountsChanged', (accounts) => {
                    init()
                })

                window.ethereum.on('chainChanged', (chainId) => {
                    window.location.reload()
                })
            }


            $('.btn_connect').on('click', connect)

            init()
        </script>
        @yield('script')
	</body>

</html>
