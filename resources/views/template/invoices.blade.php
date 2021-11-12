@include('filterheader')

<style>
.slot-content {
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
    padding-left: 8%;
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
    margin-top: 60px;
    padding-top: 100px;
    padding-left: 150px;
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
    text-decoration: none;
}

h1.title {
    font-weight: 400;
    color: #616e7c;
    font-size: 24px;
    padding-top: 40px;
    margin-bottom: 40px;
}


</style>

<link rel="stylesheet" href="{{ asset('new-assets/css/invoices.css')}}">
<div class="content-wrapper">
    <h1 class="title">Subscriptions &amp; Billing</h1>
    <div class="main-content">
        <div class="sidebar">
            <div class="sidebar-container">
                <ul class="sidebar-list">
                    <li class="sidebar-item">
                        <a href="/tool/account-billing" aria-current="page" class="item-link ">
                            Subscriptions
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/invoices" class="item-link nuxt-link-exact-active nuxt-link-active selected">
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
            <section data-v-f9a0069e="" class="el-container is-vertical" element-loading-text="Loading" style="margin-top: -180px">
                <div class="db-CardlessUIPageWrapper Box-root Padding-horizontal--20" style="overflow-x: auto;">
                    <div class="Box-root">
                        <div class="Card-root Card--radius--all Section Box-root Box-background--white"
                            style="overflow: visible;">
                            <div class="ListView ListView--withFooter">
                                <div
                                    class="Box-root Padding-top--16 Padding-bottom--8 Flex-flex Flex-alignItems--center Flex-justifyContent--spaceBetween">
                                    <span
                                        class="Text-color--dark Text-fontSize--28 Text-fontWeight--bold Text-lineHeight--32 Text-numericSpacing--proportional Text-typeface--base Text-wrap--wrap Text-display--inline"><span>Invoices</span></span>
                                    <div class="Box-root" style="pointer-events: none;">
                                        <div class="Box-root Flex-flex Flex-direction--row Flex-justifyContent--flexStart Flex-wrap--nowrap"
                                            style="margin-left: -8px; margin-top: -8px;">
                                            <div class="Box-root Box-hideIfEmpty Margin-top--8 Margin-left--8"
                                                style="pointer-events: auto;">
                                                <div class="Box-root Flex-flex">
                                                    <div class="Box-root Flex-flex">
                                                        <div class="PressableCore PressableCore--cursor--pointer PressableCore--height--medium PressableCore--radius--all PressableCore--width PressableCore--width--auto PressableButton Button Button--color--white Box-root Flex-inlineFlex"
                                                            style="background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0.12) 0px 1px 1px 0px, rgba(60, 66, 87, 0.16) 0px 0px 0px 1px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(60, 66, 87, 0.08) 0px 2px 5px 0px;">
                                                            <div class="PressableCore-base Box-root"><button
                                                                    aria-controls="menu386" aria-haspopup="menu"
                                                                    id="menu386-button"
                                                                    class="UnstyledLink Button-element PressableContext Padding-horizontal--8 Padding-vertical--4 PressableContext--cursor--pointer PressableContext--display--inlineFlex PressableContext--fontLineHeight--20 PressableContext--fontSize--14 PressableContext--fontWeight--medium PressableContext--height PressableContext--height--medium PressableContext--radius--all PressableContext--width PressableContext--width--auto"
                                                                    type="button" style="color: rgb(60, 66, 87);">
                                                                    <div class="Button-align Box-root Flex-flex Flex-alignItems--baseline Flex-direction--row"
                                                                        style="position: relative;">
                                                                        <div class="TextAligner Box-root"
                                                                            style="line-height: 20px; font-size: 14px; flex: 0 0 auto;">
                                                                        </div>
                                                                        <div class="Box-root Flex-flex Flex-alignItems--baseline Flex-direction--row Flex-justifyContent--center"
                                                                            style="width: 100%; line-height: 0; flex: 1 1 auto;">
                                                                            <div class="Box-root Padding-right--8">
                                                                                <div aria-hidden="true"
                                                                                    class="SVGInline SVGInline--cleaned SVG Icon Icon--filter Button-icon Icon-color Icon-color--gray600 Box-root Flex-flex"
                                                                                    style="transform: translateY(1.1px);">
                                                                                    <svg aria-hidden="true"
                                                                                        class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--filter-svg Button-icon-svg Icon-color-svg Icon-color--gray600-svg"
                                                                                        height="12" width="12"
                                                                                        viewBox="0 0 16 16"
                                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                                        <path
                                                                                            d="M13.994.004c.555 0 1.006.448 1.006 1a.997.997 0 0 1-.212.614l-5.782 7.39L9 13.726a1 1 0 0 1-.293.708L7.171 15.97A.1.1 0 0 1 7 15.9V9.008l-5.788-7.39A.996.996 0 0 1 1.389.214a1.01 1.01 0 0 1 .617-.21z"
                                                                                            fill-rule="evenodd"></path>
                                                                                    </svg>
                                                                                </div>
                                                                            </div><span
                                                                                class="Button-label Text-color--default Text-fontSize--14 Text-fontWeight--medium Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--base Text-wrap--noWrap Text-display--block"
                                                                                style="margin-top: -1px;"><span>Filter</span></span>
                                                                        </div>
                                                                    </div>
                                                                </button></div>
                                                            <div
                                                                class="PressableCore-overlay PressableCore-overlay--extendBy1 Box-root Box-background--white">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="Box-root Box-hideIfEmpty Margin-top--8 Margin-left--8"
                                                style="pointer-events: auto;">
                                                <div>
                                                    <div class="PressableCore PressableCore--cursor--pointer PressableCore--height--medium PressableCore--radius--all PressableCore--width PressableCore--width--auto PressableButton Button Button--color--white Box-root Flex-inlineFlex"
                                                        style="background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0.12) 0px 1px 1px 0px, rgba(60, 66, 87, 0.16) 0px 0px 0px 1px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(60, 66, 87, 0.08) 0px 2px 5px 0px;">
                                                        <div class="PressableCore-base Box-root"><button
                                                                data-db-analytics-name="list_views.header.export.filter"
                                                                class="UnstyledLink Button-element PressableContext Padding-horizontal--8 Padding-vertical--4 PressableContext--cursor--pointer PressableContext--display--inlineFlex PressableContext--fontLineHeight--20 PressableContext--fontSize--14 PressableContext--fontWeight--medium PressableContext--height PressableContext--height--medium PressableContext--radius--all PressableContext--width PressableContext--width--auto"
                                                                type="button" style="color: rgb(60, 66, 87);">
                                                                <div class="Button-align Box-root Flex-flex Flex-alignItems--baseline Flex-direction--row"
                                                                    style="position: relative;">
                                                                    <div class="TextAligner Box-root"
                                                                        style="line-height: 20px; font-size: 14px; flex: 0 0 auto;">
                                                                    </div>
                                                                    <div class="Box-root Flex-flex Flex-alignItems--baseline Flex-direction--row Flex-justifyContent--center"
                                                                        style="width: 100%; line-height: 0; flex: 1 1 auto;">
                                                                        <div class="Box-root Padding-right--8">
                                                                            <div aria-hidden="true"
                                                                                class="SVGInline SVGInline--cleaned SVG Icon Icon--arrowExport Button-icon Icon-color Icon-color--gray600 Box-root Flex-flex"
                                                                                style="transform: translateY(1.1px);">
                                                                                <svg aria-hidden="true"
                                                                                    class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--arrowExport-svg Button-icon-svg Icon-color-svg Icon-color--gray600-svg"
                                                                                    height="12" width="12"
                                                                                    viewBox="0 0 16 16"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <path
                                                                                        d="M15 10.006a1 1 0 1 1-2 0v-5.6L2.393 15.009a.992.992 0 1 1-1.403-1.404L11.595 3.002h-5.6a1 1 0 0 1 0-2.001h8.02a1 1 0 0 1 .284.045.99.99 0 0 1 .701.951z"
                                                                                        fill-rule="evenodd"></path>
                                                                                </svg>
                                                                            </div>
                                                                        </div><span
                                                                            class="Button-label Text-color--default Text-fontSize--14 Text-fontWeight--medium Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--base Text-wrap--noWrap Text-display--block"
                                                                            style="margin-top: -1px;"><span>Export</span></span>
                                                                    </div>
                                                                </div>
                                                            </button></div>
                                                        <div
                                                            class="PressableCore-overlay PressableCore-overlay--extendBy1 Box-root Box-background--white">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="Table">
                                    <thead class="Table-head">
                                        <tr class="Table-row ListViewItem ListViewItem-header">
                                            <td id="amount"
                                                class="Table-cell Table-cell--align--right Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell"
                                                style="height: 1px;">
                                                <div class="ListViewItem-cellContent Box-root Padding-all--8"><span
                                                        class="ListViewItem-text Text-color--dark Text-align--right Text-fontSize--13 Text-fontWeight--medium Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--upper Text-wrap--wrap Text-display--block"><span>Amount</span></span>
                                                </div>
                                            </td>
                                            <td id="currency"
                                                class="Table-cell Table-cell--align--left Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell"
                                                style="height: 1px;">
                                                <div class="ListViewItem-cellContent Box-root Padding-all--8"><span
                                                        class="ListViewItem-text Text-color--dark Text-fontSize--13 Text-fontWeight--medium Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--upper Text-wrap--wrap Text-display--inline"><span></span></span>
                                                </div>
                                            </td>
                                            <td id="icon"
                                                class="Table-cell Table-cell--align--left Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell"
                                                style="height: 1px;">
                                                <div class="ListViewItem-cellContent Box-root Padding-all--8"><span
                                                        class="ListViewItem-text Text-color--dark Text-fontSize--13 Text-fontWeight--medium Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--upper Text-wrap--wrap Text-display--inline"><span></span></span>
                                                </div>
                                            </td>
                                            <td id="badge"
                                                class="Table-cell Table-cell--align--left Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell"
                                                style="height: 1px;">
                                                <div class="ListViewItem-cellContent Box-root Padding-all--8"><span
                                                        class="ListViewItem-text Text-color--dark Text-fontSize--13 Text-fontWeight--medium Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--upper Text-wrap--wrap Text-display--inline"><span></span></span>
                                                </div>
                                            </td>
                                            <td id="number"
                                                class="Table-cell Table-cell--align--left Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell"
                                                style="height: 1px;">
                                                <div class="ListViewItem-cellContent Box-root Padding-all--8"><span
                                                        class="ListViewItem-text Text-color--dark Text-fontSize--13 Text-fontWeight--medium Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--upper Text-wrap--wrap Text-display--inline"><span>Invoice
                                                            number</span></span></div>
                                            </td>
                                            <td id="customer-email"
                                                class="Table-cell Table-cell--align--left Table-cell--verticalAlign--top Table-cell--width--auto Table-cell--wrap--noWrap ListViewItem-cell"
                                                style="height: 1px;width:150px;">
                                                <div class="ListViewItem-cellContent Box-root Padding-all--8"><span
                                                        class="ListViewItem-text Text-color--dark Text-fontSize--13 Text-fontWeight--medium Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--upper Text-wrap--wrap Text-display--inline"><span>Customer</span></span>
                                                </div>
                                            </td>
                                            <td id="due"
                                                class="Table-cell Table-cell--align--left Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell"
                                                style="height: 1px;">
                                                <div class="ListViewItem-cellContent Box-root Padding-all--8"><span
                                                        class="ListViewItem-text Text-color--dark Text-align--left Text-fontSize--13 Text-fontWeight--medium Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--upper Text-wrap--wrap Text-display--block"><span>Due</span></span>
                                                </div>
                                            </td>
                                            <td id="created-short"
                                                class="Table-cell Table-cell--align--left Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell"
                                                style="height: 1px;width:125px;">
                                                <div class="ListViewItem-cellContent Box-root Padding-all--8"><span
                                                        class="ListViewItem-text Text-color--dark Text-align--left Text-fontSize--13 Text-fontWeight--medium Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--upper Text-wrap--wrap Text-display--block"><span>Created</span></span>
                                                </div>
                                            </td>
                                            <td id="menu"
                                                class="Table-cell Table-cell--align--right Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell"
                                                style="height: 1px;">
                                                <div class="ListViewItem-cellContent Box-root Padding-all--8"><span
                                                        class="ListViewItem-text Text-color--dark Text-align--right Text-fontSize--13 Text-fontWeight--medium Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--upper Text-wrap--wrap Text-display--block"><span></span></span>
                                                </div>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody class="Table-body" id="invoiceTable">
                                    @foreach ($invoices as $invoice)
                                        <tr
                                            class="Table-row ListViewItem bs-ActionsParent BadgeParent IconParent ListViewItem--hasLink">
                                            <td class="Table-cell Table-cell--align--right Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell ListViewItem-text"
                                                style="height: 1px;"><a class="UnstyledLink ListViewItem-link"
                                                    href="/test/invoices/in_1HtHZDHycXXIvcX8797smfEE">
                                                    <div class="ListViewItem-cellContent Box-root Padding-all--8"><span
                                                            class="ListViewItem-text Text-color--dark Text-fontSize--14 Text-fontWeight--medium Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--base Text-wrap--wrap Text-display--inline"><span>${{$invoice->total / 100}}</span></span>
                                                    </div>
                                                </a></td>
                                            <td class="Table-cell Table-cell--align--left Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell"
                                                style="height: 1px;"><a class="UnstyledLink ListViewItem-link"
                                                    href="/test/invoices/in_1HtHZDHycXXIvcX8797smfEE">
                                                    <div class="ListViewItem-cellContent Box-root Padding-all--8"><span
                                                            class="ListViewItem-text Text-color--gray Text-fontSize--14 Text-fontWeight--regular Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--base Text-wrap--wrap Text-display--inline">{{strtoupper($invoice->currency)}}</span>
                                                    </div>
                                                </a></td>
                                            <td class="Table-cell Table-cell--align--left Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell"
                                                style="height: 1px;"><a class="UnstyledLink ListViewItem-link"
                                                    href="/test/invoices/in_1HtHZDHycXXIvcX8797smfEE">
                                                    <div
                                                        class="ListViewItem-cellContent Box-root Margin-top--4 Padding-all--8">
                                                        <span
                                                            class="ListViewItem-text Text-color--gray Text-numericSpacing--proportional Text-typeface--base Text-wrap--wrap Text-display--inline">
                                                            <div class="Box-root Flex-flex">
                                                                <div class="Box-root Flex-flex">
                                                                    <div aria-hidden="true"
                                                                        class="SVGInline SVGInline--cleaned SVG Icon Icon--change Icon-color Icon-color--inherit Box-root Flex-flex">
                                                                        <svg aria-hidden="true"
                                                                            class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--change-svg Icon-color-svg Icon-color--inherit-svg"
                                                                            height="12" width="12" viewBox="0 0 16 16"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M4.986 13.201V10.41a1 1 0 1 1 2 0V15a.998.998 0 0 1-1 1.001H1.4a1 1 0 0 1 0-2.002h1.29A8.003 8.003 0 0 1 0 8.008 8 8 0 0 1 5.716.327a1 1 0 1 1 .568 1.92A5.998 5.998 0 0 0 2 8.008 6.005 6.005 0 0 0 4.986 13.2zM11.014 2.8V5.59a1 1 0 1 1-2 0V1a.998.998 0 0 1 1-1.001H14.6a1 1 0 0 1 0 2.002h-1.29A8.003 8.003 0 0 1 16 7.992a8 8 0 0 1-5.716 7.68 1 1 0 1 1-.567-1.92A5.998 5.998 0 0 0 14 7.992 6.005 6.005 0 0 0 11.014 2.8z">
                                                                            </path>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </span>
                                                    </div>
                                                </a></td>
                                            <td class="Table-cell Table-cell--align--left Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell"
                                                style="height: 1px;"><a class="UnstyledLink ListViewItem-link"
                                                    href="/test/invoices/in_1HtHZDHycXXIvcX8797smfEE">
                                                    <div class="ListViewItem-cellContent Box-root Padding-all--8">
                                                        <div
                                                            class="Badge Badge--variant--status Box-root Box-background--green100 Flex-inlineFlex Flex-alignItems--center Flex-direction--row">
                                                            <span
                                                                class="Badge-text Text-color--green600 Text-fontSize--12 Text-fontWeight--medium Text-lineHeight--16 Text-numericSpacing--proportional Text-typeface--base Text-wrap--noWrap Text-display--inline"><span>{{ucfirst($invoice->status)}}</span></span>
                                                        </div>
                                                    </div>
                                                </a></td>
                                            <td class="Table-cell Table-cell--align--left Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell ListViewItem-cell--truncate"
                                                style="height: 1px;"><a class="UnstyledLink ListViewItem-link"
                                                    href="/test/invoices/in_1HtHZDHycXXIvcX8797smfEE">
                                                    <div class="ListViewItem-cellContent Box-root Padding-all--8"><span
                                                            class="ListViewItem-text Text-color--default Text-fontSize--14 Text-fontWeight--regular Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--base Text-wrap--wrap Text-display--inline"><span
                                                                class="Text-color--inherit Text-fontSize--13 Text-fontWeight--regular Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--mono Text-wrap--noWrap Text-display--inline">{{$invoice->number}}</span></span>
                                                    </div>
                                                </a></td>
                                            <td class="Table-cell Table-cell--align--left Table-cell--verticalAlign--top Table-cell--width--auto Table-cell--wrap--noWrap ListViewItem-cell"
                                                style="height: 1px;"><a class="UnstyledLink ListViewItem-link"
                                                    href="/test/invoices/in_1HtHZDHycXXIvcX8797smfEE">
                                                    <div class="ListViewItem-cellContent Box-root Padding-all--8"><span
                                                            class="ListViewItem-text Text-color--default Text-fontSize--14 Text-fontWeight--regular Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--base Text-wrap--wrap Text-display--inline">{{$invoice->customer_email}}</span>
                                                    </div>
                                                </a></td>
                                            <td aria-hidden="true"
                                                class="Table-cell Table-cell--align--left Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell"
                                                style="height: 1px;"><a class="UnstyledLink ListViewItem-link"
                                                    href="/test/invoices/in_1HtHZDHycXXIvcX8797smfEE">
                                                    <div class="ListViewItem-cellContent Box-root Padding-all--8"><span
                                                            class="ListViewItem-text Text-color--disabled Text-fontSize--14 Text-fontWeight--regular Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--base Text-wrap--wrap Text-display--inline">{{$invoice->due_date?$invoice->due_date:'-'}}</span>
                                                    </div>
                                                </a></td>
                                            <td class="Table-cell Table-cell--align--left Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell"
                                                style="height: 1px;"><a class="UnstyledLink ListViewItem-link"
                                                    href="/test/invoices/in_1HtHZDHycXXIvcX8797smfEE">
                                                    <div class="ListViewItem-cellContent Box-root Padding-all--8"><span
                                                            class="ListViewItem-text Text-color--default Text-fontSize--14 Text-fontWeight--regular Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--base Text-wrap--wrap Text-display--inline"><span>{{date("Y-m-d H:i:s", $invoice->created)}}</span></span></div>
                                                </a></td>
                                            <td class="Table-cell Table-cell--align--right Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell"
                                                style="height: 1px;">
                                                <div class="ListViewItem-cellContent Box-root Padding-all--8">
                                                    <div style="margin-top: -2px; margin-bottom: -2px;">
                                                        <div
                                                            class="db-QuickActionsMenu ListViewItem-actions Box-root Flex-flex Flex-justifyContent--flexEnd">
                                                            <div class="PressableCore PressableCore--cursor--pointer PressableCore--height--small PressableCore--radius--all PressableCore--width PressableCore--width--auto PressableButton Button Button--color--white Button--hideLabel db-QuickActionsMenu-placeholder Box-root Flex-inlineFlex"
                                                                style="box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px;">
                                                                <div class="PressableCore-base Box-root"><button
                                                                        aria-hidden="true"
                                                                        class="UnstyledLink Button-element PressableContext Padding-horizontal--8 Padding-vertical--4 PressableContext--cursor--pointer PressableContext--display--inlineFlex PressableContext--fontLineHeight--16 PressableContext--fontSize--13 PressableContext--fontWeight--medium PressableContext--height PressableContext--height--small PressableContext--radius--all PressableContext--width PressableContext--width--auto"
                                                                        type="button" style="color: rgb(60, 66, 87);">
                                                                        <div class="Button-align Box-root Flex-flex Flex-alignItems--baseline Flex-direction--row"
                                                                            style="position: relative;">
                                                                            <div class="TextAligner Box-root"
                                                                                style="line-height: 16px; font-size: 13px; flex: 0 0 auto;">
                                                                            </div>
                                                                            <div class="Box-root Flex-flex Flex-alignItems--baseline Flex-direction--row Flex-justifyContent--center"
                                                                                style="width: 100%; line-height: 0; flex: 1 1 auto;">
                                                                                <div
                                                                                    class="Box-root Padding-horizontal--2">
                                                                                    <div aria-hidden="true"
                                                                                        class="SVGInline SVGInline--cleaned SVG Icon Icon--more Button-icon Icon-color Icon-color--gray600 Box-root Flex-flex"
                                                                                        style="margin-top: -1.64px; transform: translateY(1.45px);">
                                                                                        <svg aria-hidden="true"
                                                                                            class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--more-svg Button-icon-svg Icon-color-svg Icon-color--gray600-svg"
                                                                                            height="12" width="12"
                                                                                            viewBox="0 0 16 16"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <path
                                                                                                d="M2 10a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm6 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm6 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"
                                                                                                fill-rule="evenodd">
                                                                                            </path>
                                                                                        </svg>
                                                                                    </div>
                                                                                </div><span
                                                                                    class="Button-label Text-color--default Text-fontSize--13 Text-fontWeight--medium Text-lineHeight--16 Text-numericSpacing--proportional Text-typeface--base Text--visuallyHidden Text-wrap--noWrap Text-display--block"
                                                                                    style="margin-top: -1px;"><span>More
                                                                                        options</span></span>
                                                                            </div>
                                                                        </div>
                                                                    </button></div>
                                                                <div
                                                                    class="PressableCore-overlay PressableCore-overlay--extendBy1 Box-root Box-background--white">
                                                                </div>
                                                            </div>
                                                            <div class="db-QuickActionsMenu-innerbox Box-root">
                                                                <div class="ButtonBar Box-root Flex-flex">
                                                                    <div class="ButtonBar-item ButtonBar-item--isFirst">
                                                                        <div class="Box-root Flex-flex">
                                                                            <div class="Box-root Flex-flex">
                                                                                <div class="PressableCore PressableCore--cursor--pointer PressableCore--height--small PressableCore--radius--left PressableCore--width PressableCore--width--auto PressableButton Button Button--color--white Button--hideLabel ButtonBar-button Box-root Flex-inlineFlex"
                                                                                    style="background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0.12) 0px 1px 1px 0px, rgba(60, 66, 87, 0.16) 0px 0px 0px 1px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(60, 66, 87, 0.08) 0px 2px 5px 0px;">
                                                                                    <div
                                                                                        class="PressableCore-base Box-root">
                                                                                        <button
                                                                                            class="UnstyledLink Button-element PressableContext Padding-horizontal--8 Padding-vertical--4 PressableContext--cursor--pointer PressableContext--display--inlineFlex PressableContext--fontLineHeight--16 PressableContext--fontSize--13 PressableContext--fontWeight--medium PressableContext--height PressableContext--height--small PressableContext--radius--left PressableContext--width PressableContext--width--auto"
                                                                                            type="button"
                                                                                            style="color: rgb(60, 66, 87);">
                                                                                            <div class="Button-align Box-root Flex-flex Flex-alignItems--baseline Flex-direction--row"
                                                                                                style="position: relative;">
                                                                                                <div class="TextAligner Box-root"
                                                                                                    style="line-height: 16px; font-size: 13px; flex: 0 0 auto;">
                                                                                                </div>
                                                                                                <div class="Box-root Flex-flex Flex-alignItems--baseline Flex-direction--row Flex-justifyContent--center"
                                                                                                    style="width: 100%; line-height: 0; flex: 1 1 auto;">
                                                                                                    <div
                                                                                                        class="Box-root Padding-horizontal--2">
                                                                                                        <div aria-hidden="true"
                                                                                                            class="SVGInline SVGInline--cleaned SVG Icon Icon--arrowDown Button-icon Icon-color Icon-color--gray600 Box-root Flex-flex"
                                                                                                            style="margin-top: -1.64px; transform: translateY(1.45px);">
                                                                                                            <svg aria-hidden="true"
                                                                                                                class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--arrowDown-svg Button-icon-svg Icon-color-svg Icon-color--gray600-svg"
                                                                                                                height="12"
                                                                                                                width="12"
                                                                                                                viewBox="0 0 16 16"
                                                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                                                <path
                                                                                                                    d="M9 12.583l4.591-4.591a1 1 0 0 1 1.416 1.415l-6.3 6.3a1 1 0 0 1-1.414 0l-6.3-6.3A1 1 0 0 1 2.41 7.992L7 12.583V1a1 1 0 1 1 2 0z"
                                                                                                                    fill-rule="evenodd">
                                                                                                                </path>
                                                                                                            </svg>
                                                                                                        </div>
                                                                                                    </div><span
                                                                                                        class="Button-label Text-color--default Text-fontSize--13 Text-fontWeight--medium Text-lineHeight--16 Text-numericSpacing--proportional Text-typeface--base Text--visuallyHidden Text-wrap--noWrap Text-display--block"
                                                                                                        style="margin-top: -1px;"><span>Download
                                                                                                            PDF</span></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div
                                                                                        class="PressableCore-overlay PressableCore-overlay--extendBy1 Box-root Box-background--white">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ButtonBar-item ButtonBar-item--isLast">
                                                                        <div class="Box-root Flex-flex">
                                                                            <div class="Box-root Flex-flex">
                                                                                <div class="PressableCore PressableCore--cursor--pointer PressableCore--height--small PressableCore--radius--right PressableCore--width PressableCore--width--auto PressableButton Button Button--color--white Button--hideLabel ButtonBar-button OverflowMenu Box-root Flex-inlineFlex"
                                                                                    style="background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0.12) 0px 1px 1px 0px, rgba(60, 66, 87, 0.16) 0px 0px 0px 1px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(60, 66, 87, 0.08) 0px 2px 5px 0px;">
                                                                                    <div
                                                                                        class="PressableCore-base Box-root">
                                                                                        <button aria-controls="menu436"
                                                                                            aria-haspopup="menu"
                                                                                            id="menu436-button"
                                                                                            class="UnstyledLink Button-element PressableContext Padding-horizontal--8 Padding-vertical--4 PressableContext--cursor--pointer PressableContext--display--inlineFlex PressableContext--fontLineHeight--16 PressableContext--fontSize--13 PressableContext--fontWeight--medium PressableContext--height PressableContext--height--small PressableContext--radius--right PressableContext--width PressableContext--width--auto"
                                                                                            type="button"
                                                                                            style="color: rgb(60, 66, 87);">
                                                                                            <div class="Button-align Box-root Flex-flex Flex-alignItems--baseline Flex-direction--row"
                                                                                                style="position: relative;">
                                                                                                <div class="TextAligner Box-root"
                                                                                                    style="line-height: 16px; font-size: 13px; flex: 0 0 auto;">
                                                                                                </div>
                                                                                                <div class="Box-root Flex-flex Flex-alignItems--baseline Flex-direction--row Flex-justifyContent--center"
                                                                                                    style="width: 100%; line-height: 0; flex: 1 1 auto;">
                                                                                                    <div
                                                                                                        class="Box-root Padding-horizontal--2">
                                                                                                        <div aria-hidden="true"
                                                                                                            class="SVGInline SVGInline--cleaned SVG Icon Icon--more Button-icon Icon-color Icon-color--gray600 Box-root Flex-flex"
                                                                                                            style="margin-top: -1.64px; transform: translateY(1.45px);">
                                                                                                            <svg aria-hidden="true"
                                                                                                                class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--more-svg Button-icon-svg Icon-color-svg Icon-color--gray600-svg"
                                                                                                                height="12"
                                                                                                                width="12"
                                                                                                                viewBox="0 0 16 16"
                                                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                                                <path
                                                                                                                    d="M2 10a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm6 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm6 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"
                                                                                                                    fill-rule="evenodd">
                                                                                                                </path>
                                                                                                            </svg>
                                                                                                        </div>
                                                                                                    </div><span
                                                                                                        class="Button-label Text-color--default Text-fontSize--13 Text-fontWeight--medium Text-lineHeight--16 Text-numericSpacing--proportional Text-typeface--base Text--visuallyHidden Text-wrap--noWrap Text-display--block"
                                                                                                        style="margin-top: -1px;">More
                                                                                                        options</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div
                                                                                        class="PressableCore-overlay PressableCore-overlay--extendBy1 Box-root Box-background--white">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div
                                    class="Box-root Padding-horizontal--0 Padding-vertical--16 Flex-flex Flex-alignItems--center Flex-justifyContent--spaceBetween">
                                    <div><span
                                            class="Text-color--default Text-fontSize--14 Text-fontWeight--regular Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--base Text-wrap--wrap Text-display--inline"><span><span>About
                                                    <strong id="invoiceCount">{{$count}}</strong> results</span></span></span></div>
                                    <div>
                                        <div class="Box-root" style="pointer-events: none;">
                                            <div class="Box-root Flex-flex Flex-direction--row Flex-justifyContent--flexStart Flex-wrap--nowrap"
                                                style="margin-left: -8px; margin-top: -8px;">
                                                <div class="Box-root Box-hideIfEmpty Margin-top--8 Margin-left--8"
                                                    style="pointer-events: auto;">
                                                    <div class="PressableCore PressableCore--height--medium PressableCore--radius--all PressableCore--width PressableCore--width--auto PressableButton Button Button--color--white Is--disabled Box-root Flex-inlineFlex"
                                                        style="background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0.12) 0px 1px 1px 0px, rgba(60, 66, 87, 0.16) 0px 0px 0px 1px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(60, 66, 87, 0.08) 0px 2px 5px 0px;">
                                                        <div class="PressableCore-base Box-root">
                                                            <button
                                                                class="UnstyledLink Button-element PressableContext Padding-horizontal--8 Padding-vertical--4 PressableContext--display--inlineFlex PressableContext--fontLineHeight--20 PressableContext--fontSize--14 PressableContext--fontWeight--medium PressableContext--height PressableContext--height--medium PressableContext--radius--all PressableContext--width PressableContext--width--auto"
                                                                 type="button"
                                                                style="color: rgb(60, 66, 87);cursor:pointer"  id="previousPage">
                                                                <div class="Button-align Box-root Flex-flex Flex-alignItems--baseline Flex-direction--row"
                                                                    style="position: relative;">
                                                                    <div class="TextAligner Box-root"
                                                                        style="line-height: 20px; font-size: 14px; flex: 0 0 auto;">
                                                                    </div>
                                                                    <div class="Box-root Flex-flex Flex-alignItems--baseline Flex-direction--row Flex-justifyContent--center"
                                                                        style="width: 100%; line-height: 0; flex: 1 1 auto;">
                                                                        <span
                                                                            class="Button-label Text-color--default Text-fontSize--14 Text-fontWeight--medium Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--base Text-wrap--noWrap Text-display--block"
                                                                            style="margin-top: -1px;"><span>Previous</span></span>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </div>
                                                        @if($isbefore)
                                                            <div class="PressableCore-overlay PressableCore-overlay--extendBy1 Box-root Box-background--white" data-button="previous"></div>
                                                        @else
                                                            <div class="PressableCore-overlay PressableCore-overlay--isVisible PressableCore-overlay--extendBy1 Box-root Box-background--white" data-button="previous"></div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="Box-root Box-hideIfEmpty Margin-top--8 Margin-left--8"
                                                    style="pointer-events: auto;">
                                                    <div class="PressableCore PressableCore--cursor--pointer PressableCore--height--medium PressableCore--radius--all PressableCore--width PressableCore--width--auto PressableButton Button Button--color--white Box-root Flex-inlineFlex"
                                                        style="background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0.12) 0px 1px 1px 0px, rgba(60, 66, 87, 0.16) 0px 0px 0px 1px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(60, 66, 87, 0.08) 0px 2px 5px 0px;">
                                                        <div class="PressableCore-base Box-root">
                                                            <button
                                                                class="UnstyledLink Button-element PressableContext Padding-horizontal--8 Padding-vertical--4 PressableContext--display--inlineFlex PressableContext--fontLineHeight--20 PressableContext--fontSize--14 PressableContext--fontWeight--medium PressableContext--height PressableContext--height--medium PressableContext--radius--all PressableContext--width PressableContext--width--auto"
                                                                  type="button"
                                                                style="color: rgb(60, 66, 87);cursor:pointer" id="nextPage">
                                                                <div class="Button-align Box-root Flex-flex Flex-alignItems--baseline Flex-direction--row"
                                                                    style="position: relative;">
                                                                    <div class="TextAligner Box-root"
                                                                        style="line-height: 20px; font-size: 14px; flex: 0 0 auto;">
                                                                    </div>
                                                                    <div class="Box-root Flex-flex Flex-alignItems--baseline Flex-direction--row Flex-justifyContent--center"
                                                                        style="width: 100%; line-height: 0; flex: 1 1 auto;">
                                                                        <span
                                                                            class="Button-label Text-color--default Text-fontSize--14 Text-fontWeight--medium Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--base Text-wrap--noWrap Text-display--block"
                                                                            style="margin-top: -1px;"><span>Next</span></span>
                                                                    </div>
                                                                </div>
                                                            </button>
                                                        </div>
                                                        @if($isafter)
                                                            <div class="PressableCore-overlay PressableCore-overlay--extendBy1 Box-root Box-background--white" data-button="next"></div>
                                                        @else
                                                            <div class="PressableCore-overlay PressableCore-overlay--isVisible PressableCore-overlay--extendBy1 Box-root Box-background--white" data-button="next"></div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@if($invoices)
<input id="afterInvoice" type="hidden"  value="{{$invoices[count($invoices) - 1]->id}}">
@else
<input id="afterInvoice" type="hidden" >
@endif
<input id="beforeInvoice" type="hidden"  value="">
<script>
    $(document).ready(function() {
        console.log('document ready');
    });
    $("#nextPage").click(function(e) {
        console.log('Next Button clicked');
        var className = $(".PressableCore-overlay[data-button = 'next']").attr('class');
        if(className.indexOf('PressableCore-overlay--isVisible') >= 0 ) {
            return;
        }
        console.log('Button Enabled');
        var csrftoken  ='{{ csrf_token() }}';
        var baseurl = '<?php echo url('/'); ?>';
        var after = $("#afterInvoice").val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': csrftoken
            },
            type:'POST',
            url:baseurl+'/getNextInvoices',
            data: {
                'after' : after,
            },
            beforeSend: function() {
                $("#invoiceTable").html('');
            },
            success:function(data){
                console.log(data.invoices);
                if(!data.isbefore) {
                    $(".PressableCore-overlay[data-button = 'previous']").removeClass('PressableCore-overlay--isVisible');
                    $(".PressableCore-overlay[data-button = 'previous']").addClass('PressableCore-overlay--isVisible');
                } else {
                    $(".PressableCore-overlay[data-button = 'previous']").removeClass('PressableCore-overlay--isVisible');
                }
                if(!data.isafter) {
                    $(".PressableCore-overlay[data-button = 'next']").removeClass('PressableCore-overlay--isVisible');
                    $(".PressableCore-overlay[data-button = 'next']").addClass('PressableCore-overlay--isVisible');
                } else {
                    $(".PressableCore-overlay[data-button = 'next']").removeClass('PressableCore-overlay--isVisible');
                }
                $("#invoiceCount").html(data.invoices.length);
                $("#afterInvoice").val(data.invoices[data.invoices.length - 1].id);
                $("#beforeInvoice").val(data.invoices[0].id);

                for(i = 0 ;i < data.invoices.length; i++) {
                    if(!data.invoices[i].due_date) {data.invoices[i].due_date = '-';}
                    data.invoices[i].created = new Date(parseInt(data.invoices[i].created)).toUTCString();
                    $("#invoiceTable").append('<tr class="Table-row ListViewItem bs-ActionsParent BadgeParent IconParent ListViewItem--hasLink"><td class="Table-cell Table-cell--align--right Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell ListViewItem-text"  style="height: 1px;"><a class="UnstyledLink ListViewItem-link" href="/test/invoices/in_1HtHZDHycXXIvcX8797smfEE"> <div class="ListViewItem-cellContent Box-root Padding-all--8"><span  class="ListViewItem-text Text-color--dark Text-fontSize--14 Text-fontWeight--medium Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--base Text-wrap--wrap Text-display--inline"><span>$'+parseInt(data.invoices[i].total) / 100+'</span></span>  </div> </a></td> <td class="Table-cell Table-cell--align--left Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell" style="height: 1px;"><a class="UnstyledLink ListViewItem-link" href="/test/invoices/in_1HtHZDHycXXIvcX8797smfEE"> <div class="ListViewItem-cellContent Box-root Padding-all--8"><span  class="ListViewItem-text Text-color--gray Text-fontSize--14 Text-fontWeight--regular Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--base Text-wrap--wrap Text-display--inline">'+data.invoices[i].currency.toUpperCase()+'</span> </div>  </a></td> <td class="Table-cell Table-cell--align--left Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell" style="height: 1px;"><a class="UnstyledLink ListViewItem-link"  href="/test/invoices/in_1HtHZDHycXXIvcX8797smfEE"> <div class="ListViewItem-cellContent Box-root Margin-top--4 Padding-all--8"> <span class="ListViewItem-text Text-color--gray Text-numericSpacing--proportional Text-typeface--base Text-wrap--wrap Text-display--inline"> <div class="Box-root Flex-flex"> <div class="Box-root Flex-flex"> <div aria-hidden="true"   class="SVGInline SVGInline--cleaned SVG Icon Icon--change Icon-color Icon-color--inherit Box-root Flex-flex"> <svg aria-hidden="true"   class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--change-svg Icon-color-svg Icon-color--inherit-svg"  height="12" width="12" viewBox="0 0 16 16"  xmlns="http://www.w3.org/2000/svg"> <path  d="M4.986 13.201V10.41a1 1 0 1 1 2 0V15a.998.998 0 0 1-1 1.001H1.4a1 1 0 0 1 0-2.002h1.29A8.003 8.003 0 0 1 0 8.008 8 8 0 0 1 5.716.327a1 1 0 1 1 .568 1.92A5.998 5.998 0 0 0 2 8.008 6.005 6.005 0 0 0 4.986 13.2zM11.014 2.8V5.59a1 1 0 1 1-2 0V1a.998.998 0 0 1 1-1.001H14.6a1 1 0 0 1 0 2.002h-1.29A8.003 8.003 0 0 1 16 7.992a8 8 0 0 1-5.716 7.68 1 1 0 1 1-.567-1.92A5.998 5.998 0 0 0 14 7.992 6.005 6.005 0 0 0 11.014 2.8z">   </path>   </svg>  </div>  </div>   </div>  </span>  </div>  </a></td> <td class="Table-cell Table-cell--align--left Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell"   style="height: 1px;"><a class="UnstyledLink ListViewItem-link" href="/test/invoices/in_1HtHZDHycXXIvcX8797smfEE">  <div class="ListViewItem-cellContent Box-root Padding-all--8">   <div  class="Badge Badge--variant--status Box-root Box-background--green100 Flex-inlineFlex Flex-alignItems--center Flex-direction--row"> <span  class="Badge-text Text-color--green600 Text-fontSize--12 Text-fontWeight--medium Text-lineHeight--16 Text-numericSpacing--proportional Text-typeface--base Text-wrap--noWrap Text-display--inline"><span>'+data.invoices[i].status+'</span></span> </div> </div> </a></td><td class="Table-cell Table-cell--align--left Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell ListViewItem-cell--truncate" style="height: 1px;"><a class="UnstyledLink ListViewItem-link"  href="/test/invoices/in_1HtHZDHycXXIvcX8797smfEE"><div class="ListViewItem-cellContent Box-root Padding-all--8"><span class="ListViewItem-text Text-color--default Text-fontSize--14 Text-fontWeight--regular Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--base Text-wrap--wrap Text-display--inline"><span class="Text-color--inherit Text-fontSize--13 Text-fontWeight--regular Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--mono Text-wrap--noWrap Text-display--inline">'+data.invoices[i].number+'</span></span> </div> </a></td>  <td class="Table-cell Table-cell--align--left Table-cell--verticalAlign--top Table-cell--width--auto Table-cell--wrap--noWrap ListViewItem-cell"  style="height: 1px;"><a class="UnstyledLink ListViewItem-link"  href="/test/invoices/in_1HtHZDHycXXIvcX8797smfEE"> <div class="ListViewItem-cellContent Box-root Padding-all--8"><span class="ListViewItem-text Text-color--default Text-fontSize--14 Text-fontWeight--regular Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--base Text-wrap--wrap Text-display--inline">'+data.invoices[i].customer_email+'</span> </div>  </a></td>  <td aria-hidden="true"  class="Table-cell Table-cell--align--left Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell"   style="height: 1px;"><a class="UnstyledLink ListViewItem-link" href="/test/invoices/in_1HtHZDHycXXIvcX8797smfEE"> <div class="ListViewItem-cellContent Box-root Padding-all--8"><span class="ListViewItem-text Text-color--disabled Text-fontSize--14 Text-fontWeight--regular Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--base Text-wrap--wrap Text-display--inline">'+data.invoices[i].due_date+'</span> </div> </a></td> <td class="Table-cell Table-cell--align--left Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell" style="height: 1px;"><a class="UnstyledLink ListViewItem-link" href="/test/invoices/in_1HtHZDHycXXIvcX8797smfEE"> <div class="ListViewItem-cellContent Box-root Padding-all--8"><span class="ListViewItem-text Text-color--default Text-fontSize--14 Text-fontWeight--regular Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--base Text-wrap--wrap Text-display--inline"><span>'+data.invoices[i].created+'</span></span></div> </a></td> <td class="Table-cell Table-cell--align--right Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell" style="height: 1px;"> <div class="ListViewItem-cellContent Box-root Padding-all--8"> <div style="margin-top: -2px; margin-bottom: -2px;">  <div class="db-QuickActionsMenu ListViewItem-actions Box-root Flex-flex Flex-justifyContent--flexEnd"> <div class="PressableCore PressableCore--cursor--pointer PressableCore--height--small PressableCore--radius--all PressableCore--width PressableCore--width--auto PressableButton Button Button--color--white Button--hideLabel db-QuickActionsMenu-placeholder Box-root Flex-inlineFlex" style="box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px;"> <div class="PressableCore-base Box-root"><button aria-hidden="true" class="UnstyledLink Button-element PressableContext Padding-horizontal--8 Padding-vertical--4 PressableContext--cursor--pointer PressableContext--display--inlineFlex PressableContext--fontLineHeight--16 PressableContext--fontSize--13 PressableContext--fontWeight--medium PressableContext--height PressableContext--height--small PressableContext--radius--all PressableContext--width PressableContext--width--auto" type="button" style="color: rgb(60, 66, 87);"> <div class="Button-align Box-root Flex-flex Flex-alignItems--baseline Flex-direction--row" style="position: relative;">  <div class="TextAligner Box-root" style="line-height: 16px; font-size: 13px; flex: 0 0 auto;"> </div> <div class="Box-root Flex-flex Flex-alignItems--baseline Flex-direction--row Flex-justifyContent--center" style="width: 100%; line-height: 0; flex: 1 1 auto;"> <div class="Box-root Padding-horizontal--2"> <div aria-hidden="true" class="SVGInline SVGInline--cleaned SVG Icon Icon--more Button-icon Icon-color Icon-color--gray600 Box-root Flex-flex"  style="margin-top: -1.64px; transform: translateY(1.45px);"> <svg aria-hidden="true" class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--more-svg Button-icon-svg Icon-color-svg Icon-color--gray600-svg" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"> <path d="M2 10a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm6 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm6 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"  fill-rule="evenodd"> </path> </svg> </div> </div><span class="Button-label Text-color--default Text-fontSize--13 Text-fontWeight--medium Text-lineHeight--16 Text-numericSpacing--proportional Text-typeface--base Text--visuallyHidden Text-wrap--noWrap Text-display--block" style="margin-top: -1px;"><span>More options</span></span> </div> </div>  </button></div>  <div class="PressableCore-overlay PressableCore-overlay--extendBy1 Box-root Box-background--white"> </div> </div> <div class="db-QuickActionsMenu-innerbox Box-root"> <div class="ButtonBar Box-root Flex-flex"> <div class="ButtonBar-item ButtonBar-item--isFirst">  <div class="Box-root Flex-flex"> <div class="Box-root Flex-flex">  <div class="PressableCore PressableCore--cursor--pointer PressableCore--height--small PressableCore--radius--left PressableCore--width PressableCore--width--auto PressableButton Button Button--color--white Button--hideLabel ButtonBar-button Box-root Flex-inlineFlex"  style="background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0.12) 0px 1px 1px 0px, rgba(60, 66, 87, 0.16) 0px 0px 0px 1px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(60, 66, 87, 0.08) 0px 2px 5px 0px;"> <div class="PressableCore-base Box-root">  <button  class="UnstyledLink Button-element PressableContext Padding-horizontal--8 Padding-vertical--4 PressableContext--cursor--pointer PressableContext--display--inlineFlex PressableContext--fontLineHeight--16 PressableContext--fontSize--13 PressableContext--fontWeight--medium PressableContext--height PressableContext--height--small PressableContext--radius--left PressableContext--width PressableContext--width--auto" type="button" style="color: rgb(60, 66, 87);"> <div class="Button-align Box-root Flex-flex Flex-alignItems--baseline Flex-direction--row"  style="position: relative;"> <div class="TextAligner Box-root"    style="line-height: 16px; font-size: 13px; flex: 0 0 auto;"> </div>  <div class="Box-root Flex-flex Flex-alignItems--baseline Flex-direction--row Flex-justifyContent--center"   style="width: 100%; line-height: 0; flex: 1 1 auto;">  <div  class="Box-root Padding-horizontal--2"> <div aria-hidden="true"   class="SVGInline SVGInline--cleaned SVG Icon Icon--arrowDown Button-icon Icon-color Icon-color--gray600 Box-root Flex-flex"  style="margin-top: -1.64px; transform: translateY(1.45px);"> <svg aria-hidden="true"  class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--arrowDown-svg Button-icon-svg Icon-color-svg Icon-color--gray600-svg" height="12"  width="12" viewBox="0 0 16 16"  xmlns="http://www.w3.org/2000/svg">  <path d="M9 12.583l4.591-4.591a1 1 0 0 1 1.416 1.415l-6.3 6.3a1 1 0 0 1-1.414 0l-6.3-6.3A1 1 0 0 1 2.41 7.992L7 12.583V1a1 1 0 1 1 2 0z"   fill-rule="evenodd"> </path>  </svg> </div> </div><span class="Button-label Text-color--default Text-fontSize--13 Text-fontWeight--medium Text-lineHeight--16 Text-numericSpacing--proportional Text-typeface--base Text--visuallyHidden Text-wrap--noWrap Text-display--block"   style="margin-top: -1px;"><span>Download PDF</span></span>  </div>  </div> </button>  </div> <div class="PressableCore-overlay PressableCore-overlay--extendBy1 Box-root Box-background--white"> </div> </div>  </div>  </div>  </div> <div class="ButtonBar-item ButtonBar-item--isLast"> <div class="Box-root Flex-flex"> <div class="Box-root Flex-flex"> <div class="PressableCore PressableCore--cursor--pointer PressableCore--height--small PressableCore--radius--right PressableCore--width PressableCore--width--auto PressableButton Button Button--color--white Button--hideLabel ButtonBar-button OverflowMenu Box-root Flex-inlineFlex" style="background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0.12) 0px 1px 1px 0px, rgba(60, 66, 87, 0.16) 0px 0px 0px 1px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(60, 66, 87, 0.08) 0px 2px 5px 0px;"> <div class="PressableCore-base Box-root"> <button aria-controls="menu436"  aria-haspopup="menu" id="menu436-button" class="UnstyledLink Button-element PressableContext Padding-horizontal--8 Padding-vertical--4 PressableContext--cursor--pointer PressableContext--display--inlineFlex PressableContext--fontLineHeight--16 PressableContext--fontSize--13 PressableContext--fontWeight--medium PressableContext--height PressableContext--height--small PressableContext--radius--right PressableContext--width PressableContext--width--auto" type="button" style="color: rgb(60, 66, 87);"> <div class="Button-align Box-root Flex-flex Flex-alignItems--baseline Flex-direction--row" style="position: relative;"> <div class="TextAligner Box-root" style="line-height: 16px; font-size: 13px; flex: 0 0 auto;"> </div> <div class="Box-root Flex-flex Flex-alignItems--baseline Flex-direction--row Flex-justifyContent--center" style="width: 100%; line-height: 0; flex: 1 1 auto;">  <div class="Box-root Padding-horizontal--2"> <div aria-hidden="true" class="SVGInline SVGInline--cleaned SVG Icon Icon--more  <svg aria-hidden="true" class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--more-svg Button-icon-svg Icon-color-svg Icon-color--gray600-svg" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"> <path d="M2 10a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm6 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm6 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" fill-rule="evenodd"> </path> </svg> </div> </div><span class="Button-label Text-color--default Text-fontSize--13 Text-fontWeight--medium Text-lineHeight--16 Text-numericSpacing--proportional Text-typeface--base Text--visuallyHidden Text-wrap--noWrap Text-display--block" style="margin-top: -1px;">More options</span> </div> </div> </button> </div> <div class="PressableCore-overlay PressableCore-overlay--extendBy1 Box-root Box-background--white"> </div> </div> </div> </div> </div> </div> </div> </div> </div>  </div> </td> </tr> ');
                }
            }
        });
    });
    $("#previousPage").click(function(e) {
        console.log('Previous Button clicked');
        var className = $(".PressableCore-overlay[data-button = 'previous']").attr('class');
        if(className.indexOf('PressableCore-overlay--isVisible') >= 0 ) {
            return;
        }
        console.log('Button Enabled');
        var csrftoken  ='{{ csrf_token() }}';
        var baseurl = '<?php echo url('/'); ?>';
        var before = $("#beforeInvoice").val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': csrftoken
            },
            type:'POST',
            url:baseurl+'/getPreviousInvoices',
            data: {
                'before' : before,
            },
            beforeSend: function() {
                $("#invoiceTable").html('');
            },
            success:function(data){
                console.log(data.invoices);
                if(!data.isbefore) {
                    $(".PressableCore-overlay[data-button = 'previous']").removeClass('PressableCore-overlay--isVisible');
                    $(".PressableCore-overlay[data-button = 'previous']").addClass('PressableCore-overlay--isVisible');
                } else {
                    $(".PressableCore-overlay[data-button = 'previous']").removeClass('PressableCore-overlay--isVisible');
                }
                if(!data.isafter) {
                    $(".PressableCore-overlay[data-button = 'next']").removeClass('PressableCore-overlay--isVisible');
                    $(".PressableCore-overlay[data-button = 'next']").addClass('PressableCore-overlay--isVisible');
                } else {
                    $(".PressableCore-overlay[data-button = 'next']").removeClass('PressableCore-overlay--isVisible');
                }
                $("#invoiceCount").html(data.invoices.length);
                $("#afterInvoice").val(data.invoices[data.invoices.length - 1].id);
                $("#beforeInvoice").val(data.invoices[0].id);
                for(i = 0 ;i < data.invoices.length; i++) {
                    if(!data.invoices[i].due_date) {data.invoices[i].due_date = '-';}
                    data.invoices[i].created = new Date(parseInt(data.invoices[i].created)).toUTCString();
                    $("#invoiceTable").append('<tr class="Table-row ListViewItem bs-ActionsParent BadgeParent IconParent ListViewItem--hasLink"><td class="Table-cell Table-cell--align--right Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell ListViewItem-text"  style="height: 1px;"><a class="UnstyledLink ListViewItem-link" href="/test/invoices/in_1HtHZDHycXXIvcX8797smfEE"> <div class="ListViewItem-cellContent Box-root Padding-all--8"><span  class="ListViewItem-text Text-color--dark Text-fontSize--14 Text-fontWeight--medium Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--base Text-wrap--wrap Text-display--inline"><span>$'+parseInt(data.invoices[i].total) / 100+'</span></span>  </div> </a></td> <td class="Table-cell Table-cell--align--left Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell" style="height: 1px;"><a class="UnstyledLink ListViewItem-link" href="/test/invoices/in_1HtHZDHycXXIvcX8797smfEE"> <div class="ListViewItem-cellContent Box-root Padding-all--8"><span  class="ListViewItem-text Text-color--gray Text-fontSize--14 Text-fontWeight--regular Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--base Text-wrap--wrap Text-display--inline">'+data.invoices[i].currency.toUpperCase()+'</span> </div>  </a></td> <td class="Table-cell Table-cell--align--left Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell" style="height: 1px;"><a class="UnstyledLink ListViewItem-link"  href="/test/invoices/in_1HtHZDHycXXIvcX8797smfEE"> <div class="ListViewItem-cellContent Box-root Margin-top--4 Padding-all--8"> <span class="ListViewItem-text Text-color--gray Text-numericSpacing--proportional Text-typeface--base Text-wrap--wrap Text-display--inline"> <div class="Box-root Flex-flex"> <div class="Box-root Flex-flex"> <div aria-hidden="true"   class="SVGInline SVGInline--cleaned SVG Icon Icon--change Icon-color Icon-color--inherit Box-root Flex-flex"> <svg aria-hidden="true"   class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--change-svg Icon-color-svg Icon-color--inherit-svg"  height="12" width="12" viewBox="0 0 16 16"  xmlns="http://www.w3.org/2000/svg"> <path  d="M4.986 13.201V10.41a1 1 0 1 1 2 0V15a.998.998 0 0 1-1 1.001H1.4a1 1 0 0 1 0-2.002h1.29A8.003 8.003 0 0 1 0 8.008 8 8 0 0 1 5.716.327a1 1 0 1 1 .568 1.92A5.998 5.998 0 0 0 2 8.008 6.005 6.005 0 0 0 4.986 13.2zM11.014 2.8V5.59a1 1 0 1 1-2 0V1a.998.998 0 0 1 1-1.001H14.6a1 1 0 0 1 0 2.002h-1.29A8.003 8.003 0 0 1 16 7.992a8 8 0 0 1-5.716 7.68 1 1 0 1 1-.567-1.92A5.998 5.998 0 0 0 14 7.992 6.005 6.005 0 0 0 11.014 2.8z">   </path>   </svg>  </div>  </div>   </div>  </span>  </div>  </a></td> <td class="Table-cell Table-cell--align--left Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell"   style="height: 1px;"><a class="UnstyledLink ListViewItem-link" href="/test/invoices/in_1HtHZDHycXXIvcX8797smfEE">  <div class="ListViewItem-cellContent Box-root Padding-all--8">   <div  class="Badge Badge--variant--status Box-root Box-background--green100 Flex-inlineFlex Flex-alignItems--center Flex-direction--row"> <span  class="Badge-text Text-color--green600 Text-fontSize--12 Text-fontWeight--medium Text-lineHeight--16 Text-numericSpacing--proportional Text-typeface--base Text-wrap--noWrap Text-display--inline"><span>'+data.invoices[i].status+'</span></span> </div> </div> </a></td><td class="Table-cell Table-cell--align--left Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell ListViewItem-cell--truncate" style="height: 1px;"><a class="UnstyledLink ListViewItem-link"  href="/test/invoices/in_1HtHZDHycXXIvcX8797smfEE"><div class="ListViewItem-cellContent Box-root Padding-all--8"><span class="ListViewItem-text Text-color--default Text-fontSize--14 Text-fontWeight--regular Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--base Text-wrap--wrap Text-display--inline"><span class="Text-color--inherit Text-fontSize--13 Text-fontWeight--regular Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--mono Text-wrap--noWrap Text-display--inline">'+data.invoices[i].number+'</span></span> </div> </a></td>  <td class="Table-cell Table-cell--align--left Table-cell--verticalAlign--top Table-cell--width--auto Table-cell--wrap--noWrap ListViewItem-cell"  style="height: 1px;"><a class="UnstyledLink ListViewItem-link"  href="/test/invoices/in_1HtHZDHycXXIvcX8797smfEE"> <div class="ListViewItem-cellContent Box-root Padding-all--8"><span class="ListViewItem-text Text-color--default Text-fontSize--14 Text-fontWeight--regular Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--base Text-wrap--wrap Text-display--inline">'+data.invoices[i].customer_email+'</span> </div>  </a></td>  <td aria-hidden="true"  class="Table-cell Table-cell--align--left Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell"   style="height: 1px;"><a class="UnstyledLink ListViewItem-link" href="/test/invoices/in_1HtHZDHycXXIvcX8797smfEE"> <div class="ListViewItem-cellContent Box-root Padding-all--8"><span class="ListViewItem-text Text-color--disabled Text-fontSize--14 Text-fontWeight--regular Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--base Text-wrap--wrap Text-display--inline">'+data.invoices[i].due_date+'</span> </div> </a></td> <td class="Table-cell Table-cell--align--left Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell" style="height: 1px;"><a class="UnstyledLink ListViewItem-link" href="/test/invoices/in_1HtHZDHycXXIvcX8797smfEE"> <div class="ListViewItem-cellContent Box-root Padding-all--8"><span class="ListViewItem-text Text-color--default Text-fontSize--14 Text-fontWeight--regular Text-lineHeight--20 Text-numericSpacing--proportional Text-typeface--base Text-wrap--wrap Text-display--inline"><span>'+data.invoices[i].created+'</span></span></div> </a></td> <td class="Table-cell Table-cell--align--right Table-cell--verticalAlign--top Table-cell--width--minimized Table-cell--wrap--noWrap ListViewItem-cell" style="height: 1px;"> <div class="ListViewItem-cellContent Box-root Padding-all--8"> <div style="margin-top: -2px; margin-bottom: -2px;">  <div class="db-QuickActionsMenu ListViewItem-actions Box-root Flex-flex Flex-justifyContent--flexEnd"> <div class="PressableCore PressableCore--cursor--pointer PressableCore--height--small PressableCore--radius--all PressableCore--width PressableCore--width--auto PressableButton Button Button--color--white Button--hideLabel db-QuickActionsMenu-placeholder Box-root Flex-inlineFlex" style="box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px;"> <div class="PressableCore-base Box-root"><button aria-hidden="true" class="UnstyledLink Button-element PressableContext Padding-horizontal--8 Padding-vertical--4 PressableContext--cursor--pointer PressableContext--display--inlineFlex PressableContext--fontLineHeight--16 PressableContext--fontSize--13 PressableContext--fontWeight--medium PressableContext--height PressableContext--height--small PressableContext--radius--all PressableContext--width PressableContext--width--auto" type="button" style="color: rgb(60, 66, 87);"> <div class="Button-align Box-root Flex-flex Flex-alignItems--baseline Flex-direction--row" style="position: relative;">  <div class="TextAligner Box-root" style="line-height: 16px; font-size: 13px; flex: 0 0 auto;"> </div> <div class="Box-root Flex-flex Flex-alignItems--baseline Flex-direction--row Flex-justifyContent--center" style="width: 100%; line-height: 0; flex: 1 1 auto;"> <div class="Box-root Padding-horizontal--2"> <div aria-hidden="true" class="SVGInline SVGInline--cleaned SVG Icon Icon--more Button-icon Icon-color Icon-color--gray600 Box-root Flex-flex"  style="margin-top: -1.64px; transform: translateY(1.45px);"> <svg aria-hidden="true" class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--more-svg Button-icon-svg Icon-color-svg Icon-color--gray600-svg" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"> <path d="M2 10a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm6 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm6 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"  fill-rule="evenodd"> </path> </svg> </div> </div><span class="Button-label Text-color--default Text-fontSize--13 Text-fontWeight--medium Text-lineHeight--16 Text-numericSpacing--proportional Text-typeface--base Text--visuallyHidden Text-wrap--noWrap Text-display--block" style="margin-top: -1px;"><span>More options</span></span> </div> </div>  </button></div>  <div class="PressableCore-overlay PressableCore-overlay--extendBy1 Box-root Box-background--white"> </div> </div> <div class="db-QuickActionsMenu-innerbox Box-root"> <div class="ButtonBar Box-root Flex-flex"> <div class="ButtonBar-item ButtonBar-item--isFirst">  <div class="Box-root Flex-flex"> <div class="Box-root Flex-flex">  <div class="PressableCore PressableCore--cursor--pointer PressableCore--height--small PressableCore--radius--left PressableCore--width PressableCore--width--auto PressableButton Button Button--color--white Button--hideLabel ButtonBar-button Box-root Flex-inlineFlex"  style="background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0.12) 0px 1px 1px 0px, rgba(60, 66, 87, 0.16) 0px 0px 0px 1px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(60, 66, 87, 0.08) 0px 2px 5px 0px;"> <div class="PressableCore-base Box-root">  <button  class="UnstyledLink Button-element PressableContext Padding-horizontal--8 Padding-vertical--4 PressableContext--cursor--pointer PressableContext--display--inlineFlex PressableContext--fontLineHeight--16 PressableContext--fontSize--13 PressableContext--fontWeight--medium PressableContext--height PressableContext--height--small PressableContext--radius--left PressableContext--width PressableContext--width--auto" type="button" style="color: rgb(60, 66, 87);"> <div class="Button-align Box-root Flex-flex Flex-alignItems--baseline Flex-direction--row"  style="position: relative;"> <div class="TextAligner Box-root"    style="line-height: 16px; font-size: 13px; flex: 0 0 auto;"> </div>  <div class="Box-root Flex-flex Flex-alignItems--baseline Flex-direction--row Flex-justifyContent--center"   style="width: 100%; line-height: 0; flex: 1 1 auto;">  <div  class="Box-root Padding-horizontal--2"> <div aria-hidden="true"   class="SVGInline SVGInline--cleaned SVG Icon Icon--arrowDown Button-icon Icon-color Icon-color--gray600 Box-root Flex-flex"  style="margin-top: -1.64px; transform: translateY(1.45px);"> <svg aria-hidden="true"  class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--arrowDown-svg Button-icon-svg Icon-color-svg Icon-color--gray600-svg" height="12"  width="12" viewBox="0 0 16 16"  xmlns="http://www.w3.org/2000/svg">  <path d="M9 12.583l4.591-4.591a1 1 0 0 1 1.416 1.415l-6.3 6.3a1 1 0 0 1-1.414 0l-6.3-6.3A1 1 0 0 1 2.41 7.992L7 12.583V1a1 1 0 1 1 2 0z"   fill-rule="evenodd"> </path>  </svg> </div> </div><span class="Button-label Text-color--default Text-fontSize--13 Text-fontWeight--medium Text-lineHeight--16 Text-numericSpacing--proportional Text-typeface--base Text--visuallyHidden Text-wrap--noWrap Text-display--block"   style="margin-top: -1px;"><span>Download PDF</span></span>  </div>  </div> </button>  </div> <div class="PressableCore-overlay PressableCore-overlay--extendBy1 Box-root Box-background--white"> </div> </div>  </div>  </div>  </div> <div class="ButtonBar-item ButtonBar-item--isLast"> <div class="Box-root Flex-flex"> <div class="Box-root Flex-flex"> <div class="PressableCore PressableCore--cursor--pointer PressableCore--height--small PressableCore--radius--right PressableCore--width PressableCore--width--auto PressableButton Button Button--color--white Button--hideLabel ButtonBar-button OverflowMenu Box-root Flex-inlineFlex" style="background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0.12) 0px 1px 1px 0px, rgba(60, 66, 87, 0.16) 0px 0px 0px 1px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(0, 0, 0, 0) 0px 0px 0px 0px, rgba(60, 66, 87, 0.08) 0px 2px 5px 0px;"> <div class="PressableCore-base Box-root"> <button aria-controls="menu436"  aria-haspopup="menu" id="menu436-button" class="UnstyledLink Button-element PressableContext Padding-horizontal--8 Padding-vertical--4 PressableContext--cursor--pointer PressableContext--display--inlineFlex PressableContext--fontLineHeight--16 PressableContext--fontSize--13 PressableContext--fontWeight--medium PressableContext--height PressableContext--height--small PressableContext--radius--right PressableContext--width PressableContext--width--auto" type="button" style="color: rgb(60, 66, 87);"> <div class="Button-align Box-root Flex-flex Flex-alignItems--baseline Flex-direction--row" style="position: relative;"> <div class="TextAligner Box-root" style="line-height: 16px; font-size: 13px; flex: 0 0 auto;"> </div> <div class="Box-root Flex-flex Flex-alignItems--baseline Flex-direction--row Flex-justifyContent--center" style="width: 100%; line-height: 0; flex: 1 1 auto;">  <div class="Box-root Padding-horizontal--2"> <div aria-hidden="true" class="SVGInline SVGInline--cleaned SVG Icon Icon--more  <svg aria-hidden="true" class="SVGInline-svg SVGInline--cleaned-svg SVG-svg Icon-svg Icon--more-svg Button-icon-svg Icon-color-svg Icon-color--gray600-svg" height="12" width="12" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"> <path d="M2 10a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm6 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm6 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" fill-rule="evenodd"> </path> </svg> </div> </div><span class="Button-label Text-color--default Text-fontSize--13 Text-fontWeight--medium Text-lineHeight--16 Text-numericSpacing--proportional Text-typeface--base Text--visuallyHidden Text-wrap--noWrap Text-display--block" style="margin-top: -1px;">More options</span> </div> </div> </button> </div> <div class="PressableCore-overlay PressableCore-overlay--extendBy1 Box-root Box-background--white"> </div> </div> </div> </div> </div> </div> </div> </div> </div>  </div> </td> </tr> ');
                }
            }
        });
    });
</script>
