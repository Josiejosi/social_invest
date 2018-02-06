@extends('layouts.backend')

@section('content')



	<div class="row">
	    <div class="col-sm-5">
	        <div class="user-profile compact">
	            <div class="up-head-w" style="background-image:url(img/profile_bg1.jpg)">

	                <div class="up-main-info">
	                    <h2 class="up-header">{{ $name }}</h2>
	                    <h6 class="up-sub-header">LEVEL {{ $level }}</h6></div>
	                <svg class="decor" width="842px" height="219px" viewBox="0 0 842 219" preserveAspectRatio="xMaxYMax meet" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
	                    <g transform="translate(-381.000000, -362.000000)" fill="#FFFFFF">
	                        <path class="decor-path" d="M1223,362 L1223,581 L381,581 C868.912802,575.666667 1149.57947,502.666667 1223,362 Z"></path>
	                    </g>
	                </svg>
	            </div>

	            <div class="up-contents">
	                <div class="m-b">
	                    <div class="row m-b">
	                        <div class="col-sm-6 b-r b-b">
	                            <div class="el-tablo centered padded-v">
	                                <div class="value">0</div>
	                                <div class="label">Referral Points</div>
	                            </div>
	                        </div>
	                        <div class="col-sm-6 b-b">
	                            <div class="el-tablo centered padded-v">
	                                <div class="value">0</div>
	                                <div class="label">Donations</div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>

	    </div>
	    <div class="col-sm-7">
	        <div class="element-wrapper">
	            <div class="element-box">
	                <form id="formValidate" novalidate="true">
	                    <div class="element-info">
	                        <div class="element-info-with-icon">
	                            <div class="element-info-icon">
	                                <div class="os-icon os-icon-wallet-loaded"></div>
	                            </div>
	                            <div class="element-info-text">
	                                <h5 class="element-inner-header">Profile Settings</h5>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label for=""> Email address</label>
	                        <input class="form-control" data-error="Your email address is invalid" placeholder="Enter email" required="required" type="email">
	                        <div class="help-block form-text with-errors form-control-feedback"></div>
	                    </div>
	                    <div class="row">
	                        <div class="col-sm-6">
	                            <div class="form-group">
	                                <label for=""> Password</label>
	                                <input class="form-control" data-minlength="6" placeholder="Password" required="required" type="password">
	                                <div class="help-block form-text text-muted form-control-feedback">Minimum of 6 characters</div>
	                            </div>
	                        </div>
	                        <div class="col-sm-6">
	                            <div class="form-group">
	                                <label for="">Confirm Password</label>
	                                <input class="form-control" data-match-error="Passwords don't match" placeholder="Confirm Password" required="required" type="password">
	                                <div class="help-block form-text with-errors form-control-feedback"></div>
	                            </div>
	                        </div>
	                    </div>

	                    <fieldset class="form-group">
	                        <legend><span>Name Section</span></legend>
	                        <div class="row">
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <label for=""> First Name</label>
	                                    <input class="form-control" data-error="Please input your First Name" placeholder="First Name" required="required" type="text">
	                                    <div class="help-block form-text with-errors form-control-feedback"></div>
	                                </div>
	                            </div>
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <label for="">Last Name</label>
	                                    <input class="form-control" data-error="Please input your Last Name" placeholder="Last Name" required="required" type="text">
	                                    <div class="help-block form-text with-errors form-control-feedback"></div>
	                                </div>
	                            </div>
	                        </div>
	                    </fieldset>

	                    <fieldset class="form-group">
	                        <legend><span>Banking Details Section</span></legend>
	                        <div class="row">
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <label for=""> Bank</label>
	                                    <input class="form-control"  placeholder="Bank"  type="text">
	                                    <div class="help-block form-text with-errors form-control-feedback"></div>
	                                </div>
	                            </div>
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <label for="">Account Number</label>
	                                    <input class="form-control" placeholder="Account Number" type="text">
	                                    <div class="help-block form-text with-errors form-control-feedback"></div>
	                                </div>
	                            </div>
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <label for="">Branch Code</label>
	                                    <input class="form-control" placeholder="Branch Code" type="text">
	                                    <div class="help-block form-text with-errors form-control-feedback"></div>
	                                </div>
	                            </div>
	                        </div>
	                    </fieldset>

	                    <fieldset class="form-group">
	                        <legend><span>Bitcoin Address</span></legend>
	                        <div class="row">
	                            <div class="col-sm-12">
				                    <div class="form-group">
				                        <input class="form-control" placeholder="Bitcoin Address"  type="text">
				                    </div>
				                </div>
	                        </div>
	                    </fieldset>

	                    <fieldset class="form-group">
	                        <legend><span>Ethereum Address</span></legend>
	                        <div class="row">
	                            <div class="col-sm-12">
				                    <div class="form-group">
				                        <input class="form-control" placeholder="Bitcoin Address"  type="text">
				                    </div>
				                </div>
	                        </div>
	                    </fieldset>

	                    <div class="form-buttons-w">
	                        <button class="btn btn-primary disabled" type="submit"> Submit</button>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>



@endsection