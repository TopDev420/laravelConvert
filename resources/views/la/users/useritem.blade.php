@extends("la.layouts.app")

@section("contentheader_title", "Users")
@section("contentheader_description", "users listing")
@section("section", "Users")
@section("sub_section", "Listing")
@section("htmlheader_title", "Users Listing")

@section("headerElems")

@endsection
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
body {
    overflow-y : hidden !important;
}
.content {
    padding : 15px;
 }
 .heading {
    font-size: 20px;
    padding-top: 10px;
    padding-bottom: 10px;
 }
 .user-select {
    width: 230px;
 }
 .summary-heading {
    font-size : 19px;
    font-size: 19px;
    padding-top: 10px;
    padding-bottom: 20px;
    font-weight: 500;
 }
 .summary-container {
     display:flex;
 }
 .side-section {
     width : 25%;
     min-width : 300px;
 }
 .center-section {
     width : 25%;
     margin-left : 10px;
     min-width : 300px;
 }
 .last-section {
    width: 25%;
    margin-left: 10px;
    min-width: 310px;
    padding-right: 10px;
 }
 .client-info-section , .billing-section , .restriction-section ,.recent-action-section ,.send-mail-section, .admin-notes-section{
     background-color : #ecf0f5;
     padding : 10px 10px;
     border-radius : 3px;
     height : fit-content;
     margin-bottom : 10px;
 }
 .client-info-heading , .billing-heading , .restriction-heading ,.recent-action-heading , .send-mail-heading ,.admin-notes-heading{
    color: #337ab7;
    text-align: center;
    width: 100%;
    font-size: 19px;
    margin-bottom: 10px;
 }
 .client-info-container , .billing-container ,.restriction-container ,.recent-action-container  , .admin-notes-container{
    display: flex;
    background-color: white;
    padding: 6px 12px;
    line-height: 1.742;
    border-radius: 5px;
 }
 .client-info-function , .billing-function , .restriction-function , .action-function{
     padding-top : 10px;
     padding-left : 20px;
 }
 .function-row {
    font-size: 17px;
    color: #6a73ad;
    cursor: pointer;
 }
 .function-row:hover {
     color: #2f3ea0;
 }
 .function-image {
    margin-right: 5px;
    margin-top: -3px;
    width : 20px;
    height : 20px;
 }
 .send-mail-container {
    width: 250px;
    margin-left: auto;
    margin-right: auto;
    display: flex;
 }
 .key-container {
     width : 40%;
 }
 .value-container {
     width : 60%;
 }
 .date-container {
     width : 50%;
 }
 .action-container {
     width : 50%;
 }
 .tab-pane {
    padding: 6px 12px;
    border: 1px solid #ccc;
 }
 .key-item-1 , .value-item-1 {
     background-color : #ecf0f54d;
 }
 .txt-green {
    color: green;
    font-weight: 600;
 }
 .txt-yellow {
    color: yellow;
 }
 .txt-red {
    color: red;
 }
 .tooltip-box {
    position: absolute;
    margin-top : -52px;
    margin-left: 30px;
    width: 250px;
    z-index: 1;
 }
 .tooltip-arrow-box {    
     background: #f9f9f9;
    border: 1px solid #ddd;
    text-align: left;
    padding: 13px;
    position: relative;
    z-index: 1;
    font-size: 13px;
    line-height: 19px;
 }
 .tooltip-ico {
    position: relative;
    display: inline-block;
    padding-left: 6px;
    color: #2176b7;
    cursor: pointer;
 }
 .mail-select {
    width: 200px;
 }
 .mail-send-button {
    background: white;
    padding: 7px 20px;
    margin-top: -2px;
    margin-left: 10px;
    border: 1px solid #ccc;
    border-radius: 10px;
    cursor : pointer;
    transition: 0.3s all;
}
.switch-user-button {
    background: white;
    padding: 7px 20px;
    margin-top: -2px;
    margin-left: 10px;
    border: 1px solid #ccc;
    border-radius: 10px;
    cursor : pointer;
    transition: 0.3s all;
}
 .mail-send-button:hover {
     background-color : #ccc;
     border: 1px solid #fff;
 }
 .switch-user-button:hover {
     background-color : #ccc;
     border: 1px solid #fff;
 }
.admin-notes-textarea {
    width : 100%;
    height : 200px;
}
.admin-notes-send-button {
    width: 100px;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
    background-color: white;
    padding: 7px 12px;
    border-radius: 10px;
    margin-top: 10px;
    border: 1px solid #ccc;
    cursor: pointer;
    transition: 0.3s all;
}
.admin-notes-send-button:hover {
    background-color : #ccc;
     border: 1px solid #fff;
}
#menu_summary {
    overflow-x : scroll;
    overflow-y : scroll;
    height : 60%;
}
</style>
@section("main-content")
<div class="box box-success">
    <div class="content">
        <!--<div class="box-header"></div>-->
        <div class="heading">Client Profile </div>
        <div style="display:flex;padding-bottom:10px;">
            <div class="user-select">
                <select class="user-lists" id="userSelect">
                    @foreach($allusers as $user)
                    @if($userinfo->id == $user->id)
                    <option id="user{{$user->id}}" selected>{{$user->name}} ({{$user->cname}})</option>
                    @else
                    <option id="user{{$user->id}}">{{$user->name}} ({{$user->cname}})</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div id="switchUserButton" class="switch-user-button">Switch User</div>
        </div>
        <ul class="nav nav-pills">
            <li class="active"><a data-toggle="pill" href="#menu_summary">Summary</a></li>
            <li><a id="logButton" data-toggle="pill" href="#menu_log">Log</a></li>
        </ul>
        
        <div class="tab-content">
            <div id="menu_summary" class="tab-pane fade in active">
                <div class="summary-heading">#{{$userinfo->id}} - {{$userinfo->name}}</div>
                <div class="summary-container">
                    <div class="side-section">
                        <div class="client-info-section">
                            <div class="client-info-heading"> Client Information </div>
                            <div class="client-info-container">
                                <div class="key-container">
                                    <div class="key-item-0">First Name</div>
                                    <div class="key-item-1">Last Name</div>
                                    <div class="key-item-0">Company Name</div>
                                    <div class="key-item-1">Email Address</div>
                                    <div class="key-item-0">Phone Number</div>
                                    <div class="key-item-1">Country</div>
                                    <div class="key-item-0">Type</div>
                                </div>
                                <div class="value-container">
                                    <div id="client_fname" class="value-item-0">{{$userinfo->fname}}</div>
                                    <div id="client_lname" class="value-item-1">{{$userinfo->lname}}</div>
                                    <div id="client_cname" class="value-item-0">{{$userinfo->cname}}</div>
                                    <div id="client_email" class="value-item-1">{{$userinfo->email}}</div>
                                    <div id="client_phone" class="value-item-0">{{$userinfo->phone}}</div>
                                    <div id="client_cntry" class="value-item-1">{{$userinfo->cntry}}</div>
                                    <div id="client_type" class="value-item-0">{{$userinfo->type}}</div>
                                </div>
                            </div>
                            <div class="client-info-function">
                                <div class="function-row" data-toggle="modal" data-target="#customerEditModal" id="customerEdit"><image class="function-image" src="{{ asset('new-assets/images/icon/customer-edit.png')}}" width="20px" height="20px">Edit Customer</div>
                                <!-- start customerEditModal -->
                                <div class="modal fade" id="customerEditModal">
                                    <div class="modal-dialog">
                                        <form action="/admin/update_user" method="post">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Create a new customer</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input class="form-control" type="hidden" name="id" value="{{$userinfo->id}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fname">First Name :</label>
                                                        <input class="form-control" placeholder="Enter First Name" data-rule-maxlength="256" name="fname" id="edit_fname" type="text" value="">    
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="lname">Last Name :</label>
                                                        <input class="form-control" placeholder="Enter Last Name" data-rule-maxlength="256" name="lname" id="edit_lname" type="text" value="">    
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Business Email :</label>
                                                        <input class="form-control" placeholder="Enter Business Email" data-rule-maxlength="256" name="email" id="edit_email" type="email" value="">    
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Phone Number :</label>
                                                        <input class="form-control" placeholder="Enter Phone Number" data-rule-maxlength="256" name="phone" id="edit_phone" type="number" value="">    
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cname">Company Name :</label>
                                                        <input class="form-control" placeholder="Enter Company Name" data-rule-maxlength="256" name="cname" id="edit_cname" type="text" value="">    
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cntry">Country :</label>
                                                        <div class="form-group">
                                                            <select class="country-select" name="cntry" id="edit_cntry" required />
                                                                <option>Select Country*</option>
                                                                <?php
                                                                $country = DB::table('san_countries')->get(); 
                                                                foreach($country as $contry){
                                                                    $id = $contry->id; 
                                                                ?>
                                                                <option value="<?php echo $contry->name; ?>"><?php echo $contry->name; ?></option>
                                                            <?php } ?>	
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end customerEditModal -->
                                <div id="customerDelete" class="function-row"><image class="function-image" src="{{ asset('new-assets/images/icon/customer-delete.png')}}" width="20px" height="20px">Delete Customer</div>
                                <div data-toggle="modal" data-target="#customerPassChangeModal" id="customerPassChange" class="function-row"><image class="function-image" src="{{ asset('new-assets/images/icon/customer-password.png')}}" width="20px" height="20px">Change Password</div>
                                <!-- start customerPassChangeModal -->
                                <div class="modal fade" id="customerPassChangeModal">
                                    <div class="modal-dialog">
                                        <form action="/admin/change_password" method="post">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Change Password</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input class="form-control" type="hidden" name="id" value="{{$userinfo->id}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password">New Password :</label>
                                                        <input class="form-control" placeholder="Enter New Password" data-rule-maxlength="256" name="password" id="change_password" type="password" value="">    
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="checkbox" id="show_password" name="show_password" value="show_password">
                                                        <label for="show_password"> Show Password</label><br>  
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end customerEditModal -->
                                <div class="function-row"><a style="color:unset" href="/frontlogin"><image class="function-image" src="{{ asset('new-assets/images/icon/customer-login.png')}}" width="20px" height="20px">Login as customer</a></div>
                                                                    
                            </div>
                        </div>
                    </div>
                    <div class="center-section">
                        <div class="billing-section">
                            <div class="billing-heading"> Billing Info </div>
                            <div class="billing-container">
                                <div class="key-container">
                                    <div class="key-item-0">Paid</div>
                                    <div class="key-item-1">Draft</div>
                                    <div class="key-item-0">Unpaid/Due</div>
                                    <div class="key-item-1">Cancelled</div>
                                    <div class="key-item-0">Refunded</div>
                                    <div class="key-item-1">Plan</div>
                                    <div class="key-item-0">Billing</div>
                                    <div class="key-item-1">Credit</div>
                                </div>
                                <div class="value-container">
                                    <div id="billing_paid" class="value-item-0">{{$userinfo->paid_count}} ($ {{$userinfo->paid_amount}})</div>
                                    <div id="billing_draft" class="value-item-1">{{$userinfo->draft_count}} ($ {{$userinfo->draft_amount}})</div>
                                    <div id="billing_due" class="value-item-0">{{$userinfo->unpaid_count}} ($ {{$userinfo->unpaid_amount}})</div>
                                    <div id="billing_cancelled" class="value-item-1">{{$userinfo->cancelled_count}} ($ {{$userinfo->cancelled_amount}})</div>
                                    <div id="billing_refunded" class="value-item-0">{{$userinfo->refunded_count}} ($ {{$userinfo->refunded_amount}})</div>
                                    <div id="billing_plan" class="value-item-1">{{$userinfo->plan_name}}</div>
                                    <div id="billing_billing" class="value-item-0">${{$userinfo->billing_amount}}/{{$userinfo->billing_method}} {{$userinfo->billing_getcredit}}</div>
                                    <div id="billing_credit" class="value-item-1">{{$userinfo->credit}}</div>
                                </div>
                            </div>
                            <div class="billing-function">
                                <div id="changePlan" data-toggle="modal" data-target="#changePlanModal" class="function-row"><image class="function-image" src="{{ asset('new-assets/images/icon/plan-change.png')}}" width="20px" height="20px">Change Plan</div>   
                                <!-- start changePlanModal -->
                                <div class="modal fade" id="changePlanModal">
                                    <div class="modal-dialog">
                                        <form action="/admin/change_plan" method="post">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Change Plan</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input class="form-control" type="hidden" name="id" value="{{$userinfo->id}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="radio" id="plan-free-month" name="plan_type" value="plan-free-month">
                                                        <label for="plan-free-month">Free</label><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="radio" id="plan-essentials-month" name="plan_type" value="plan-essentials-month">
                                                        <label for="plan-essentials-month">Essential/monthly</label><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="radio" id="plan-essentials-year" name="plan_type" value="plan-essentials-year">
                                                        <label for="plan-essentials-year">Essential/yearly</label><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="radio" id="plan-pro-month" name="plan_type" value="plan-pro-month">
                                                        <label for="plan-pro-month">Pro/monthly</label><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="radio" id="plan-pro-year" name="plan_type" value="plan-pro-year">
                                                        <label for="plan-pro-year">Pro/yearly</label><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="radio" id="plan-ultimate-month" name="plan_type" value="plan-ultimate-month">
                                                        <label for="plan-ultimate-month">Ultimate/monthly</label><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="radio" id="plan-ultimate-year" name="plan_type" value="plan-ultimate-year">
                                                        <label for="plan-ultimate-year">Ultimate/yearly</label><br>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Change Plan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end changePlanModal -->
                            </div>
                        </div>
                        <div class="restriction-section">
                            <div class="restriction-heading"> Restriction Info </div>
                            <div class="restriction-container">
                                <div class="key-container">
                                    <div class="key-item-0">Status</div>
                                    <div class="key-item-1">Verify</div>
                                    <div class="key-item-0">View Contact</div>
                                    <div class="key-item-1">Upgrade Plan</div>
                                    <div class="key-item-0">Downgrade plan</div>
                                    <div class="key-item-1">Cancel Plan</div>
                                    <div class="key-item-0">Download</div>
                                </div>
                                <div class="value-container">
                                    <div class="value-item-0">
                                        @if($userinfo->active == 1)
                                            <div class="txt-green">Active</div>
                                        @endif
                                        @if($userinfo->active == 0)
                                            <div class="txt-red">Blocked</div>
                                        @endif
                                    </div>
                                    <div class="value-item-1">
                                        @if($userinfo->verified == 1)
                                            <div class="txt-green">Verified</div>
                                        @endif
                                        @if($userinfo->verified == 0)
                                            <div class="txt-red">Not Verified</div>
                                        @endif
                                    </div>
                                    <div class="value-item-0">
                                        @if($userinfo->view_contact == 1)
                                            <div class="txt-green">ON</div>
                                        @endif
                                        @if($userinfo->view_contact == 0)
                                            <div class="txt-red">OFF</div>
                                        @endif
                                    </div>
                                    <div class="value-item-1">
                                        @if($userinfo->upgrade_plan == 1)
                                            <div class="txt-green">ON</div>
                                        @endif
                                        @if($userinfo->upgrade_plan == 0)
                                            <div class="txt-red">OFF</div>
                                        @endif
                                    </div>
                                    <div class="value-item-0">
                                        @if($userinfo->downgrade_plan == 1)
                                            <div class="txt-green">ON</div>
                                        @endif
                                        @if($userinfo->downgrade_plan == 0)
                                            <div class="txt-red">OFF</div>
                                        @endif
                                    </div>
                                    <div class="value-item-1">
                                        @if($userinfo->cancel_plan == 1)
                                            <div class="txt-green">ON</div>
                                        @endif
                                        @if($userinfo->cancel_plan == 0)
                                            <div class="txt-red">OFF</div>
                                        @endif
                                    </div>
                                    <div class="value-item-0">
                                        @if($userinfo->download_contact == 1)
                                            <div class="txt-green">ON</div>
                                        @endif
                                        @if($userinfo->download_contact == 0)
                                            <div class="txt-red">OFF</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="restriction-function">
                                <div data-toggle="modal" data-target="#changeRestrictionModal" class="function-row"><image class="function-image" src="{{ asset('new-assets/images/icon/restriction-change.png')}}" width="20px" height="20px">Change Restriction</div>   
                                <!-- start changeRestrictionModal -->
                                <div class="modal fade" id="changeRestrictionModal">
                                    <div class="modal-dialog">
                                        <form action="/admin/change_restriction" method="post">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Change Restriction</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input class="form-control" type="hidden" name="id" value="{{$userinfo->id}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="restriction_status">Status</label>
                                                        <input type="checkbox" id="restriction_status" name="restriction_status" value="restriction_status">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="restriction_verified">Verified</label>
                                                        <input type="checkbox" id="restriction_verified" name="restriction_verified" value="restriction_verified">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="restriction_view_contact">View Contact</label>
                                                        <input type="checkbox" id="restriction_view_contact" name="restriction_view_contact" value="restriction_view_contact">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="restriction_upgrade_plan">Upgrade Plan</label>
                                                        <input type="checkbox" id="restriction_upgrade_plan" name="restriction_upgrade_plan" value="restriction_upgrade_plan">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="restriction_downgrade_plan">Downgrade Plan</label>
                                                        <input type="checkbox" id="restriction_downgrade_plan" name="restriction_downgrade_plan" value="restriction_downgrade_plan">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="restriction_cancel_plan">Cancel Plan</label>
                                                        <input type="checkbox" id="restriction_cancel_plan" name="restriction_cancel_plan" value="restriction_cancel_plan">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="restriction_download_contact">Download Contact</label>
                                                        <input type="checkbox" id="restriction_download_contact" name="restriction_download_contact" value="restriction_download_contact">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Change Restriction</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- end changeRestrictionModal -->
                            </div>
                        </div>
                    </div>
                    <div class="center-section">
                        <div class="recent-action-section">
                            <div class="recent-action-heading"> Recent Actions </div>
                            <div class="recent-action-container">
                                @if($recentActions)
                                    <div class="date-container">
                                    @foreach ($recentActions as $key=>$action)
                                        <div class="key-item-{{$key % 2}}">{{date( "Y-m-d h:m:s", strtotime($action->created_at))}}</div>
                                        @if($key > 15)
                                            @break;
                                        @endif
                                    @endforeach
                                    </div>
                                    <div class="action-container">
                                    @foreach ($recentActions as $key=>$action)
                                        <div id="action{{$key}}" class="value-item-{{$key%2}}">{{substr($action->description,0,10).'...'}}
                                            <div class="tooltip-ico">
                                                <i class="fa fa-info-circle"></i>
                                                <div class="tooltip-box" style="margin-top: -50px;">
                                                    <span class="tooltip-arrow-box" style="display: none;">
                                                    {{$action->description}}
                                                    </span>
                                                </div>  
                                            </div>
                                        </div>
                                        @if($key > 15)
                                            @break;
                                        @endif
                                    @endforeach
                                    </div>
                                @else
                                    <div class="no-recent-action">There are no actions for this user</div>
                                @endif
                            </div>
                            <div class="action-function">
                                <div id="viewAllActions" class="function-row"><image class="function-image" src="{{ asset('new-assets/images/icon/actions-viewall.png')}}" width="20px" height="20px">View all actions</div>   
                            </div>
                        </div>
                    </div>
                    <style>
                    </style>
                    <div class="center-section">
                        <div class="send-mail-section">
                            <div class="send-mail-heading">Send Email</div>
                            <div class="send-mail-container">
                                <div class="mail-select">
                                    <select class="mail-lists">
                                        <option>You have successfully upgraded plan</option>
                                        <option>You have successfully downgraded plan</option>
                                        <option>You have successfully cancelled plan</option>
                                        <option>You have successfully been registered</option>
                                        <option>You have been blocked</option>
                                    </select>
                                </div>
                                <div id="sendMailButton" class="mail-send-button">Go</div>
                            </div>
                        </div>

                        <div class="admin-notes-section">
                            <div class="admin-notes-heading">Admin Notes</div>
                            <div class="admin-notes-container">
                                <textarea id="adminNotes" class="admin-notes-textarea"></textarea>
                            </div>
                            <div id="SendAdminNotesButton" class="admin-notes-send-button">Submit</div>

                        </div>
                    </div>
                </div>
            </div>
            <div id="menu_log" class="tab-pane fade">
            <h3>Log</h3>
            @foreach ($recentActions as $key=>$action)
                <p>{{date( "Y-m-d h:m:s", strtotime($action->created_at))}}         {{$action->description}}</p>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

<script src="{{ asset('new-assets/js/filterpage/jquery.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>

$(document).ready(function() {
  $(".user-lists").select2();
  $(".mail-lists").select2();
  $(".country-select").select2();
});
$(document).on('mouseenter', '.tooltip-ico', function (e) {
    $(this).children('.tooltip-box').children('.tooltip-arrow-box').css('display','block');
    
});
$(document).on('mouseleave', '.tooltip-ico', function (e) {
    $(this).children('.tooltip-box').children('.tooltip-arrow-box').css('display','none');
});
$(document).on('show.bs.modal', '#customerEditModal', function (e) {
    console.log('Customer Edit clicked');
    $("#edit_fname").val('{{$userinfo->fname}}');
    $("#edit_lname").val('{{$userinfo->lname}}');
    $("#edit_email").val('{{$userinfo->email}}');
    $("#edit_cname").val('{{$userinfo->cname}}');
    $("#edit_phone").val('{{$userinfo->phone}}');
    $("#edit_cntry > [value="+'{{$userinfo->cntry}}'+"]").attr('selected',true);
    $("#select2-edit_cntry-container").html('{{$userinfo->cntry}}');
})
$(document).on('select2:select', '#userSelect', function (e) {
    var data = e.params.data;
    console.log(data);
});
$(document).on('click', '#customerDelete', function (e) {
    console.log('Customer Delete clicked');
    if(confirm("Do you really want to delete this customer?") == true) {
        var csrftoken  ='{{ csrf_token() }}';
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': csrftoken
            },
            type:'POST',
            url:'/admin/deleteuser',
            data: {
                'id' : {{$userinfo->id}},
            },
            success:function(data){
                if(data) {
                    location.href = "/admin/users";
                }
            }
        });
    }
})
$(document).on('click', '#show_password', function (e) {
    var type = $("#change_password").attr('type');
    console.log(type);
    var new_type;
    if(type == 'password') {
        new_type = 'text';
    } else if(type == 'text') {
        new_type = 'password';
    } else {
        new_type = 'password';
    }
    $("#change_password").attr('type',new_type);
});
$(document).on('show.bs.modal', '#changePlanModal', function (e) {
    console.log("Change Plan modal opened");
    var plan = '{{strtolower($userinfo->plan_name)}}';
    console.log(plan);
    var billing = '{{chop($userinfo->billing_method,'ly')}}';
    console.log(billing);
    $("#changePlanModal input").prop('checked',false);
    $("#plan-"+plan+"-"+billing).prop('checked',true);
});
$(document).on('show.bs.modal', '#changeRestrictionModal', function (e) {
    console.log("Change Restriction modal opened");
    $("#changeRestrictionModal input[type=checkbox]").prop('checked',false);
    if({{$userinfo->active}} == 1) {
        $("#restriction_status").prop('checked',true);
    } else {
        $("#restriction_status").prop('checked',false);
    }
    if({{$userinfo->verified}} == 1) {
        $("#restriction_verified").prop('checked',true);
    } else {
        $("#restriction_verified").prop('checked',false);
    }
    if({{$userinfo->view_contact}} == 1) {
        $("#restriction_view_contact").prop('checked',true);
    } else {
        $("#restriction_view_contact").prop('checked',false);
    }
    if({{$userinfo->upgrade_plan}} == 1) {
        $("#restriction_upgrade_plan").prop('checked',true);
    } else {
        $("#restriction_upgrade_plan").prop('checked',false);
    }
    if({{$userinfo->downgrade_plan}} == 1) {
        $("#restriction_downgrade_plan").prop('checked',true);
    } else {
        $("#restriction_downgrade_plan").prop('checked',false);
    }
    if({{$userinfo->cancel_plan}} == 1) {
        $("#restriction_cancel_plan").prop('checked',true);
    } else {
        $("#restriction_cancel_plan").prop('checked',false);
    }
    if({{$userinfo->download_contact}} == 1) {
        $("#restriction_download_contact").prop('checked',true);
    } else {
        $("#restriction_download_contact").prop('checked',false);
    }
});
$(document).on('click', '#viewAllActions', function (e) {
    $("#logButton").click();
});
$(document).on('click', '#sendMailButton', function (e) {
    var msg = $(".mail-lists").val();
    console.log(msg);
    SendMessage(msg);
});
$(document).on('click', '#SendAdminNotesButton', function (e) {
    var msg = $("#adminNotes").val();
    console.log(msg);
    SendMessage(msg);
});
$(document).on('click', '#switchUserButton', function (e) {
    console.log('switch user button clicked');
    var selected_users = [];
    $.each($(".user-select option:selected"), function(){            
        selected_users.push($(this).attr('id'));
    });
    console.log(selected_users);
    var id = selected_users[0].slice(4);
    location.href = "/admin/users/"+id;
});
function SendMessage(msg){
    var userid = {{$userinfo->id}};
    var csrftoken  ='{{ csrf_token() }}';
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': csrftoken
        },
        type:'POST',
        url:'/admin/send_message',
        data: {
            'email' : '{{$userinfo->email}}',
            'msg' : msg
        },
        success:function(data){
            if(data) {
                location.href = "/admin/users/"+userid;
            }
        }
    });
}
</script>

