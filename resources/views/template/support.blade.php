@include('new_header')
<div class="page-title">
    <div class="container">
        <span class="page-title-title heading">Hi {{Session::get('user_name')}},</span>
    </div>
</div>
<div class="container">
    <div class="l-dashboard">
        <div class="l-dashboard-sidebar gap-bottom-large-tld">
            <div class="c-dashboard-toggle-menu">
                <div class="sidebar-nav sidebar-nav-without-icon shadow-primary c-dashboard-toggle-menu-menu">
                    <a class="sidebar-nav-item sidebar-nav-item-secondary c-dashboard-toggle-menu-link"
                    href="{{url('/dashboard/home')}}">Dashboard Home</a>
                    <a class="sidebar-nav-item sidebar-nav-item-secondary c-dashboard-toggle-menu-link "
                    href="{{url('/dashboard/profile')}}">Account Details</a>
                    <a class="sidebar-nav-item sidebar-nav-item-secondary c-dashboard-toggle-menu-link"
                    href="{{url('/dashboard/saved-searches')}}">Saved Searches</a>
                    <a class="sidebar-nav-item sidebar-nav-item-secondary c-dashboard-toggle-menu-link"
                    href="{{url('/dashboard/downloads')}}">Exported Files</a>
                    <a class="sidebar-nav-item sidebar-nav-item-secondary c-dashboard-toggle-menu-link "
                    href="{{url('/dashboard/billing')}}">Billing</a>
                    <a class="sidebar-nav-item sidebar-nav-item-secondary c-dashboard-toggle-menu-link is-active"
                    href="{{url('/dashboard/support')}}">Support</a>
                </div>
                <button id="tab-toggle-btn" class="c-dashboard-toggle-menu-button" type="button"></button>
            </div>
        </div>
        <div class="l-dashboard-content">
            <div id="loading-root0"></div>
            <h3 class="primary-title clear-gap-vertical">Support</h3>
            <p>Don't hesitate to write us. We would be happy to assist you.</p>

            <div class="hbspt-form" >

                <span class="successsupport"></span>
                
                    <div class="hs_email hs-email hs-fieldtype-text field hs-form-field" >
                        <label" class="" placeholder="Enter your Email">
                        <span>Email</span>
                        <span
                        class="hs-form-required">*</span>
                    </label>

                    <div class="input">
                        <input class="hs-input email" type="email" name="email" required="" placeholder="">
                    </div>
                    <span class="emailerror" style="font-size: 14px;color: #fd000d;font-weight: 700;"></span>
                </div>
                <div class=" hs-form-field">
                    <label class="" placeholder="Enter your Subject">
                        <span>Subject</span></label>
                        <div class="input">
                            <input class="hs-input subject" type="text" name="subject" value="" placeholder=""></div>
                            <span class="subjecterror" style="font-size: 14px;color: #fd000d;font-weight: 700;"></span>    
                        </div>
                        <div class="hs-form-field"><label id="" class=""  placeholder="Enter your Message">
                            <span>Message</span>
                            <span class="hs-form-required" >*</span></label>

                            <div class="input">
                                <textarea class="hs-input message" required="" placeholder=""></textarea></div>

                                <span class="messageerror" style="font-size: 14px;color: #fd000d;font-weight: 700;"></span>
                            </div>
                            <div class="hs_submit hs-submit">

                                <div class="actions"><input type="submit" value="Send"
                                    class="hs-button primary large querysubmit"></div>
                                </div>

                            
                        </div>

                    </div>

                </div>

            </div>
        </div>
        @include('new_footer')