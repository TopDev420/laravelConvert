@include('filterheader')
<style>
body{
    color: #666;
}
input {
    color: #666;
}
.account-content {
    width: 100%;
    height: 100%;
    padding-top: 100px;
    padding-left: 50px;
    padding-right: 50px;
    margin-left:3%;
}
.account-content-wrapper  {
    display : flex;
}
.account-my-profile{
    width:50%;
    padding-right:10%;
}
.account-profile-wrap {
    display: flex;
    flex-direction: column;
    padding-top: 30px;
}
.account-password-wrap {
    display: flex;
    flex-direction: column;
    padding-top: 30px;
}
.account-change-password {
    width: 50%;
    padding-right:10%;
}
.account-title {
    font-size: 25px;
    border-bottom: 1px solid;
    color: deepskyblue;
}
.account-profile-row {
    display: flex;
}
.account-password-row {
    display: flex;
}
.account-profile-left {
    padding-top: 20px;
    width: 50%;
    text-align: left;
}

.account-profile-right {
    width: 50%;
    padding-top: 20px;

}
.account-profile-input {
    width: 100%;
    font-size: 20px;
}
.account-password-left {
    padding-top: 20px;
    width: 50%;
    text-align: left;
}

.account-password-right {
    width: 50%;
    padding-top: 20px;

}
.account-password-input {
    width: 100%;
    font-size: 20px;
}
.account-profile-action {
    padding-top: 30px;
    text-align: right;
}
.account-profile-save {
    width: 120px;
    height: 40px;
    cursor: pointer;
}
.account-password-action {
    padding-top: 30px;
    text-align: right;

}
.account-password-change {
    width: 120px;
    height: 40px;
    cursor: pointer;
}
.account-password-require {

}
.account-password-require-left {
    padding-top: 20px;
    text-align: left;

}
.account-password-require-right {
    padding-top: 20px;

}
.account-password-require-wrap {
    
}
.account-password-require-item {
    padding-top:5px;
}
</style>
<div class="account-content">
    <div class="account-content-wrapper">
        <div class="account-my-profile">
            <div class="account-title">
                My Profile
            </div>
            <div class="account-profile-wrap">
                <div class="account-profile-row">
                    <div class="account-profile-left">My User Name</div>
                    <div class="account-profile-right">{{$userinfo->email}}</div>
                </div>
            
                <div class="account-profile-row">
                    <div class="account-profile-left">My First Name</div>
                    <div class="account-profile-right">
                        <input class="account-profile-input" value="{{$userinfo->fname}}" id="firstname"/>
                    </div>
                </div>

                <div class="account-profile-row">
                    <div class="account-profile-left">My Last Name</div>
                    <div class="account-profile-right">
                        <input class="account-profile-input" value="{{$userinfo->lname}}" id="lastname"/>
                    </div>
                </div>

                <div class="account-profile-row">
                    <div class="account-profile-left">My User Type</div>
                    <div class="account-profile-right">{{$userinfo->type}}</div>
                </div>
                
                <div class="account-profile-row">
                    <div class="account-profile-left">My Email</div>
                    <div class="account-profile-right">{{$userinfo->email}}</div>
                </div>

                
                <div class="account-profile-row">
                    <div class="account-profile-left">My Phone</div>
                    <div class="account-profile-right">
                        <input class="account-profile-input" value="{{$userinfo->phone}}" id="phone"/>
                    </div>
                </div>

                <div class="account-profile-row">
                    <div class="account-profile-left">Active Form</div>
                    <div class="account-profile-right">Nov 19, 2019</div>
                </div>

                <div class="account-profile-row">
                    <div class="account-profile-left">Active To</div>
                    <div class="account-profile-right">Jun 30, 2021</div>
                </div>
            </div>
            <div class="account-profile-action">
                <input type="button" value="Save Profile" id="account_profile_save" class="account-profile-save"/>
            </div>
        </div>
        <div class="account-change-password">
            <div class="account-title">
                Change Password
            </div>
            <div class="account-password-wrap">
                <div class="account-password-row">
                    <div class="account-password-left">Current Password</div>
                    <div class="account-password-right">
                        <input type="password" class="account-password-input" placeholder="Current Password" id="currentpass"/>
                    </div>
                </div>

                <div class="account-password-row">
                    <div class="account-password-left">New Password</div>
                    <div class="account-password-right">
                        <input type="password" class="account-password-input" placeholder="New Password" id="newpass"/>
                    </div>
                </div>

                <div class="account-password-row">
                    <div class="account-password-left">New Password Confirm</div>
                    <div class="account-password-right">
                        <input type="password" class="account-password-input" placeholder="New Password Confirm" id="confirmpass"/>
                    </div>
                </div>
            </div>
            <div class="account-password-action">
                <input type="button" value="Change Password" id="account_password_change" class="account-password-change"/>
                <div id="checkforupdatepass" style="display:none"></div>
            </div>
            <div class="account-password-require">
                <div class="account-password-require-left">Password Requirements</div>
                <div class="account-password-require-right">
                    <ul class="account-password-require-wrap">
                        <li class="account-password-require-item">Be between eight and twenty charaters long</li>
                        <li class="account-password-require-item">Include upper and lower case letters</li>
                        <li class="account-password-require-item">Contain at least one number and one special character(eg '@','$')</li>
                        <li class="account-password-require-item">Not match your previous three passwords</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#account_profile_save").click(function(e) {
        var fname = $("#firstname").val();
        var lname = $("#lastname").val();
        var phone = $("#phone").val();
        console.log(fname + ":" + lname + ":" + phone);
        var csrftoken  ='{{ csrf_token() }}';
        var baseurl = '<?php echo url('/'); ?>';
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': csrftoken
            },
            type:'POST',
            url:baseurl+'/updatenamephone',
            data: {
            'fname': fname,
            'lname': lname,
            'phone': phone,
            },
            success:function(data){
                console.log("Profile Succesfully Updated");
                location.href = '/tool/account';
            }
        });
    })
    $("#account_password_change").click(function(e) {

        var fname = $("#firstname").val();
        var lname = $("#lastname").val();
        var phone = $("#phone").val();

        var currentpass = $("#currentpass").val();
        var newpass = $("#newpass").val();
        var confirmpass = $("#confirmpass").val();
        console.log(fname + ":" + lname + ":" + phone);
        var csrftoken  ='{{ csrf_token() }}';
        var baseurl = '<?php echo url('/'); ?>';
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': csrftoken
            },
            type:'POST',
            url:baseurl+'/passwordupdate',
            data: {
                'currentpass': currentpass,
                'newpass': newpass,
                'confirmpass': confirmpass,
            },
            success:function(data){
                console.log(data.string);
                $("#checkforupdatepass").css("display","block");
                $("#checkforupdatepass").html(data.string);
            }
        });
    })
</script>