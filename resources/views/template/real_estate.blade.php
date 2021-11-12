@include('new_header')



<!---- header End -->

<style type="text/css">

div.c-filter-selectbox a.over{

    position: relative;

    background: #f3f3f3;

    color: #797f85;

    text-decoration: none;

}
.is-include-check{
     cursor: not-allowed;
         -webkit-box-shadow: none;
    box-shadow: none;
    opacity: .25;
}
.text-exclude{
    color: #f04124;
}
.c-badge-exclude {
    background-color: #fd000d;
    color: #fff;
}
.ui-slider-handle{

    width: 12px;

    height: 20px;

    margin-top: -7px;

    border-radius: 0px;

    border: medium none;

    background-color: rgb(253, 0, 13);

    left: 100%;

}



</style>



<input type="hidden" id="type_filter" value="">
<input type="hidden" id="showdivid" value="">
<input type="hidden" id="zipcode-check">
<input type="hidden" id="run-example">

<input type="hidden" id="currnt_usr" value="<?php if(!empty($currentid)){echo $currentid;} ?>">





<div class="main-content" style="min-height: 100vh; background-color: #f6f6f6;">

    <div class="">

        <div class="page-title tab">

            <div class="container page-title-container table-layout-fixed">

                <div class="page-title-col page-title-col-4"><a

                    class="checkout-steps-link checkout-steps-link-tool" aria-current="false"

                    href="{{ url('/tool/business') }}"><span class="checkout-steps-link-text">Business Contacts</span></a></div>

                    <div class="page-title-col page-title-col-4"><a

                        class="checkout-steps-link checkout-steps-link-tool" aria-current="false" href="{{ url('/tool/healthcare') }}"><span

                        class="checkout-steps-link-text">Healthcare Professionals</span></a></div>

                        <div class="page-title-col page-title-col-4"><a

                            class="checkout-steps-link checkout-steps-link-tool is-active" aria-current="true" href="{{ url('/tool/real_estate') }}"><span

                            class="checkout-steps-link-text">Real Estate Agents</span></a></div>

                        </div>

                    </div>

                </div>

                <div class="">

                    <div class="tool-top-bar">

                        <div class="tool-top-bar-inner">



                            @if($total_contacts==0 && $nodatafound != 'nodatafound')

                            <div class="container before-result-search">

                                <div class="tool-top-bar-left"><span class="tool-top-bar-contacts gap-right default-msg-for-filter">Over 1M Contacts</span><span class="tool-top-bar-notification">Please add more filters to your

                                search</span></div>

                            </div>

                            @endif



                            @if($total_contacts==0 && $nodatafound == 'nodatafound')

                            <div class="container before-result-search">

                                <div class="tool-top-bar-left"><span class="tool-top-bar-contacts gap-right default-msg-for-filter">NO CONTACTS FOUND FOR YOUR CRITERIA</span></div>

                            </div>



                            @endif





                            @if( $total_contacts >0 ) 





                            <div class="container search-result-exist" >

                                <div class="tool-top-bar-left"><span class="tool-top-bar-contacts gap-right contact_count ">

                                {{$range_of_contact}} Contacts</span><input type="hidden" class="contact_count" value="{{$range_of_contact_count}}">

                                <div class="tool-top-bar-buttons">
                                    @if(!empty($currentid)) 

                                    <a href="<?php if(!empty($savesearchValues)){echo url('/').'/sampleexportfile/'.$savesearchValues;} ?>" 

                                    class="button button-senary gap-right-medium samplelist-download"><i

                                    class="icon icon-text-file font-medium align-text-bottom"></i> Download A

                                Sample</a>

                                

                                <div 

                                class="button button-senary gap-right-medium " data-toggle="modal" data-target="#saved"><i

                                class="icon icon-save font-medium align-text-bottom "></i> Save This

                            List</div>

                            @else
                            <button type="button"

                class="button button-senary gap-right-medium samplelist-not-download"><i

                class="icon icon-text-file font-medium align-text-bottom"></i> Download A

            Sample</button>

                            <div 

                            class="button button-senary gap-right-medium  " id="checknotlogin"><i

                            class="icon icon-save font-medium align-text-bottom "></i> Save This

                        List</div>

                        @endif

                    </div>

                </div>

                <div class="tool-top-bar-right"><span

                    class="tool-top-bar-price gap-right  price-filter">&#36;{{$price}}</span> 
                    @if($readymadelisids>0)
                        <input type="hidden" class="price-filter savesearchid" value="{{$readymadelisids}}">
                        <button type="button" class="button button-primary button-small buylistsingle">

                        <i class="icon icon-shopping-cart font-medium align-top"></i> Buy This List11

                    </button>
                    @else
                    <button type="button" class="button button-primary button-small buylist">

                        <i class="icon icon-shopping-cart font-medium align-top"></i> Buy This List11

                    </button>
                    @endif

                    <input type="hidden" class="price-filter type" value="healthcare">

                  @if(!empty($priceencrypt)) 

                    <input type="hidden" class="price-filter buyprice" value="{{$priceencrypt}}">   

                    @endif  

                    @if(!empty($countencrypt))

                    <input type="hidden" class="price-filter buycontact" value="{{$countencrypt}}">  

                    @endif

                    @if($savesearchid>0)

                    <input type="hidden" class="price-filter savesearchid" value="{{$savesearchid}}">

                    @endif    

                </div>

            </div>

            @endif

            <div class="container filter-result-shows" style="display: none">

                <div class="tool-top-bar-left"><span class="tool-top-bar-contacts gap-right default-msg-for-contacts">Over 1M Contacts</span><span class="tool-top-bar-notification">Please add more filters to your

                search</span>

            </div>

        </div>



        <div class="container search-result" style=" display: none" >

            <div class="tool-top-bar-left"><span class="tool-top-bar-contacts gap-right contact_count ">

            Contacts</span><input type="hidden" class="contact_count" value="">

            <div class="tool-top-bar-buttons">

            @if(!empty($currentid)) 
             <a href="" 

                                    class="button button-senary gap-right-medium samplelist-download"><i

                                    class="icon icon-text-file font-medium align-text-bottom"></i> Download A

                                Sample</a>

            <div 

            class="button button-senary gap-right-medium "  data-toggle="modal" data-target="#saved"><i

            class="icon icon-save font-medium align-text-bottom "></i> Save This

        List</div>

        @else
        <button type="button"

                class="button button-senary gap-right-medium samplelist-not-download"><i

                class="icon icon-text-file font-medium align-text-bottom"></i> Download A

            Sample</button>
        <div type="button"

        class="button button-senary gap-right-medium" id="checknotlogin"><i

        class="icon icon-save font-medium align-text-bottom "></i> Save This

    List</div>

    @endif



</div>

</div>

<div class="tool-top-bar-right"><span

    class="tool-top-bar-price gap-right price-filter"></span><button type="button"

    class="button button-primary button-small buylist"><i

    class="icon icon-shopping-cart font-medium align-top"></i> Buy This List</button>

    <input type="hidden" class="price-filter type" value="real_estate">

    <input type="hidden" class="price-filter buyprice" value="">

    <input type="hidden" class="price-filter buycontact" value="">

    <input type="hidden" class="price-filter savesearchid" value="">

</div>

</div> 

</div>

</div>



@if(!empty($total_contacts))

<div class="contact-budget-container range-of-contact-exist" >

    <hr class="hr-line">

    <div class="contact-budget">

        <div class="container contact-budget-inner">

            <div class="row">

                <div class="col-md-4">

                    <h4 class="contact-budget-title">Adjust Your Contacts / Budget<span

                        class="gap-left"><span class="question-mark js-popover"

                        data-trigger="focus hover"

                        data-content="You can adjust change your targeted amount of contacts or budget by scrolling here."

                        data-placement="right" data-container="body" data-original-title=""

                        title="">?</span></span></h4>

                    </div>

                    <div class="col-md-6">

                        <div style="margin-top: 6px;" id="slider">

                        </div>

                    </div>

                    <div class="col-md-2">

                        <div class="form-adjust">

                            <form><input type="text" class="form-control-adjust range-slider" value="{{$range_of_contact}}"><button type="button" 

                                class="button button-secondary button-small range-set">Set</button>

                                <input type="hidden" name="range_of_contacts" id="range-contact" value="{{$range_of_contact_count}}" >

                                @if(!empty($rangeofstyle))

                                <input type="hidden" name="rangeofstyle" id="rangeofstyle" value="{{$rangeofstyle}}" >

                                @endif

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    @endif

    <div class="contact-budget-container range-of-contact"  style="display: none" >

        <hr class="hr-line">

        <div class="contact-budget">

            <div class="container contact-budget-inner">

                <div class="row">

                    <div class="col-md-4">

                        <h4 class="contact-budget-title">Adjust Your Contacts / Budget<span

                            class="gap-left"><span class="question-mark js-popover"

                            data-trigger="focus hover"

                            data-content="You can adjust change your targeted amount of contacts or budget by scrolling here."

                            data-placement="right" data-container="body" data-original-title=""

                            title="">?</span></span></h4>

                        </div>

                        <div class="col-md-6">

                            <div style="margin-top: 6px;" id="slider">

                            </div>

                        </div>

                        <div class="col-md-2">

                            <div class="form-adjust">

                                <form><input type="text" class="form-control-adjust range-slider" value="">

                                    <input type="hidden" class="form-control-adjust range-slider" value="">
                                    <input type="hidden" name="range_of_contacts" id="range-contact" value="" >

                                    <button type="button" 

                                    class="button button-secondary button-small range-set">Set</button></form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>    



        </div>

        <div class="pad-top-small pad-bottom-medium bg-vapor">

            <div class="container right-list" >

                <div class="row"  id="find-results-check">

                    <div class="col-md-3">

                        <div class="shadow-primary form form-slim form-tool">



                            <div class="box">

    <h4 class="box-title"><span><span class="align-middle">Location</span> <span

        class="question-mark js-popover" data-trigger="focus hover"

        data-content="You can narrow your search by selecting your desired countries, regions, counties, cities, zipcodes or even &quot;radius&quot;. Please enter zipcode first in order to filter by radius."

        data-placement="right" data-container="body" data-original-title=""

        title="">?</span></span></h4>

        <div>

            <div class="gap-bottom-small">

                <div class="c-filter-selectbox has-selected">

                    <a href="javascript:void(0)" class="over" onclick="toggleVisibility('div_country', 'country');" type="button" data-box="div_country" >  

                        <div class="c-filter-selectbox-trigger" role="button" tabindex="0">

                            <span

                            class="c-filter-selectbox-placeholder-text">Country</span><span id="remove-country"

                            class="c-badge c-badge-success u-no-shrink gap-right-small" style="display: none;"></span><span

                            class="icon icon-menu c-filter-selectbox-placehodler-icon u-gap-left-auto"></span>

                        </div>

                    </a>

                    <div class="c-filter-selectbox-dropdown" id="div_country">

                        <div class="c-filter-selectbox-container">

                            <div class="u-flex u-flex-extend">

                                <div

                                class="c-filter-selectbox-content c-filter-selectbox-content-fixed-footer">

                                <div>

                                    <h5 class="secondary-title clear-gap-top">Select

                                    Continent or Country</h5>

                                    <p class="font-small">You can select one or more

                                    continent or country.</p>

                                </div>

                                <div class="c-filter-search">

                                    <div class="relative"><span

                                        class="icon icon-search-material c-filter-search-icon"

                                        aria-hidden="true"></span><input type="text"

                                        class="c-filter-search-input" value=""

                                        placeholder="Type to search"></div>

                                        <div class="c-filter-search-results">

                                            <div class="c-filter-search-results-inner">

                                                <div class="custom-scroll "

                                                style="flex: 1 1 0%;">

                                                <div class="outer-container"

                                                style="height: 100%;">

                                                <div class="inner-container"

                                                style="margin-right: -20px; height: 100%;">

                                                <div class="content-wrapper"

                                                style="margin-right: 20px; height: 100%; overflow-y: visible;">

                                                <ul class="c-choice-tree" style="overflow-x:auto;height: 235px;">



                                                    @if(!empty($filter_contry))

                                                    @foreach($filter_contry as $indus)



                                                    <li class="c-choice-tree-item">

                                                        <div class="custom-checkbox custom-checkbox-primary c-choice-tree-checkbox">

                                                            <input class="custom-checkbox-inp filter_result"  value="{{$indus}}" type="checkbox" id="{{$indus}}" new-data="{{$indus}}" name="country" data-id="country"><label

                                                            for="{{$indus}}"

                                                            class="custom-checkbox-mask"></label>

                                                        </div><label for="{{$indus}}" class="c-choice-tree-label">{{$indus}}</label>

                                                    </li>



                                                    @endforeach

                                                    @endif



                                                </ul>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="c-filter-selectbox-actions u-gap-top-auto">

                        <div class="u-gap-left-auto"><span

                            class="font-small gap-right text-bold">1 items

                        selected</span><button type="button" data-id="include"

                        class="button button-success-flat button-xsmall u-gap-left-auto include"><i

                        class="icon icon-check gap-right-small font-3xsmall"

                        aria-hidden="true"></i>Include</button><button 

                        type="button"  data-id="Exclude"
 
                        class="button button-denary button-xsmall gap-left exclude"

                        disabled=""><i

                        class="icon icon-clear gap-right-small font-small align-text-bottom"

                        aria-hidden="true"></i>Exclude</button>

                    </div>

                </div>

            </div>

            <div class="c-filter-selectbox-content bg-concrete">

                <div>

                    <h5 class="secondary-title clear-gap-top">Selected

                    Continents &amp; Countries</h5>
                    
                    <button type="button" class="modal-close-btn close-btn hide-show-divs"></button>

                    <p class="font-small">Continents and countries that

                    you've chosen.</p>

                </div>

                <div>

                    <div class="c-filter-selected-list gap-bottom-small">

                        <div class="c-filter-selected-list-inner">

                            <div class="custom-scroll "

                            style="flex: 1 1 0%;">

                            <div class="outer-container"

                            style="height: 100%;">

                            <div class="inner-container"

                            style="margin-right: -20px; height: 100%;">

                            <div class="content-wrapper selected_value countries-wrapp"

                            style="margin-right: 20px; height: 100%; overflow-y: visible;">

                            <ul

                            class="c-filter-selected-list-items country" >



                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="text-right"><button type="button"

    class="button button-link link-quaternary text-bold">Clear

All</button></div>

</div>

</div>

</div>

</div>

</div>

<div class="c-filter-selectbox-overlayer" aria-hidden="true"></div>

</div>

</div>

<div class="gap-bottom-small">

    <div class="c-filter-selectbox">

        <a href="javascript:void(0)" class="over" onclick="toggleVisibility('div_state', 'state');" type="button" data-box="div_state" id="state"><div class="c-filter-selectbox-trigger" role="button" tabindex="0"><span

            class="c-filter-selectbox-placeholder-text">State<span id="state_number" class="remove-number c-badge c-badge-success u-no-shrink gap-right-small" style="display: none;"></span></span><span

            class="icon icon-menu c-filter-selectbox-placehodler-icon u-gap-left-auto"></span>

        </div></a>

        <div class="c-filter-selectbox-dropdown" id="div_state">

            <div class="c-filter-selectbox-container">

                <div class="u-flex u-flex-extend">

                    <div class="c-filter-selectbox-content c-filter-selectbox-content-fixed-footer">

                        <div>

                            <h5 class="secondary-title clear-gap-top">Select a State

                            </h5>

                            <p class="font-small">You can select one or more states.

                            </p>

                        </div>

                        <div class="c-filter-search">

                            <div class="relative"><span

                                class="icon icon-search-material c-filter-search-icon"

                                aria-hidden="true"></span><input type="text"

                                class="c-filter-search-input" value=""

                                placeholder="Type to search"></div>

                                <div class="c-filter-search-results">

                                    <div class="c-filter-search-results-inner">

                                        <div class="custom-scroll "

                                        style="flex: 1 1 0%;">

                                        <div class="outer-container"

                                        style="height: 100%;">

                                        <div class="inner-container"

                                        style="margin-right: -20px; height: 100%;">

                                        <div class="content-wrapper"

                                        style="margin-right: 20px; height: 100%; overflow-y: visible;">

                                        <ul class="c-choice-tree" style="overflow-x:auto;height: 235px;">

                                            @if(!empty($filter_state))

                                            @foreach($filter_state as $stat=>$val)

                                            <li class="c-choice-tree-item">

                                                <div class="custom-checkbox custom-checkbox-primary c-choice-tree-checkbox">

                                                    <input class="custom-checkbox-inp filter_result"  value="{{$val['statename']}}" type="checkbox" id="{{$val['statename']}}" name="state" data-id="state"><label

                                                    for="{{$val['statename']}}"

                                                    class="custom-checkbox-mask"></label>

                                                </div><label for="{{$val['statename']}}" class="c-choice-tree-label">{{$val['stateswithcode']}}</label>

                                            </li>

                                            @endforeach

                                            @endif

                                        </ul>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="c-filter-selectbox-actions u-gap-top-auto">

                <div class="u-gap-left-auto"><button type="button"  data-id="include"

                    class="button button-success-flat button-xsmall u-gap-left-auto include"><i

                    class="icon icon-check gap-right-small font-3xsmall"

                    aria-hidden="true"></i>Include</button><button

                    type="button" data-id="Exclude"

                    class="button button-denary button-xsmall gap-left exclude"><i

                    class="icon icon-clear gap-right-small font-small align-text-bottom"

                    aria-hidden="true"></i>Exclude</button>

                </div>

            </div>

        </div>

        <div class="c-filter-selectbox-content bg-concrete">

            <div>

                <h5 class="secondary-title clear-gap-top">Selected

                States</h5>
                <button type="button" class="modal-close-btn close-btn hide-show-divs"></button>

                <p class="font-small">States that you've chosen.</p>

            </div>

            <div>

                <div class="c-filter-selected-list gap-bottom-small">

                    <div class="c-filter-selected-list-inner">

                        <div class="custom-scroll "

                        style="flex: 1 1 0%;">

                        <div class="outer-container"

                        style="height: 100%;">

                        <div class="inner-container"

                        style="margin-right: -20px; height: 100%;">

                        <div class="content-wrapper selected_value"

                        style="margin-right: 20px; height: 100%; overflow-y: visible;">

                        <ul

                        class="c-filter-selected-list-items state">



                    </ul>

                    <p

                    class="c-filter-selected-list-item state_count">

                    There is no selected

                item.</p>

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

</div>

<div class="c-filter-selectbox-overlayer" aria-hidden="true"></div>

</div>

</div>



<div class="gap-bottom-small">

    <div class="c-filter-selectbox">

        <a href="javascript:void(0)" class="over" onclick="toggleVisibility('div_city', 'city');" type="button" data-box="div_city" id="city">   <div class="c-filter-selectbox-trigger" role="button" tabindex="0"><span

            class="c-filter-selectbox-placeholder-text">City<span id="city_number" class="remove-number c-badge c-badge-success u-no-shrink gap-right-small" style="display: none;"></span></span><span

            class="icon icon-menu c-filter-selectbox-placehodler-icon u-gap-left-auto"></span>

        </div>

    </a>

    <div class="c-filter-selectbox-dropdown" id="div_city">

        <div class="c-filter-selectbox-container">

            <div

            class="c-filter-selectbox-content c-filter-selectbox-content-fixed-footer">

            <div>

                <h5 class="secondary-title clear-gap-top">Select a city</h5>

                <p class="font-small">You can select one or more city.</p>

            </div>

            <div class="c-filter-search">

                <div class="relative"><span

                    class="icon icon-search-material c-filter-search-icon"

                    aria-hidden="true"></span><input type="text"

                    class="c-filter-search-input citysearch" value=""

                    placeholder="Type for suggestions"></div>

                    <div class="c-filter-search-results"></div>

                </div>

                <div class="c-filter-search-results">

                    <div class="c-filter-search-results-inner">

                        <div class="custom-scroll "

                        style="flex: 1 1 0%;">

                        <div class="outer-container"

                        style="height: 100%;">

                        <div class="inner-container"

                        style="margin-right: -20px; height: 100%;">

                        <div class="content-wrapper"

                        style="margin-right: 20px; height: 100%; overflow-y: visible;">

                        <ul class="c-choice-tree citylist" style="overflow-x:auto;height: 235px;">

                            @if(!empty($filter_city))

                            @foreach($filter_city as $cities)

                            <li class="c-choice-tree-item">

                                <div class="custom-checkbox custom-checkbox-primary c-choice-tree-checkbox">

                                    <input class="custom-checkbox-inp filter_result"  value="{{$cities}}" type="checkbox" id="{{$cities}}" name="city" data-id="city"><label

                                    for="{{$cities}}"

                                    class="custom-checkbox-mask"></label>

                                </div><label for="{{$cities}}" class="c-choice-tree-label">{{$cities}}</label>

                            </li>

                            @endforeach

                            @endif

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="c-filter-selectbox-actions u-gap-top-auto">

    <div class="u-gap-left-auto"><button type="button" data-id="include"

        class="button button-success-flat button-xsmall u-gap-left-auto include"><i

        class="icon icon-check gap-right-small font-3xsmall"

        aria-hidden="true"></i>Include</button><button

        type="button"  data-id="Exclude"


        class="button button-denary button-xsmall gap-left exclude"><i

        class="icon icon-clear gap-right-small font-small align-text-bottom"

        aria-hidden="true"></i>Exclude</button></div>

    </div>

</div>

<div class="c-filter-selectbox-content bg-concrete">

    <div>

        <h5 class="secondary-title clear-gap-top">Selected Cities

        </h5>
        <button type="button" class="modal-close-btn close-btn hide-show-divs"></button>

        <p class="font-small">Cities that you've chosen.</p>

    </div>

    <div>

        <div class="c-filter-selected-list gap-bottom-small">

            <div class="c-filter-selected-list-inner">

                <div class="custom-scroll " style="flex: 1 1 0%;">

                    <div class="outer-container"

                    style="height: 100%;">

                    <div class="inner-container"

                    style="margin-right: -20px; height: 100%;">

                    <div class="content-wrapper selected_value"

                    style="margin-right: 20px; height: 100%; overflow-y: visible;">

                    <ul

                    class="c-filter-selected-list-items city">



                </ul>

                <p

                class="c-filter-selected-list-item city_count">

                There is no selected item.

            </p>

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

<div class="c-filter-selectbox-overlayer" aria-hidden="true"></div>

</div>

</div>

<div>

    <div class="gap-bottom-small"><input type="text" value="" class="form-control Zip-codes zipcod"

        placeholder="Zip Code"></div>

    </div>

</div>

</div>





                            <div class="box" >

                                <h4 class="box-title">Contact Title</h4>

                                <div>

                                    <div class="gap-bottom-small">

                                        <div class="c-filter-selectbox">

                                            <a href="javascript:void(0)" class="over" onclick="toggleVisibility('div_job', 'Contact');" type="button" data-box="div_job" id="Contact">

                                                <div class="c-filter-selectbox-trigger" role="button" tabindex="0"><span

                                                    class="c-filter-selectbox-placeholder-text">Contact Type<span class="remove-number c-badge c-badge-success u-no-shrink gap-right-small" id="Contact_number" style="display: none;"></span></span><span

                                                    class="icon icon-menu c-filter-selectbox-placehodler-icon u-gap-left-auto"></span>

                                                </div>

                                            </a>

                                            <div class="c-filter-selectbox-dropdown" id="div_job">

                                                <div class="c-filter-selectbox-container">

                                                    <div class="u-flex u-flex-extend">

                                                        <div class="c-filter-selectbox-content c-filter-selectbox-content-fixed-footer">

                                                            <div>

                                                                <h5 class="secondary-title clear-gap-top">Select Job

                                                                Levels</h5>

                                                                <p class="font-small">You can select one or more job

                                                                levels.</p>

                                                            </div>

                                                            <div class="c-filter-search">

                                                                <div class="relative"><span

                                                                    class="icon icon-search-material c-filter-search-icon"

                                                                    aria-hidden="true"></span><input type="text"

                                                                    class="c-filter-search-input" value=""

                                                                    placeholder="Type to search"></div>

                                                                    <div class="c-filter-search-results">

                                                                        <div class="c-filter-search-results-inner">

                                                                            <div class="custom-scroll "

                                                                            style="flex: 1 1 0%;">

                                                                            <div class="outer-container"

                                                                            style="height: 100%;">

                                                                            <div class="inner-container"

                                                                            style="margin-right: -17px; height: 100%;">

                                                                            <div class="content-wrapper"

                                                                            style="margin-right: 0px; height: 100%; overflow-y: visible;">

                                                                            <ul class="c-choice-tree" style="overflow-x:auto;height: 235px;">



                                                                               



                                                                               <!--  <li class="c-choice-tree-item">

                                                                                    <div class="custom-checkbox custom-checkbox-primary c-choice-tree-checkbox">

                                                                                        <input class="custom-checkbox-inp filter_result" value="real-estate-agent" type="checkbox" 

                                                                                        id="real-estate-agent" name="joblevels" data-id="joblevels"><label for="real-estate-agent " class="custom-checkbox-mask"></label>

                                                                                    </div><label for="real-estate-agent " class="c-choice-tree-label">Real Estate Agent</label>

                                                                                </li> -->

                                                                                <li class="c-choice-tree-item">

                                                                                    <div class="custom-checkbox custom-checkbox-primary c-choice-tree-checkbox">

                                                                                        <input class="custom-checkbox-inp filter_result content-type-select" value="Real Estate Agent" type="checkbox" id="Real Estate Agent" name="Contact" data-id="Contact"><label for="Real Estate Agent" class="custom-checkbox-mask"></label>

                                                                                    </div><label for="Real Estate Agent" class="c-choice-tree-label">Real Estate Agent</label>

                                                                                </li>

                                                                                 <li class="c-choice-tree-item">

                                                                                    <div class="custom-checkbox custom-checkbox-primary c-choice-tree-checkbox">

                                                                                        <input class="custom-checkbox-inp filter_result content-type-select" value="Real Estate Broker" type="checkbox" id="Real Estate Broker" name="Contact" data-id="Contact"><label for="Real Estate Broker" class="custom-checkbox-mask"></label>

                                                                                    </div><label for="Real Estate Broker" class="c-choice-tree-label">Real Estate Broker</label>

                                                                                </li>

                                                                                <li class="c-choice-tree-item">

                                                                                    <div class="custom-checkbox custom-checkbox-primary c-choice-tree-checkbox">

                                                                                        <input class="custom-checkbox-inp filter_result content-type-select" value="Property Manager" type="checkbox" id="Property Manager" name="Contact" data-id="Contact"><label for="Property Manager" class="custom-checkbox-mask"></label>

                                                                                    </div><label for="Property Manager" class="c-choice-tree-label">Property Manager</label>

                                                                                </li>





                                                                            </ul>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="c-filter-selectbox-actions u-gap-top-auto">

                                                    <div class="u-gap-left-auto"><button type="button" data-id="include"

                                                        class="button button-success-flat button-xsmall u-gap-left-auto include"><i

                                                        class="icon icon-check gap-right-small font-3xsmall"

                                                        aria-hidden="true"></i>Include</button><button

                                                        type="button" data-id="Exclude"

                                                        class="button button-denary button-xsmall gap-left exclude"><i

                                                        class="icon icon-clear gap-right-small font-small align-text-bottom"

                                                        aria-hidden="true"></i>Exclude</button>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="c-filter-selectbox-content bg-concrete">

                                                <div>

                                                    <h5 class="secondary-title clear-gap-top">Selected Job

                                                    Levels</h5>
                                                    <button type="button" class="modal-close-btn close-btn hide-show-divs"></button>

                                                    <p class="font-small">Job Levels that you've chosen.</p>

                                                </div>

                                                <div>

                                                    <div class="c-filter-selected-list gap-bottom-small">

                                                        <div class="c-filter-selected-list-inner">

                                                            <div class="custom-scroll "

                                                            style="flex: 1 1 0%;">

                                                            <div class="outer-container"

                                                            style="height: 100%;">

                                                            <div class="inner-container"

                                                            style="margin-right: -17px; height: 100%;">

                                                            <div class="content-wrapper selected_value"

                                                            style="margin-right: 0px; height: 100%; overflow-y: visible;">

                                                            <ul 

                                                            class="c-filter-selected-list-items Contact">

                    <!-- <li

                        class="c-filter-selected-list-item">

                        There is no selected

                    item.</li> -->

                </ul>

                <p class="Contact_count c-filter-selected-list-item">There is no Selected item.</p>

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



</div>

<div class="c-filter-selectbox-overlayer" aria-hidden="true"></div>

</div>

</div>



</div>

</div>

<div class="box">

    <h4 class="box-title"><span><span class="align-middle">Company</span> <span

        class="question-mark js-popover" data-trigger="focus hover"

        data-content="You can filter your results by using your desired &quot;industry&quot; keywords or SIC Codes."

        data-placement="right" data-container="body" data-original-title=""

        title="">?</span></span></h4>



        <div class="gap-bottom-small">

            <div class="c-filter-selectbox">

                <a href="javascript:void(0)" class="over" onclick="toggleVisibility('div_company', 'company');" type="button" data-box="div_company" id="company"> <div class="c-filter-selectbox-trigger" role="button" tabindex="0"><span

                    class="c-filter-selectbox-placeholder-text">Company Search<span id="company_number" class="remove-number c-badge c-badge-success u-no-shrink gap-right-small" style="display: none;"> </span></span><span

                    class="icon icon-menu c-filter-selectbox-placehodler-icon u-gap-left-auto"></span>

                </div></a>

                <div class="c-filter-selectbox-dropdown" id="div_company">

                    <div class="c-filter-selectbox-container">

                        <div

                        class="c-filter-selectbox-content c-filter-selectbox-content-fixed-footer">

                        <div>

                            <h5 class="secondary-title clear-gap-top">Type a Company Name

                            </h5>

                            <p class="font-small">Please type a company name to filter</p>

                        </div>

                        <div class="c-filter-search"><textarea type="text"

                            class="c-filter-search-input c-filter-search-input-textarea comny"

                            placeholder="Please type companies per line. Max: 2000 entries"

                            rows="10"></textarea></div>

                            <div class="c-filter-selectbox-actions u-gap-top-auto">

                                <div class="u-gap-left-auto"><button type="button" data-id="include"

                                    class="button button-success-flat button-xsmall u-gap-left-auto include"><i

                                    class="icon icon-check gap-right-small font-3xsmall"

                                    aria-hidden="true"></i>Include</button><button

                                    type="button" data-id="Exclude"

                                    class="button button-denary button-xsmall gap-left exclude"><i

                                    class="icon icon-clear gap-right-small font-small align-text-bottom"

                                    aria-hidden="true"></i>Exclude</button></div>

                                </div>

                            </div>

                            <div class="c-filter-selectbox-content bg-concrete">

                                <div>

                                    <h5 class="secondary-title clear-gap-top">Selected Companies

                                    </h5>
                                    <button type="button" class="modal-close-btn close-btn hide-show-divs"></button>

                                    <p class="font-small">Companies that you've chosen.</p>

                                </div>

                                <div>

                                    <div class="c-filter-selected-list gap-bottom-small">

                                        <div class="c-filter-selected-list-inner">

                                            <div class="custom-scroll " style="flex: 1 1 0%;">

                                                <div class="outer-container" style="height: 100%;">

                                                    <div class="inner-container selected"

                                                    style="margin-right: -20px; height: 100%;">

                                                    <div class="content-wrapper selected_value"

                                                    style="margin-right: 20px; height: 100%; overflow-y: visible;">

                                                    <ul class="c-filter-selected-list-items company" >



                                                    </ul>

                                                    <p

                                                    class="c-filter-selected-list-item company_count">

                                                There is no selected item.</p>

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

        <div class="c-filter-selectbox-overlayer" aria-hidden="true"></div>

    </div>

</div>







</div>





</div>



</div>

<div class="col-md-9">



    <div class="shadow-primary section-flex section-flex-tool-no-result" style="display: none">

        <div class="full-width section-flex-container">

            <div class="section-flex-inner">

                <div class="row">

                    <div class="col-sm-8 col-sm-offset-2">

                        <div>

                            <h3 class="primary-title clear-gap-top gap-bottom-small">Welcome to

                            Bookyourdata</h3>

                            <p class="gap-bottom-medium">Run an example search for <strong>United

                            States</strong></p>

                        </div><button type="button" class="button button-primary include-run-box">Run an Example

                        Search</button>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div id="result-div" style="display: none;">

        <div class="gap-bottom-medium remove-all">

            <div class="row">

                <div class="col-md-1 remove-text"><strong class="text-success">include</strong></div>

                <div class="col-md-11">

                    <div class="tags" style="margin-bottom: 0px;">

                        





                        @if($searchByJob !='')

                        @if($real_state_readymadelistdata)
                        <span class="tag-firsts tag" new-data="{{$real_state_readymadelistdata['country']}}" data-id="country">Country : {{$real_state_readymadelistdata['country']}}

                        </span>

                        <span class="job-level-value-exist">

                            <span class="all_selected_value"> 

                                <li class="filter-save-data" new-data="{{$real_state_readymadelistdata['state']}}" data-id="state">State : {{$real_state_readymadelistdata['state']}} <button type="button" class="removefiles fa fa-times "></button></li>

                            </span>

                        </span>
                        @endif
                        @endif









                        @if(  !empty ($countryfilters) )

                        @foreach ($countryfilters as $p=>$value)

                        @foreach ($value as $q=>$val)

                        <span class="tag" new-data="{{$val}}" data-id="country"> {{$p}} : {{$val}} <button type="button" class="removefiles fa fa-times "></button>

                           

                        </span>

                        @endforeach

                        @endforeach

                        @endif





                         @if(!empty($State_Search__real_Data))
                            <span class="tag-firsts tag" new-data="{{$State_Search__real_Data['country']}}" data-id="country">Country : {{$State_Search__real_Data['country']}}<button type="button" class="tag-remove removefiles"></button>

                            </span>
                            @if(!empty($State_Search__real_Data['Contact']))
                            <span class="job-level-value-exist">
                                <span class="all_selected_value">
                                @foreach($State_Search__real_Data['Contact'] as $key=>$val)
                                    
                                        <li class="filter-save-data" new-data="{{$val}}" data-id="Contact">Contact type : {{$val}} <button type="button" class="removefiles fa fa-times "></button></li>
                                    
                                @endforeach  
                                </span>  
                            </span>
                            @elseif(!empty($State_Search__real_Data['state']))
                            <span class="job-level-value-exist">
                                <span class="all_selected_value">
                                
                                    
                                        <li class="filter-save-data" new-data="{{$State_Search__real_Data['state']}}" data-id="state">State : {{$State_Search__real_Data['state']}} <button type="button" class="removefiles fa fa-times "></button></li>
                                    
                                
                                </span>  
                            </span>

                            @endif



                        @endif

                        <span class="all_selected_value">   

                         @if(  !empty ($filter_data) )

                         @foreach ($filter_data as $p=>$value)

                         @foreach ($value as $q=>$val)

                         <li class="filter-save-data" new-data="{{$val}}" data-id="{{$p}}">{{$p}} : {{$val}}<button type="button" class="removefiles fa fa-times "></button></li> 

                         @endforeach

                         @endforeach

                         @endif

                     </span>

                     

                </div>

            </div>

        </div>
        <div class="row exclude-div" style="display: none">

                <div class="col-md-1 "><strong class="text-success" style="color: #f04124;">exclude</strong></div>

                <div class="col-md-11">
                    <span class="all_selected_value_exclude">   
                       @if(  !empty ($excludefilters) ) 
                        @foreach ($excludefilters as $p=>$value)

                           @foreach ($value as $q=>$val)

                           <li class="filter-save-data"  new-data="{{$val}}" data-id="{{$p}}">{{$p}} : {{$val}} <button type="button" class="removefiles fa fa-times "></button></li>

                           @endforeach

                           @endforeach
                       @endif
                           

                       </span>
                   

                </div>

        </div> <button type="button" class="button button-octonary button-xsmall tags-remove-all-btn removeBox">Clear

                        All Filters

                    </button>

    </div>

      @if(!empty($business_contacts))

    <span class="block gap-bottom-xsmall remove-spans-exist">Preview of 20 direct email contacts found as

    sample for your current search.</span>
    <div class="table-responsive">
    <table

    class="table result-table-exist table-primary table-hover table-fixed table-pointer shadow-primary gap-bottom-xsmall">

    <thead>

        <tr>

            <th>Direct Email</th>

            <th>Contact Name</th>

            <th>Phone Number</th>
            <th>Job Tittle</th>

            <th>Country &amp; City</th>

        </tr>

    </thead>

    <tbody class="result-search">

       

       @foreach($business_contacts as $row)

       <tr class="get-data" data-id = "{{$row->id}}">

         @if(!empty($currentid))<input type="hidden" class="serchdata" value="{{$row->id}}">@endif

         <td>{{ $row->email_address }}</td>

         <td><span class="text-semibold font-medium">{{ $row->first_name }}</span></td>

         <td><span>{{ $row->phone_number }}</span></td>

         <td><span>{{ $row->job_title }} </span></td>

         <td><span>{{ $row->country }} / {{ $row->city }}</span>

         </td>



     </tr>

     @endforeach

    



 </tbody>

</table>

 @else
</div>


 <div class="shadow-primary section-flex section-flex-tool-no-result section-flex-tool-no-result-no-data-found"> 

    <div class="full-width section-flex-container">

        <div class="section-flex-inner">

            <div class="row"> 

                <div class="col-sm-8 col-sm-offset-2">

                    <div>

                        <h3 class="primary-title clear-gap-top gap-bottom-small">NO RESULTS FOUND</h3><p class="gap-bottom-medium">Please expand your selections by using filters on the left side.</p> 

                    </div>

                </div>

            </div>

     </div> 

 </div>

 </div>



 @endif  

  <span class="block gap-bottom-xsmall remove-spans" style="display: none;">Preview of 20 direct email contacts found as

    sample for your current search.</span> 
<div class="table-responsive">
     <table

    class="table result-table table-primary table-hover table-fixed table-pointer shadow-primary gap-bottom-xsmall" style="display: none;">

    <thead>

        <tr>

            <th>Direct Email</th>

            <th>Contact Name</th>

            <th>Phone Number</th>

            <th>Job Tittle</th>

            <th>Country &amp; City</th>

        </tr>

    </thead>

    <tbody class="result-search">

       

      

    



    </tbody>

</table>    
</div>
<div id="rundiv-app" ></div>

</div>

</div>





</div>

</div>

</div>





</div>

<!---- Footer  -->

@include('new_footer')

<script type="text/javascript">

    var csrftoken  ='{{ csrf_token() }}';

    var baseurl = '<?php echo url('/'); ?>';

   var SerachType='realestate';

</script>



<script type="text/javascript">











    var companies = [];

    var zipcodes =[];

    var contact_silder='';

    var range_of_contact=[];

    var url_detail = window.location.pathname;

    console.log(url_detail);
    if(url_detail==='/tool/real_estate'){
 $('.section-flex-tool-no-result').show();
  $('.section-flex-tool-no-result-no-data-found').hide();
}
else{
    $('#result-div').show();
} 

    $( document ).ready(function() {
        $('.ui-slider-handle').removeAttr( 'style' );
        $(document).on('click','.include',function(){
        var types = $(this).data('id');
        validation(types);
    });
    $(document).on('click','.exclude',function(){
        var types = $(this).data('id');
        validationexclude(types);
    });

});



var divs = ["div_job","div_company","div_country","div_state","div_city"];

var visibleDivId = null;

function toggleVisibility(divId,type = '') {//alert(divId);



    if(visibleDivId === divId) {

        visibleDivId = null;

    } else {

        $('#type_filter').val(type);
        $('#showdivid').val(divId);

        visibleDivId = divId;

    }

    hideNonVisibleDivs();

}

function hideNonVisibleDivs() {

    var i, divId, div;

    for(i = 0; i < divs.length; i++) {

        divId = divs[i];

        div = document.getElementById(divId);

        if(visibleDivId === divId) {

            div.style.display = "block";

        } else {

            div.style.display = "none";

        }

    }

}

// $('#find-results-check div.c-filter-selectbox a').click(function(){//alert('1502');

// // alert($(this).attr('href'));

// $('html, body').stop().animate({

//     scrollTop: $( $(this).attr('href') ).offset().top - 130

// }, 1700);

// return false;

// });
 $( document ).ready(function() {

        $("div.c-filter-selectbox a"+$('#type_filter').val()).click(function() {
            console.log($(this).attr('data-box'));
             $([document.documentElement, document.body]).animate({
                 scrollTop: $('#'+$(this).attr('id')).offset().top-159
             }, 500);
        });
    });

$('.scrollTop a').scrollTop();



$('.over').click(function(e){//alert('success');

    $('#overlay').fadeIn(300);

    e.preventDefault();

});

// $(document).on('click','#overlay',function() {alert('success');

//     $(this).fadeOut('3000');

//     $('.c-filter-selectbox-dropdown').css("display", "none");

// });



$('#overlay').click(function(e){alert('success');

    $('#overlay').fadeIn(300);

    e.preventDefault();

});

</script>

<script type="text/javascript">

    var companies = [];

    var zipcodes =[];

    $(document).on('click','.removefiles',function(){
        var cunrrcategory = $(this).parent().attr("data-id");
        var cunrrcategoryvalue = $(this).parent().attr("new-data");
        var url_details = window.location.pathname;
        if(cunrrcategory=='company'){
            $.each(companies,function(index,value){
                if(value==cunrrcategoryvalue){
                    delete companies[index];
                }
            });

        }      
        if(cunrrcategory=='zipcode'){
            $('.Zip-codes').val('');
            $('#zipcode-check').val('');
            $(this).remove();
        }  
        if(cunrrcategory=='country'){
             $('.tag').each(function() {
                var category = $(this).attr('data-id');
                var country = $(this).attr('new-data');
                if(cunrrcategoryvalue==country){
                    $(this).remove();
                }
            });
        }
        $(".selected_value ul."+cunrrcategory+" li").each(function(){
            var categorys = $(this).attr('new-data');
            if(categorys==cunrrcategoryvalue){
                $(this).remove();
            }
        });
        $('.all_selected_value_exclude li').each(function(){
            if($(this).attr('new-data')==cunrrcategoryvalue){
              $(this).remove();
            }
        });
        $('.all_selected_value li').each(function(){
            if($(this).attr('new-data')==cunrrcategoryvalue){
                $(this).remove();
            }
        });
        $('.filter_result:checked').each(function(){
            var incld_value = $(this).val();
            if(incld_value==cunrrcategoryvalue){
                $(this).prop('checked', false);

            }
        });
        var zipcodes=[];
        var data = {};
        var state = [];
        var city = [];
        var company = [];
        var contact= [];
        var countries =[];
        var stateexclude =[];
        var cityexclude=[];
        var companyexclude=[];
        var contactexclude = [];
        var range = {};
        var count ='';
        var state_count='';
        var city_count='';
        var company_count='';
        var zipcode_count='';
        var Specialty_counts = '';
        var job_funtion_count = '';
        var type = $('#type_filter').val();
        var check=0;

        $('.tag').each(function() {
            var category = $(this).attr('data-id');
            var country = $(this).attr('new-data');
            if(category=='country'){
                countries.push($(this).attr('new-data'));
            }
        });
        $('#'+type+'_number').css("z-index", "99999"); 

        var exc = 0;
        $('.all_selected_value_exclude li').each(function(){
            exc =1;

        });
        if(exc==0){
            $('.exclude-div').hide();
        }
           
        $('.all_selected_value li').each(function(){
            var category = $(this).attr('data-id');
            if(category=='state'){
                state.push($(this).attr('new-data'));
            }else if(category=='city'){
                city.push($(this).attr('new-data'));
            }else if(category=='company'){
                company.push($(this).attr('new-data'));
            }else if(category=='Contact'){
                contact.push($(this).attr('new-data'));
            }

        });

        $('.all_selected_value_exclude li').each(function(){
            var category = $(this).attr('data-id');
            if(category=='state'){
                stateexclude.push($(this).attr('new-data'));
            }else if(category=='city'){
                cityexclude.push($(this).attr('new-data'));
            }else if(category=='company'){
                companyexclude.push($(this).attr('new-data'));
            }else if(category=='Contact'){
                contactexclude.push($(this).attr('new-data'));
            }
        });
        if(state!=''){
            data['state'] = state;
            check=1;
        }
        if(stateexclude!=''){
            data['state_exclude'] = stateexclude;
            check=1;
        }

        if(company !=''){
            data['company_name'] = company;
            check=1;
        }
        if(companyexclude !=''){
            data['company_name_exclude'] = companyexclude;
            check=1;
        }


        if(city!=''){
            data['city'] = city;
            check=1;
        }   
        if(cityexclude!=''){
            data['city_exclude'] = cityexclude;
            check=1;
        }   

        if(contact != ''){
            data['Contact']=contact;
            check=1;
        }
        if(contactexclude != ''){
            data['Contact_exclude']=contactexclude;
            check=1;
        }

        if(countries != ''){
            data['country'] = countries;
            check=1;
        }
        if(url_details !=''){
            data['url_details']=url_details;
            
        }
        if(SerachType !=''){
            data['types']=SerachType;
        }
        Specialty_counts = contact.length;
        if(Specialty_counts>0){
            $('.Contact_count').html("There is "+ Specialty_counts +" Selected item"); 
            $('#Contact_number').html(Specialty_counts);
        }
        if(contactexclude.length>0){
            $('.Contact_count').html("There is "+ contactexclude.length +" Selected item"); 
            $('#Contact_number').html(contactexclude.length);
        }
        if(Specialty_counts==0 && contactexclude.length==0 && cunrrcategory=='Contact'){
            removealltypeattr(cunrrcategory);
            $('.Contact_count').html("There is No Selected item"); 
            $('#Contact_number').hide(); 
        }
        state_count=state.length;
        if(state_count>0){
            $('.state_count').html("There is "+ state_count +" Selected item"); 
            $('#state_number').show(); 
            $('#state_number').html(state_count); 
        }
        if(stateexclude.length>0){
            $('.state_count').html("There is "+ stateexclude.length +" Selected item"); 
            $('#state_number').html(stateexclude.length);
        }
        if(state_count==0 && stateexclude.length==0 && cunrrcategory=='state'){
            removealltypeattr(cunrrcategory);
            $('.state_count').html("There is No Selected item"); 
            $('#state_number').hide(); 
        }
        
        city_count = city.length;
        if(city_count>0){
            $('.city_count').html("There is "+ city_count +" Selected item");
            $('#city_number').show(); 
            $('#city_number').html(city_count); 
        }
        if(cityexclude.length>0){
            $('.city_count').html("There is "+ cityexclude.length +" Selected item");
            $('#city_number').show(); 
            $('#city_number').html(cityexclude.length); 
        }
        if(city_count==0 && cityexclude.length==0 && cunrrcategory=='city'){
            removealltypeattr(cunrrcategory);
            $('.city_count').html("There is No Selected item"); 
            $('#city_number').hide(); 
        }
        company_count=company.length;
        if(company_count>0){
            $('.company_count').html("There is "+ company_count +" Selected item"); 
            $('#company_number').show();
            $('#company_number').html(company_count);
        }
        if(companyexclude.length>0){
            $('.company_count').html("There is "+ companyexclude.length +" Selected item"); 
            $('#company_number').show();
            $('#company_number').html(companyexclude.length);
        }
        if(company_count==0 && companyexclude.length==0 && cunrrcategory=='company'){
            removealltypeattr(cunrrcategory);
            $('.company_count').html("There is No Selected item"); 
            $('#company_number').hide(); 
        }
        console.log(check)
        if(check==1){

            $.ajax({
                headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                type:'POST',
                url:"{{ url('/demofilter') }}",
                data: {
                'data':data,
                'range':range,
                },
                beforeSend: function() {
                    if( $('.search-result').is(':visible') ) {
                      $('.search-result').hide();
                    }

                    if( $('.range-of-contact').is(':visible') ) {
                      $('.range-of-contact').hide();
                    }
                    if( $('.search-result-exist').is(':visible') ) {
                      $('.search-result-exist').remove();
                    }
                    if( $('.range-of-contact-exist').is(':visible') ) {
                      $('.range-of-contact-exist').remove();
                    }
                    if( $('.before-result-search').is(':visible') ) {
                      $('.before-result-search').remove();
                    }
                    $('.filter-result-shows').show();
                    $('div.filter-result-shows  div.tool-top-bar-left span.default-msg-for-contacts').text('loading');
                    $('div.filter-result-shows  div.tool-top-bar-left span.tool-top-bar-notification').text('we are getting your result');
                    loder();
                },
                success:function(data){
                    companydetails(data);
                }
            });
        }else{
            $('div #find-results-check input[type=checkbox]').removeAttr('data-type');
            $('div #find-results-check button[data-id="include"').addClass('include');
            $('div #find-results-check button[data-id="include"').removeClass('is-include-check');
            $('div #find-results-check button[data-id="Exclude"').removeClass('is-include-check');
            $('div #find-results-check button[data-id="Exclude"').addClass('exclude');
            $('div #find-results-check input[type=checkbox]').removeClass('is-child-check');
            $('#remove-country').html('');
            $('#remove-country').hide();
            if($('.all_selected_value_exclude li').length>0){
                $('.all_selected_value_exclude li').remove();
                $('.exclude-div').hide();
            }
            if($('.section-flex-tool-no-result').is(':visible')){
                $('.section-flex-tool-no-result').hide();
            }      
            $(".selected_value p").each(function(){
                $(this).html('There is no selected item.');
            });
            $(".selected_value ul li").remove();
            if( $('.search-result').is(':visible') ) {
                $('.search-result').hide();
            }
            if($('.section-flex-tool-no-result-no-data-found').length>0){
                $('.section-flex-tool-no-result-no-data-found').remove();
            }
            if( $('.range-of-contact').is(':visible') ) {
                $('.range-of-contact').hide();
            }
            if( $('.search-result-exist').is(':visible') ) {
                $('.search-result-exist').remove();
            }
            if( $('.remove-spans-exist').is(':visible') ) {
                $('.remove-spans-exist').hide();
            }
            if( $('.contact-budget-container range-of-contact').is(':visible') ) {
                $('.contact-budget-container range-of-contact').hide();
            }
            if( $('.range-of-contact-exist').is(':visible') ) {
                $('.range-of-contact-exist').hide();
            }

            if( $('.before-result-search').is(':visible') ) {
                $('.before-result-search').remove();
            }

            if($('.tag').length>0){
                $('.tag').remove();
            }
            $('#zipcode-check').val('');
            $('.zipcod').val('');
            $('.section-flex-tool-no-result').show();
            $('.filter-result-shows').show();
            $('div.filter-result-shows  div.tool-top-bar-left span.default-msg-for-contacts').text('ADD MORE FILTERS');
            $('div.filter-result-shows  div.tool-top-bar-left span.tool-top-bar-notification').text('Please add more filters to your search');
            $('div.remove-all div.remove-text strong').html('');
            $('div.remove-all div.tags span.tag-first').remove();
            $('.remove-spans').hide();
            $('.table').hide();
            $('.all_selected_value').find('.loca-tion').remove(); 
            $('.selected_value').find('.loca-tion').remove();
            $('.loca-tion').hide();
            $('.filter_result:checked').each(function(){
                $(this).prop('checked', false);
            })
            $('.section-flex-tool-no-result').show();
            $('#remove-country').hide();
            $('#remove-country').text('');
            $('.remove-number').html('');
            $('.remove-number').hide();
            $('div.remove-all span.all_selected_value').html(''); 
            $('#rundiv-app').show();
            $('.location').hide();
            $('.removeBox').remove();
            var url = 'tool/healthcare';
            window.history.pushState(null, null, '/'+url);

        }

    })

</script>

<script type="text/javascript">

    $(document).on('click','.removeBox', function() {
        $('div #find-results-check input[type=checkbox]').removeAttr('data-type');
        $('div #find-results-check button[data-id="include"').addClass('include');
        $('div #find-results-check button[data-id="include"').removeClass('is-include-check');
        $('div #find-results-check button[data-id="Exclude"').removeClass('is-include-check');
        $('div #find-results-check button[data-id="Exclude"').addClass('exclude');
        $('div #find-results-check input[type=checkbox]').removeClass('is-child-check');
        if($('.all_selected_value_exclude li').length>0){
            $('.all_selected_value_exclude li').remove();
            $('.exclude-div').hide();
        }
        if($('.section-flex-tool-no-result').is(':visible')){
            $('.section-flex-tool-no-result').hide();
        }
        $(".selected_value p").each(function(){
            $(this).html('There is no selected item.');
        });
        $(".selected_value ul li").remove();
        if( $('.search-result').is(':visible') ) {
          $('.search-result').hide();
        }
        if($('.section-flex-tool-no-result-no-data-found').length>0){
            $('.section-flex-tool-no-result-no-data-found').remove();
        }
        if( $('.range-of-contact').is(':visible') ) {
            $('.range-of-contact').hide();
        }
        if( $('.search-result-exist').is(':visible') ) {
            $('.search-result-exist').remove();
        }
        if( $('.contact-budget-container range-of-contact').is(':visible') ) {
          $('.contact-budget-container range-of-contact').hide();
        }
        if( $('.range-of-contact-exist').is(':visible') ) {
            $('.range-of-contact-exist').hide();
        }
        if( $('.before-result-search').is(':visible') ) {
            $('.before-result-search').remove();
        }
        if($('.tag').length>0){
            $('.tag').remove();
        }
        $('#zipcode-check').val('');
        $('.zipcod').val('');
        $('.section-flex-tool-no-result').show();
        $('.filter-result-shows').show();
        $('div.filter-result-shows  div.tool-top-bar-left span.default-msg-for-contacts').text('ADD MORE FILTERS');
        $('div.filter-result-shows  div.tool-top-bar-left span.tool-top-bar-notification').text('Please add more filters to your search');
        $('div.remove-all div.remove-text strong').html('');
        $('div.remove-all div.tags span.tag-first').remove();
        $('.remove-spans').hide();
        $('.table').hide();
        $('.all_selected_value').find('.loca-tion').remove(); 
        $('.selected_value').find('.loca-tion').remove();
        $('.loca-tion').hide();
        $('.filter_result:checked').each(function(){
            $(this).prop('checked', false);
        })
        $('.section-flex-tool-no-result').show();
        $('#remove-country').hide();
        $('#remove-country').text('');
        $('.remove-number').html('');
        $('.remove-number').hide();
        $('div.remove-all span.all_selected_value').html(''); 
        $('#rundiv-app').show();
        $('.location').hide();
        $('.removeBox').remove();
        var url = 'tool/real_estate';
        window.history.pushState(null, null, '/'+url);
    });

        </script>



<script type="text/javascript">

    $(document).on('click','.include-run-box',function(){
        $('div.tags span.tag-first').remove();
        $('.button-remove-first').remove();
        var url_details = window.location.pathname;
        var data1={};
        if(url_details !=''){
            data1['url_details']=url_details;
        }
        data1['sample']=1;
        if(SerachType !=''){
            data1['types']=SerachType;
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            type:'POST',
            url:"{{ url('/demofilter') }}",
            data: {
                'data':data1,
            },
            beforeSend: function() {
                // setting a timeout
                // $(placeholder).addClass('loading');
                if( $('.search-result').is(':visible') ) {
                    $('.search-result').hide();
                }

                if( $('.range-of-contact').is(':visible') ) {
                    $('.range-of-contact').hide();
                }

                if( $('.search-result-exist').is(':visible') ) {
                    $('.search-result-exist').remove();
                }

                if( $('.range-of-contact-exist').is(':visible') ) {
                    $('.range-of-contact-exist').hide();
                }

                if( $('.before-result-search').is(':visible') ) {
                    $('.before-result-search').remove();
                }
                $('.filter-result-shows').show();
                $('div.filter-result-shows  div.tool-top-bar-left span.default-msg-for-contacts').text('loading');
                $('div.filter-result-shows  div.tool-top-bar-left span.tool-top-bar-notification').text('we are getting your result');
                loder();

            },

            success:function(data){
                hidelodare();
                $('.section-flex-tool-no-result').hide();
                $('input[type=checkbox][value="United States"]').prop('checked', true);
                $('#remove-country').show();
                $('#remove-country').text('1');
                $('#rundiv-app').hide();
                $('#result-div').show();
                $('.remove-spans').show();
                $('div.remove-all div.remove-text strong').html('Include');
                $('.tags').append('<span class="tag" new-data="United States" data-id="country" >Country: United States<button type="button" class="tag-remove removefiles"></button></span>');        
                $('.remove-spans').show(); 
                $('.table').show();
                $('.result-search').show();
                $('.remove-spans').show();  
                $('.result-table-exist').remove();
                $('.remove-spans-exist').remove();
                $('.filter-result-shows').show();
                $('div.filter-result-shows  div.tool-top-bar-left span.default-msg-for-contacts').text('OVER 1M CONTACTS');
                $('div.filter-result-shows  div.tool-top-bar-left span.tool-top-bar-notification').text('Please add more filters to your search');
                if($('.removeBox').length==0){
                    $('div.exclude-div').after('<button type="button" class="button button-octonary button-xsmall tags-remove-all-btn removeBox">Clear All Filters </button>');
                }
                var country = 'United States';
                $('input[type=checkbox][value="'+country+'"]').prop('checked', true);
                countrval = '<li class="filter-save-data" new-data="'+country+'" data-id="country"><span class="text-success">include</span>  '+country+'<button type="button" class="removefiles fa fa-times "></button></li>';
                $('.selected_value .'+ 'country').html('');
                $('.selected_value .'+ 'country').append(countrval); 
                $('table').show();
                var html ='';
                $.each(data.result, function( index, value ) {
                    // Display Email In Asterisk Pattern(*)
                    var email = value["email_address"];
                    var stremail = email.length;
                    var str = '';
                    for(var i=0; i < stremail; i++){
                        if(i < 3 || i > 5 && i != (stremail-2)) {
                        str += '*';
                        } else {
                        str += value["email_address"][i];
                        }
                    }
                    value["email_address"] = str;
                    // Display Lastname In Asterisk Pattern(*)
                    var lastname = value["last_name"];
                    var strlastnm = lastname.length;
                    var str2 = '';
                    for(var j=0; j < strlastnm; j++){
                        if(j < 3 || j > 5 && j != (strlastnm-2)){
                        str2 += '*';
                        }else{
                        str2 += value["last_name"][j];
                        }
                    }
                    value["last_name"] = str2;
                    // Display Company Name In Asterisk Pattern(*)
                    var cmpyname = value["company_name"];
                    var strcmpynm = cmpyname.length;
                    var str3 = '';
                    for(var k=0; k < strcmpynm; k++){
                        if(k < 3 || k > 5 && k != (strcmpynm-2)){
                        str3 += '*';
                        }else{
                        str3 += value["company_name"][k];
                        }
                    }
                    value["company_name"] = str3;
                    

                    html += '<tr class="get-data" data-id = "'+value["id"]+'">'+
                    '<input type="hidden" class="serchdata" value="'+value["id"]+'">'+
                    '<td>'+str+'</td>'+
                    '<td>'+str2+'</td>'+
                    '<td>'+value["phone_number"]+'</td>'+
                    '<td>'+value["job_title"]+'</td>'+
                    '<td>'+value["country"]+'<br>'+value["city"]+
                    '</td></tr>';
                });
                if (html) {
                    $('.result-search').html(html);
                }else{
                    $('.result-search').html('Not Found');
                }
                const state = '';
                const title = ''
                let url = 'tool/real_estate'+'/'+data.save_result;
                //var hist = history.replaceState(null, title, url);
                window.history.pushState(null, null, '/'+url);
            }

        });

    });

</script>



<script type="text/javascript">

    $('#checknotlogin').on('click', function(){



        var userid = $('#currnt_usr').val();

        if( userid == '' ){

            swal({ 

                title: "",

                text: "!You must login to save this list.",

                type: "error" 

            });

        } else {

// $('').on('click', function(){alert('2400');

$(document).on('click','.save_my_list',function(){

    var result = [];

    var filter = [];

    var industries = [];

    var state = [];

    var city = [];

    var zipcode=[];

    var joblevels=[];

    var job_funtion=[];

    var company=[];

    var countries=[];

    var userid = $('#currnt_usr').val();

    var listname = $('.list_name').val();

    var listamnt = $('input.price-filter').val();

    var totlcontact = $('#range-contact').val();

    alert(totlcontact);

    $('.table tr input[type="hidden"]').each(function(){

        result.push($(this).val());

    });

    $('.tag').each(function() {

        var category = $(this).attr('data-id');

        var country = $(this).attr('new-data');

        if(category=='country'){

            countries.push($(this).attr('new-data'));

        }

    });

    $('.all_selected_value li').each(function(){

        var category = $(this).attr('data-id');

        if(category=='industry'){

//console.log($(this).html());

industries.push($(this).attr('new-data'));

}else if(category=='state'){

    state.push($(this).attr('new-data'));

}else if(category=='city'){

    city.push($(this).attr('new-data'));

}else if(category=='company'){

    company.push($(this).attr('new-data'));

}else if(category=='zipcode'){

    zipcode.push($(this).attr('new-data'));

}else if(category=='joblevels'){

    joblevels.push($(this).attr('new-data'));

}else if(category=='Jobfunctions'){

    job_funtion.push($(this).attr('new-data'));

}



});

if(listname!=''){//alert('2461');

var rangeofstyle = $('.ui-slider-handle').attr("style");

$.ajax({

    headers: {

        'X-CSRF-TOKEN': '{{ csrf_token() }}'

    },

    type:'POST',

    url:"{{ url('/demosavesearch') }}",

    data: {

        'userid': userid, 'listname': listname, 'listamnt': listamnt, 'totlcontact': totlcontact, 'result': result, 'industry': industries, 'company': company, 'state': state, 'city': city,'zipcode':zipcode,'joblevels':joblevels,'Jobfunctions':job_funtion,'ranfgeofstyle':rangeofstyle,'country':countries,'range_of_contact':$( "input.form-control-adjust" ).val(),



    },

    success:function(data){

// alert(data); 

if(data != 0){

    swal({

        title: "", 

        text: "List saved Successfully", 

        type: "success"

    },function() {

// location.reload();

//  window.location = "http://work4brands.com/glead/buildlist";

});



}else{

    swal("Some error occure! please try again.", "You clicked the button!", "error");

}



}

});

}else{

    alert('PLEASE ENTER YOUR NAME LIST');

}



}); 

}

});

</script>

<script type="text/javascript">
    $( ".Zip-codes" ).keyup(function() {
        $('#zipcode-check').val('');
    });
     $(document).on('click', function(event) {
        if($( ".Zip-codes" ).val()!=''){
            if($('#zipcode-check').val()==''){
                $('#zipcode-check').val('set');
                var types = 'zipcodes';
                validation(types); 
            }
            

        }
    })
    
</script>


<script type="text/javascript">

$(document).on('click','.content-type-select',function(){
    var  spc_data=$(this).val();
    var dataidnot=null;
    var dataoflocal = localStorage.getItem('checkedkey');     
    $(document).find('input[name=Contact]').each(function(){ 
        if(dataoflocal==$(this).val()){ 
            $(document).find('input[type=checkbox][id="'+$(this).val()+'"]').prop('checked',false);
            localStorage.setItem('checkedkey',dataidnot);
        }else if(spc_data==$(this).val()) {
            $(this).prop('checked', true);
            localStorage.setItem('checkedkey',$(this).val());
        }else{
            $(this).prop('checked', false);
        }
    });
});
</script>
<script src="{{ asset('new-assets/js/range_contact.js') }}"></script>
<script src="{{ asset('new-assets/js/real_state.js') }}"></script>
<script src="{{ asset('new-assets/js/common.js') }}"></script>


