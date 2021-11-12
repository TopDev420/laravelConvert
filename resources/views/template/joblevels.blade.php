@include('new_header')
<div class="jmbtrn jmbtrn-regular jmbtrn-regular-bg">
        <div class="container jmbtrn-container">
            <div class="jmbtrn-inner">
                <div class="row">
                    <div class="col-md-6 gap-bottom-tld">
                        <h1 class="jmbtrn-title">Email Lists By Job<br /> Levels</h1>
                        <div class="breadbrumb">
                            <a href="/" class="breadbrumb-item">Home</a>
                            <span class="breadbrumb-item">Ready-Made List by Job Levels</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p>Do you know what the most important part of a B2B marketing campaign is? It's finding
                            accurate contact information for people who have the power to make decisions. Don't waste
                            time being diverted and misdirected; cut through that red tape!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content pad-bottom-medium">
        <div class="container regular-page-content regular-page-content-pull-top">
            <div class="box box-ready-made">
                <div class="row">
                    <div class="col-md-6 col-lg-7 gap-bottom-small-tpnd">
                        <h2 class="secondary-title clear-gap-vertical font-medium">
                            Business Contacts
                        </h2>
                        <span>You can select a ready-made list from below or create your own list.</span>
                    </div>
                    <div class="col-md-6 col-lg-5">
                        <a class="button button-septenary button-small text-uppercase gap-bottom-small-tld full-width"
                            href="{{url('tool/business')}}">
                            Build your own business contacts list
                        </a>
                    </div>
                </div>
            </div>
            <div class="premade-lists gap-bottom-small">
                @if(!empty($query))
                @foreach($query as $levels)
                <?php  $lname = strtolower($levels->name) ?>
                <a href="<?Php echo url("/email-list-database/{$levels->slug}") ?>" class="premade-lists-item">
                    <div class="premade-lists-item-row">
                        <div class="premade-lists-item-col">
                            <h2 class="premade-lists-item-title h4">
                                {{$levels->name}}
                            </h2>
                            <span class="text-primary"></span>
                        </div>
                        <div class="premade-lists-item-col gap-bottom-small-tpd">
                            <span class="premade-lists-item-contact-title h6">
                                {{$levels->count}}
                            </span>
                            <small>Contacts</small>
                        </div>
                        <div class="premade-lists-item-col">
                            {{$levels->list_text}}
                        </div>
                        <div class="premade-lists-item-col text-right">
                            <span class="premade-lists-item-price">
                                $ {{$levels->price}}
                            </span>
                        </div>
                    </div>
                </a>
                @endforeach
                @endif
            </div>
        </div>


    </div>
    <hr class="hr-line">
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="list">
                        <li class="iconic-content gap-bottom">
                            <div class="iconic-content-icon-area">
                                <img src="images/offer/Affordable.jpg" alt="">
                            </div>
                            <div class="iconic-content-content">
                                <h3 class="iconic-content-title">Affordable Pricing</h3>
                                <p>Quality email lists enable businesses to make B2B connections for an amazingly low
                                    price.</p>
                            </div>
                        </li>
                        <li class="iconic-content gap-bottom">
                            <div class="iconic-content-icon-area">
                                <img src="images/offer/search-icon.jpg" alt="">
                            </div>
                            <div class="iconic-content-content">
                                <h3 class="iconic-content-title">Search, Order, Download!</h3>
                                <p>Within minutes, you can download a database of contacts and start connecting with
                                    your audience.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list">
                        <li class="iconic-content gap-bottom">
                            <div class="iconic-content-icon-area">
                                <img src="images/offer/mail-icon.jpg" alt="">
                            </div>
                            <div class="iconic-content-content">
                                <h3 class="iconic-content-title">Unmatched Accuracy</h3>
                                <p>Both automated and manual processes ensure the accuracy of our human-verified lists.
                                </p>
                            </div>
                        </li>
                        <li class="iconic-content gap-bottom">
                            <div class="iconic-content-icon-area">
                                <img src="images/offer/crm-icon.jpg" alt="">
                            </div>
                            <div class="iconic-content-content">
                                <h3 class="iconic-content-title">CRM-Ready Files</h3>
                                <p>Download your list as a .csv file, integrate it into your CRM, and start networking.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="bg-concrete pad-vertical">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h5 class="text-uppercase">Email Lists</h5>
                    <ul class="list text-capitalize">
                        <li><a href="">European Mailing List</a></li>
                        <li><a href="">Physicians Mailing List</a></li>
                        <li><a href="">Architect Mailing List</a></li>
                        <li><a href="">Cpa Mailing List</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="text-uppercase">blocks by Job Function</h5>
                    <ul class="list text-capitalize">
                        <li><a href="">It Managers Contact List</a></li>
                        <li><a href="">Purchasing Mailing List</a></li>
                        <li><a href="">Human Resources Email List</a></li>
                        <li><a href="">Insurance Agents Mailing List</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="text-uppercase">Industry Contact Emails</h5>
                    <ul class="list text-capitalize">
                        <li><a href="">Pharmaceutical Mailing List</a></li>
                        <li><a href="">Hotels Mailing List</a></li>
                        <li><a href="">Oil Gas Mailing List</a></li>
                        <li><a href="">Wholesale Mailing List</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="text-uppercase">Healthcare Contact Lists</h5>
                    <ul class="list text-capitalize">
                        <li><a href="">Nurses Email Database</a></li>
                        <li><a href="">Chiropractors Email List</a></li>
                        <li><a href="">Dentist Mailing List</a></li>
                        <li><a href="">Veterinary Mailing List</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@include('new_footer')