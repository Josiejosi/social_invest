@extends('layouts.frontend')

@section('content')

    <section class="contact_us">
        <div class="container">   
            <div class="sec-title text-center">
                <h3>FAQ's</h3>
            </div>
            <div class="col-md-8 col-md-offset-2">


				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				    <div class="panel panel-default">
				        <div class="panel-heading" role="tab" id="headingOne">
				            <h4 class="panel-title">
				        <a role="button" data-toggle="collapse" data-parent="#joisn" href="#join" aria-expanded="true" aria-controls="join">
				          How to sign up
				        </a>
				      </h4>
				        </div>
				        <div id="join" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="join">
				            <div class="panel-body">
				                Click <a href="{{ url( '/join' ) }}">Join</a> Complete the form and you are ready to go.
				            </div>
				        </div>
				    </div>
				    
				    <div class="panel panel-default">
				        <div class="panel-heading" role="tab" id="headingTwo">
				            <h4 class="panel-title">
				        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#wallet" href="#wallet" aria-expanded="false" aria-controls="wallet">
				          Do I need to create a blockchain.info wallet?
				        </a>
				      </h4>
				        </div>
				        <div id="wallet" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
				            <div class="panel-body">
				                No, if you have a wallet somewhere you trust, you can use your (btc or eth) address from the wallet you currently have.
				            </div>
				        </div>
				    </div>

				    <div class="panel panel-default">
				        <div class="panel-heading" role="tab" id="headingTwo">
				            <h4 class="panel-title">
				        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#address" href="#address" aria-expanded="false" aria-controls="address">
				          Do I need both ( btc and eth ) addresses to join?
				        </a>
				      </h4>
				        </div>
				        <div id="address" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
				            <div class="panel-body">
				                No, you can use either or both anyone's that you have will work.
				            </div>
				        </div>
				    </div>

				    <div class="panel panel-default">
				        <div class="panel-heading" role="tab" id="headingTwo">
				            <h4 class="panel-title">
				        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#cash_contribution" href="#cash_contribution" aria-expanded="false" aria-controls="cash_contribution">
				          Can I make cash contributions?
				        </a>
				      </h4>
				        </div>
				        <div id="cash_contribution" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
				            <div class="panel-body">
				                No, the whole purpose of this application is for member to invest and increase they crytpo profiles.
				            </div>
				        </div>
				    </div>

				    <div class="panel panel-default">
				        <div class="panel-heading" role="tab" id="headingTwo">
				            <h4 class="panel-title">
				        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#referrals" aria-expanded="false" aria-controls="referrals">
				          Does BITROSEED have a referral system?
				        </a>
				      </h4>
				        </div>
				        <div id="referrals" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
				            <div class="panel-body">
				                Yes it does, when you sign in, you will see a link with your unique referral code send on your sign up email this link if a member sign's up with, you get $ 1.5 USD per sign up.
				            </div>
				        </div>
				    </div>
				    <div class="panel panel-default">
				        <div class="panel-heading" role="tab" id="headingThree">
				            <h4 class="panel-title">
				        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#contribution" aria-expanded="false" aria-controls="contribution">
				            What is a "contribution"?
				        </a>
				      </h4>
				        </div>
				        <div id="contribution" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
				            <div class="panel-body">
				                When you want to grow our Btc or Eth, you make a contribute to a member's request, and when you contribution matures, you get on the list for other members to contribute to you.
				            </div>
				        </div>
				    </div>

				    <div class="panel panel-default">
				        <div class="panel-heading" role="tab" id="headingThree">
				            <h4 class="panel-title">
				        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#split" aria-expanded="false" aria-controls="split">
				            What happens when I can't make a full contribution to any amounts on the list?
				        </a>
				      </h4>
				        </div>
				        <div id="split" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
				            <div class="panel-body">
				                You can split the amount, reserve and other members can either do the same or make a full contribution.
				            </div>
				        </div>
				    </div>

				    <div class="panel panel-default">
				        <div class="panel-heading" role="tab" id="headingThree">
				            <h4 class="panel-title">
				        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#blockchain" href="#blockchain" aria-expanded="false" aria-controls="blockchain">
				            Is BITROSEED linked to blockchain.info?
				        </a>
				      </h4>
				        </div>
				        <div id="blockchain" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
				            <div class="panel-body">
				                No, when you create a wallet, you not creating a BITROSEED Crypto wallet, we call the blockchain wallet on your behalf to create a direct wallet to blockchain.info, and you can use the credentials to manage your coins in blockchain.info.
				            </div>
				        </div>
				    </div>

				</div>

			</div>
		</div>
	</section>



@endsection