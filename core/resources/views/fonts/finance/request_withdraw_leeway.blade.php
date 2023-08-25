@extends('fonts.layouts.user')

@section('site')

| Withdraw | Fund

@endsection

@section('main-content')

<div class="page-content-wrapper">

    <div class="page-content">

        @if (count($errors) > 0)

        <div class="row">

            <div class="col-md-06">

                <div class="alert alert-danger alert-dismissible">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                    <h4><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alert!</h4>

                    @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                    @endforeach

                </div>

            </div>

        </div>

        @endif



        @if (Session::has('success'))

        <div class="alert alert-success">{{ Session::get('success') }}</div>

        @endif

        <div class="row">

            <div class="col-md-12">

             <div class="portlet box dark">

                <div class="portlet-title">

                    <div class="caption uppercase bold"><i class="fas fa-undo"></i> Withdraw Fund</div>

                </div>

                <div class="portlet-body">

                    <input type="hidden" id="ethAccountID" value="">

                    <div class="row">

                        @foreach($gates as $gate)

                        <div class="col-md-3 col-sm-6 col-xs-12">

                            <div class="panel panel-primary">

                                <div class="panel-heading">

                                    <div class="panel-title" style="color: #0e265d;">Withdraw By LEEWAY Token<!-- {{$gate->name}} --></div>

                                </div>

                                <div class="panel-body text-center">

                                    <img src="{{asset('assets/images/withdraw')}}/{{$gate->image}}" style="width:100%">

                                </div>

                                <div class="panel-footer">
                                 <?php if ($isUserWhiteListedFlag == 'no'): ?>
                                  <button class="btn btn-primary btn-block" data-toggle="modal" id ="whitelist">White List<!-- {{$gate->name}} --> </button>

                              <?php else: ?>
                               <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#buyModal{{$gate->id}}">Via LEEWAY Token  <!-- {{$gate->name}} --> </button>
                           <?php endif;?>



                       </div>

                   </div>

               </div>

               <!--Buy Modal -->

               <div id="buyModal{{$gate->id}}" class="modal fade" role="dialog">



                <div class="modal-content">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                        <h4 class="modal-title">Withdraw via <strong>LEEWAY Token<!-- {{$gate->name}} --></strong></h4>

                    </div>

                    <form method="POST" action="{{route('withdraw.preview.user')}}">

                        <div class="modal-body">

                            {{csrf_field()}}

                            <div class="text-center">

                               <!--  <p style="color: red">Charge for withdraw Amount: {{$gate->chargefx}} {{$general->currency}}</p> -->

                               <p style="color: red">Charge for withdraw Amount: {{$gate->chargefx}} LEEWAY</p>

                                <p>Percentage Charge: {{$gate->chargepc}} %</p>

                                <p style="color: red">Processing Days (At last) : {{$gate->processing_day}} Days</p>

                            </div>

                            <input type="hidden" name="gateway" value="{{$gate->id}}">

                            <div class="form-group">

                                <div class="input-group">

                                   <!--  <input type="text" name="amount" class="form-control" id="amount" placeholder="AMOUNT YOU WANT TO WITHDRAW | Minimum {{$gate->min_amo}} {{$general->currency}}" required> -->

                                   <input type="text" name="amount" class="form-control" id="amount" placeholder="AMOUNT YOU WANT TO WITHDRAW | Minimum LEEWAY" required>

                                    <span class="input-group-addon"> LEEWAY </span>

                                </div>

                            </div>

                        </div>

                        <div class="modal-footer">

                            <button type="submit" id="WithdrawLEEWAY" class="btn btn-primary">Withdraw</button>

                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>

                        </div>

                    </form>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</div>

</div>

</div>

</div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/web3/1.5.2/web3.min.js" type="text/javascript"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
<script>

    async function getAccount() {
    const accounts = await ethereum.request({
        method: 'eth_requestAccounts'
    });
    const account = accounts[0];
    $('#ethAccountID').val(account);
}
$(document).ready(function () {

    getAccount();

    $(document).on("click", "#WithdrawLEEWAY", function (event) {

        event.preventDefault();
        var token = "{{csrf_token()}}";
        var uname = '<?=Auth::user()->username;?>';
        var amount1 = $('#amount').val();
        if (amount1 == "") {
            toastr.error('Please enter amount.');
        }
        $.ajax({
            type: "POST",
            url: "/check_lewt_balance",
            data: {
                'user_name': uname,
                'amount': amount1,
                '_token': token
            },
            success: function (data) {
                var jsonRes = JSON.parse(data);
                if (jsonRes == 0) {
                    toastr.error('Oops!. your LEWT balance is low please check LEWT balance and input correct value.');
                }
                else{
                  
                  
        if (typeof window.ethereum !== 'undefined') {

            var minABI = [{
                "constant": false,
                "inputs": [],
                "name": "disregardProposeOwner",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [],
                "name": "listSponsors",
                "outputs": [{
                    "name": "",
                    "type": "address[]"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [],
                "name": "name",
                "outputs": [{
                    "name": "",
                    "type": "string"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_spender",
                    "type": "address"
                }, {
                    "name": "_value",
                    "type": "uint256"
                }],
                "name": "approve",
                "outputs": [{
                    "name": "",
                    "type": "bool"
                }],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [],
                "name": "assetProtectionRole",
                "outputs": [{
                    "name": "",
                    "type": "address"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [],
                "name": "totalSupply",
                "outputs": [{
                    "name": "",
                    "type": "uint256"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "r",
                    "type": "bytes32[]"
                }, {
                    "name": "s",
                    "type": "bytes32[]"
                }, {
                    "name": "v",
                    "type": "uint8[]"
                }, {
                    "name": "to",
                    "type": "address[]"
                }, {
                    "name": "value",
                    "type": "uint256[]"
                }, {
                    "name": "fee",
                    "type": "uint256[]"
                }, {
                    "name": "seq",
                    "type": "uint256[]"
                }, {
                    "name": "deadline",
                    "type": "uint256[]"
                }],
                "name": "betaDelegatedTransferBatch",
                "outputs": [{
                    "name": "",
                    "type": "bool"
                }],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "busdHash",
                    "type": "string"
                }],
                "name": "changeHash",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_from",
                    "type": "address"
                }, {
                    "name": "_to",
                    "type": "address"
                }, {
                    "name": "_value",
                    "type": "uint256"
                }],
                "name": "transferFromContract",
                "outputs": [{
                    "name": "",
                    "type": "bool"
                }],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "sig",
                    "type": "bytes"
                }, {
                    "name": "to",
                    "type": "address"
                }, {
                    "name": "value",
                    "type": "uint256"
                }, {
                    "name": "fee",
                    "type": "uint256"
                }, {
                    "name": "seq",
                    "type": "uint256"
                }, {
                    "name": "deadline",
                    "type": "uint256"
                }],
                "name": "betaDelegatedTransfer",
                "outputs": [{
                    "name": "",
                    "type": "bool"
                }],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_from",
                    "type": "address"
                }, {
                    "name": "_to",
                    "type": "address"
                }, {
                    "name": "_value",
                    "type": "uint256"
                }],
                "name": "transferFrom",
                "outputs": [{
                    "name": "",
                    "type": "bool"
                }],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "amount",
                    "type": "uint256"
                }],
                "name": "withdraw",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [],
                "name": "initializeDomainSeparator",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [],
                "name": "decimals",
                "outputs": [{
                    "name": "",
                    "type": "uint8"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [],
                "name": "unpause",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_addr",
                    "type": "address"
                }],
                "name": "unfreeze",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [],
                "name": "claimOwnership",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "account",
                    "type": "address"
                }, {
                    "name": "busdHash",
                    "type": "string"
                }],
                "name": "addSponsorWhitelist",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_newSupplyController",
                    "type": "address"
                }],
                "name": "setSupplyController",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [],
                "name": "paused",
                "outputs": [{
                    "name": "",
                    "type": "bool"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [{
                    "name": "_addr",
                    "type": "address"
                }],
                "name": "balanceOf",
                "outputs": [{
                    "name": "",
                    "type": "uint256"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [],
                "name": "sponsorBusdBalance",
                "outputs": [{
                    "name": "",
                    "type": "uint256"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [],
                "name": "initialize",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [],
                "name": "pause",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [],
                "name": "getOwner",
                "outputs": [{
                    "name": "",
                    "type": "address"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [{
                    "name": "target",
                    "type": "address"
                }],
                "name": "nextSeqOf",
                "outputs": [{
                    "name": "",
                    "type": "uint256"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_newAssetProtectionRole",
                    "type": "address"
                }],
                "name": "setAssetProtectionRole",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_addr",
                    "type": "address"
                }],
                "name": "freeze",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [],
                "name": "owner",
                "outputs": [{
                    "name": "",
                    "type": "address"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "index",
                    "type": "uint256"
                }],
                "name": "removeBusdSponsors",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [],
                "name": "symbol",
                "outputs": [{
                    "name": "",
                    "type": "string"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "busdToken",
                    "type": "address"
                }, {
                    "name": "leewayToken",
                    "type": "address"
                }],
                "name": "addTokens",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_newWhitelister",
                    "type": "address"
                }],
                "name": "setBetaDelegateWhitelister",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_value",
                    "type": "uint256"
                }],
                "name": "decreaseSupply",
                "outputs": [{
                    "name": "success",
                    "type": "bool"
                }],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [{
                    "name": "_addr",
                    "type": "address"
                }],
                "name": "isWhitelistedBetaDelegate",
                "outputs": [{
                    "name": "",
                    "type": "bool"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_to",
                    "type": "address"
                }, {
                    "name": "_value",
                    "type": "uint256"
                }],
                "name": "transfer",
                "outputs": [{
                    "name": "",
                    "type": "bool"
                }],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "account",
                    "type": "address"
                }, {
                    "name": "amount",
                    "type": "uint256"
                }, {
                    "name": "busdHash",
                    "type": "string"
                }],
                "name": "triggerLeewayWithdraw",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_addr",
                    "type": "address"
                }],
                "name": "whitelistBetaDelegate",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_proposedOwner",
                    "type": "address"
                }],
                "name": "proposeOwner",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_value",
                    "type": "uint256"
                }],
                "name": "increaseSupply",
                "outputs": [{
                    "name": "success",
                    "type": "bool"
                }],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [],
                "name": "betaDelegateWhitelister",
                "outputs": [{
                    "name": "",
                    "type": "address"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [],
                "name": "proposedOwner",
                "outputs": [{
                    "name": "",
                    "type": "address"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_addr",
                    "type": "address"
                }],
                "name": "unwhitelistBetaDelegate",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "account",
                    "type": "address"
                }],
                "name": "addSponsor",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [{
                    "name": "_owner",
                    "type": "address"
                }, {
                    "name": "_spender",
                    "type": "address"
                }],
                "name": "allowance",
                "outputs": [{
                    "name": "",
                    "type": "uint256"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_addr",
                    "type": "address"
                }],
                "name": "wipeFrozenAddress",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [],
                "name": "EIP712_DOMAIN_HASH",
                "outputs": [{
                    "name": "",
                    "type": "bytes32"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [{
                    "name": "_addr",
                    "type": "address"
                }],
                "name": "isFrozen",
                "outputs": [{
                    "name": "",
                    "type": "bool"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [],
                "name": "supplyController",
                "outputs": [{
                    "name": "",
                    "type": "address"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [],
                "name": "reclaimBUSD",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "account",
                    "type": "address"
                }, {
                    "name": "amount",
                    "type": "uint256"
                }, {
                    "name": "busdHash",
                    "type": "string"
                }],
                "name": "triggerBusdWithdraw",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "account",
                    "type": "address"
                }],
                "name": "removeSponsorWhitelist",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "inputs": [{
                    "name": "busdHash",
                    "type": "string"
                }],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "constructor"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "from",
                    "type": "address"
                }, {
                    "indexed": true,
                    "name": "to",
                    "type": "address"
                }, {
                    "indexed": false,
                    "name": "value",
                    "type": "uint256"
                }],
                "name": "Transfer",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "owner",
                    "type": "address"
                }, {
                    "indexed": true,
                    "name": "spender",
                    "type": "address"
                }, {
                    "indexed": false,
                    "name": "value",
                    "type": "uint256"
                }],
                "name": "Approval",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "currentOwner",
                    "type": "address"
                }, {
                    "indexed": true,
                    "name": "proposedOwner",
                    "type": "address"
                }],
                "name": "OwnershipTransferProposed",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "oldProposedOwner",
                    "type": "address"
                }],
                "name": "OwnershipTransferDisregarded",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "oldOwner",
                    "type": "address"
                }, {
                    "indexed": true,
                    "name": "newOwner",
                    "type": "address"
                }],
                "name": "OwnershipTransferred",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [],
                "name": "Pause",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [],
                "name": "Unpause",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "addr",
                    "type": "address"
                }],
                "name": "AddressFrozen",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "addr",
                    "type": "address"
                }],
                "name": "AddressUnfrozen",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "addr",
                    "type": "address"
                }],
                "name": "FrozenAddressWiped",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "oldAssetProtectionRole",
                    "type": "address"
                }, {
                    "indexed": true,
                    "name": "newAssetProtectionRole",
                    "type": "address"
                }],
                "name": "AssetProtectionRoleSet",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "to",
                    "type": "address"
                }, {
                    "indexed": false,
                    "name": "value",
                    "type": "uint256"
                }],
                "name": "SupplyIncreased",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "from",
                    "type": "address"
                }, {
                    "indexed": false,
                    "name": "value",
                    "type": "uint256"
                }],
                "name": "SupplyDecreased",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "oldSupplyController",
                    "type": "address"
                }, {
                    "indexed": true,
                    "name": "newSupplyController",
                    "type": "address"
                }],
                "name": "SupplyControllerSet",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "from",
                    "type": "address"
                }, {
                    "indexed": true,
                    "name": "to",
                    "type": "address"
                }, {
                    "indexed": false,
                    "name": "value",
                    "type": "uint256"
                }, {
                    "indexed": false,
                    "name": "seq",
                    "type": "uint256"
                }, {
                    "indexed": false,
                    "name": "fee",
                    "type": "uint256"
                }],
                "name": "BetaDelegatedTransfer",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "oldWhitelister",
                    "type": "address"
                }, {
                    "indexed": true,
                    "name": "newWhitelister",
                    "type": "address"
                }],
                "name": "BetaDelegateWhitelisterSet",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "newDelegate",
                    "type": "address"
                }],
                "name": "BetaDelegateWhitelisted",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "oldDelegate",
                    "type": "address"
                }],
                "name": "BetaDelegateUnwhitelisted",
                "type": "event"
            }];

            var resSuccess = "";
            var contractAddress = '0x22aF4588E0D6fEA69bBFa573F0C755D6812B6fc4';

            const web3 = new Web3(window.ethereum);

            window.ethereum.request({
                method: 'eth_requestAccounts'
            });

            const contractInstance = new web3.eth.Contract(minABI, contractAddress);

            var loggedInUser = '<?=Auth::user()->username;?>';
            var busdHash = '94b39c9d79f35295e9c235fd0fa8d209';

            if (amount1 == "") {
                toastr.error('Please enter amount.');
            }

            var amount = web3.utils.toWei(amount1.toString());

            contractInstance.methods.triggerLeewayWithdraw(loggedInUser, amount, busdHash).send({
                from: $('#ethAccountID').val()
            }).then(res => {
                toastr.success('Withdraw Successfull.');
                location.reload();
            }).catch(function (error) {

                toastr.error(error.message);
                console.log("meta mask transaction declined.");

            });


        }
                  
                }
            }
        });
       
    });


    /*test code */

    $(document).on("click", "#whitelist", function (event) {

        event.preventDefault();

        if (typeof window.ethereum !== 'undefined') {

            var minABI = [{
                "constant": false,
                "inputs": [],
                "name": "disregardProposeOwner",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [],
                "name": "listSponsors",
                "outputs": [{
                    "name": "",
                    "type": "address[]"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [],
                "name": "name",
                "outputs": [{
                    "name": "",
                    "type": "string"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_spender",
                    "type": "address"
                }, {
                    "name": "_value",
                    "type": "uint256"
                }],
                "name": "approve",
                "outputs": [{
                    "name": "",
                    "type": "bool"
                }],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [],
                "name": "assetProtectionRole",
                "outputs": [{
                    "name": "",
                    "type": "address"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [],
                "name": "totalSupply",
                "outputs": [{
                    "name": "",
                    "type": "uint256"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "r",
                    "type": "bytes32[]"
                }, {
                    "name": "s",
                    "type": "bytes32[]"
                }, {
                    "name": "v",
                    "type": "uint8[]"
                }, {
                    "name": "to",
                    "type": "address[]"
                }, {
                    "name": "value",
                    "type": "uint256[]"
                }, {
                    "name": "fee",
                    "type": "uint256[]"
                }, {
                    "name": "seq",
                    "type": "uint256[]"
                }, {
                    "name": "deadline",
                    "type": "uint256[]"
                }],
                "name": "betaDelegatedTransferBatch",
                "outputs": [{
                    "name": "",
                    "type": "bool"
                }],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "busdHash",
                    "type": "string"
                }],
                "name": "changeHash",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_from",
                    "type": "address"
                }, {
                    "name": "_to",
                    "type": "address"
                }, {
                    "name": "_value",
                    "type": "uint256"
                }],
                "name": "transferFromContract",
                "outputs": [{
                    "name": "",
                    "type": "bool"
                }],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "sig",
                    "type": "bytes"
                }, {
                    "name": "to",
                    "type": "address"
                }, {
                    "name": "value",
                    "type": "uint256"
                }, {
                    "name": "fee",
                    "type": "uint256"
                }, {
                    "name": "seq",
                    "type": "uint256"
                }, {
                    "name": "deadline",
                    "type": "uint256"
                }],
                "name": "betaDelegatedTransfer",
                "outputs": [{
                    "name": "",
                    "type": "bool"
                }],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_from",
                    "type": "address"
                }, {
                    "name": "_to",
                    "type": "address"
                }, {
                    "name": "_value",
                    "type": "uint256"
                }],
                "name": "transferFrom",
                "outputs": [{
                    "name": "",
                    "type": "bool"
                }],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "amount",
                    "type": "uint256"
                }],
                "name": "withdraw",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [],
                "name": "initializeDomainSeparator",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [],
                "name": "decimals",
                "outputs": [{
                    "name": "",
                    "type": "uint8"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [],
                "name": "unpause",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_addr",
                    "type": "address"
                }],
                "name": "unfreeze",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [],
                "name": "claimOwnership",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "account",
                    "type": "address"
                }, {
                    "name": "busdHash",
                    "type": "string"
                }],
                "name": "addSponsorWhitelist",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_newSupplyController",
                    "type": "address"
                }],
                "name": "setSupplyController",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [],
                "name": "paused",
                "outputs": [{
                    "name": "",
                    "type": "bool"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [{
                    "name": "_addr",
                    "type": "address"
                }],
                "name": "balanceOf",
                "outputs": [{
                    "name": "",
                    "type": "uint256"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [],
                "name": "sponsorBusdBalance",
                "outputs": [{
                    "name": "",
                    "type": "uint256"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [],
                "name": "initialize",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [],
                "name": "pause",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [],
                "name": "getOwner",
                "outputs": [{
                    "name": "",
                    "type": "address"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [{
                    "name": "target",
                    "type": "address"
                }],
                "name": "nextSeqOf",
                "outputs": [{
                    "name": "",
                    "type": "uint256"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_newAssetProtectionRole",
                    "type": "address"
                }],
                "name": "setAssetProtectionRole",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_addr",
                    "type": "address"
                }],
                "name": "freeze",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [],
                "name": "owner",
                "outputs": [{
                    "name": "",
                    "type": "address"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "index",
                    "type": "uint256"
                }],
                "name": "removeBusdSponsors",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [],
                "name": "symbol",
                "outputs": [{
                    "name": "",
                    "type": "string"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "busdToken",
                    "type": "address"
                }, {
                    "name": "leewayToken",
                    "type": "address"
                }],
                "name": "addTokens",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_newWhitelister",
                    "type": "address"
                }],
                "name": "setBetaDelegateWhitelister",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_value",
                    "type": "uint256"
                }],
                "name": "decreaseSupply",
                "outputs": [{
                    "name": "success",
                    "type": "bool"
                }],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [{
                    "name": "_addr",
                    "type": "address"
                }],
                "name": "isWhitelistedBetaDelegate",
                "outputs": [{
                    "name": "",
                    "type": "bool"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_to",
                    "type": "address"
                }, {
                    "name": "_value",
                    "type": "uint256"
                }],
                "name": "transfer",
                "outputs": [{
                    "name": "",
                    "type": "bool"
                }],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "account",
                    "type": "address"
                }, {
                    "name": "amount",
                    "type": "uint256"
                }, {
                    "name": "busdHash",
                    "type": "string"
                }],
                "name": "triggerLeewayWithdraw",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_addr",
                    "type": "address"
                }],
                "name": "whitelistBetaDelegate",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_proposedOwner",
                    "type": "address"
                }],
                "name": "proposeOwner",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_value",
                    "type": "uint256"
                }],
                "name": "increaseSupply",
                "outputs": [{
                    "name": "success",
                    "type": "bool"
                }],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [],
                "name": "betaDelegateWhitelister",
                "outputs": [{
                    "name": "",
                    "type": "address"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [],
                "name": "proposedOwner",
                "outputs": [{
                    "name": "",
                    "type": "address"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_addr",
                    "type": "address"
                }],
                "name": "unwhitelistBetaDelegate",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "account",
                    "type": "address"
                }],
                "name": "addSponsor",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [{
                    "name": "_owner",
                    "type": "address"
                }, {
                    "name": "_spender",
                    "type": "address"
                }],
                "name": "allowance",
                "outputs": [{
                    "name": "",
                    "type": "uint256"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "_addr",
                    "type": "address"
                }],
                "name": "wipeFrozenAddress",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [],
                "name": "EIP712_DOMAIN_HASH",
                "outputs": [{
                    "name": "",
                    "type": "bytes32"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [{
                    "name": "_addr",
                    "type": "address"
                }],
                "name": "isFrozen",
                "outputs": [{
                    "name": "",
                    "type": "bool"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": true,
                "inputs": [],
                "name": "supplyController",
                "outputs": [{
                    "name": "",
                    "type": "address"
                }],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [],
                "name": "reclaimBUSD",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "account",
                    "type": "address"
                }, {
                    "name": "amount",
                    "type": "uint256"
                }, {
                    "name": "busdHash",
                    "type": "string"
                }],
                "name": "triggerBusdWithdraw",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "constant": false,
                "inputs": [{
                    "name": "account",
                    "type": "address"
                }],
                "name": "removeSponsorWhitelist",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            }, {
                "inputs": [{
                    "name": "busdHash",
                    "type": "string"
                }],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "constructor"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "from",
                    "type": "address"
                }, {
                    "indexed": true,
                    "name": "to",
                    "type": "address"
                }, {
                    "indexed": false,
                    "name": "value",
                    "type": "uint256"
                }],
                "name": "Transfer",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "owner",
                    "type": "address"
                }, {
                    "indexed": true,
                    "name": "spender",
                    "type": "address"
                }, {
                    "indexed": false,
                    "name": "value",
                    "type": "uint256"
                }],
                "name": "Approval",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "currentOwner",
                    "type": "address"
                }, {
                    "indexed": true,
                    "name": "proposedOwner",
                    "type": "address"
                }],
                "name": "OwnershipTransferProposed",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "oldProposedOwner",
                    "type": "address"
                }],
                "name": "OwnershipTransferDisregarded",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "oldOwner",
                    "type": "address"
                }, {
                    "indexed": true,
                    "name": "newOwner",
                    "type": "address"
                }],
                "name": "OwnershipTransferred",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [],
                "name": "Pause",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [],
                "name": "Unpause",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "addr",
                    "type": "address"
                }],
                "name": "AddressFrozen",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "addr",
                    "type": "address"
                }],
                "name": "AddressUnfrozen",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "addr",
                    "type": "address"
                }],
                "name": "FrozenAddressWiped",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "oldAssetProtectionRole",
                    "type": "address"
                }, {
                    "indexed": true,
                    "name": "newAssetProtectionRole",
                    "type": "address"
                }],
                "name": "AssetProtectionRoleSet",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "to",
                    "type": "address"
                }, {
                    "indexed": false,
                    "name": "value",
                    "type": "uint256"
                }],
                "name": "SupplyIncreased",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "from",
                    "type": "address"
                }, {
                    "indexed": false,
                    "name": "value",
                    "type": "uint256"
                }],
                "name": "SupplyDecreased",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "oldSupplyController",
                    "type": "address"
                }, {
                    "indexed": true,
                    "name": "newSupplyController",
                    "type": "address"
                }],
                "name": "SupplyControllerSet",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "from",
                    "type": "address"
                }, {
                    "indexed": true,
                    "name": "to",
                    "type": "address"
                }, {
                    "indexed": false,
                    "name": "value",
                    "type": "uint256"
                }, {
                    "indexed": false,
                    "name": "seq",
                    "type": "uint256"
                }, {
                    "indexed": false,
                    "name": "fee",
                    "type": "uint256"
                }],
                "name": "BetaDelegatedTransfer",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "oldWhitelister",
                    "type": "address"
                }, {
                    "indexed": true,
                    "name": "newWhitelister",
                    "type": "address"
                }],
                "name": "BetaDelegateWhitelisterSet",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "newDelegate",
                    "type": "address"
                }],
                "name": "BetaDelegateWhitelisted",
                "type": "event"
            }, {
                "anonymous": false,
                "inputs": [{
                    "indexed": true,
                    "name": "oldDelegate",
                    "type": "address"
                }],
                "name": "BetaDelegateUnwhitelisted",
                "type": "event"
            }];

            var resSuccess = "";
            var contractAddress = '0x22aF4588E0D6fEA69bBFa573F0C755D6812B6fc4';

            const web3 = new Web3(window.ethereum);

            window.ethereum.request({
                method: 'eth_requestAccounts'
            });

            const contractInstance = new web3.eth.Contract(minABI, contractAddress);

            var loggedInUser = '<?=Auth::user()->username;?>';
            var busdHash = '94b39c9d79f35295e9c235fd0fa8d209';

            contractInstance.methods.addSponsorWhitelist(loggedInUser, busdHash).send({
                from: $('#ethAccountID').val()
            }).then(res => {
                add_sponser_db(loggedInUser);
            }).catch(function (error) {

                toastr.error(error.message);
                console.log("meta mask transaction declined.");

            });


        }
    }); /*test code end*/


});

function add_sponser_db(user_name) {

    var token = "{{csrf_token()}}";

    $.ajax({
        type: "POST",
        url: "/add_sponser_db",
        data: {
            'user_name': user_name,
            '_token': token
        },
        success: function (data) {
            var jsonRes = JSON.parse(data);
            if (jsonRes == 'user_white_listed') {
                toastr.success('User is successfully whitelisted.');
                location.reload();
            }
        }
    });

}
   
</script>

@endsection
