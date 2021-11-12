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
                        <a class="sidebar-nav-item sidebar-nav-item-secondary c-dashboard-toggle-menu-link is-active"
                            href="{{url('/dashboard/home')}}">Dashboard Home</a>
                        <a class="sidebar-nav-item sidebar-nav-item-secondary c-dashboard-toggle-menu-link "
                            href="{{url('/dashboard/profile')}}">Account Details</a>
                        <a class="sidebar-nav-item sidebar-nav-item-secondary c-dashboard-toggle-menu-link "
                            href="{{url('dashboard/saved-searches')}}">Saved Searches</a>
                        <a class="sidebar-nav-item sidebar-nav-item-secondary c-dashboard-toggle-menu-link "
                            href="{{url('dashboard/downloads')}}">Exported Files</a>
                        <a class="sidebar-nav-item sidebar-nav-item-secondary c-dashboard-toggle-menu-link "
                            href="{{url('/dashboard/billing')}}">Billing</a>
                        <a class="sidebar-nav-item sidebar-nav-item-secondary c-dashboard-toggle-menu-link "
                            href="{{url('dashboard/support')}}">Support</a>
                    </div>
                    <button id="tab-toggle-btn" class="c-dashboard-toggle-menu-button" type="button"></button>
                </div>
            </div>
            <div class="l-dashboard-content">

                @if ($message = Session::get('success'))
                <div class="custom-alerts alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {!! $message !!}
                </div>
                <?php Session::forget('success');?>
                @endif
                <h3 class="primary-title clear-gap-vertical">Your Dashboard</h3>

                <p>Your Bookyourdata dashboard.</p>
                <hr class="hr-line">
                <div class="pad-vertical">
                    <div class="row gap-bottom">
                        <div class="col-sm-6">
                            <div class="gap-bottom">
                                <h4 class="clear-gap-vertical secondary-title font-large">Registration Date</h4>
                            </div>
                            @foreach($dashbrd as $key => $value)
                                <span>{{ $registration_date = $value->created_at }}</span>
                            @endforeach

                            
                        </div>
                    </div>
                </div>
                <hr class="hr-line">
                <div class="pad-vertical">
                    <h3 class="primary-title clear-gap-vertical">Build a List</h3>
                    <p>Create a new contact list now.</p>
                    <a href="{{ url('tool/business') }}" class="button button-primary">Build a List Now!</a>
                </div>
            </div>
           
        </div>

    </div>
    </div> 

@include('new_footer')