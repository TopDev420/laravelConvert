@include('new_header')
  <div class="jmbtrn jmbtrn-contact">
    <div class="container jmbtrn-container">
        <div class="jmbtrn-inner">
            <div class="row">
                
                    <div class="col-md-4">
                        <h1 class="jmbtrn-title">{{ $contact->title }}</h1>
                        <div class="breadbrumb">
                            <a href="/" class="breadbrumb-item">Home</a>
                            <span class="breadbrumb-item">Contact</span>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <p>{{ $contact->monthly_desp_one }}<br>
                           {{ $contact->monthly_dep_two }}</p>
                    </div>
                
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="gap-bottom-small">
                    <h4 class="secondary-title font-medium clear-gap-bottom">Washington</h4>
                    <h6 class="tertiary-title clear-gap-top font-xxsmall">United States</h6>
                    <address>
                        1348 Florida Ave.
                        NW, Washington, DC 20009
                    </address>
                </div>
                <div class="gap-bottom-medium">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3104.1719496796363!2d-77.03343768515425!3d38.920047153214774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b7b7e722eac0e7%3A0x7551930a7f65bdf7!2sFranklin%20Hall%20DC!5e0!3m2!1sen!2sin!4v1597428614690!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
            <div class="col-md-5">
                <h4 class="secondary-title font-medium clear-gap-bottom">Contact Sales &amp; Service</h4>
                <p class="gap-bottom">
                    Send a message to our service team below:
                </p>
                <p class="gap-bottom-small">
                    Customer Success Team
                </p>
                <p class="gap-bottom-xsmall">
                    <img src="{{ asset('new-assets/images/new/about/holly.jpg') }}" style="width: 128px;" alt=""> <br>
                </p>
                <p class="gap-bottom">
                    Holly Higuera
                </p>
                <div class="" id="">

                            <span class="successsupport"></span>
                        
                            <div class="hs_email hs-email hs-fieldtype-text field hs-form-field"><label
                                    id="" class=""
                                    placeholder="Enter your Email"><span>Email</span><span
                                        class="hs-form-required">*</span></label>
                              
                                <div class="input">
                                    <input class="hs-input email" type="email" name="email" required="" placeholder="" value="" >
                                </div>
                                <span class="emailerror" style="font-size: 14px;color: #fd000d;font-weight: 700;"></span>
                            </div>
                            <div class="hs_subject hs-subject hs-fieldtype-text field hs-form-field"><label
                                    class="" placeholder="Enter your Subject"><span>Subject</span></label>
                              
                                <div class="input">
                                    <input class="hs-input subject" type="text" name="subject" value="" placeholder="" ></div>
                                    <span class="subjecterror" style="font-size: 14px;color: #fd000d;font-weight: 700;"></span>
                            </div>
                            <div class="hs_sales_or_service_inquiry hs-sales_or_service_inquiry hs-fieldtype-textarea field hs-form-field"><label
                                    class=""
                                    placeholder="Enter your Message"><span>Message</span><span
                                        class="hs-form-required">*</span></label>
                            
                                <div class="input">
                                    <textarea id="sales_or_service_inquiry-c94d0e1a-f6e2-49f4-8466-f306c54c929f"
                                        class="hs-input message" name="sales_or_service_inquiry" required="" placeholder=""
                                        data-reactid=".hbspt-forms-1.1:$2.$sales_or_service_inquiry.0"></textarea></div>
                                        <span class="messageerror" style="font-size: 14px;color: #fd000d;font-weight: 700;"></span>
                            </div>
                            <div class="hs_submit hs-submit" data-reactid=".hbspt-forms-1.5">
                               
                                <div class="actions" data-reactid=".hbspt-forms-1.5.1"><input type="submit" value="Send"
                                        class="hs-button primary large contactsubmit" data-reactid=".hbspt-forms-1.5.1.0"></div>
                            </div>
                       
                    </div>
            </div>
        </div>
    </div>
</div>
   
    
@include('new_footer')