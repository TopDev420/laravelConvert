@include('new_header')
<style type="text/css">
    .bs-example {
        border: 1px solid #e3e3e3;
        border-bottom: 0;
    }
    
    .panel.panel-default.faq-accordian {
        border: 0;
        border-radius: 0;
    }
    
    .panel.panel-default.faq-accordian .panel-heading .panel-title a {
        display: block;
        text-decoration: none;
        cursor: pointer;
        font-weight: 600;
        padding: 18px 45px 18px 20px;
        border-bottom: 1px solid #e3e3e3;
        font-size: 16px;
        line-height: 1.5;
        color: #797f85;
    }
    
    .rotate {
        -webkit-transform: rotate(90deg);
        /* Chrome, Safari, Opera */
        -moz-transform: rotate(90deg);
        /* Firefox */
        -ms-transform: rotate(90deg);
        /* IE 9 */
        transform: rotate(90deg);
        /* Standard syntax */
    }
    
    .panel.panel-default.faq-accordian .panel-heading {
        background-color: transparent;
        border-radius: 0;
        padding: 0;
    }
    
    .panel.panel-default.faq-accordian .panel-collapse {
        -webkit-box-shadow: 0 1px 0 #e3e3e3;
        box-shadow: 0 1px 0 #e3e3e3;
    }
</style>




    <!---- header End --->
    <div class=" jmbtrn jmbtrn-regular jmbtrn-regular-bg">
        <div class="container jmbtrn-container">
            <div class="jmbtrn-inner">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="jmbtrn-title">How Can We Help You</h1>
                        <div class="breadbrumb gap-bottom">
                            <a href="index.html" class="breadbrumb-item">Home</a>
                            <span class="breadbrumb-item">FAQ</span>
                        </div>
                        <form class="form form-single-line form-single-line-search">
                            <input class="form-single-line-input form-control" type="text" name="q" placeholder="Please enter a keyword" value="">
                            <button class="form-single-line-submit" type="submit"><i
                                    class="icon icon-arrow-forward"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h5 class="secondary-title gap-bottom">Frequently Asked Questions
                    </h5>
                    <div class="bs-example">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default faq-accordian">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                            Which payment methods do you accept?
                                           <span class="glyphicon glyphicon-menu-right pull-right"></span> 
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>We accept MasterCard, Visa, American Express, Bank Wire, Bitcoin. Our aim is to simplify the ordering process and present your email list as soon as possible.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default faq-accordian">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                            When were your data lists last updated?<span class="glyphicon glyphicon-menu-right pull-right"></span>
                                            </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <p>Our data is verified weekly. We have developed a complex algorithm for this purpose. With this algorithm, we check the accuracy levels of our data against millions of sources and apply necessary updates.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default faq-accordian">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                            <span class="glyphicon glyphicon-menu-right pull-right"></span>How long does it take to get my email list after I order online?</a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>You can instantly download your database after your order is confirmed.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default faq-accordian">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                            <span class="glyphicon glyphicon-menu-right pull-right"></span>Some companies will only let me access contacts through a Web-based application: Do you share the actual data files, or do you just help us market
                                            without letting us see the data like others do?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>We sell you the actual data files.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default faq-accordian">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                                            <span class="glyphicon glyphicon-menu-right pull-right"></span>You have some ready-made databases on your Web site, but I couldn’t find the specific data I’m looking for. How can I perform a search?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFive" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>You can use our custom online tool to search using any criteria you wish, place an order, and directly download your database to start marketing!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default faq-accordian">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                                            <span class="glyphicon glyphicon-menu-right pull-right"></span>I want to contact other firms to market my company’s products; can I use your email lists?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseSix" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Yes, we sell B2B email lists for your needs.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default faq-accordian">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
                                            <span class="glyphicon glyphicon-menu-right pull-right"></span>I want to contact other firms to market my company’s products; can I use your email lists?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseSeven" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Yes, we sell B2B email lists for your needs.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default faq-accordian">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
                                            <span class="glyphicon glyphicon-menu-right pull-right"></span> I want to place an order, but I have doubts about the accuracy of the data. Why should I trust you?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseSeven" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>All of the records we sell have a 95% accuracy guarantee. If you encounter a lower accuracy rate, you can contact our customer relations staff and we will provide you new data for free to make up the difference.
                                            We call it our Bounce-Back Guarantee.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default faq-accordian">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight">
                                            <span class="glyphicon glyphicon-menu-right pull-right"></span> Can I feed your files into CRM software easily?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseEight" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Yes: Our .csv files are supported by all CRM platforms.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default faq-accordian">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseNine">
                                            <span class="glyphicon glyphicon-menu-right pull-right"></span>Why is your data so cheap?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseNine" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>We do not adjust our pricing for each customer, and we have a transparent pricing policy. We aim to reach as many customers as possible, including startups and small businesses.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default faq-accordian">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTen">
                                            <span class="glyphicon glyphicon-menu-right pull-right"></span>What should I keep in mind when ordering an email list?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTen" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>The most important criterion is to choose your target audience accurately. For this purpose, we developed our online list-builder tool. If you choose the right audience to market your product, your success rate
                                            will be higher, you will be happier, and you will want to purchase new email lists from us.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default faq-accordian">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTenOne">
                                            <span class="glyphicon glyphicon-menu-right pull-right"></span>Do customers download files as Excel files?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTenOne" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>We offer Excel files, .cvs files or .txt files.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default faq-accordian">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTenOne">
                                            <span class="glyphicon glyphicon-menu-right pull-right"></span>Are you GDPR compliant?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTenOne" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Our entire data pool is GDPR Ready.</p>
                                        <p>Please see <a href="https://www.bookyourdata.com/gdpr-ready">https://www.bookyourdata.com/gdpr-ready</a> for the reference.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>




                    <div class="pad-top-small">
                        <a href="https://www.bookyourdata.com/email-list-database/online-library-of-resources" title="Online Library of Resources">Online
                            Library of Resources</a>
                    </div>
                </div>
                <div class="col-md-4 pad-top-tld">
                    <h5 class="secondary-title gap-bottom">Contact Us</h5>
                    <p>Our international team works hard to create the best data-pulling tools in the industry. Our goal is to help you find the best business contacts out there. Have questions? Feel free to contact us today!
                    </p>
                    <i class="icon icon-email contact-mail-icon"></i> <a class="font-large transition-color" href="mailto:sales@bookyourdata.com">sales@bookyourdata.com</a>
                </div>
            </div>
        </div>
    </div>

@include('new_footer')       



   