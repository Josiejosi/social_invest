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
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#referrals" aria-expanded="false" aria-controls="referrals">
          Does the application support referrals?
        </a>
      </h4>
    </div>
    <div id="referrals" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        Yes it does, when you sign in, you will see a link with your unique referral code send on your sign up email
        this link if a member sign's up with, you get $ 1.5 USD per sign up.
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
        	When you want to grow our Btc or Eth, you contribute to a member's request, and when you contribution matures, you get on the list.
      </div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#split" aria-expanded="false" aria-controls="split">
          	What happens when i cant make a full contribution to any amounts on the list?
        </a>
      </h4>
    </div>
    <div id="split" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        	You can split the amount, reserve and other members can either do the same or make a full contribution.
      </div>
    </div>
  </div>

</div>

			</div>
		</div>
	</section>



@endsection