@include('filterheader')
<style>
    .notify-downgrade {
        color: #FF5722 !important;
        width: fit-content;
        background: #ffffff !important;
        font-size: 20px !important;
        padding: 5px 10px;
        font-weight: bold !important;
    }
    .slot-content {
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        padding-left : 8%;
    }
    .el-container.is-vertical {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
    }
    .el-container {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-direction: row;
        flex-direction: row;
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        -ms-flex-preferred-size: auto;
        flex-basis: auto;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        min-width: 0;
    }
    .plan-info[data-v-f9a0069e] {
        width: 414px;
        height: 100px;
        background: #fff;
        border-radius: 12px;
        padding: 25px;
        margin-top: 10px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-direction: row;
        flex-direction: row;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-shadow: 2px 2px 15px #d8d8d8;
        box-shadow: 2px 2px 15px #d8d8d8;
    }
    .plan-item[data-v-f9a0069e] {
        margin-top: 5px;
        margin-bottom: 5px;
        color: #7b8794;
    }
    .plan-item .value[data-v-f9a0069e] {
        color: #616e7c;
        font-weight: 600;
    }
    .plan-info .change-plan[data-v-f9a0069e] {
        margin-left: 45px;
    }
    .el-button--success {
        color: #fff;
        background-color: #6a69ff;
        border-color: #6a69ff;
    }
    .el-button {
        display: inline-block;
        line-height: 1;
        white-space: nowrap;
        cursor: pointer;
        background: #fff;
        border: 1px solid #e7e9ea;
        border-color: #e7e9ea;
        color: #414c58;
        -webkit-appearance: none;
        text-align: center;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        outline: none;
        margin: 0;
        -webkit-transition: .1s;
        transition: .1s;
        font-weight: 500;
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        padding: 12px 20px;
        font-size: 14px;
        border-radius: 4px;
    }
    .subscriptions-cards[data-v-f9a0069e] {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: horizontal;
        -webkit-box-direction: normal;
        -ms-flex-flow: row wrap;
        flex-flow: row wrap;
        -webkit-box-pack: start;
        -ms-flex-pack: start;
        justify-content: flex-start;
        margin-bottom: 50px;
    }
    .subscription-card[data-v-6c79bc03] {
        width: 325px;
        -webkit-box-flex: 0;
        -ms-flex-positive: 0;
        flex-grow: 0;
        -webkit-box-shadow: 2px 2px 15px #d8d8d8;
        box-shadow: 2px 2px 15px #d8d8d8;
        border-radius: 12px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        padding: 30px;
        margin-right: 45px;
        margin-top: 45px;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-pack: space-evenly;
        -ms-flex-pack: space-evenly;
        justify-content: space-evenly;
    }
    .subscription-card .card-main-title[data-v-6c79bc03] {
        font-size: 16px;
        color: #616e7c;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
    }
    .subscription-card .card-item[data-v-6c79bc03] {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -ms-flex-pack: distribute;
        justify-content: space-around;
        height: 20%;
    }
    .subscription-card .card-title[data-v-6c79bc03] {
        color: #616e7c;
        font-size: 15px;
    }
    .subscription-card .card-text[data-v-6c79bc03] {
        margin-top: 10px;
        color: #7b8794;
        font-size: 14px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }
    .el-progress {
        position: relative;
        line-height: 1;
    }
    .el-progress--without-text .el-progress-bar {
        padding-right: 0;
        margin-right: 0;
        display: block;
    }
    .el-progress-bar__outer {
        height: 6px;
        border-radius: 100px;
        background-color: #ebeef5;
        overflow: hidden;
        position: relative;
        vertical-align: middle;
    }
    .el-progress-bar__inner {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        background-color: #6a69ff;
        text-align: right;
        border-radius: 100px;
        line-height: 1;
        white-space: nowrap;
        -webkit-transition: width .6s ease;
        transition: width .6s ease;
    }
    .el-progress-bar__inner:after {
        display: inline-block;
        content: "";
        height: 100%;
        vertical-align: middle;
    }
    .content-wrapper {
        margin-top:60px;
        padding-top: 100px;
        padding-left:150px;
        margin-left:5%;
    }
    .el-button--success {
        color: #fff;
        background-color: #6a69ff;
        border-color: #6a69ff;
    }
    .subscription-card .card-item[data-v-6c79bc03] {
        margin-top: 30px;
    }
    .main-content {
        display: flex;
    }
     .sidebar {
        display: inline-grid;
        width: 200px;
        padding-top: 10px;
    }
    .sidebar .sidebar-container {
        display: inline-block;
    }
    .sidebar .sidebar-container .sidebar-list {
        list-style: none;
    }
    .sidebar .sidebar-container .sidebar-list .sidebar-item {
        padding-bottom: 16px;
    }
    .sidebar .sidebar-container .sidebar-list .last-item {
        padding: 0;
    }
    .sidebar .sidebar-container .sidebar-list .sidebar-item .nuxt-link-exact-active {
        color: #55aad4 !important;
        font-weight: 600;
    }
    .sidebar .sidebar-container .sidebar-list .sidebar-item .item-link {
        color: #7b8794;
        font-style: normal;
        font-size: 16px;
        line-height: 20px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        text-transform: capitalize;
    }
    a {
        text-decoration : none;
    }
    h1.title {
        font-weight: 400;
        color: #616e7c;
        font-size: 24px;
        padding-top: 40px;
        margin-bottom: 40px;
    }
</style>
<div class="content-wrapper">
    <h1 class="title">Subscriptions &amp; Billing</h1>
    <div class="main-content">
        <div class="sidebar">
            <div class="sidebar-container">
                <ul class="sidebar-list">
                    <li class="sidebar-item">
                        <a href="/subscriptions" aria-current="page" class="item-link nuxt-link-exact-active nuxt-link-active selected">
                        Subscriptions 
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/invoices" class="item-link">
                        Invoices
                        </a>
                    </li>
                    <li class="sidebar-item last-item">
                        <a href="/payment-method" class="item-link">
                        Payment Method
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="slot-content">
            <section data-v-f9a0069e="" class="el-container is-vertical" element-loading-text="Loading">
                <!---->
                @if($userinfo->down_plan != -1) 
                    <div class="notify-downgrade">You will get <b style="color : #3190c1">{{$userinfo->down_plan_name}}</b> plan from {{$userinfo->down_date}}</div>
                @endif
                <div data-v-f9a0069e="">
                    <!---->
                    <div data-v-f9a0069e="" class="plan-info">
                        <div data-v-f9a0069e="" class="plan-details">
                            <div data-v-f9a0069e="" class="plan-item">
                            Current plan: 
                            <span data-v-f9a0069e="" class="value">{{$userinfo->productname}}</span>
                            </div>
                            <div data-v-f9a0069e="" class="plan-item">
                        
                            Total available balance: 
                            <span data-v-f9a0069e="" class="value">{{$userinfo->credit}}</span>
                            </div>
                        </div>
                        <a data-v-f9a0069e="" href="/tool/upgrade-plan" class="change-plan">
                        <button data-v-f9a0069e="" type="button" class="el-button el-button--success el-button--large">
                            <!----><!---->
                            <span>
                            Change plan
                            </span>
                        </button>
                        </a>
                    </div>
                    <!---->
                    <div data-v-f9a0069e="" class="subscriptions-cards">
                        <section data-v-6c79bc03="" data-v-f9a0069e="" class="el-container subscription-card is-vertical">
                            <p data-v-6c79bc03="" class="card-main-title">
                        {{$userinfo->productname}} Plan
                        <!----></p>
                                <div data-v-6c79bc03="" class="card-item">
                                    <div data-v-6c79bc03="" class="card-title">Credits used</div
                                    ><div data-v-6c79bc03="" class="card-text">{{$userinfo->getcredit - $userinfo->credit < 0 ? 0 : $userinfo->getcredit - $userinfo->credit}} / {{$userinfo->getcredit}}</div>
                                    <div data-v-6c79bc03="" role="progressbar" aria-valuenow="{{$userinfo->getcredit - $userinfo->credit < 0 ? 0 : $userinfo->getcredit - $userinfo->credit}} " aria-valuemin="0" aria-valuemax="{{$userinfo->getcredit}}" class="el-progress el-progress--line el-progress--without-text">
                                        <div class="el-progress-bar">
                                            <div class="el-progress-bar__outer" style="height: 5px;">
                                            <div class="el-progress-bar__inner" style="width: {{($userinfo->getcredit - $userinfo->credit < 0 ? 0 : $userinfo->getcredit - $userinfo->credit) * 100 / $userinfo->getcredit}}%;"><!----></div>
                                        </div>
                                    </div>
                                    <!---->
                                </div>
                            </div>
                            <div data-v-6c79bc03="" class="card-item">
                                <div data-v-6c79bc03="" class="card-title">Current period</div>
                                <div data-v-6c79bc03="" class="card-text">{{$userinfo->planstart}} - {{$userinfo->planend}}</div>
                            </div><div data-v-6c79bc03="" class="card-item">
                                <div data-v-6c79bc03="" class="card-title">Subscription renewal</div>
                                <div data-v-6c79bc03="" class="card-text">
                                    <span data-v-6c79bc03="" class="status el-tag el-tag--success el-tag--light">Active

                                    </span>
                                    <span data-v-6c79bc03="" class="right-text">Will be renewed in {{$userinfo->leftdays}} days</span>
                                </div>
                                <!---->
                            </div>
                        </section>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>