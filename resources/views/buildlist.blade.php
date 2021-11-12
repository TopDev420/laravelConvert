@include('filterheader')
<style>
    .view-contact-row {       
        display: flex;
        line-height: 3;
        padding-left: 0px;
    }
    .view-contact-row-strong {  
        width: 30%;
    }
    .site-content {
        margin-left: 0px !important;
    }
    .dropdown-box {
        font-size : 15px !important;
    }
    .common-popup .popup-wrap {
        min-width : 570px !important;
    }
    .search-results .left-section .filter-container.contact-filter-container .filter-parents {
        height : calc(100% - 70px) !important;
    }
    .copy-to-clipboard {
        font-size: 5px;
        color: cornflowerblue;
        padding-left: 5px;
        cursor: pointer;
    }
    .copy-to-clipboard:hover {
        color: blue;
    }
    #snackbar {
        visibility: hidden;
        min-width: 250px;
        margin-left: -125px;
        background-color: #333;
        color: #fff;
        text-align: center;
        border-radius: 2px;
        padding: 16px;
        position: fixed;
        z-index: 1;
        left: 11%;
        bottom: 30px;
        font-size: 17px;
    }

    #snackbar.show {
        visibility: visible;
        -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    @-webkit-keyframes fadein {
       from {bottom: 0; opacity: 0;} 
        to {bottom: 30px; opacity: 1;}
    }

    @keyframes fadein {
        from {bottom: 0; opacity: 0;}
        to {bottom: 30px; opacity: 1;}
    }

    @-webkit-keyframes fadeout {
        from {bottom: 30px; opacity: 1;} 
        to {bottom: 0; opacity: 0;}
    }

    @keyframes fadeout {
        from {bottom: 30px; opacity: 1;}
        to {bottom: 0; opacity: 0;}
    }
    .list-action-item-disabled {
        color : #dcd2d2 !important;
    }
    #selectCurrent1 {
        background-color: #00ce76;
        color: #fff;
        border-color: #00ce76;
        border-radius: 5px;
        padding: 5px 10px;
        margin-left: 12px;
        cursor: pointer;
    }
</style>
<div id="snackbar">Copy To Clipboard</div>
<div class="">
    <!--Start Side Bar -->
    <aside style="display:none">
        <div class="side-bar">
            <div class="side-bar-top-wrap">
                <a href="/">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAACSElEQVR42sSXT2gTQRTGs9sUhWootZCDUcSi4KGEmrZCD6JCFQUDURAaFHqMJxEvQqGn0pN4qYjSgxZEJCC9NTVEieglEFJJLPRStTHkkBwi1EupYf0W3pbHMNmZ3UZ88CPZmffetzv7dv4YlmUF/ocFPfqfABfAODgJhkAvqIFNUAI5sK7MZD+xBgnwztK3DIi55VQJjoGPln+b8SP8wOqOLXkRXrC6a0s6wo+tf2MP3YSTPpO+BFGQVvidkQmHFEE1MAJuS/qClCOsyFGWCS8qgp4y3xZrL7L2uMboXOLCRzQCKkygyNqnqK0HVDXyfObCKc13OUn+b+l6i91MQfB9BK6DWbAr9EWcoLSm8Dr5T9P1OD1pifk0wHmhaBtCnpTT8dVFLCcZWgOcpdhB8IdYBv2C6F3QFnK+cDqbLqKOz02QB08k3/4BMMCuj1L1ZzvkLaiE7ZE4rrmQOItJRvJORas7ARWF4xp4A652EDwMVj1MONtO4GsPQackwsc8znQtk5blFQ+bgVFJ20+QBBXNHE1eHDuad3tFeNoJobBGqADbLjlWeALdSSTMYu5Qm12cl4UbcqubOUPY7H0AF12GqAyi9D8EfgGD9b8HWXAI3KdfmZ0Ti8QUZiHR5ruwbn/rtBEw6dNxq2gvNSFaXLXnugW+sIAS67vnUzSvu8sM0KTxHFxjy993H6J10OdFWOS0D9ENeynkeUwfp48quEGnBh17BobptLFnxj7PTpMgAWIgAg6C3+AH+ARegQ1Z4H6FfdtfAQYAW87jdVmaAyEAAAAASUVORK5CYII="
                        class="App-logo" alt="logo">
                </a>
                <ul>
                    <li class="side-bar-item" id="homeNavBar">
                        <a data-path="/dashboard" class="side-bar-item-anchor" href="/dashboard">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAASBJREFUeNpi/P//PwORgBGIO4CYB4jzgfgPUbpAFhCBmYF43n8E2AXEgsToJcZwDiDe+B8T3ARiVUotEADiA1AD/wJxARBnAPEvqNg7IHYh1wIJID4PNegbEAcjydkD8Wuo3G8gziTVAiUgvgM1AGSQJRY1CkB8ESnIpgIxCzEW6AHxc6im2wTCmQeI1+KLfHQNdkD8Hqr4OBCLEpEIGIG4AYj/IUW+GjYL/KBh/R/qKk4ikzAMg+LoM3rkwyQToJEFA8wkGg7D+khmgMzLAgmWIHkPBhgowMjgABMwM58B4kNA3MhAXTADiBsY0cqi/0jlDrkAxQwmBhoDFhJcRKikxQoGhQ/wuZKg72jug1ELBt4CFhLS/n9y8grNfQAQYAARjR+SyJXgbgAAAABJRU5ErkJggg=="
                                alt="Dashboard" class="svg-icon">
                            <div class="sidebar-tool-tip">
                                <div class="sidebar-tool-tip-content">Dashboard</div>
                                <div class="sharp-point"></div>
                            </div>
                        </a>
                        <div class="selected-back"></div>
                    </li>
                    <li class="side-bar-item selected-path" id="advSearchNavBar">
                        <a data-path="/advanced-search/contact" class="side-bar-item-anchor"
                            href="/advanced-search/contact">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAY9JREFUeNqslrFOwzAQhpNKjYCVFKkIqHgCpJIXQEJs8AYM8BwdmBnCOzCUsjExdUOCpcDQTqiNxMICRV0TQOY3+i1FUeI4Jid9tZPc+a/P9iWuEMLJsQ44AftgG/jgA0zBLRiAV8fUpEiKJRCCROgtod9yJj6X9EULPHGQH3AFjnhfPZfXAz4X9G+ZinjggYEvoFsS2KWfYJxnIhIyIAJrJimg34xxYZnIFnMsUxAYCigCxiUcJ9evgbU/BU1wDUZONRsxrslxcq3BbSrt0rEzFXeg28JvzKtfMVWKNuPnRT4ufmJoecC1nImMjdl3i9I1Z9+3FFllu9CtScR+YCmyw3asExmyf2wpouKGuoWX+/vrn+ck5gYwOvGziid+yrjzqrUrMpjRbqqkyNO+YVuF++AQrPNPtHndT1Xhb7ZjXTXO3lgBFwbvk5h+m2BSJlQ0xQ44A/fgk4MswB3ocXbpDCihSZ6QY1lKsmiF6hLRCtUpUihUt0hW6FG9tOq2d7AHnsHNX2ku+O6q1X4FGABENikzwWacawAAAABJRU5ErkJggg=="
                                alt="Lead Builder" class="svg-icon">
                            <div class="sidebar-tool-tip">
                                <div class="sidebar-tool-tip-content">Lead Builder</div>
                                <div class="sharp-point"></div>
                            </div>
                        </a>
                        <div class="selected-back"></div>
                    </li>
                    <li class="side-bar-item" id="seekerNavBar">
                        <a data-path="/seeker" class="side-bar-item-anchor" href="/seeker">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAPJJREFUeNpi/P//PwMZYCoQywBxFxAfxasSZAGJOOc/AkwjpJ5Uw/2A+A/U8M1AzExNC3SB+CvU8EtAzE+MPmINlwHix1DDn0L5DKRYwIRHERcQn4MaDvKBOSnBCiJUgfg4ECtiUQAK441Qw/9B44CBVAvmQQ14A8TeaAr6kVJMBRkpDmzBSiRDQK5sgbo8E0l8BjmGwyxgBOIGqOEwcAYpOe4FYjZKLIDhYCD+8h8VXCWQHAkCdA36QPwAKvcKiFUIuJBkC0BYFIh3k5occWFGMgs7ogETA40BzS1gIVLd/yHvA8aRG8l0jYP/Q9IHAAEGAE9jqTiJZ7v6AAAAAElFTkSuQmCC"
                                alt="Seeker" class="svg-icon">
                            <div class="sidebar-tool-tip">
                                <div class="sidebar-tool-tip-content">Seeker</div>
                                <div class="sharp-point"></div>
                            </div>
                        </a>
                        <div class="selected-back"></div>
                    </li>
                    <li class="side-bar-item" id="myLeadsNavBar">
                        <a data-path="/my-leads" class="side-bar-item-anchor" href="/my-leads">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAXCAYAAADk3wSdAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAXBJREFUeNqslL1OAkEUhReUH0NlZWx0AxYk8gDGxMIKY+EjGLHxJSi11YICeAA7WvUBTKi0tlKDNHYiiQWIDueas8mwzqw7Kyf5Mtk5954Q7s14SikvgnXQAj0w4tnivbUvKnAPDJVZQ/pOoT54Z0AHVECeZ0cL9l1C21qgyQ+C2y6hL2yqWPxN+j2Tn/pJ/q0RyIIcGBv8LGvGrJlR2jPrleeGxS+F6mKFXvOsW/x6qG5WEdMf8H+7BGXel/mt6Puue1rV1sq0p9Ukyy+sgSZ4Bh88m7y39tmm/y8tGu5SYAfsgyJYNtS8gScO6lZGEzWobXCv3HQHtmz/6RH4VMkkL9hhOFQmOdGKuuAAFCzDKNDvaj3yg3aD0CXQ18wzkP5jKwKk7lTrfQQ5MU60y4uYYWHOtYyaXNzw4wFkEoZm2C+68vh8iY4TBgbUmNOX5Z9gsxbAqu3ViakV9n9J6DcXfl5S8vQ1+ODOQ5LTmAowACMWNyyizxfSAAAAAElFTkSuQmCC"
                                alt="My Leads" class="svg-icon">
                            <div class="sidebar-tool-tip">
                                <div class="sidebar-tool-tip-content">My Leads</div>
                                <div class="sharp-point"></div>
                            </div>
                        </a>
                        <div class="selected-back"></div>
                    </li>
                </ul>
            </div>
            <div class="side-bar-bottom-wrap">
                <div class="release-note engage-logo-wrap">
                    <div class="icon-wrap">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyNpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTQ4IDc5LjE2NDAzNiwgMjAxOS8wOC8xMy0wMTowNjo1NyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6QTAwNTdDQkFCMTVCMTFFQTg3N0U4QkQyNkRFRjYyNjkiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6QTAwNTdDQjlCMTVCMTFFQTg3N0U4QkQyNkRFRjYyNjkiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIDIxLjAgKFdpbmRvd3MpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NDM1Qjk2RThCMDcyMTFFQTkzMEJCQUI2QUQ3Qzc3RjQiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NDM1Qjk2RTlCMDcyMTFFQTkzMEJCQUI2QUQ3Qzc3RjQiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz6kLV7DAAACdElEQVR42sSXT0hVQRSH33tp4aKEpKgkUNyIUQQlSMvogVFEBLrMdglSuyAKIYhMENr0NkX/aFFC5CLQXS2i3GhZmuXKQiiIalHPLLO6fRPnwjDduXPn3hce+Hi8O2fO/GbuuWdm8kEQ5JbTqjx8V0ArtEMbNEGDFqMMszAOwzACi86oagUc1MFJmAv87D2cgJVx8eMGVh1PQTnIZtOwzVfAFpgKKmdfYV9SAe0wH1TefsB+l4C94vi/bAF22AS0OGZ+BtbDHnibQcQsrDEFVMFETKcJY6WOJxjoERRlxv1GW8kU0OMINm4IOObw/6DPUhjQ2n9CcyigGt4lmFEvbJLXcMjheyciuXcZPtdCAQc936F6/7UwbGn/DacjBHRFfJqrVcONFIl0GTbDJTgLI/J8FFqhHjqhIIM3SvKZ1qkaZ1IIKGvBQ9TrqZHqOa+t1jNYsk0kJwnhaxcsFbTkGedJQXY5X5u0PP/oGadJCVjw7DQFDy1tzZ6xatVe/hJ2xjjNQa9yhi8wCIehBqY1P3VG6EhzILnvEHAebmqDPIUWWblbMoHX8AkKnuOXw603zi5Kgq2SvT3KFqWyXfVMwpkwe4ccjs/hjcPnMayFK/AioYDBUEBDBU4+Y1ptUL+3E/Tp1r9hVd9/ZRDQbdSEosNfFac6PWmGoAuWUp6wNxr/Gx3+d/8mbkQ1a4NXKU87R2ADHJAt2WbfZH+wHkrVFn20wgdT3XqSHMtDtsK5FPcCm5WS3gtMVGbvhnsZBu+DfFoB5r3hOnxPOPCkiP8nVj7j5XSd1P8ibId6qIbPUp5H5et6oG6BUQGyCshshdwy2x8BBgB9QkLH5XWeMgAAAABJRU5ErkJggg=="
                            alt="engage-logo">
                    </div>
                </div>
                <div class="feedback release-note">
                    <div class="feedback-icon-wrap side-bar-item-anchor icon-wrap">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAALNJREFUeNpi+P//vycQP/tPfQAy05MRxGBgYJBkoA14zoRk+HYglgJiRgqxFNQsEJAE+eA/lAOSeE4ll4McDQoZBmQLGKkcPGBzmRhoDAbMgsNQL+LCh2ntA6LjazSSaRbJREc6tXzAOCgimZolqgS2IJqDLEEBkAbiudiCiBbgBS2T6VMgTmZAquK2gDxDbQwLoh9ArA3E92iV0TppYTgskkEGa0F9QZOiIo9WhoMAQIABAEXL7tR96JZnAAAAAElFTkSuQmCC"
                            alt="prifile">
                        <div class="sidebar-tool-tip">
                            <div class="sidebar-tool-tip-content">Feedback</div>
                            <div class="sharp-point"></div>
                        </div>
                    </div>
                    <div class="common-popup-mask feedback-mask hide"></div>
                    <div class="user-dropdown hide">
                        <span class="sharp-point"></span>
                        <div class="form-section">
                            <textarea id="feedbackFormId" class="editable-wrap"
                                placeholder="Enter Feedback ..."></textarea>
                            <div class="action-btn-wrap">
                                <div class="action-btn">Cancel</div>
                                <div class="action-btn positive-btn">Submit Feedback</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="account-profile release-note">
                    <div class="account-icon-wrap icon-wrap">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAipJREFUeNqUljsvREEUx9dKZAuSJaGz269GoiLbkOg8SqGl3kIkvoDCmyh8AEJCNAqUkq3oRBAqkdzGM1wEsbvjP/IfZseZtTvJL7l7nvfuzDlnqpRSkRIrAQZBF0iBRvAJAnAF9sEmuPRG0AkEEmAd5NTvyoMH8KKKV462CSmWFLwHPNH5DkyBDhCzbGopm6KNXiF9SybI8E01cwwU+QdtM2v5ZXwJBkABvIJeJ0icjqskQ5lt00vfAmMVJWjmJ2pln+OYBtfq77qhzrbt41eEZk+MYo1Oi45DEjxStwW6QT+fFXVJx2eBujWTIMmToE9Ig2O87EkcoUzRxpY3MJaOmdSCcRouCEHOqWsSdI3UXQg68xXjUZRCJ0tiWyiTepAHt4LuDuRAXNCZWJ06W8CNiQlvkuWbpAVdmrqsoIsxZqB/vLNYpDM+zCBnTqXq51PqRjy+OuaHSRB6jKrBLgO9gT3yRtkObSTf0CQIaFznMawB0ywis54pq/H41NEu0Jt8wg1p8/RDLS+AI2645piyUj6R79jWMZ0XNvFA/b8OhUPwc0ylQouCCbYNxc0cBa3sP3E+j1obXaBP1Cq0vCk0u1UsgRWr/Q7TyddJo7QJ6bPKGEWtwhy7Z6eRpcpo1YYUfexDkPC1a73GKghuGLP+roFyBs5MBQNnppyB4xuZk6BdGJnt1FU0Mt2hn3eG/n2lQ7+qjGvLEDtuC2ii/Aac8tqyUera8iXAACL9b7B95ei2AAAAAElFTkSuQmCC"
                            alt="prifile">
                    </div>
                    <div class="user-dropdown hide">
                        <span class="sharp-point"></span>
                        <div class="profile-link-list ">
                            <div class="profile-list-item animated fadeInLeft email-wrap"
                                style="animation-delay: 0.05s;">
                                <div class="icon-wrapper">
                                    <svg width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="none" d="M0 0h24v24H0V0z"></path>
                                        <path
                                            d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5-8-5h16zm0 12H4V8l8 5 8-5v10z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="text-wrapper">jahid.547799@gmail.com</div>
                            </div>
                            <div class="seperate-border"></div>
                            <div class="profile-list-item animated fadeInLeft" style="animation-delay: 0.02s;">
                                <div class="icon-wrapper">
                                    <svg width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="none" d="M0 0h24v24H0V0z"></path>
                                        <path
                                            d="M14.06 9.02l.92.92L5.92 19H5v-.92l9.06-9.06M17.66 3c-.25 0-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83a.996.996 0 0 0 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29zm-3.6 3.19L3 17.25V21h3.75L17.81 9.94l-3.75-3.75z">
                                        </path>
                                    </svg>
                                </div>
                                <a class="text-wrapper" href="/edit-profile">Edit Profile</a>
                            </div>
                            <div class="profile-list-item animated fadeInLeft" style="animation-delay: 0.01s;">
                                <div class="icon-wrapper">
                                    <svg width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="none" d="M0 0h24v24H0V0z"></path>
                                        <path d="M16.01 11H4v2h12.01v3L20 12l-3.99-4v3z"></path>
                                    </svg>
                                </div>
                                <div class="text-wrapper">Log Out</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <!-- End Side bar -->
    <section class="site-content">
        <main>
            <div class="search-results">
                <!-- Start Left Section -->
                <div class="left-section">
                    <!--
                    <div class="tab-wrapper">
                        <div id="contact-tab-id" class="tab-item selected">Contact</div>
                        <div id="company-tab-id" class="blocked-wrap tab-item">Company</div>
                        <div class="animated-border-cont">
                            <div id="animated-border" class="animated-border"
                                style="transform: translateX(10px) scaleX(0.4273);"></div>
                        </div>
                    </div>
                    -->
                    <div class="save-search-wrapper">
                        <div class="save-search open-search" id="openSearch">
                            <div class="saved-search">
                                <svg id="Capa_1" x="0px" y="0px" viewBox="0 0 451 451" xml:space="preserve"
                                    class="svg-icon">
                                    <g>
                                        <path
                                            d="M447.05,428l-109.6-109.6c29.4-33.8,47.2-77.9,47.2-126.1C384.65,86.2,298.35,0,192.35,0C86.25,0,0.05,86.3,0.05,192.3 s86.3,192.3,192.3,192.3c48.2,0,92.3-17.8,126.1-47.2L428.05,447c2.6,2.6,6.1,4,9.5,4s6.9-1.3,9.5-4 C452.25,441.8,452.25,433.2,447.05,428z M26.95,192.3c0-91.2,74.2-165.3,165.3-165.3c91.2,0,165.3,74.2,165.3,165.3 s-74.1,165.4-165.3,165.4C101.15,357.7,26.95,283.5,26.95,192.3z">
                                        </path>
                                    </g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                </svg>
                                <div class="show-elipsis">Open Search</div>
                                <i class="fa fa-angle-down dropdown-icon"></i>
                            </div>
                            <div class="save-suggestion-list animatedFast animatedDropDown hide-suggestion">
                                <div class="suggestion-list-wrap savedfilters">
                                    @if(empty($savedfilters))
                                    <div class="suggestion-item no-match-found">Create your saved search and get notified when new leads are added
                                    </div>
                                    @endif
                                    @if(!empty($savedfilters))
                                    @foreach($savedfilters as $val)
                                    <div class="suggestion-item" title="{{$val->filtername}}" data-name="{{$val->filtername}}">
                                        <div class="saved-item show-elipsis">{{$val->filtername}}</div>
                                        <div class="saved-search-manage">
                                            <svg id="Capa_1" x="0px" y="0px" viewBox="0 0 469.331 469.331" xml:space="preserve" class="svg-icon"><g>
                                                <path d="M438.931,30.403c-40.4-40.5-106.1-40.5-146.5,0l-268.6,268.5c-2.1,2.1-3.4,4.8-3.8,7.7l-19.9,147.4 c-0.6,4.2,0.9,8.4,3.8,11.3c2.5,2.5,6,4,9.5,4c0.6,0,1.2,0,1.8-0.1l88.8-12c7.4-1,12.6-7.8,11.6-15.2c-1-7.4-7.8-12.6-15.2-11.6 l-71.2,9.6l13.9-102.8l108.2,108.2c2.5,2.5,6,4,9.5,4s7-1.4,9.5-4l268.6-268.5c19.6-19.6,30.4-45.6,30.4-73.3 S458.531,49.903,438.931,30.403z M297.631,63.403l45.1,45.1l-245.1,245.1l-45.1-45.1L297.631,63.403z M160.931,416.803l-44.1-44.1 l245.1-245.1l44.1,44.1L160.931,416.803z M424.831,152.403l-107.9-107.9c13.7-11.3,30.8-17.5,48.8-17.5c20.5,0,39.7,8,54.2,22.4 s22.4,33.7,22.4,54.2C442.331,121.703,436.131,138.703,424.831,152.403z"></path></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                                            </svg>
                                            <svg id="_x31__x2C_5_px" enable-background="new 0 0 24 24" height="512" viewBox="0 0 24 24" width="512" class="svg-icon">
                                                <path d="m18.25 24h-12.5c-1.517 0-2.75-1.233-2.75-2.75v-13.5c0-.414.336-.75.75-.75h16.5c.414 0 .75.336.75.75v13.5c0 1.517-1.233 2.75-2.75 2.75zm-13.75-15.5v12.75c0 .689.561 1.25 1.25 1.25h12.5c.689 0 1.25-.561 1.25-1.25v-12.75z"></path>
                                                <path d="m22.25 8.5h-20.5c-.414 0-.75-.336-.75-.75v-2c0-1.517 1.233-2.75 2.75-2.75h16.5c1.517 0 2.75 1.233 2.75 2.75v2c0 .414-.336.75-.75.75zm-19.75-1.5h19v-1.25c0-.689-.561-1.25-1.25-1.25h-16.5c-.689 0-1.25.561-1.25 1.25z"></path>
                                                <path d="m15.25 4.5h-6.5c-.414 0-.75-.336-.75-.75v-2c0-.965.785-1.75 1.75-1.75h4.5c.965 0 1.75.785 1.75 1.75v2c0 .414-.336.75-.75.75zm-5.75-1.5h5v-1.25c0-.138-.112-.25-.25-.25h-4.5c-.138 0-.25.112-.25.25z"></path>
                                                <path d="m7.75 20c-.414 0-.75-.336-.75-.75v-7.5c0-.414.336-.75.75-.75s.75.336.75.75v7.5c0 .414-.336.75-.75.75z"></path><path d="m12 20c-.414 0-.75-.336-.75-.75v-7.5c0-.414.336-.75.75-.75s.75.336.75.75v7.5c0 .414-.336.75-.75.75z"></path>
                                                <path d="m16.25 20c-.414 0-.75-.336-.75-.75v-7.5c0-.414.336-.75.75-.75s.75.336.75.75v7.5c0 .414-.336.75-.75.75z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="save-search btn-disabled" id="saveSearch">
                            <svg id="Capa_1" x="0px" y="0px" viewBox="0 0 284.515 284.515" xml:space="preserve"
                                class="svg-icon">
                                <g>
                                    <path
                                        d="M282.166,27.382L259.88,2.937C258.174,1.066,255.76,0,253.229,0h-39.936H71.221H9C4.03,0,0,4.029,0,9v266.515 c0,4.971,4.029,9,9,9h266.514c4.971,0,9-4.029,9-9V33.446C284.514,31.203,283.676,29.04,282.166,27.382z M204.293,18v69.443 h-35.951V18H204.293z M150.342,18v69.443H80.221V18H150.342z M220.581,266.515H63.934V159.44h156.646V266.515z M266.514,266.515 h-27.934V150.44c0-4.971-4.029-9-9-9H54.934c-4.971,0-9,4.029-9,9v116.074H18V18h44.221v78.443c0,4.971,4.029,9,9,9h142.072 c4.971,0,9-4.029,9-9V18h26.962l17.259,18.933V266.515z">
                                    </path>
                                </g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                            </svg>Save Search
                        </div>
                    </div>
                    <!-- Start Filter Fields -->
                    <div class="filter-container contact-filter-container">
                        <div class="filter-parents">
                            <div class="upgradePopupMask"></div>
                            <!-- Start Job Level Filter -->
                            <div class="dropdown-section " id="joblevel" style="display:none">
                                <div class="dropdown-box">Job Level
                                    <svg width="18" height="18" viewBox="0 0 24 24" class="dropdown-icon plus-icon">
                                        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
                                    </svg>
                                    <div class="dropdown-icon">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="suggestion-list animatedFast animatedDropDown hide-suggestion">
                                    <div class="pop-input-box-wrap">
                                        <div class="pop-input-box">
                                            <input type="text" id="joblevelSearchBox" class="pop-search-box" searchURL = "joblevelsearch" requestParam = "joblevel" parentid="joblevel"
                                                placeholder="Filter Joblevel">
                                        </div>
                                    </div>
                                    <div class="suggestion-list-wrap">
                                    @if(!empty($joblevel_array))
                                    @foreach($joblevel_array as $key=>$filter_jobf)
                                        <div class="suggestion-item" data-name="{{$key}}">
                                            <div class="check-box">
                                                <div class="common-check-box">
                                                    <div class="common-check-box-content">
                                                        <div class="empty-check-box" ></div>
                                                        <div class="common-check-box-svg-wrap">
                                                            <svg width="16" height="14" viewBox="0 0 16 14">
                                                                <path d="M2 8.5L6 12.5L14 1.5"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>{{$key}}
                                        </div>
                                    @endforeach
                                    @endif
                                    </div>
                                </div>
                            </div>
                            <!-- End Job Level Filter -->
                            <!--
                            <div class="input-section lead-name">
                                <div class="input-section  page-suggestion">
                                    <input class="input-box" type="text" placeholder="Contact Name" id="name"
                                        autocomplete="new-password" value="">
                                    <span class="focus-border"></span>
                                    <svg width="18" height="18" viewBox="0 0 24 24" class="dropdown-icon plus-icon">
                                        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
                                    </svg>
                                    <div class="suggestion-list search-enter animatedFast  hide-suggestion">
                                        <div class="suggestion-list-wrap">
                                            <div class="suggestion-item">
                                                <i class="material-icons">search</i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            -->
                            <!-- Start Job Title -->
                            <div class="dropdown-section " id="jobtitle">
                                <div class="dropdown-box">Job Title
                                    <svg width="18" height="18" viewBox="0 0 24 24" class="dropdown-icon plus-icon">
                                        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
                                    </svg>
                                    <div class="dropdown-icon">
                                        <span></span>
                                    </div>
                                    <div class="lock-wrap" style="display:none">
                                        <svg width="21" height="21" viewBox="0 0 21 21"
                                            class="dropdown-icon plus-icon lock-icon">
                                            <defs>
                                                <style>
                                                    .cls-11 {
                                                        fill: #fc9a01;
                                                        fill-rule: evenodd;
                                                    }
                                                </style>
                                            </defs>
                                            <path id="Lock" class="cls-11"
                                                d="M10.5,0A10.259,10.259,0,0,1,21,10,10.259,10.259,0,0,1,10.5,20,10.259,10.259,0,0,1,0,10,10.259,10.259,0,0,1,10.5,0Zm3,8.634H13.326V7.814A2.813,2.813,0,0,0,10.583,5H10.417A2.814,2.814,0,0,0,7.674,7.814V8.634H7.5a0.571,0.571,0,0,0-.5.623v4.117A0.574,0.574,0,0,0,7.5,14H13.5a0.574,0.574,0,0,0,.5-0.626V9.258A0.571,0.571,0,0,0,13.5,8.634Zm-2.441,2.678v1.244a0.267,0.267,0,0,1-.265.263H10.2a0.267,0.267,0,0,1-.265-0.263V11.312a0.736,0.736,0,0,1-.221-0.532,0.746,0.746,0,0,1,.7-0.749c0.042,0,.125,0,0.166,0a0.745,0.745,0,0,1,.7.749A0.736,0.736,0,0,1,11.063,11.312Zm1.094-2.678H8.844V7.814a1.656,1.656,0,0,1,3.313,0V8.634Z"
                                                transform="translate(0 0.5)">
                                            </path>
                                        </svg>
                                        <div class="phoneUpgrade filterLockUpgrade">
                                            <div class="phoneUpgradeWrap">
                                                <div class="up-text">Select Job Level First
                                                </div>
                                                <div class="locked-numbers-upgrade">Job Level
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="suggestion-list animatedFast animatedDropDown hide-suggestion">
                                    <div class="pop-input-box-wrap">
                                        <div class="pop-input-box">
                                            <input type="text" id="jobtitleSearchBox" class="pop-search-box" searchURL="jobfunctionsearch" requestParam = "jobfunction" parentid="jobtitle"
                                                placeholder="Filter Title">
                                        </div>
                                    </div>
                                    <div class="suggestion-list-wrap">
                                        @if(!empty($function_array))
                                        @foreach($function_array as $key=>$filter_jobf)
                                        @if(count($filter_jobf)>1)
                                        @foreach($filter_jobf as $key1=>$filter_jobf1)
                                        <div class="suggestion-item" data-name="{{$filter_jobf1}}" level-id="{{$key}}">
                                            <div class="check-box">
                                                <div class="common-check-box ">
                                                    <div class="common-check-box-content">
                                                        <div class="empty-check-box"></div>
                                                        <div class="common-check-box-svg-wrap">
                                                            <svg width="16" height="14" viewBox="0 0 16 14">
                                                                <path d="M2 8.5L6 12.5L14 1.5"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>{{$filter_jobf1}}
                                        </div>
                                        @endforeach
                                        @endif
                                        @endforeach
                                        @endif             
                                    </div>
                                </div>
                            </div>
                            <!-- End Job Title -->
                            <!--
                            <div class="input-section lead-title check-box-wrap">
                                <div class="input-section  page-suggestion">
                                    <div class="input-box blocked-input blocked-wrap box-withoutsuggestion"
                                        id="title" autocomplete="off">Title
                                        <div class="lock-wrap">
                                            <svg width="21" height="21" viewBox="0 0 21 21"
                                                class="dropdown-icon plus-icon lock-icon">
                                                <defs>
                                                    <style>
                                                        .cls-11 {
                                                            fill: #fc9a01;
                                                            fill-rule: evenodd;
                                                        }
                                                    </style>
                                                </defs>
                                                <path id="Lock" class="cls-11"
                                                    d="M10.5,0A10.259,10.259,0,0,1,21,10,10.259,10.259,0,0,1,10.5,20,10.259,10.259,0,0,1,0,10,10.259,10.259,0,0,1,10.5,0Zm3,8.634H13.326V7.814A2.813,2.813,0,0,0,10.583,5H10.417A2.814,2.814,0,0,0,7.674,7.814V8.634H7.5a0.571,0.571,0,0,0-.5.623v4.117A0.574,0.574,0,0,0,7.5,14H13.5a0.574,0.574,0,0,0,.5-0.626V9.258A0.571,0.571,0,0,0,13.5,8.634Zm-2.441,2.678v1.244a0.267,0.267,0,0,1-.265.263H10.2a0.267,0.267,0,0,1-.265-0.263V11.312a0.736,0.736,0,0,1-.221-0.532,0.746,0.746,0,0,1,.7-0.749c0.042,0,.125,0,0.166,0a0.745,0.745,0,0,1,.7.749A0.736,0.736,0,0,1,11.063,11.312Zm1.094-2.678H8.844V7.814a1.656,1.656,0,0,1,3.313,0V8.634Z"
                                                    transform="translate(0 0.5)">
                                                </path>
                                            </svg>
                                            <div class="phoneUpgrade filterLockUpgrade">
                                                <div class="phoneUpgradeWrap">
                                                    <div class="up-text">Upgrade to use this search filter
                                                    </div>
                                                    <div class="locked-numbers-upgrade">Start Free Trial
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            -->
                            <!-- Start Industry Filter -->
                            <div class="dropdown-section" id="industry">
                                <div class="dropdown-box">Industry
                                    <svg width="18" height="18" viewBox="0 0 24 24" class="dropdown-icon plus-icon">
                                        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
                                    </svg>
                                    <div class="dropdown-icon">
                                        <span></span>
                                    </div>
                                    <div class="lock-wrap" style="display:none">
                                        <svg width="21" height="21" viewBox="0 0 21 21"
                                            class="dropdown-icon plus-icon lock-icon">
                                            <defs>
                                                <style>
                                                    .cls-11 {
                                                        fill: #fc9a01;
                                                        fill-rule: evenodd;
                                                    }
                                                </style>
                                            </defs>
                                            <path id="Lock" class="cls-11"
                                                d="M10.5,0A10.259,10.259,0,0,1,21,10,10.259,10.259,0,0,1,10.5,20,10.259,10.259,0,0,1,0,10,10.259,10.259,0,0,1,10.5,0Zm3,8.634H13.326V7.814A2.813,2.813,0,0,0,10.583,5H10.417A2.814,2.814,0,0,0,7.674,7.814V8.634H7.5a0.571,0.571,0,0,0-.5.623v4.117A0.574,0.574,0,0,0,7.5,14H13.5a0.574,0.574,0,0,0,.5-0.626V9.258A0.571,0.571,0,0,0,13.5,8.634Zm-2.441,2.678v1.244a0.267,0.267,0,0,1-.265.263H10.2a0.267,0.267,0,0,1-.265-0.263V11.312a0.736,0.736,0,0,1-.221-0.532,0.746,0.746,0,0,1,.7-0.749c0.042,0,.125,0,0.166,0a0.745,0.745,0,0,1,.7.749A0.736,0.736,0,0,1,11.063,11.312Zm1.094-2.678H8.844V7.814a1.656,1.656,0,0,1,3.313,0V8.634Z"
                                                transform="translate(0 0.5)">
                                            </path>
                                        </svg>
                                        <div class="phoneUpgrade filterLockUpgrade">
                                            <div class="phoneUpgradeWrap">
                                                <div class="up-text">Select Job Level and Job Title
                                                </div>
                                                <div class="locked-numbers-upgrade">Job Title
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="suggestion-list animatedFast animatedDropDown hide-suggestion">
                                    <div class="pop-input-box-wrap">
                                        <div class="pop-input-box">
                                            <input type="text" id="industrySearchBox" class="pop-search-box" searchURL = "industrysearch" requestParam = "industry" parentid="industry"
                                                placeholder="Filter Industry">
                                        </div>
                                    </div>
                                    <div class="suggestion-list-wrap">
                                        @if(!empty($filter_indus))
                                        @foreach($filter_indus as $indus)
                                        <div class="suggestion-item" data-name="{{$indus}}">
                                            <div class="check-box">
                                                <div class="common-check-box">
                                                    <div class="common-check-box-content">
                                                        <div class="empty-check-box"></div>
                                                        <div class="common-check-box-svg-wrap">
                                                            <svg width="16" height="14" viewBox="0 0 16 14">
                                                                <path d="M2 8.5L6 12.5L14 1.5"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>{{$indus}}
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- End Industry Filter -->
                            
                            <!-- Start Company Name Filter -->
                            <div class="input-section  page-suggestion" id="companyname">
                                <div class="dropdown-icon">
                                    <span></span>
                                </div>
                                <div class="lock-wrap" style="display:none">
                                    <svg width="21" height="21" viewBox="0 0 21 21"
                                        class="dropdown-icon plus-icon lock-icon">
                                        <defs>
                                            <style>
                                                .cls-11 {
                                                    fill: #fc9a01;
                                                    fill-rule: evenodd;
                                                }
                                            </style>
                                        </defs>
                                        <path id="Lock" class="cls-11"
                                            d="M10.5,0A10.259,10.259,0,0,1,21,10,10.259,10.259,0,0,1,10.5,20,10.259,10.259,0,0,1,0,10,10.259,10.259,0,0,1,10.5,0Zm3,8.634H13.326V7.814A2.813,2.813,0,0,0,10.583,5H10.417A2.814,2.814,0,0,0,7.674,7.814V8.634H7.5a0.571,0.571,0,0,0-.5.623v4.117A0.574,0.574,0,0,0,7.5,14H13.5a0.574,0.574,0,0,0,.5-0.626V9.258A0.571,0.571,0,0,0,13.5,8.634Zm-2.441,2.678v1.244a0.267,0.267,0,0,1-.265.263H10.2a0.267,0.267,0,0,1-.265-0.263V11.312a0.736,0.736,0,0,1-.221-0.532,0.746,0.746,0,0,1,.7-0.749c0.042,0,.125,0,0.166,0a0.745,0.745,0,0,1,.7.749A0.736,0.736,0,0,1,11.063,11.312Zm1.094-2.678H8.844V7.814a1.656,1.656,0,0,1,3.313,0V8.634Z"
                                            transform="translate(0 0.5)">
                                        </path>
                                    </svg>
                                    <div class="phoneUpgrade filterLockUpgrade">
                                        <div class="phoneUpgradeWrap">
                                            <div class="up-text">Select Job Level and Job Title
                                            </div>
                                            <div class="locked-numbers-upgrade">Job Title
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input class="input-box" type="text" placeholder="Company Name"
                                    id="companyNamecontactpage" autocomplete="new-password" value="">
                                <span class="focus-border"></span>
                                <div class="suggestion-list companyNamecontactpage animatedFast hide-suggestion ">
                                </div>
                            </div>
                            <!-- End Company Name Filter-->
                            <!-- Start Employee Count -->
                            <div class="dropdown-section" id="employeecount">
                                <div class="dropdown-box">Employee Count
                                    <svg width="18" height="18" viewBox="0 0 24 24" class="dropdown-icon plus-icon" >
                                        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
                                    </svg>
                                    <div class="dropdown-icon">
                                        <span></span>
                                    </div>
                                    <div class="lock-wrap" style="display:none">
                                        <svg
                                            width="21" height="21" viewBox="0 0 21 21"
                                            class="dropdown-icon plus-icon lock-icon">
                                            <defs>
                                                <style>
                                                    .cls-11 {
                                                        fill: #fc9a01;
                                                        fill-rule: evenodd;
                                                    }
                                                </style>
                                            </defs>
                                            <path id="Lock" class="cls-11"
                                                d="M10.5,0A10.259,10.259,0,0,1,21,10,10.259,10.259,0,0,1,10.5,20,10.259,10.259,0,0,1,0,10,10.259,10.259,0,0,1,10.5,0Zm3,8.634H13.326V7.814A2.813,2.813,0,0,0,10.583,5H10.417A2.814,2.814,0,0,0,7.674,7.814V8.634H7.5a0.571,0.571,0,0,0-.5.623v4.117A0.574,0.574,0,0,0,7.5,14H13.5a0.574,0.574,0,0,0,.5-0.626V9.258A0.571,0.571,0,0,0,13.5,8.634Zm-2.441,2.678v1.244a0.267,0.267,0,0,1-.265.263H10.2a0.267,0.267,0,0,1-.265-0.263V11.312a0.736,0.736,0,0,1-.221-0.532,0.746,0.746,0,0,1,.7-0.749c0.042,0,.125,0,0.166,0a0.745,0.745,0,0,1,.7.749A0.736,0.736,0,0,1,11.063,11.312Zm1.094-2.678H8.844V7.814a1.656,1.656,0,0,1,3.313,0V8.634Z"
                                                transform="translate(0 0.5)"></path>
                                        </svg>
                                        <div class="phoneUpgrade filterLockUpgrade">
                                            <div class="phoneUpgradeWrap">
                                                <div class="up-text">Select Job Level and Job Title</div>
                                                <div class="locked-numbers-upgrade">Job Title</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="suggestion-list animatedFast animatedDropDown hide-suggestion">
                                    <div class="pop-input-box-wrap" style="display:none">
                                        <div class="pop-input-box"><input type="text" id="empCountSearchBox" searchURL="employeesearch" parentid="employeecount"
                                                class="pop-search-box" requestParam = "employee" placeholder="Filter Employee Count"></div>
                                    </div>
                                    <div class="suggestion-list-wrap">
                                        <div class="suggestion-item" data-name="0 - 25">
                                            <div class="check-box">
                                                <div class="common-check-box ">
                                                    <div class="common-check-box-content">
                                                        <div class="empty-check-box"></div>
                                                        <div class="common-check-box-svg-wrap"><svg width="16"
                                                                height="14" viewBox="0 0 16 14">
                                                                <path d="M2 8.5L6 12.5L14 1.5"></path>
                                                            </svg></div>
                                                    </div>
                                                </div>
                                            </div>0 - 25
                                        </div>
                                        <div class="suggestion-item" data-name="25 - 100">
                                            <div class="check-box">
                                                <div class="common-check-box ">
                                                    <div class="common-check-box-content">
                                                        <div class="empty-check-box"></div>
                                                        <div class="common-check-box-svg-wrap"><svg width="16"
                                                                height="14" viewBox="0 0 16 14">
                                                                <path d="M2 8.5L6 12.5L14 1.5"></path>
                                                            </svg></div>
                                                    </div>
                                                </div>
                                            </div>25 - 100
                                        </div>
                                        <div class="suggestion-item" data-name="100 - 250">
                                            <div class="check-box">
                                                <div class="common-check-box ">
                                                    <div class="common-check-box-content">
                                                        <div class="empty-check-box"></div>
                                                        <div class="common-check-box-svg-wrap"><svg width="16"
                                                                height="14" viewBox="0 0 16 14">
                                                                <path d="M2 8.5L6 12.5L14 1.5"></path>
                                                            </svg></div>
                                                    </div>
                                                </div>
                                            </div>100 - 250
                                        </div>
                                        <div class="suggestion-item" data-name="250 - 1000">
                                            <div class="check-box">
                                                <div class="common-check-box ">
                                                    <div class="common-check-box-content">
                                                        <div class="empty-check-box"></div>
                                                        <div class="common-check-box-svg-wrap"><svg width="16"
                                                                height="14" viewBox="0 0 16 14">
                                                                <path d="M2 8.5L6 12.5L14 1.5"></path>
                                                            </svg></div>
                                                    </div>
                                                </div>
                                            </div>250 - 1000
                                        </div>
                                        <div class="suggestion-item" data-name="1K - 10K">
                                            <div class="check-box">
                                                <div class="common-check-box ">
                                                    <div class="common-check-box-content">
                                                        <div class="empty-check-box"></div>
                                                        <div class="common-check-box-svg-wrap"><svg width="16"
                                                                height="14" viewBox="0 0 16 14">
                                                                <path d="M2 8.5L6 12.5L14 1.5"></path>
                                                            </svg></div>
                                                    </div>
                                                </div>
                                            </div>1K - 10K
                                        </div>
                                        <div class="suggestion-item" data-name="10K - 50K">
                                            <div class="check-box">
                                                <div class="common-check-box ">
                                                    <div class="common-check-box-content">
                                                        <div class="empty-check-box"></div>
                                                        <div class="common-check-box-svg-wrap"><svg width="16"
                                                                height="14" viewBox="0 0 16 14">
                                                                <path d="M2 8.5L6 12.5L14 1.5"></path>
                                                            </svg></div>
                                                    </div>
                                                </div>
                                            </div>10K - 50K
                                        </div>
                                        <div class="suggestion-item" data-name="50K - 100K">
                                            <div class="check-box">
                                                <div class="common-check-box ">
                                                    <div class="common-check-box-content">
                                                        <div class="empty-check-box"></div>
                                                        <div class="common-check-box-svg-wrap"><svg width="16"
                                                                height="14" viewBox="0 0 16 14">
                                                                <path d="M2 8.5L6 12.5L14 1.5"></path>
                                                            </svg></div>
                                                    </div>
                                                </div>
                                            </div>50K - 100K
                                        </div>
                                        <div class="suggestion-item" data-name="> 100K">
                                            <div class="check-box">
                                                <div class="common-check-box ">
                                                    <div class="common-check-box-content">
                                                        <div class="empty-check-box"></div>
                                                        <div class="common-check-box-svg-wrap"><svg width="16"
                                                                height="14" viewBox="0 0 16 14">
                                                                <path d="M2 8.5L6 12.5L14 1.5"></path>
                                                            </svg></div>
                                                    </div>
                                                </div>
                                            </div>&gt; 100K
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Employee Filter -->
                            <!-- Start Revenue Filter -->
                            <div class="dropdown-section " id="revenue">
                                <div class="dropdown-box">Revenue
                                    <svg width="18" height="18" viewBox="0 0 24 24" class="dropdown-icon plus-icon">
                                        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
                                    </svg>
                                    <div class="dropdown-icon">
                                        <span></span>
                                    </div>
                                    <div class="lock-wrap" style="display:none"><svg width="21"
                                            height="21" viewBox="0 0 21 21"
                                            class="dropdown-icon plus-icon lock-icon">
                                            <defs>
                                                <style>
                                                    .cls-11 {
                                                        fill: #fc9a01;
                                                        fill-rule: evenodd;
                                                    }
                                                </style>
                                            </defs>
                                            <path id="Lock" class="cls-11"
                                                d="M10.5,0A10.259,10.259,0,0,1,21,10,10.259,10.259,0,0,1,10.5,20,10.259,10.259,0,0,1,0,10,10.259,10.259,0,0,1,10.5,0Zm3,8.634H13.326V7.814A2.813,2.813,0,0,0,10.583,5H10.417A2.814,2.814,0,0,0,7.674,7.814V8.634H7.5a0.571,0.571,0,0,0-.5.623v4.117A0.574,0.574,0,0,0,7.5,14H13.5a0.574,0.574,0,0,0,.5-0.626V9.258A0.571,0.571,0,0,0,13.5,8.634Zm-2.441,2.678v1.244a0.267,0.267,0,0,1-.265.263H10.2a0.267,0.267,0,0,1-.265-0.263V11.312a0.736,0.736,0,0,1-.221-0.532,0.746,0.746,0,0,1,.7-0.749c0.042,0,.125,0,0.166,0a0.745,0.745,0,0,1,.7.749A0.736,0.736,0,0,1,11.063,11.312Zm1.094-2.678H8.844V7.814a1.656,1.656,0,0,1,3.313,0V8.634Z"
                                                transform="translate(0 0.5)"></path>
                                        </svg>
                                        <div class="phoneUpgrade filterLockUpgrade">
                                            <div class="phoneUpgradeWrap">
                                                <div class="up-text">Select Job Level and Job Title</div>
                                                <div class="locked-numbers-upgrade">Job Title</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="suggestion-list animatedFast animatedDropDown hide-suggestion">
                                    <div class="pop-input-box-wrap" style="display:none">
                                        <div class="pop-input-box"><input type="text" id="revenueSearchBox" searchURL="revenuesearch" parentid="revenue"
                                                class="pop-search-box" requestParam = "revenue" placeholder="Filter Revenue"></div>
                                    </div>
                                    <div class="suggestion-list-wrap">
                                        <div class="suggestion-item" data-name="0 - 1M">
                                            <div class="check-box">
                                                <div class="common-check-box ">
                                                    <div class="common-check-box-content">
                                                        <div class="empty-check-box"></div>
                                                        <div class="common-check-box-svg-wrap"><svg width="16"
                                                                height="14" viewBox="0 0 16 14">
                                                                <path d="M2 8.5L6 12.5L14 1.5"></path>
                                                            </svg></div>
                                                    </div>
                                                </div>
                                            </div>0 - 1M
                                        </div>
                                        <div class="suggestion-item" data-name="1M - 10M">
                                            <div class="check-box">
                                                <div class="common-check-box ">
                                                    <div class="common-check-box-content">
                                                        <div class="empty-check-box"></div>
                                                        <div class="common-check-box-svg-wrap"><svg width="16"
                                                                height="14" viewBox="0 0 16 14">
                                                                <path d="M2 8.5L6 12.5L14 1.5"></path>
                                                            </svg></div>
                                                    </div>
                                                </div>
                                            </div>1M - 10M
                                        </div>
                                        <div class="suggestion-item" data-name="10M - 50M">
                                            <div class="check-box">
                                                <div class="common-check-box ">
                                                    <div class="common-check-box-content">
                                                        <div class="empty-check-box"></div>
                                                        <div class="common-check-box-svg-wrap"><svg width="16"
                                                                height="14" viewBox="0 0 16 14">
                                                                <path d="M2 8.5L6 12.5L14 1.5"></path>
                                                            </svg></div>
                                                    </div>
                                                </div>
                                            </div>10M - 50M
                                        </div>
                                        <div class="suggestion-item" data-name="50M - 100M">
                                            <div class="check-box">
                                                <div class="common-check-box ">
                                                    <div class="common-check-box-content">
                                                        <div class="empty-check-box"></div>
                                                        <div class="common-check-box-svg-wrap"><svg width="16"
                                                                height="14" viewBox="0 0 16 14">
                                                                <path d="M2 8.5L6 12.5L14 1.5"></path>
                                                            </svg></div>
                                                    </div>
                                                </div>
                                            </div>50M - 100M
                                        </div>
                                        <div class="suggestion-item" data-name="100M - 250M">
                                            <div class="check-box">
                                                <div class="common-check-box ">
                                                    <div class="common-check-box-content">
                                                        <div class="empty-check-box"></div>
                                                        <div class="common-check-box-svg-wrap"><svg width="16"
                                                                height="14" viewBox="0 0 16 14">
                                                                <path d="M2 8.5L6 12.5L14 1.5"></path>
                                                            </svg></div>
                                                    </div>
                                                </div>
                                            </div>100M - 250M
                                        </div>
                                        <div class="suggestion-item" data-name="250M - 500M">
                                            <div class="check-box">
                                                <div class="common-check-box ">
                                                    <div class="common-check-box-content">
                                                        <div class="empty-check-box"></div>
                                                        <div class="common-check-box-svg-wrap"><svg width="16"
                                                                height="14" viewBox="0 0 16 14">
                                                                <path d="M2 8.5L6 12.5L14 1.5"></path>
                                                            </svg></div>
                                                    </div>
                                                </div>
                                            </div>250M - 500M
                                        </div>
                                        <div class="suggestion-item" data-name="500M - 1B">
                                            <div class="check-box">
                                                <div class="common-check-box ">
                                                    <div class="common-check-box-content">
                                                        <div class="empty-check-box"></div>
                                                        <div class="common-check-box-svg-wrap"><svg width="16"
                                                                height="14" viewBox="0 0 16 14">
                                                                <path d="M2 8.5L6 12.5L14 1.5"></path>
                                                            </svg></div>
                                                    </div>
                                                </div>
                                            </div>500M - 1B
                                        </div>
                                        <div class="suggestion-item" data-name="> 1B">
                                            <div class="check-box">
                                                <div class="common-check-box ">
                                                    <div class="common-check-box-content">
                                                        <div class="empty-check-box"></div>
                                                        <div class="common-check-box-svg-wrap"><svg width="16"
                                                                height="14" viewBox="0 0 16 14">
                                                                <path d="M2 8.5L6 12.5L14 1.5"></path>
                                                            </svg></div>
                                                    </div>
                                                </div>
                                            </div>&gt; 1B
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Revenue Filter-->
                            <!-- Start Country Filter -->
                            <div class="dropdown-section " id="country">
                                <div class="dropdown-box">Country
                                    <svg width="18" height="18" viewBox="0 0 24 24" class="dropdown-icon plus-icon">
                                        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
                                    </svg>
                                    <div class="dropdown-icon">
                                        <span></span>
                                    </div>
                                    <div class="lock-wrap" style="display:none"><svg width="21"
                                            height="21" viewBox="0 0 21 21"
                                            class="dropdown-icon plus-icon lock-icon">
                                            <defs>
                                                <style>
                                                    .cls-11 {
                                                        fill: #fc9a01;
                                                        fill-rule: evenodd;
                                                    }
                                                </style>
                                            </defs>
                                            <path id="Lock" class="cls-11"
                                                d="M10.5,0A10.259,10.259,0,0,1,21,10,10.259,10.259,0,0,1,10.5,20,10.259,10.259,0,0,1,0,10,10.259,10.259,0,0,1,10.5,0Zm3,8.634H13.326V7.814A2.813,2.813,0,0,0,10.583,5H10.417A2.814,2.814,0,0,0,7.674,7.814V8.634H7.5a0.571,0.571,0,0,0-.5.623v4.117A0.574,0.574,0,0,0,7.5,14H13.5a0.574,0.574,0,0,0,.5-0.626V9.258A0.571,0.571,0,0,0,13.5,8.634Zm-2.441,2.678v1.244a0.267,0.267,0,0,1-.265.263H10.2a0.267,0.267,0,0,1-.265-0.263V11.312a0.736,0.736,0,0,1-.221-0.532,0.746,0.746,0,0,1,.7-0.749c0.042,0,.125,0,0.166,0a0.745,0.745,0,0,1,.7.749A0.736,0.736,0,0,1,11.063,11.312Zm1.094-2.678H8.844V7.814a1.656,1.656,0,0,1,3.313,0V8.634Z"
                                                transform="translate(0 0.5)"></path>
                                        </svg>
                                        <div class="phoneUpgrade filterLockUpgrade">
                                            <div class="phoneUpgradeWrap">
                                                <div class="up-text">Select Job Level and Job Title</div>
                                                <div class="locked-numbers-upgrade">Job Title</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="suggestion-list animatedFast animatedDropDown hide-suggestion">
                                    <div class="pop-input-box-wrap">
                                        <div class="pop-input-box"><input type="text" id="countrySearchBox" searchURL="countrysearch" parentid="country"
                                                class="pop-search-box" requestParam = "country" placeholder="Filter Country"></div>
                                    </div>
                                    <div class="suggestion-list-wrap">
                                        @if(!empty($filter_contry))
                                        @foreach($filter_contry as $country)
                                        <div class="suggestion-item" data-name="{{$country}}">
                                            <div class="check-box">
                                                <div class="common-check-box ">
                                                    <div class="common-check-box-content">
                                                        <div class="empty-check-box"></div>
                                                        <div class="common-check-box-svg-wrap"><svg width="16"
                                                                height="14" viewBox="0 0 16 14">
                                                                <path d="M2 8.5L6 12.5L14 1.5"></path>
                                                            </svg></div>
                                                    </div>
                                                </div>
                                            </div>{{$country}}
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- End Country Filter -->   
                            <!-- Start State Filter -->
                            <div class="dropdown-section " id="state">
                                <div class="dropdown-box blocked-wrap">State
                                    <svg width="18" height="18" viewBox="0 0 24 24" class="dropdown-icon plus-icon" style="display : none">
                                        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
                                    </svg>
                                    <div class="dropdown-icon">
                                        <span></span>
                                    </div>
                                    <div class="lock-wrap"><svg width="21"
                                            height="21" viewBox="0 0 21 21"
                                            class="dropdown-icon plus-icon lock-icon">
                                            <defs>
                                                <style>
                                                    .cls-11 {
                                                        fill: #fc9a01;
                                                        fill-rule: evenodd;
                                                    }
                                                </style>
                                            </defs>
                                            <path id="Lock" class="cls-11"
                                                d="M10.5,0A10.259,10.259,0,0,1,21,10,10.259,10.259,0,0,1,10.5,20,10.259,10.259,0,0,1,0,10,10.259,10.259,0,0,1,10.5,0Zm3,8.634H13.326V7.814A2.813,2.813,0,0,0,10.583,5H10.417A2.814,2.814,0,0,0,7.674,7.814V8.634H7.5a0.571,0.571,0,0,0-.5.623v4.117A0.574,0.574,0,0,0,7.5,14H13.5a0.574,0.574,0,0,0,.5-0.626V9.258A0.571,0.571,0,0,0,13.5,8.634Zm-2.441,2.678v1.244a0.267,0.267,0,0,1-.265.263H10.2a0.267,0.267,0,0,1-.265-0.263V11.312a0.736,0.736,0,0,1-.221-0.532,0.746,0.746,0,0,1,.7-0.749c0.042,0,.125,0,0.166,0a0.745,0.745,0,0,1,.7.749A0.736,0.736,0,0,1,11.063,11.312Zm1.094-2.678H8.844V7.814a1.656,1.656,0,0,1,3.313,0V8.634Z"
                                                transform="translate(0 0.5)"></path>
                                        </svg>
                                        <div class="phoneUpgrade filterLockUpgrade">
                                            <div class="phoneUpgradeWrap">
                                                <div class="up-text">Country must be United States for this filter</div>
                                                <div class="locked-numbers-upgrade">United States</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="suggestion-list animatedFast animatedDropDown hide-suggestion">
                                    <div class="pop-input-box-wrap">
                                        <div class="pop-input-box"><input type="text" id="stateSearchBox"
                                        searchURL="statesearch"  parentid="state" class="pop-search-box" requestParam = "state" placeholder="Filter State"></div>
                                    </div>
                                    <div class="suggestion-list-wrap">
                                        @if(!empty($filter_state))
                                        @foreach($filter_state as $stat=>$val)
                                        <div class="suggestion-item" data-name="{{$val['code']}}">
                                            <div class="check-box">
                                                <div class="common-check-box ">
                                                    <div class="common-check-box-content">
                                                        <div class="empty-check-box"></div>
                                                        <div class="common-check-box-svg-wrap"><svg width="16"
                                                                height="14" viewBox="0 0 16 14">
                                                                <path d="M2 8.5L6 12.5L14 1.5"></path>
                                                            </svg></div>
                                                    </div>
                                                </div>
                                            </div>{{$val['stateswithcode']}}
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- End State Filter -->     
                            <!-- Start City Filter -->
                            <div class="dropdown-section " id="city">
                                <div class="dropdown-box blocked-wrap">City
                                    <svg width="18" height="18" viewBox="0 0 24 24" class="dropdown-icon plus-icon" style="display : none">
                                        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
                                    </svg>
                                    <div class="dropdown-icon">
                                        <span></span>
                                    </div>
                                    <div class="lock-wrap"><svg width="21"
                                            height="21" viewBox="0 0 21 21"
                                            class="dropdown-icon plus-icon lock-icon">
                                            <defs>
                                                <style>
                                                    .cls-11 {
                                                        fill: #fc9a01;
                                                        fill-rule: evenodd;
                                                    }
                                                </style>
                                            </defs>
                                            <path id="Lock" class="cls-11"
                                                d="M10.5,0A10.259,10.259,0,0,1,21,10,10.259,10.259,0,0,1,10.5,20,10.259,10.259,0,0,1,0,10,10.259,10.259,0,0,1,10.5,0Zm3,8.634H13.326V7.814A2.813,2.813,0,0,0,10.583,5H10.417A2.814,2.814,0,0,0,7.674,7.814V8.634H7.5a0.571,0.571,0,0,0-.5.623v4.117A0.574,0.574,0,0,0,7.5,14H13.5a0.574,0.574,0,0,0,.5-0.626V9.258A0.571,0.571,0,0,0,13.5,8.634Zm-2.441,2.678v1.244a0.267,0.267,0,0,1-.265.263H10.2a0.267,0.267,0,0,1-.265-0.263V11.312a0.736,0.736,0,0,1-.221-0.532,0.746,0.746,0,0,1,.7-0.749c0.042,0,.125,0,0.166,0a0.745,0.745,0,0,1,.7.749A0.736,0.736,0,0,1,11.063,11.312Zm1.094-2.678H8.844V7.814a1.656,1.656,0,0,1,3.313,0V8.634Z"
                                                transform="translate(0 0.5)"></path>
                                        </svg>
                                        <div class="phoneUpgrade filterLockUpgrade">
                                            <div class="phoneUpgradeWrap">
                                                <div class="up-text">Country must be United States for this filter</div>
                                                <div class="locked-numbers-upgrade">United States</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="suggestion-list animatedFast animatedDropDown hide-suggestion">
                                    <div class="pop-input-box-wrap">
                                        <div class="pop-input-box"><input type="text" id="citySearchBox"
                                        searchURL="citysearch"  parentid="city" class="pop-search-box" requestParam = "city" placeholder="Filter City"></div>
                                    </div>
                                    <div class="suggestion-list-wrap">
                                        @if(!empty($filter_city))
                                        @foreach($filter_city as $cities)
                                        <div class="suggestion-item" data-name="{{$cities}}">
                                            <div class="check-box">
                                                <div class="common-check-box ">
                                                    <div class="common-check-box-content">
                                                        <div class="empty-check-box"></div>
                                                        <div class="common-check-box-svg-wrap"><svg width="16"
                                                                height="14" viewBox="0 0 16 14">
                                                                <path d="M2 8.5L6 12.5L14 1.5"></path>
                                                            </svg></div>
                                                    </div>
                                                </div>
                                            </div>{{$cities}}
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- End City Filter -->
                            <!-- Start Zip Code Filter -->
                            <div class="input-section  page-suggestion blocked-wrap" id="zipcode">
                                <div class="dropdown-icon">
                                    <span></span>
                                </div>
                                <div class="lock-wrap">
                                    <svg width="21" height="21" viewBox="0 0 21 21"
                                        class="dropdown-icon plus-icon lock-icon">
                                        <defs>
                                            <style>
                                                .cls-11 {
                                                    fill: #fc9a01;
                                                    fill-rule: evenodd;
                                                }
                                            </style>
                                        </defs>
                                        <path id="Lock" class="cls-11"
                                            d="M10.5,0A10.259,10.259,0,0,1,21,10,10.259,10.259,0,0,1,10.5,20,10.259,10.259,0,0,1,0,10,10.259,10.259,0,0,1,10.5,0Zm3,8.634H13.326V7.814A2.813,2.813,0,0,0,10.583,5H10.417A2.814,2.814,0,0,0,7.674,7.814V8.634H7.5a0.571,0.571,0,0,0-.5.623v4.117A0.574,0.574,0,0,0,7.5,14H13.5a0.574,0.574,0,0,0,.5-0.626V9.258A0.571,0.571,0,0,0,13.5,8.634Zm-2.441,2.678v1.244a0.267,0.267,0,0,1-.265.263H10.2a0.267,0.267,0,0,1-.265-0.263V11.312a0.736,0.736,0,0,1-.221-0.532,0.746,0.746,0,0,1,.7-0.749c0.042,0,.125,0,0.166,0a0.745,0.745,0,0,1,.7.749A0.736,0.736,0,0,1,11.063,11.312Zm1.094-2.678H8.844V7.814a1.656,1.656,0,0,1,3.313,0V8.634Z"
                                            transform="translate(0 0.5)">
                                        </path>
                                    </svg>
                                    <div class="phoneUpgrade filterLockUpgrade">
                                        <div class="phoneUpgradeWrap">
                                            <div class="up-text">Country must be United States for this filter
                                            </div>
                                            <div class="locked-numbers-upgrade">United States
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input class="input-box" type="text" placeholder="Zip Code"
                                    id="zipcodecontactpage" autocomplete="new-password" value="" disabled>
                                <span class="focus-border"></span>
                                <div class="suggestion-list companyNamecontactpage animatedFast hide-suggestion ">
                                </div>
                            </div>
                            <!-- End Zip Code Filter -->             
                            <!-- Start Business Type Filter -->
                            <div class="dropdown-section" id="businesstype">
                                <div class="dropdown-box">Business Type
                                    <svg width="18" height="18" viewBox="0 0 24 24" class="dropdown-icon plus-icon">
                                        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
                                    </svg>
                                    <div class="dropdown-icon">
                                        <span></span>
                                    </div>
                                    <div class="lock-wrap" style="display:none">
                                        <svg width="21" height="21" viewBox="0 0 21 21"
                                            class="dropdown-icon plus-icon lock-icon">
                                            <defs>
                                                <style>
                                                    .cls-11 {
                                                        fill: #fc9a01;
                                                        fill-rule: evenodd;
                                                    }
                                                </style>
                                            </defs>
                                            <path id="Lock" class="cls-11"
                                                d="M10.5,0A10.259,10.259,0,0,1,21,10,10.259,10.259,0,0,1,10.5,20,10.259,10.259,0,0,1,0,10,10.259,10.259,0,0,1,10.5,0Zm3,8.634H13.326V7.814A2.813,2.813,0,0,0,10.583,5H10.417A2.814,2.814,0,0,0,7.674,7.814V8.634H7.5a0.571,0.571,0,0,0-.5.623v4.117A0.574,0.574,0,0,0,7.5,14H13.5a0.574,0.574,0,0,0,.5-0.626V9.258A0.571,0.571,0,0,0,13.5,8.634Zm-2.441,2.678v1.244a0.267,0.267,0,0,1-.265.263H10.2a0.267,0.267,0,0,1-.265-0.263V11.312a0.736,0.736,0,0,1-.221-0.532,0.746,0.746,0,0,1,.7-0.749c0.042,0,.125,0,0.166,0a0.745,0.745,0,0,1,.7.749A0.736,0.736,0,0,1,11.063,11.312Zm1.094-2.678H8.844V7.814a1.656,1.656,0,0,1,3.313,0V8.634Z"
                                                transform="translate(0 0.5)">
                                            </path>
                                        </svg>
                                        <div class="phoneUpgrade filterLockUpgrade">
                                            <div class="phoneUpgradeWrap">
                                                <div class="up-text">Select Job Title For ZoomFormat
                                                </div>
                                                <div class="locked-numbers-upgrade">ZoomFormat Job Title
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="suggestion-list animatedFast animatedDropDown hide-suggestion">
                                    <div class="pop-input-box-wrap">
                                        <div class="pop-input-box">
                                            <input type="text" id="businesstypeSearchBox" class="pop-search-box" requestParam = "ownership" searchURL="ownershipsearch" parentid="businesstype"
                                                placeholder="Filter BusinessType">
                                        </div>
                                    </div>
                                    <div class="suggestion-list-wrap">
                                        @if(!empty($ownership_array))
                                        @foreach($ownership_array as $key=>$filter_ownership)
                                        <div class="suggestion-item" data-name="{{$filter_ownership}}">
                                            <div class="check-box">
                                                <div class="common-check-box">
                                                    <div class="common-check-box-content">
                                                        <div class="empty-check-box"></div>
                                                        <div class="common-check-box-svg-wrap">
                                                            <svg width="16" height="14" viewBox="0 0 16 14">
                                                                <path d="M2 8.5L6 12.5L14 1.5"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>{{$filter_ownership}}
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- End Business Type Filter -->     
                            <!-- Start Business Model Filter -->
                            <div class="dropdown-section" id="businessmodel">
                                <div class="dropdown-box">Business Model
                                    <svg width="18" height="18" viewBox="0 0 24 24" class="dropdown-icon plus-icon">
                                        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
                                    </svg>
                                    <div class="dropdown-icon">
                                        <span></span>
                                    </div>
                                    <div class="lock-wrap" style="display:none">
                                        <svg width="21" height="21" viewBox="0 0 21 21"
                                            class="dropdown-icon plus-icon lock-icon">
                                            <defs>
                                                <style>
                                                    .cls-11 {
                                                        fill: #fc9a01;
                                                        fill-rule: evenodd;
                                                    }
                                                </style>
                                            </defs>
                                            <path id="Lock" class="cls-11"
                                                d="M10.5,0A10.259,10.259,0,0,1,21,10,10.259,10.259,0,0,1,10.5,20,10.259,10.259,0,0,1,0,10,10.259,10.259,0,0,1,10.5,0Zm3,8.634H13.326V7.814A2.813,2.813,0,0,0,10.583,5H10.417A2.814,2.814,0,0,0,7.674,7.814V8.634H7.5a0.571,0.571,0,0,0-.5.623v4.117A0.574,0.574,0,0,0,7.5,14H13.5a0.574,0.574,0,0,0,.5-0.626V9.258A0.571,0.571,0,0,0,13.5,8.634Zm-2.441,2.678v1.244a0.267,0.267,0,0,1-.265.263H10.2a0.267,0.267,0,0,1-.265-0.263V11.312a0.736,0.736,0,0,1-.221-0.532,0.746,0.746,0,0,1,.7-0.749c0.042,0,.125,0,0.166,0a0.745,0.745,0,0,1,.7.749A0.736,0.736,0,0,1,11.063,11.312Zm1.094-2.678H8.844V7.814a1.656,1.656,0,0,1,3.313,0V8.634Z"
                                                transform="translate(0 0.5)">
                                            </path>
                                        </svg>
                                        <div class="phoneUpgrade filterLockUpgrade">
                                            <div class="phoneUpgradeWrap">
                                                <div class="up-text">Select Job Title For ZoomFormat
                                                </div>
                                                <div class="locked-numbers-upgrade">ZoomFormat Job Title
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="suggestion-list animatedFast animatedDropDown hide-suggestion">
                                    <div class="pop-input-box-wrap">
                                        <div class="pop-input-box">
                                            <input type="text" id="businessmodelSearchBox" class="pop-search-box" requestParam = "business" searchURL="businesssearch" parentid="businessmodel"
                                                placeholder="Filter BusinessModel">
                                        </div>
                                    </div>
                                    <div class="suggestion-list-wrap">
                                        @if(!empty($business_array))
                                        @foreach($business_array as $key=>$filter_business)
                                        <div class="suggestion-item" data-name="{{$filter_business}}">
                                            <div class="check-box">
                                                <div class="common-check-box">
                                                    <div class="common-check-box-content">
                                                        <div class="empty-check-box"></div>
                                                        <div class="common-check-box-svg-wrap">
                                                            <svg width="16" height="14" viewBox="0 0 16 14">
                                                                <path d="M2 8.5L6 12.5L14 1.5"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>{{$filter_business}}
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- End Business Model Filter -->
                            <!-- Start Business YearFounded Filter -->
                            <div class="dropdown-section" id="yearfounded">
                                <div class="dropdown-box">Business Year Founded
                                    <svg width="18" height="18" viewBox="0 0 24 24" class="dropdown-icon plus-icon">
                                        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path>
                                    </svg>
                                    <div class="dropdown-icon">
                                        <span></span>
                                    </div>
                                    <div class="lock-wrap" style="display:none">
                                        <svg width="21" height="21" viewBox="0 0 21 21"
                                            class="dropdown-icon plus-icon lock-icon">
                                            <defs>
                                                <style>
                                                    .cls-11 {
                                                        fill: #fc9a01;
                                                        fill-rule: evenodd;
                                                    }
                                                </style>
                                            </defs>
                                            <path id="Lock" class="cls-11"
                                                d="M10.5,0A10.259,10.259,0,0,1,21,10,10.259,10.259,0,0,1,10.5,20,10.259,10.259,0,0,1,0,10,10.259,10.259,0,0,1,10.5,0Zm3,8.634H13.326V7.814A2.813,2.813,0,0,0,10.583,5H10.417A2.814,2.814,0,0,0,7.674,7.814V8.634H7.5a0.571,0.571,0,0,0-.5.623v4.117A0.574,0.574,0,0,0,7.5,14H13.5a0.574,0.574,0,0,0,.5-0.626V9.258A0.571,0.571,0,0,0,13.5,8.634Zm-2.441,2.678v1.244a0.267,0.267,0,0,1-.265.263H10.2a0.267,0.267,0,0,1-.265-0.263V11.312a0.736,0.736,0,0,1-.221-0.532,0.746,0.746,0,0,1,.7-0.749c0.042,0,.125,0,0.166,0a0.745,0.745,0,0,1,.7.749A0.736,0.736,0,0,1,11.063,11.312Zm1.094-2.678H8.844V7.814a1.656,1.656,0,0,1,3.313,0V8.634Z"
                                                transform="translate(0 0.5)">
                                            </path>
                                        </svg>
                                        <div class="phoneUpgrade filterLockUpgrade">
                                            <div class="phoneUpgradeWrap">
                                                <div class="up-text">Select Job Title For ZoomFormat
                                                </div>
                                                <div class="locked-numbers-upgrade">ZoomFormat Job Title
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="suggestion-list animatedFast animatedDropDown hide-suggestion">
                                    <div class="pop-input-box-wrap">
                                        <div class="pop-input-box">
                                            <input type="text" id="businessfoundedSearchBox" class="pop-search-box" requestParam = "yearfounded" searchURL="yearfoundedsearch" parentid="yearfounded"
                                                placeholder="Business Founded">
                                        </div>
                                    </div>
                                    <div class="suggestion-list-wrap">
                                        @if(!empty($yearfounded_array))
                                        @foreach($yearfounded_array as $key=>$filter_yearfounded)
                                        <div class="suggestion-item" data-name="{{$filter_yearfounded}}">
                                            <div class="check-box">
                                                <div class="common-check-box">
                                                    <div class="common-check-box-content">
                                                        <div class="empty-check-box"></div>
                                                        <div class="common-check-box-svg-wrap">
                                                            <svg width="16" height="14" viewBox="0 0 16 14">
                                                                <path d="M2 8.5L6 12.5L14 1.5"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>{{$filter_yearfounded}}
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- End Business Model Filter -->
                            <!-- Start Sic Code Filter -->
                            <div class="input-section  page-suggestion" id="siccode">
                                <div class="dropdown-icon">
                                    <span></span>
                                </div>
                                <div class="lock-wrap" style="display:none">
                                    <svg width="21" height="21" viewBox="0 0 21 21"
                                        class="dropdown-icon plus-icon lock-icon">
                                        <defs>
                                            <style>
                                                .cls-11 {
                                                    fill: #fc9a01;
                                                    fill-rule: evenodd;
                                                }
                                            </style>
                                        </defs>
                                        <path id="Lock" class="cls-11"
                                            d="M10.5,0A10.259,10.259,0,0,1,21,10,10.259,10.259,0,0,1,10.5,20,10.259,10.259,0,0,1,0,10,10.259,10.259,0,0,1,10.5,0Zm3,8.634H13.326V7.814A2.813,2.813,0,0,0,10.583,5H10.417A2.814,2.814,0,0,0,7.674,7.814V8.634H7.5a0.571,0.571,0,0,0-.5.623v4.117A0.574,0.574,0,0,0,7.5,14H13.5a0.574,0.574,0,0,0,.5-0.626V9.258A0.571,0.571,0,0,0,13.5,8.634Zm-2.441,2.678v1.244a0.267,0.267,0,0,1-.265.263H10.2a0.267,0.267,0,0,1-.265-0.263V11.312a0.736,0.736,0,0,1-.221-0.532,0.746,0.746,0,0,1,.7-0.749c0.042,0,.125,0,0.166,0a0.745,0.745,0,0,1,.7.749A0.736,0.736,0,0,1,11.063,11.312Zm1.094-2.678H8.844V7.814a1.656,1.656,0,0,1,3.313,0V8.634Z"
                                            transform="translate(0 0.5)">
                                        </path>
                                    </svg>
                                    <div class="phoneUpgrade filterLockUpgrade">
                                        <div class="phoneUpgradeWrap">
                                            <div class="up-text">Job Title must be for ZoomFormat
                                            </div>
                                            <div class="locked-numbers-upgrade">ZoomFormat Job Title
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input class="input-box" type="text" placeholder="SIC Code"
                                    id="siccodecontactpage" autocomplete="new-password" value="">
                                <span class="focus-border"></span>
                                <div class="suggestion-list companyNamecontactpage animatedFast hide-suggestion ">
                                </div>
                            </div>
                            <!-- End Sic Code Filter -->  
                            <!-- Start Naics Code Filter -->
                            <div class="input-section  page-suggestion" id="naicscode">
                                <div class="dropdown-icon">
                                    <span></span>
                                </div>
                                <div class="lock-wrap" style="display:none">
                                    <svg width="21" height="21" viewBox="0 0 21 21"
                                        class="dropdown-icon plus-icon lock-icon">
                                        <defs>
                                            <style>
                                                .cls-11 {
                                                    fill: #fc9a01;
                                                    fill-rule: evenodd;
                                                }
                                            </style>
                                        </defs>
                                        <path id="Lock" class="cls-11"
                                            d="M10.5,0A10.259,10.259,0,0,1,21,10,10.259,10.259,0,0,1,10.5,20,10.259,10.259,0,0,1,0,10,10.259,10.259,0,0,1,10.5,0Zm3,8.634H13.326V7.814A2.813,2.813,0,0,0,10.583,5H10.417A2.814,2.814,0,0,0,7.674,7.814V8.634H7.5a0.571,0.571,0,0,0-.5.623v4.117A0.574,0.574,0,0,0,7.5,14H13.5a0.574,0.574,0,0,0,.5-0.626V9.258A0.571,0.571,0,0,0,13.5,8.634Zm-2.441,2.678v1.244a0.267,0.267,0,0,1-.265.263H10.2a0.267,0.267,0,0,1-.265-0.263V11.312a0.736,0.736,0,0,1-.221-0.532,0.746,0.746,0,0,1,.7-0.749c0.042,0,.125,0,0.166,0a0.745,0.745,0,0,1,.7.749A0.736,0.736,0,0,1,11.063,11.312Zm1.094-2.678H8.844V7.814a1.656,1.656,0,0,1,3.313,0V8.634Z"
                                            transform="translate(0 0.5)">
                                        </path>
                                    </svg>
                                    <div class="phoneUpgrade filterLockUpgrade">
                                        <div class="phoneUpgradeWrap">
                                            <div class="up-text">Job Title must be for ZoomFormat
                                            </div>
                                            <div class="locked-numbers-upgrade">ZoomFormat Job Title
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input class="input-box" type="text" placeholder="NAICS Code"
                                    id="naicscodecontactpage" autocomplete="new-password" value="">
                                <span class="focus-border"></span>
                                <div class="suggestion-list companyNamecontactpage animatedFast hide-suggestion ">
                                </div>
                            </div>
                            <!-- End Naics Code Filter -->                                   
                        </div>
                        <div class="show-all-filters" style="display:none">View all filters</div>
                    </div>
                </div>
                <!-- End Left Section -->
                <!-- Start Right Section -->
                <div class="right-section">
                    <!-- Start Save Search Popup -->
                    <div class="create-saveSearch-popup common-popup" style="display:none">
                        <div class="popup-wrap">
                            <div class="popup-close save-search-cancel" title="Click here to close">
                                <svg width="24" height="24" viewBox="0 0 24 24">
                                    <title>Click here to close</title>
                                    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                </svg>
                            </div>
                            <div class="title">Create a new Saved Search</div>
                            <div class="popup-content-wrap">
                                <input class="input-box" id="createSaveSearchInput" type="text" placeholder="Enter Search name" value="">
                                <div class="common-tooltip-error" id="filter-name-error" style="display: none;">
                                    <span class="top-arrow"></span>Please enter a name
                                </div>
                            </div>
                            <div class="popup-action-wrap">
                                <div class="popup-action-btn positive-btn popup-create">Create</div>
                                <div class="popup-action-btn popup-cancel">Cancel</div>
                            </div>
                        </div>
                    </div>
                    <div class="common-popup-mask save-search-mask" style="display:none"></div>
                    <!-- End Save Search Popup -->
                    <!-- Start View Contact Popup -->
                    <div class="create-viewContact-popup common-popup" style="display:none">
                        <div class="popup-wrap">
                            <div class="popup-close view-contact-cancel" title="Click here to close">
                                <svg width="24" height="24" viewBox="0 0 24 24">
                                    <title>Click here to close</title>
                                    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
                                    <path d="M0 0h24v24H0z" fill="none"></path>
                                </svg>
                            </div>
                            <div class="title">Contact Information</div>
                            <div class="popup-content-wrap">
                                 <div class="view-contact-row" data-row="name"><strong class="view-contact-row-strong">Name:</strong> <div style="display:flex;align-items:center;">
                                 <div id="view-contact-id" style="display:none"></div>
                                 <div id="view-contact-name">Anne World</div><span class="copy-to-clipboard"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="copy" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-copy fa-w-14 fa-fw fa-2x"><path fill="currentColor" d="M320 448v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V120c0-13.255 10.745-24 24-24h72v296c0 30.879 25.121 56 56 56h168zm0-344V0H152c-13.255 0-24 10.745-24 24v368c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24V128H344c-13.2 0-24-10.8-24-24zm120.971-31.029L375.029 7.029A24 24 0 0 0 358.059 0H352v96h96v-6.059a24 24 0 0 0-7.029-16.97z" class=""></path></svg></span></div></div>
                                <div class="view-contact-row" data-row="title"><strong class="view-contact-row-strong">Job Title:</strong> <div style="display:flex;align-items:center;"><div id="view-contact-title">Property Manager</div><span class="copy-to-clipboard"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="copy" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-copy fa-w-14 fa-fw fa-2x"><path fill="currentColor" d="M320 448v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V120c0-13.255 10.745-24 24-24h72v296c0 30.879 25.121 56 56 56h168zm0-344V0H152c-13.255 0-24 10.745-24 24v368c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24V128H344c-13.2 0-24-10.8-24-24zm120.971-31.029L375.029 7.029A24 24 0 0 0 358.059 0H352v96h96v-6.059a24 24 0 0 0-7.029-16.97z" class=""></path></svg></span></div></div>
                                <div class="view-contact-row" data-row="email"><strong class="view-contact-row-strong">Email:</strong> <div style="display:flex;align-items:center;"><div id="view-contact-email">***e@artiqueltd.com</div><span class="copy-to-clipboard"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="copy" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-copy fa-w-14 fa-fw fa-2x"><path fill="currentColor" d="M320 448v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V120c0-13.255 10.745-24 24-24h72v296c0 30.879 25.121 56 56 56h168zm0-344V0H152c-13.255 0-24 10.745-24 24v368c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24V128H344c-13.2 0-24-10.8-24-24zm120.971-31.029L375.029 7.029A24 24 0 0 0 358.059 0H352v96h96v-6.059a24 24 0 0 0-7.029-16.97z" class=""></path></svg></span></div></div>
                                <div class="view-contact-row" data-row="dphone"><strong class="view-contact-row-strong">Direct Phone:</strong><div style="display:flex;align-items:center;"><div id="view-contact-dphone">1.***.277.***</div> <span class="copy-to-clipboard"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="copy" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-copy fa-w-14 fa-fw fa-2x"><path fill="currentColor" d="M320 448v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V120c0-13.255 10.745-24 24-24h72v296c0 30.879 25.121 56 56 56h168zm0-344V0H152c-13.255 0-24 10.745-24 24v368c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24V128H344c-13.2 0-24-10.8-24-24zm120.971-31.029L375.029 7.029A24 24 0 0 0 358.059 0H352v96h96v-6.059a24 24 0 0 0-7.029-16.97z" class=""></path></svg></span></div></div>
                                <div class="view-contact-row" data-row="cname"><strong class="view-contact-row-strong">Company Name:</strong> <div style="display:flex;align-items:center;"><div id="view-contact-cname">Artique Limited</div><span class="copy-to-clipboard"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="copy" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-copy fa-w-14 fa-fw fa-2x"><path fill="currentColor" d="M320 448v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V120c0-13.255 10.745-24 24-24h72v296c0 30.879 25.121 56 56 56h168zm0-344V0H152c-13.255 0-24 10.745-24 24v368c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24V128H344c-13.2 0-24-10.8-24-24zm120.971-31.029L375.029 7.029A24 24 0 0 0 358.059 0H352v96h96v-6.059a24 24 0 0 0-7.029-16.97z" class=""></path></svg></span></div></div>
                                <div class="view-contact-row" data-row="phone"><strong class="view-contact-row-strong">Phone Number:</strong><div style="display:flex;align-items:center;"> <div id="view-contact-phone">1.***.277.***</div><span class="copy-to-clipboard"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="copy" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-copy fa-w-14 fa-fw fa-2x"><path fill="currentColor" d="M320 448v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V120c0-13.255 10.745-24 24-24h72v296c0 30.879 25.121 56 56 56h168zm0-344V0H152c-13.255 0-24 10.745-24 24v368c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24V128H344c-13.2 0-24-10.8-24-24zm120.971-31.029L375.029 7.029A24 24 0 0 0 358.059 0H352v96h96v-6.059a24 24 0 0 0-7.029-16.97z" class=""></path></svg></span></div></div>
                            </div>
                            <div class="popup-action-wrap">
                                <div class="popup-action-btn positive-btn popup-addtoleads" id="view-contact-button">Save Contact</div>
                                <a href="/tool/upgrade-plan" style="text-decoration:none"><div  style="display:none" class="popup-action-btn positive-btn" id="gotoplan">Upgrade Plan</div></a>
                                <div class="popup-saved-msg" id="view-contact-msg">This contact was already saved to your leads</div>
                                <div style="display:none" class="popup-saved-msg" id="nocredit">You don't have enough credits to view contact.</br>Please upgrade your plan.</div>
                            </div>
                        </div>
                    </div>
                    <div class="common-popup-mask view-contact-mask" style="display:none"></div>
                    <!-- End Save Search Popup -->
                    <div class=" applied-filters-section">
                        <div class="parentCont">
                            <div class="applied-filter-list-wrapper max-70">
                                <div class="applied-filter-list"></div>
                            </div>
                            <div class="moreContainer">
                                <div class="show-more-wrap" style="display:none">
                                    <div class="view-all-app-filters all-filters">Show More</div>
                                </div>
                                <div class="show-more-wrap">
                                    <div class="view-all-app-filters clear-filter">Clear All</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="adv-leads-action">
                        <div class="adv-contact-action-btn-wrap">
                            <div class="contact-action-btn selection-wrap">
                                @if(!$userinfo->planid)
                                <div class="contact-action-btn get-leads-btn blocked-wrap"><svg
                                        height="512pt" viewBox="0 0 512 512" width="512pt" class="svg-icon">
                                        <path
                                            d="m507.601562 229.316406c-15.707031-15.703125-36.585937-24.355468-58.796874-24.355468-22.210938 0-43.09375 8.652343-58.796876 24.355468l-27.75 27.75h-169.382812c-25.464844 0-49.40625 9.917969-67.410156 27.921875l-46.199219 46.199219-5.460937-5.460938c-5.855469-5.859374-15.355469-5.859374-21.210938 0l-48.203125 48.199219c-2.8125 2.8125-4.390625 6.628907-4.390625 10.605469 0 3.980469 1.578125 7.792969 4.394531 10.609375l112.46875 112.464844c2.925781 2.929687 6.765625 4.394531 10.605469 4.394531s7.679688-1.464844 10.605469-4.394531l48.203125-48.199219c2.8125-2.8125 4.394531-6.628906 4.394531-10.605469 0-3.980469-1.582031-7.792969-4.394531-10.605469l-5.460938-5.460937 17.132813-17.132813h138.390625c3.976562 0 7.792968-1.582031 10.605468-4.394531l160.664063-160.667969c2.816406-2.8125 4.390625-6.632812 4.390625-10.609374 0-3.980469-1.585938-7.796876-4.398438-10.613282zm-380.132812 246.46875-91.253906-91.25 26.984375-26.988281 91.253906 91.253906zm202.652344-90.183594h-138.386719c-3.976563 0-7.792969 1.578126-10.605469 4.390626l-21.527344 21.527343-59.121093-59.121093 46.199219-46.195313c12.339843-12.339844 28.746093-19.136719 46.195312-19.136719h139.382812l-34.269531 34.269532h-74.121093c-8.28125 0-15 6.714843-15 15 0 8.28125 6.71875 15 15 15h80.335937c3.980469 0 7.792969-1.582032 10.605469-4.394532l96.410156-96.410156c10.039062-10.039062 23.386719-15.570312 37.585938-15.570312 9.050781 0 17.753906 2.25 25.480468 6.480468zm0 0">
                                        </path>
                                        <path
                                            d="m175.667969 222.800781h160.664062c8.285157 0 15-6.714843 15-15v-16.066406c0-44.015625-27.878906-72.066406-50.40625-84.132813 11.289063-11.425781 18.273438-27.109374 18.273438-44.402343 0-34.847657-28.351563-63.199219-63.199219-63.199219s-63.199219 28.351562-63.199219 63.199219c0 17.3125 7 33.015625 18.316407 44.441406-30 16.074219-50.449219 47.730469-50.449219 84.078125v16.082031c0 8.285157 6.714843 15 15 15zm80.332031-192.800781c18.308594 0 33.199219 14.894531 33.199219 33.199219 0 18.308593-14.890625 33.199219-33.199219 33.199219s-33.199219-14.890626-33.199219-33.199219c0-18.304688 14.890625-33.199219 33.199219-33.199219zm-65.332031 161.71875c0-36.019531 29.300781-65.320312 65.332031-65.320312 36.078125 0 65.332031 29.191406 65.332031 65.335937v1.066406h-130.664062zm0 0">
                                        </path>
                                    </svg>Get Contacts<div class="lock-wrap"><svg width="21" height="21"
                                            viewBox="0 0 21 21" class="dropdown-icon plus-icon lock-icon">
                                            <defs>
                                                <style>
                                                    .cls-11 {
                                                        fill: #fc9a01;
                                                        fill-rule: evenodd;
                                                    }
                                                </style>
                                            </defs>
                                            <path id="Lock" class="cls-11"
                                                d="M10.5,0A10.259,10.259,0,0,1,21,10,10.259,10.259,0,0,1,10.5,20,10.259,10.259,0,0,1,0,10,10.259,10.259,0,0,1,10.5,0Zm3,8.634H13.326V7.814A2.813,2.813,0,0,0,10.583,5H10.417A2.814,2.814,0,0,0,7.674,7.814V8.634H7.5a0.571,0.571,0,0,0-.5.623v4.117A0.574,0.574,0,0,0,7.5,14H13.5a0.574,0.574,0,0,0,.5-0.626V9.258A0.571,0.571,0,0,0,13.5,8.634Zm-2.441,2.678v1.244a0.267,0.267,0,0,1-.265.263H10.2a0.267,0.267,0,0,1-.265-0.263V11.312a0.736,0.736,0,0,1-.221-0.532,0.746,0.746,0,0,1,.7-0.749c0.042,0,.125,0,0.166,0a0.745,0.745,0,0,1,.7.749A0.736,0.736,0,0,1,11.063,11.312Zm1.094-2.678H8.844V7.814a1.656,1.656,0,0,1,3.313,0V8.634Z"
                                                transform="translate(0 0.5)"></path>
                                        </svg>
                                        <div class="phoneUpgrade filterLockUpgrade">
                                            <div class="phoneUpgradeWrap">
                                                <div class="up-text">Unlock your views and downloads with our premium
                                                    plans</div>
                                                <a href="/tool/upgrade-plan"><div class="locked-numbers-upgrade">Start Free Trial</div></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                                
                                @else
                                <div class="box-wrap" id="selectDropdownContact">
                                    <div class="contact-chechk-box-wrap">
                                        Get Contact
                                    </div><i class="fa fa-angle-down dropdown-icon" ></i>
                                </div>
                                @endif
                                <div class="drop-popup-box animatedFast animatedDropDown">
                                    <div class="list-action-item" id="selectAll" style="display:none">All</div>
                                    <div class="list-action-item" id="selectNull" style="display:none">None</div>
                                    <div class="list-action-item list-action-item-disabled" id="selectCurrent">Selected Contacts</div>
                                    @if($userinfo->credit > 100)
                                    <div class="list-action-item" id="select100">1 - 100</div>
                                    @else
                                    <div class="list-action-item list-action-item-disabled">1 - 100</div>
                                    @endif
                                    @if($userinfo->credit > 250)
                                    <div class="list-action-item" id="select250">1 - 250</div>
                                    @else
                                    <div class="list-action-item list-action-item-disabled">1 - 250</div>
                                    @endif
                                    @if($userinfo->credit > 500)
                                    <div class="list-action-item" id="select500">1 - 500</div>
                                    @else
                                    <div class="list-action-item list-action-item-disabled">1 - 500</div>
                                    @endif
                                    @if($userinfo->credit > 1000)
                                    <div class="list-action-item" id="select1000">1 - 1000</div>
                                    @else
                                    <div class="list-action-item list-action-item-disabled">1 - 1000</div>
                                    @endif
                                    @if($userinfo->credit > 5000)
                                    <div class="list-action-item" id="select5000">1 - 5000</div>
                                    @else
                                    <div class="list-action-item list-action-item-disabled">1 - 5000</div>
                                    @endif
                                    <div class="list-action-item range-selection">
                                        <div class="range-text">Select the top</div>
                                        <div class="range-selection-box"><input id="rangeInputBox" min="1" step="1"
                                                max="{{$userinfo->credit}}" type="number" placeholder="upto {{$userinfo->credit}}" value=""><i
                                                class="fa fa-check" aria-hidden="true" id="selectByNum"></i></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bulk-action-mask"></div>
                            <div class="selected-count" style="display:none" id="contactSelectedCount">
                                <span>50</span>&nbsp;contacts&nbsp;selected.
                            </div>
                            @if($userinfo->plan != 'free')
                            <div class="" id="selectCurrent1" style="display:none">Get Selected Contacts</div>
                            @endif
                            <div id="textLoading" style="display:none">
                                <span style="padding-left : 30px;font-size: 14px;">Loading...</span>
                            </div>  
                        </div>
                        <div class="pagination-parent-wrap">
                            <div class="pagination-wrap">
                                <div class="pagination-section"><span class="pagination-current-page">1</span>&nbsp;to&nbsp;<span class="pagination-current-end-page">20</span><i
                                        class="fa fa-angle-left pagination-btn"></i><i
                                        class="fa fa-angle-right pagination-btn "></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="contact-list">
                        <div class="contact-list-wrap">
                            <div class="drop-popup-box animatedFast animatedDropDown add-to-list-single-popup "
                                style="top: 0px; left: 0px;">
                                <div class="leads-list-popup">
                                    <div class="leads-list">
                                        <div class="leads-list-item"><i class="fa fa-folder-o v-btm"></i><span
                                                class="lead-name show-elipsis">Plugin History</span><span
                                                class="lead-count"><span>240</span></span></div>
                                        <div class="leads-list-item"><i class="fa fa-folder-o v-btm"></i><span
                                                class="lead-name show-elipsis">hj</span><span
                                                class="lead-count"><span>2</span></span></div>
                                        <div class="leads-list-item"><i class="fa fa-folder-o v-btm"></i><span
                                                class="lead-name show-elipsis">ja</span><span
                                                class="lead-count"><span>0</span></span></div>
                                    </div>
                                    <div class="list-action-item create-new-list"><svg width="13" height="11"
                                            viewBox="0 0 13 11">
                                            <defs>
                                                <style>
                                                    .cls-1 {
                                                        fill: #2176b7;
                                                        fill-rule: evenodd;
                                                    }
                                                </style>
                                            </defs>
                                            <path id="List" class="cls-1"
                                                d="M9,4h4V5H9V4ZM9,7h4V8H9V7ZM4,3H7V4H4V3ZM3,0H4V7H3V0ZM0,10H13v1H0V10ZM9,1h4V2H9V1ZM0,3H3V4H0V3Z">
                                            </path>
                                        </svg>Create New List</div>
                                </div>
                            </div>
                            <div class="single-action-mask "></div>
                            <div class="contact-header">
                                <div class="contact-header-item contact-check-box-wrap">
                                    <div class="contact-check-box-wrap">
                                        <div class="common-check-box" id="selectAllContacts">
                                             <div class="common-check-box-content">
                                                 <div class="empty-check-box"></div>
                                                    <div class="common-check-box-svg-wrap"><svg width="16" height="14" viewBox="0 0 16 14">
                                                    <path d="M2 8.5L6 12.5L14 1.5"></path>
                                                    </svg>
                                                </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="contact-header-item contact-name">Name</div>
                                <div class="contact-header-item company-name">Company</div>
                                <div class="contact-header-item email">Email</div>
                                <div class="contact-header-item phone-number">Phone Number</div>
                                <div class="contact-header-item contact-action"></div>
                            </div>
                            @foreach($business_contacts as $row)
                            <div class="contact-item">
                                <div class="contact-check-box-wrap">
                                    <div class="common-check-box ">
                                        <div class="common-check-box-content">
                                            <div class="empty-check-box"></div>
                                            <div class="common-check-box-svg-wrap"><svg width="16" height="14"
                                                    viewBox="0 0 16 14">
                                                    <path d="M2 8.5L6 12.5L14 1.5"></path>
                                                </svg></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="contact-name">
                                    <div class="id item-id" style="display:none">{{$row->id}}</div>
                                    <div class="name item-name">{{ $row->first_name}} {{ $row->last_name}}</div>
                                    <div class="title item-title">{{$row->job_title}}</div>
                                </div>
                                <div class="company-name">
                                    <div class="name item-cname">{{ $row->company_name}}</div>
                                    <div class="company-address-info">{{ $row->city}},{{ $row->state}},{{ $row->country}}</div>
                                </div>
                                <div class="email item-email">{{ $row->email_address }}</div>
                                <div class="phone-number">
                                    <div class="name item-dphone">{{ $row->direct_phone}}</div>
                                    <div class="name item-phone">{{ $row->phone_number}}</div>
                                </div>
                                <div class="contact-action">
                                    <div class="contact-action-btn-wrap">
                                        <div class="contact-action-btn view-contact viewContactSingleLB">View
                                            contact</div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="common-loader" style="display: none;">
                    <div class="common-loading-mask" style="position: fixed;"></div>
                    <div class="spinner-loader-center" style="position: fixed;">
                        <div class="spinner">
                            <div class="bounce1"></div>
                            <div class="bounce2"></div>
                            <div class="bounce3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>
    <footer>
        <div class="footerLeftSection">
            <p>© 2019 All Rights Reserved Saleslift Technologies Private Limited</p>
        </div>
        <div class="footerRightSection">
            <nav>
                <ul>
                    <li class="footerLink"><a href="https://www.adapt.io/blog" target="_blank"
                            rel="noopener noreferrer" title="Blog">Blog</a></li> |<li class="footerLink"><a
                            href="/privacy.htm" rel="noopener noreferrer" title="Privacy">Privacy</a></li> |<li
                        class="footerLink"><a href="/termsAndConditions.htm" rel="noopener noreferrer"
                            title="Terms of Use">Terms of Use</a></li> |<li class="footerLink"><a
                            href="https://adaptio.freshdesk.com/support/solutions" rel="noopener noreferrer"
                            title="FAQ">FAQ</a></li> |<li class="footerLink"><a title="contact us"
                            href="mailto:support@adapt.io" target="_blank" rel="noopener noreferrer">Contact Us</a>
                    </li>
                </ul>
            </nav>
        </div>
    </footer>
    <input type="hidden" value="{{$userinfo->credit}}" id="userCredit">
</div>
<script>
    
    $(document).ready(function () {
        $(".search-header .leads-count:(1)").css("display","flex");
    });
    $(document).on('click','.dropdown-section', function(e) {
        var className = $(this).children('.dropdown-box').attr('class');
        if(className.indexOf('blocked-wrap') >= 0) {
            return;
        }
        $(".left-section").removeClass("stop-scroll");
        $(".dropdown-focused .suggestion-list").addClass('hide-suggestion');
        $(".dropdown-focused").removeClass("dropdown-focused");
        $(this).addClass("dropdown-focused");
        $(".left-section").addClass('stop-scroll');
        $(".dropdown-focused .suggestion-list").removeClass('hide-suggestion');
    });
    $(".left-section").mouseleave(function(e){
        $(".left-section").removeClass("stop-scroll");
        $(".dropdown-focused .suggestion-list").addClass('hide-suggestion');
        $(".dropdown-focused").removeClass("dropdown-focused");
        $('.save-suggestion-list').addClass('hide-suggestion');
    });
    $(document).on('click','.filter-parents .suggestion-item', function(e) {
        var className = $(this).attr('class');
        var id = $(this).parents('.dropdown-section').attr('id');
        if(className.indexOf('selected') >= 0) {
            $(this).removeClass("selected");
            $(this).find('.common-check-box').removeClass("selected");
            if($(this).attr('data-name') == 'United States') {
                lockElement('state',true);
                lockElement('city',true);
                lockElement('zipcode',false);
            }
            if(id == 'country' && $(this).attr('data-name') == 'United States') {
                deleteFilterByType('state');
                deleteFilterByType('city');
                deleteFilterByType('zipcode');
            }
            deleteFilterByVal($(this).parents('.dropdown-section').attr('id'),$(this).attr('data-name'));
        } else {
            $(this).addClass("selected");
            $(this).find('.common-check-box').addClass("selected");
            if($(this).attr('data-name') == 'United States') {
                unlockElement('state',true);
                unlockElement('city',true);
                unlockElement('zipcode',false);
            }
            addFilter($(this).parents('.dropdown-section').attr('id'),$(this).attr('data-name'));
        }
        var count = $(this).parent().children('.suggestion-item.selected').length;
        if(count == 0) {
            var selected_itemcount = $(this).parents('.dropdown-section').find('div.dropdown-icon');
            selected_itemcount.removeClass('selected-count');
        }else {
            var selected_itemcount = $(this).parents('.dropdown-section').find('div.dropdown-icon');
            selected_itemcount.removeClass('selected-count');
            selected_itemcount.addClass('selected-count');
            selected_itemcount.html('<span>'+count+'</span>');
        }
        getFilteredResults();
    });
    $(".clear-filter").click(function(e){
        deleteAllFilters();
        allUncheck();
        getFilteredResults();
    });
    $(document).on('click','.applied-filter-item', function(e) {
        var type = $(this).attr('data-category');
        var val = $(this).attr('data-name');
        deleteFilterByVal(type,val);
        itemUncheck(type,val);
        if( type == 'country' && val == 'United States') {
            deleteFilterByType('state');
            deleteFilterByType('city');
            deleteFilterByType('zipcode');
            typeUncheck('state');
            typeUncheck('city');
            typeUncheck('zipcode');
            lockElement('state',true);
            lockElement('city',true);
            lockElement('zipcode',false);
        }
        getFilteredResults();
    });
    $("#companyNamecontactpage").keyup(function(e) {
        if(e.which == 13){ 
            addFilter('companyname',$("#companyNamecontactpage").val());
            $("#companyNamecontactpage").val("");
            caculateCount('companyname');
            getFilteredResults();
        }
    })
    $("#zipcodecontactpage").keyup(function(e) {
        if(e.which == 13){ 
            addFilter('zipcode',$("#zipcodecontactpage").val());
            $("#zipcodecontactpage").val("");
            caculateCount('zipcode');
            getFilteredResults();
        }
    })
    $("#siccodecontactpage").keyup(function(e) {
        if(e.which == 13){ 
            addFilter('siccode',$("#siccodecontactpage").val());
            $("#siccodecontactpage").val("");
            caculateCount('siccode');
            getFilteredResults();
        }
    })
    $("#naicscodecontactpage").keyup(function(e) {
        if(e.which == 13){ 
            addFilter('naicscode',$("#naicscodecontactpage").val());
            $("#naicscodecontactpage").val("");
            caculateCount('naicscode');
            getFilteredResults();
        }
    })
    $("#saveSearch").click(function(e){
        var className = $(this).attr('class');
        if(className.indexOf('btn-disabled') >= 0 ) {return;}
        $(".create-saveSearch-popup").css("display","block");
        $(".save-search-mask").css("display","block");
    })
    $("#openSearch").click(function(e){
        var className = $(this).find(".save-suggestion-list").attr('class');
        if(className.indexOf('hide-suggestion') >= 0) {
            $(this).find(".save-suggestion-list").removeClass('hide-suggestion');
        } else {
            $(this).find(".save-suggestion-list").addClass('hide-suggestion');
        }
    })
    $(document).on('click','.popup-cancel', function(e) {
        $(".create-saveSearch-popup").css("display","none");
        $(".save-search-mask").css("display","none");
    })
    $(".save-search-cancel").click(function(e){
        $(".create-saveSearch-popup").css("display","none");
        $(".save-search-mask").css("display","none");
    });
    $("#createSaveSearchInput").keyup(function(e){
        $("#filter-name-error").css("display","none");
    })
    $(document).on('click','.popup-create', function(e) {
        if($("#createSaveSearchInput").val()=="") {
            $("#filter-name-error").css("display","block");
            return;
        }
        $(".create-saveSearch-popup").css("display","none");
        $(".save-search-mask").css("display","none");
        //Get All filters
        var csrftoken  ='{{ csrf_token() }}';
        var baseurl = '<?php echo url('/'); ?>';
        var data = {};
        var joblevel = [];
        var state = [];
        var industries = [];
        var city = [];
        var company = [];
        var ownership = [];
        var business = [];
        var yearfounded = [];
        var joblevels= [];
        var job_funtion = [];
        var countries =[];        
        var zipcode=[];
        var siccode = [];
        var naicscode = [];
        var employeecount = [];
        var revenue = [];
        $('.applied-filter-item').each(function(){
            var type = $(this).attr('data-category');
            var val = $(this).attr('data-name');
            if(type=='joblevel'){
                joblevels.push(val);
            }else if(type=='jobtitle'){
                job_funtion.push(val);
            }else if(type=='industry'){
                industries.push(val);
            }else if(type=='companyname'){
                company.push(val);
            }else if(type=='employeecount'){
                employeecount.push(val);
            }else if(type=='revenue'){
                revenue.push(val);
            }else if(type=='country'){
                countries.push(val);
            }else if(type=='state'){
                state.push(val);
            }else if(type=='city'){
                city.push(val);
            }else if(type=='zipcode'){
                zipcode.push(val);
            }else if(type=='businesstype'){
                ownership.push(val);
            }else if(type=='businessmodel'){
                business.push(val);
            }else if(type=='yearfounded'){
                yearfounded.push(val);
            }else if(type=='siccode'){
                siccode.push(val);
            }else if(type=='naicscode'){
                naicscode.push(val);
            }
        });
        if(joblevels != ''){
            data['joblevel']=joblevels;
        }
        if(job_funtion != ''){
            data['jobtitle']=job_funtion;
        }
        if(industries!=''){
            data['industry'] = industries;
        }
        if(company !=''){
            data['companyname'] = company;
        }
        if(employeecount != '') {
            data['employeecount'] = employeecount;
        }
        if(revenue != '')  {
            data['revenue'] = revenue;
        }
        if(countries != ''){
            data['country'] = countries;
        }
        if(state!=''){
            data['state'] = state;
        }
        if(city!=''){
            data['city'] = city;
        }
        if(zipcode!=''){
            data['zipcode'] = zipcode;
        }
        if(ownership != '') {
            data['businesstype'] = ownership;
        }
        if(business != '') {
            data['businessmodel'] = business;
        }
        if(yearfounded != '') {
            data['yearfounded'] = yearfounded;
        }
        if(siccode!=''){
            data['siccode'] = siccode;
        }
        if(naicscode!=''){
            data['naicscode'] = naicscode;
        }
        if(data.length == 0) {
            console.log("No filters found");
            return; 
        }
        data['filtername'] = $("#createSaveSearchInput").val();
        //Request to save current filters.
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': csrftoken
            },
            type:'POST',
            url:baseurl+'/savefilter',
            data: {
            'data': data,
            },
            beforeSend: function() {
            },
            success:function(data){
                console.log("---Filter Successfully Saved!!!!---");
                console.log("Saved Filter Name : " + data.savedfilters);
                $(".savedfilters").html('');
                var savedfilters = data.savedfilters;
                var i;
                for( i = 0 ;i < savedfilters.length; i++) {
                    $(".savedfilters").append('<div class="suggestion-item" title="'+savedfilters[i].filtername+'" data-name="'+savedfilters[i].filtername+'"><div class="saved-item show-elipsis">'+savedfilters[i].filtername+'</div> <div class="saved-search-manage"><svg id="Capa_1" x="0px" y="0px" viewBox="0 0 469.331 469.331" xml:space="preserve" class="svg-icon"><g><path d="M438.931,30.403c-40.4-40.5-106.1-40.5-146.5,0l-268.6,268.5c-2.1,2.1-3.4,4.8-3.8,7.7l-19.9,147.4 c-0.6,4.2,0.9,8.4,3.8,11.3c2.5,2.5,6,4,9.5,4c0.6,0,1.2,0,1.8-0.1l88.8-12c7.4-1,12.6-7.8,11.6-15.2c-1-7.4-7.8-12.6-15.2-11.6 l-71.2,9.6l13.9-102.8l108.2,108.2c2.5,2.5,6,4,9.5,4s7-1.4,9.5-4l268.6-268.5c19.6-19.6,30.4-45.6,30.4-73.3 S458.531,49.903,438.931,30.403z M297.631,63.403l45.1,45.1l-245.1,245.1l-45.1-45.1L297.631,63.403z M160.931,416.803l-44.1-44.1 l245.1-245.1l44.1,44.1L160.931,416.803z M424.831,152.403l-107.9-107.9c13.7-11.3,30.8-17.5,48.8-17.5c20.5,0,39.7,8,54.2,22.4 s22.4,33.7,22.4,54.2C442.331,121.703,436.131,138.703,424.831,152.403z"></path></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg> <svg id="_x31__x2C_5_px" enable-background="new 0 0 24 24" height="512" viewBox="0 0 24 24" width="512" class="svg-icon"> <path d="m18.25 24h-12.5c-1.517 0-2.75-1.233-2.75-2.75v-13.5c0-.414.336-.75.75-.75h16.5c.414 0 .75.336.75.75v13.5c0 1.517-1.233 2.75-2.75 2.75zm-13.75-15.5v12.75c0 .689.561 1.25 1.25 1.25h12.5c.689 0 1.25-.561 1.25-1.25v-12.75z"></path><path d="m22.25 8.5h-20.5c-.414 0-.75-.336-.75-.75v-2c0-1.517 1.233-2.75 2.75-2.75h16.5c1.517 0 2.75 1.233 2.75 2.75v2c0 .414-.336.75-.75.75zm-19.75-1.5h19v-1.25c0-.689-.561-1.25-1.25-1.25h-16.5c-.689 0-1.25.561-1.25 1.25z"></path><path d="m15.25 4.5h-6.5c-.414 0-.75-.336-.75-.75v-2c0-.965.785-1.75 1.75-1.75h4.5c.965 0 1.75.785 1.75 1.75v2c0 .414-.336.75-.75.75zm-5.75-1.5h5v-1.25c0-.138-.112-.25-.25-.25h-4.5c-.138 0-.25.112-.25.25z"></path><path d="m7.75 20c-.414 0-.75-.336-.75-.75v-7.5c0-.414.336-.75.75-.75s.75.336.75.75v7.5c0 .414-.336.75-.75.75z"></path><path d="m12 20c-.414 0-.75-.336-.75-.75v-7.5c0-.414.336-.75.75-.75s.75.336.75.75v7.5c0 .414-.336.75-.75.75z"></path><path d="m16.25 20c-.414 0-.75-.336-.75-.75v-7.5c0-.414.336-.75.75-.75s.75.336.75.75v7.5c0 .414-.336.75-.75.75z"></path> </svg></div></div>');
                }
                $(".saved-search .show-elipsis").html($("#createSaveSearchInput").val());
                $(".suggestion-item[title='"+$("#createSaveSearchInput").val()+"']").removeClass('selected');
                $(".suggestion-item[title='"+$("#createSaveSearchInput").val()+"']").addClass('selected');
                $("#saveSearch").removeClass('btn-disabled');
                $("#saveSearch").addClass('btn-disabled');
            }
        });
    })
    $(".all-filters").click(function(e){
        var className = $(".applied-filter-list-wrapper").attr('class');
        if(className.indexOf('max-70') >= 0) {
            $(".applied-filter-list-wrapper").removeClass('max-70');
            $(".applied-filter-list-wrapper").addClass('max-all');
            $(".applied-filter-list-wrapper").html('Show Less');
            $(".applied-filters-section").addClass('allFilterShown');
        }else if(className.indexOf('max-all') >= 0) {
            $(".applied-filter-list-wrapper").removeClass('max-all');
            $(".applied-filter-list-wrapper").addClass('max-70');
            $(".applied-filter-list-wrapper").html('Show Less');
            $(".applied-filters-section").removeClass('allFilterShown');
        }
    })
    $(".fa-angle-right").click(function(e){
        var curOffset = parseInt($(".pagination-current-page").html());
        var maxOffset = parseInt($(".pagination-last-page").html());
        console.log(curOffset);
        if(curOffset + 20 > maxOffset) {return;}
        $(".pagination-current-page").html(curOffset + 20);
        $(".pagination-current-end-page").html(curOffset + 39 > maxOffset ? maxOffset : curOffset + 39);
        getFilteredResults(curOffset + 20);
    })

    $(".fa-angle-left").click(function(e){
        var curOffset = parseInt($(".pagination-current-page").html());
        console.log(curOffset);
        if(curOffset < 20) {return;}
        $(".pagination-current-page").html(curOffset - 20);
        $(".pagination-current-end-page").html(curOffset - 1);
        getFilteredResults(curOffset - 20);
    })
    
    $(document).on('click','.item-name', function(e) {
        $(this).parents('.contact-item').find('.view-contact').click();
    })
    $(document).on('click','.view-contact', function(e) {
        console.log('view contact');
        $("#view-contact-msg").css("display","none");
        $("#view-contact-button").css("display","none");
        $(".create-viewContact-popup").css("display","block");
        $(".view-contact-mask").css("display","block");
        $("#view-contact-name").html($(this).parents('.contact-item').find('.item-name').html());
        $("#view-contact-id").html($(this).parents('.contact-item').find('.item-id').html());
        $("#view-contact-title").addClass('linear-background');
        $("#view-contact-email").addClass('linear-background');
        $("#view-contact-dphone").addClass('linear-background');
        $("#view-contact-cname").addClass('linear-background');
        $("#view-contact-phone").addClass('linear-background');
        $(".copy-to-clipboard").css('display','none');
        var name = $("#view-contact-name").html();
        var id = $("#view-contact-id").html();
        console.log(id);
        var csrftoken  ='{{ csrf_token() }}';
        var baseurl = '<?php echo url('/'); ?>';
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': csrftoken
            },
            type:'POST',
            url:baseurl+'/checkcontact',
            data: {
                'name' : name,
                'id' : id,
            },
            success:function(data){
                console.log("---Contact Successfully Check Saved!!!!---");
                console.log(data.saved);
                if(data.saved) {
                    $("#view-contact-msg").css("display","block");
                    $("#view-contact-button").css("display","none");
                } else {
                    $("#view-contact-msg").css("display","none");
                    $("#view-contact-button").css("display","flex");
                }
                $("#view-contact-title").html(data.contact.job_title);
                $("#view-contact-email").html(data.contact.email_address);
                $("#view-contact-dphone").html(data.contact.direct_phone);
                $("#view-contact-cname").html(data.contact.company_name);
                $("#view-contact-phone").html(data.contact.phone_number);
                
                if(data.nocredit) {
                    $("#view-contact-msg").css("display","none");
                    $("#view-contact-button").css("display","none");
                    $("#nocredit").css('display','flex');
                    $("#gotoplan").css('display','flex');
                    
                } else {
                    $("#view-contact-title").removeClass('linear-background');
                    $("#view-contact-email").removeClass('linear-background');
                    $("#view-contact-dphone").removeClass('linear-background');
                    $("#view-contact-cname").removeClass('linear-background');
                    $("#view-contact-phone").removeClass('linear-background');
                    $(".copy-to-clipboard").css('display','block');
                    console.log("---Contact Successfully Saved!!!!---");
                    $(".leads-count:eq(1)").html('Unused Credits ' + data.credit);
                }
            }
        });
    });
    $(".view-contact-cancel").click(function(e){
        $(".create-viewContact-popup").css("display","none");
        $(".view-contact-mask").css("display","none");
    });
    $(document).on('click','.save-search .suggestion-item', function(e) {
        var filtername = $(this).attr('title');
        var csrftoken  ='{{ csrf_token() }}';
        var baseurl = '<?php echo url('/'); ?>';
        $(".saved-search .show-elipsis").html($(this).attr('title'));
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': csrftoken
            },
            type:'POST',
            url:baseurl+'/openfilter',
            data: {
            'filtername': filtername,
            },
            success:function(data){
                console.log("---Open Filter Successed!!!!---");
                $(".contact-list").removeClass('contact-list-loading-placeholder');
                var filters = data.filters.filters;
                var filter_obj = JSON.parse(filters);
                $(".applied-filter-list").html('');
                $("#saveSearch").removeClass('btn-disabled');
                $("#saveSearch").addClass('btn-disabled');
                allUncheck();
                for (key in filter_obj) {
                    var i;
                    for(i = 0 ;i< filter_obj[key].length ;i++)
                    {
                        var val =  filter_obj[key][i];
                        addFilter(key,val);
                        itemCheck(key,val);
                    }
                }
                getFilteredResults();
            }
        });
    });

    $(document).on('keyup','.pop-search-box', function(e) {
        var csrftoken  ='{{ csrf_token() }}';
        var baseurl = '<?php echo url('/'); ?>';
        var text = $(this).val();
        var id = $(this).attr('id');
        var url = $(this).attr('searchURL');
        var parentid= $(this).attr('parentid');
        var requestParam = $(this).attr('requestParam');
        console.log(text + " : " + id + " : " + url + " : " + parentid);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': csrftoken
            },
            type:'POST',
            url:baseurl+'/'+url,
            data: requestParam + '=' + text,
            beforeSend: function() {
            },
            success:function(data){
                console.log("---Search Successed!!!!---");
                $("#"+parentid).find('.suggestion-item').css("display","none");
                for (key in data) {
                    var i;
                    for(i = 0 ;i< data[key].length; i++)
                    {
                        $(".suggestion-item[data-name='"+data[key][i].name+"']").css("display","block");
                    }
                }
            }
        });
    });
    $("#selectAllContacts").click(function(e) {
        var className = $(this).attr('class');
        if(className.indexOf('selected') >= 0 ) {
            $(this).removeClass('selected');
            $(this).parents('.box-wrap').removeClass('selected');
            $(".contact-check-box-wrap .common-check-box").removeClass('selected');    
            $("#contactSelectedCount").css("display","none");
            $("#contactSelectedCount span").html('');           
            $("#selectCurrent1").css('display','none');
            $("#selectCurrent").removeClass('list-action-item-disabled');  
            $("#selectCurrent").addClass('list-action-item-disabled');
        } else {
            $(this).removeClass('selected');
            $(this).addClass('selected');
            $(this).parents('.box-wrap').removeClass('selected');
            $(this).parents('.box-wrap').addClass('selected');
            $(".contact-check-box-wrap .common-check-box").removeClass('selected');
            $(".contact-check-box-wrap .common-check-box").addClass('selected');
            $("#contactSelectedCount").css("display","block");
            $("#contactSelectedCount span").html('20');                   
            $("#selectCurrent1").css('display','block');
            $("#selectCurrent").removeClass('list-action-item-disabled');   
        }
    });
    $(document).on('click','.contact-item .common-check-box', function(e) {
        var className = $(this).attr('class');
        if(className.indexOf('selected') >= 0 ) {
            $(this).removeClass('selected');
            $("#selectAllContacts").removeClass('selected');
            $("#selectAllContacts").parents('.box-wrap').removeClass('selected');
            
        }else {
            $(this).removeClass('selected');
            $(this).addClass('selected');
        }
        var count = $(".contact-item .selected").length;
        if(count > 0) {
            $("#contactSelectedCount").css("display","block");
            $("#contactSelectedCount span").html(count);         
            $("#selectCurrent1").css('display','block');
            $("#selectCurrent").removeClass('list-action-item-disabled');
        } else {
            $("#contactSelectedCount").css("display","none");
            $("#contactSelectedCount span").html('');         
            $("#selectCurrent1").css('display','none');
            $("#selectCurrent").removeClass('list-action-item-disabled');     
            $("#selectCurrent").addClass('list-action-item-disabled');
        }
        
    });
    $("#selectDropdownContact").click(function(e) {
        var className = $(this).parents('.contact-action-btn').attr('class');
        if(className.indexOf('clicked') >= 0 ) {
            $(this).parents('.contact-action-btn').removeClass('clicked');
            $(this).parents('.contact-action-btn').find('.bulk-action-mask').removeClass('show-mask');
        }else {
            $(this).parents('.contact-action-btn').removeClass('clicked');
            $(this).parents('.contact-action-btn').addClass('clicked');
            $(this).parents('.contact-action-btn').find('.bulk-action-mask').removeClass('show-mask');
            $(this).parents('.contact-action-btn').find('.bulk-action-mask').addClass('show-mask');
        }

    });
    $("#rangeInputBox").keyup(function(e) {
        var text = $("#rangeInputBox").val();
        if(text == "") {
            $(this).parents('.range-selection-box').find('.fa-check').removeClass('enabled');
        } else {
            $(this).parents('.range-selection-box').find('.fa-check').removeClass('enabled');
            $(this).parents('.range-selection-box').find('.fa-check').addClass('enabled');
        }
    });
    $("#selectByNum").click(function(e) {
        var className = $(this).attr('class');
        if(className.indexOf('enabled') >= 0 ) {
            var count = parseInt($("#rangeInputBox").val());
            selectTop(count);
        }
    });
    $("#selectAll").click(function(e) {
        $('#selectAllContacts').removeClass('selected');
        $('#selectAllContacts').addClass('selected');
        $('#selectAllContacts').parents('.box-wrap').removeClass('selected');
        $('#selectAllContacts').parents('.box-wrap').addClass('selected');
        $(".contact-item .common-check-box").removeClass('selected');
        $(".contact-item .common-check-box").addClass('selected');
        $('#selectDropdownContact').parents('.contact-action-btn').removeClass('clicked');
        $('#selectDropdownContact').parents('.contact-action-btn').find('.bulk-action-mask').removeClass('show-mask');
        $("#contactSelectedCount").css("display","block");
        $("#contactSelectedCount span").html('20');         
        $("#selectCurrent1").css('display','block');

    });
    $("#selectNull").click(function(e) {
        $('#selectAllContacts').removeClass('selected');
        $('#selectAllContacts').parents('.box-wrap').removeClass('selected');
        $(".contact-item .common-check-box").removeClass('selected');
        $('#selectDropdownContact').parents('.contact-action-btn').removeClass('clicked');
        $('#selectDropdownContact').parents('.contact-action-btn').find('.bulk-action-mask').removeClass('show-mask');
        $("#contactSelectedCount").css("display","none");
        $("#contactSelectedCount span").html('');         
        $("#selectCurrent1").css('display','none');

    });
    $("#selectCurrent").click(function(e) {
        if($('.contact-item .selected').length == 0)
        {
            return;
        }
        count = $('.contact-item .selected').length;
        credit = parseInt($("#userCredit").val());
        if(count > credit) {
            showToast('Upgrade plan. No enough credit ');
            return;
        } else {
            $(".leads-count:eq(1)").html('Unused Credits ' + (credit- count));
            
            checkListActionItem(credit- count);
            $("#userCredit").val(credit - count);
        }
        var items = [];
        $('.contact-item .selected').each(function(){
            var id = $(this).parents('.contact-item').find('.contact-name').find('.id').html();
            items.push(id);
        });
        var jsonItems = JSON.stringify(items);
        console.log(jsonItems);     
        var csrftoken  ='{{ csrf_token() }}';
        var baseurl = '<?php echo url('/'); ?>';
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': csrftoken
            },
            type:'POST',
            url:baseurl+'/downloadSelContacts',
            data: {
            'item': jsonItems,
            },
            beforeSend: function() {
                document.body.style.cursor = "wait";
                $("#textLoading").css('display','block');
            },
            success:function(data){
                console.log("---Download Successed!!!!---");
                console.log(data);
                const url = window.URL.createObjectURL(new Blob([data]));
                const link = document.createElement('a');
                link.href = url;
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();
                var pm_am = today.getHours() > 12 ? 'PM' : 'AM';
                today = mm + '.' + dd + '.' + yyyy + '_' + (today.getHours() > 12 ? today.getHours() - 12 : today.getHours()) + '.' + today.getMinutes() + "." + pm_am;
                //Data_Syder_Download_02.25.2020_7.35.PM etc.
                link.setAttribute('download',  'Data_Syder_Download_' + today + '.csv');
                document.body.appendChild(link);
                link.click();
                document.body.style.cursor = "default";
                $("#textLoading").css('display','none');
            }
        });
    })
    $("#selectCurrent1").click(function(e) {
        if($('.contact-item .selected').length == 0)
        {
            return;
        }
        count = $('.contact-item .selected').length;
        credit = parseInt($("#userCredit").val());
        if(count > credit) {
            showToast('Upgrade plan. No enough credit ');
            return;
        } else {
            $(".leads-count:eq(1)").html('Unused Credits ' + (credit- count));
            
            checkListActionItem(credit- count);
            $("#userCredit").val(credit - count);
        }
        var items = [];
        $('.contact-item .selected').each(function(){
            var id = $(this).parents('.contact-item').find('.contact-name').find('.id').html();
            items.push(id);
        });
        var jsonItems = JSON.stringify(items);
        console.log(jsonItems);     
        var csrftoken  ='{{ csrf_token() }}';
        var baseurl = '<?php echo url('/'); ?>';
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': csrftoken
            },
            type:'POST',
            url:baseurl+'/downloadSelContacts',
            data: {
            'item': jsonItems,
            },
            beforeSend: function() {
                document.body.style.cursor = "wait";
                $("#textLoading").css('display','block');
            },
            success:function(data){
                console.log("---Download Successed!!!!---");
                console.log(data);
                const url = window.URL.createObjectURL(new Blob([data]));
                const link = document.createElement('a');
                link.href = url;
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();

                var pm_am = today.getHours() > 12 ? 'PM' : 'AM';
                today = mm + '.' + dd + '.' + yyyy + '_' + (today.getHours() > 12 ? today.getHours() - 12 : today.getHours()) + '.' + today.getMinutes() + "." + pm_am;
                //Data_Syder_Download_02.25.2020_7.35.PM etc.
                link.setAttribute('download',  'Data_Syder_Download_' + today + '.csv');
                document.body.appendChild(link);
                link.click();
                document.body.style.cursor = "default";
                $("#textLoading").css('display','none');
            }
        });
    })
    $("#select100").click(function(e) {
        
        selectTop(100);
    })
    $("#select250").click(function(e) {
        selectTop(250);
    })
    $("#select500").click(function(e) {
        selectTop(500);
    })
    $("#select1000").click(function(e) {
        selectTop(1000);
    })
    $("#select5000").click(function(e) {
        selectTop(5000);
    })
    $(document).on('click','.popup-addtoleads', function(e) {
        var name = $("#view-contact-name").html();
        var id = $("#view-contact-id").html();
        console.log(name);
        var csrftoken  ='{{ csrf_token() }}';
        var baseurl = '<?php echo url('/'); ?>';
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': csrftoken
            },
            type:'POST',
            url:baseurl+'/savecontact',
            data: {
                'name' : name,
                'id' : id,
            },
            success:function(data){ 
               if(data.saved) {
                    $("#view-contact-msg").css("display","none");
                    $("#view-contact-button").css("display","none");
               }
            }
        });
    });
    $(document).on('click','.copy-to-clipboard', function(e) {
        var id = $(this).parents('.view-contact-row').attr('data-row');
        result = copyToClipboard(id);
        console.log(result);
    });
    /*
    function selectTop(count)
    {
        var i;
        $(".contact-item .common-check-box").removeClass('selected');
        for (i = 0 ;i < count ;i ++) {
            $(".contact-item .common-check-box:eq(" + i + ")").addClass('selected');
        }
        if(count > 0) {
            $("#contactSelectedCount").css("display","block");
            $("#contactSelectedCount span").html(count);
        } else {
            $("#contactSelectedCount").css("display","none");
            $("#contactSelectedCount span").html('');
        }
    }
    */
    function checkListActionItem(credit) {
        if(credit > 100) {
            $("#select100").removeClass('list-action-item-disabled');
        } else {
            $("#select100").removeClass('list-action-item-disabled');
            $("#select100").addClass('list-action-item-disabled');
        }
        if(credit > 250) {
            $("#select250").removeClass('list-action-item-disabled');
        } else {
            $("#select250").removeClass('list-action-item-disabled');
            $("#select250").addClass('list-action-item-disabled');
        }
        if(credit > 500) {
            $("#select500").removeClass('list-action-item-disabled');
        } else {
            $("#select500").removeClass('list-action-item-disabled');
            $("#select500").addClass('list-action-item-disabled');
        }
        if(credit > 1000) {
            $("#select1000").removeClass('list-action-item-disabled');
        } else {
            $("#select1000").removeClass('list-action-item-disabled');
            $("#select1000").addClass('list-action-item-disabled');
        }
        if(credit > 5000) {
            $("#select5000").removeClass('list-action-item-disabled');
        } else {
            $("#select5000").removeClass('list-action-item-disabled');
            $("#select5000").addClass('list-action-item-disabled');
        }
        $("#rangeInputBox").attr('placeholder','upto '+credit);
    }
    function selectTop(count) {
        credit = parseInt($("#userCredit").val());
        if(count > credit) {
            showToast('Upgrade plan. No enough credit ');
            return;
        } else {
            $(".leads-count:eq(1)").html('Unused Credits ' + (credit- count));
            
            checkListActionItem(credit- count);
            $("#userCredit").val(credit - count);
        }

        var csrftoken  ='{{ csrf_token() }}';
        var baseurl = '<?php echo url('/'); ?>';
        var data = {};
        var joblevel = [];
        var state = [];
        var industries = [];
        var city = [];
        var company = [];
        var ownership = [];
        var business = [];
        var yearfounded = [];
        var joblevels= [];
        var job_funtion = [];
        var countries =[];        
        var zipcode=[];
        var siccode = [];
        var naicscode = [];
        var employeecount = [];
        var revenue = [];
        $('.applied-filter-item').each(function(){
            var type = $(this).attr('data-category');
            var val = $(this).attr('data-name');
            if(type=='joblevel'){
                joblevels.push(val);
            }else if(type=='jobtitle'){
                job_funtion.push(val);
            }else if(type=='industry'){
                industries.push(val);
            }else if(type=='companyname'){
                company.push(val);
            }else if(type=='employeecount'){
                employeecount.push(val);
            }else if(type=='revenue'){
                revenue.push(val);
            }else if(type=='country'){
                countries.push(val);
            }else if(type=='state'){
                state.push(val);
            }else if(type=='city'){
                city.push(val);
            }else if(type=='zipcode'){
                zipcode.push(val);
            }else if(type=='businesstype'){
                ownership.push(val);
            }else if(type=='businessmodel'){
                business.push(val);
            }else if(type=='yearfounded'){
                yearfounded.push(val);
            }else if(type=='siccode'){
                siccode.push(val);
            }else if(type=='naicscode'){
                naicscode.push(val);
            }
        });
        if(joblevels != ''){
            data['job_level']=joblevels;
        }
        if(job_funtion != ''){
            data['job_function']=job_funtion;
        }
        if(industries!=''){
            data['industries'] = industries;
        }
        if(company !=''){
            data['company_name'] = company;
        }
        if(employeecount != '') {
            data['employee_count'] = employeecount;
        }
        if(revenue != '')  {
            data['revenue'] = revenue;
        }
        if(countries != ''){
            data['country'] = countries;
        }
        if(state!=''){
            data['state'] = state;
        }
        if(city!=''){
            data['city'] = city;
        }
        if(zipcode!=''){
            data['zipcode'] = zipcode;
        }
        if(ownership != '') {
            data['ownership'] = ownership;
        }
        if(business != '') {
            data['business'] = business;
        }
        if(yearfounded != '') {
            data['yearfounded'] = yearfounded;
        }
        if(siccode!=''){
            data['siccode'] = siccode;
        }
        if(naicscode!=''){
            data['naicscode'] = naicscode;
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': csrftoken
            },
            type:'POST',
            url:baseurl+'/downloadcontacts',
            data: {
            'data': data,
            'count': count,
            },
            beforeSend: function() {
                document.body.style.cursor = "wait";
                $("#textLoading").css('display','block');
            },
            success:function(data){
                console.log("---Download Successed!!!!---");
                console.log(data);
                const url = window.URL.createObjectURL(new Blob([data]));
                const link = document.createElement('a');
                link.href = url;
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();

                var pm_am = today.getHours() > 12 ? 'PM' : 'AM';
                today = mm + '.' + dd + '.' + yyyy + '_' + (today.getHours() > 12 ? today.getHours() - 12 : today.getHours()) + '.' + today.getMinutes() + "." + pm_am;
                //Data_Syder_Download_02.25.2020_7.35.PM etc.
                link.setAttribute('download',  'Data_Syder_Download_' + today + '.csv');
                document.body.appendChild(link);
                link.click();
                
                document.body.style.cursor = "default";
                $("#textLoading").css('display','none');
            }
        });
    }
    function unlockElement(element_id,is_dropdown)
    {
        if(is_dropdown) {
            $("#" + element_id).children('.dropdown-box').removeClass('blocked-wrap');
            $("#" + element_id).find('.plus-icon').css('display','block');
            $("#" + element_id).find('.lock-icon').css('display','none');
            $("#" + element_id).find('.lock-wrap').css('display','none');
            $("#" + element_id + " .suggestion-item").removeClass('selected');
            $("#" + element_id + " .common-check-box").removeClass('selected');
        } else {
            $("#" + element_id).removeClass('blocked-wrap');
            $("#" + element_id).find('.lock-wrap').css('display','none');
            $("#" + element_id).find('.input-box').removeAttr('disabled');
        }
    }
    function lockElement(element_id,is_dropdown)
    {
        if(is_dropdown) {
            $("#" + element_id).children('.dropdown-box').removeClass('blocked-wrap');
            $("#" + element_id).children('.dropdown-box').addClass('blocked-wrap');
            $("#" + element_id).find('.plus-icon').css('display','none');
            $("#" + element_id).find('.lock-icon').css('display','block');
            $("#" + element_id).find('.lock-wrap').css('display','block');
            $("#" + element_id + " .suggestion-item").removeClass('selected');
            $("#" + element_id + " .suggestion-item").addClass('selected');
            $("#" + element_id + " .common-check-box").removeClass('selected');   
            $("#" + element_id + " .common-check-box").addClass('selected');  
            $("#" + element_id).find('div.dropdown-icon').removeClass("selected-count");
            $("#" + element_id).find('div.dropdown-icon').html('<span></span>');
        }else {
            $("#" + element_id).removeClass('blocked-wrap');
            $("#" + element_id).addClass('blocked-wrap');
            $("#" + element_id).find('.lock-wrap').css('display','block');
            $("#" + element_id).find('.input-box').attr('disabled','disabled');
            $("#" + element_id).find('.input-box').val('');
        }
    }
    function addFilter(type,val)
    {
        $(".applied-filter-list").append('<div class="applied-filter-item" data-category="' + type + '" data-name="' + val + '"><span>' + val + '</span><svg width="24" height="24" viewBox="0 0 24 24" class="svg-close-icon remove-filters"><title>Click here to close</title><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path><path d="M0 0h24v24H0z" fill="none"></path></svg></div>');
        console.log('One Filter Added type = ' + type + ' value = ' + val);
    }
    function deleteFilterByVal(type,val)
    {
        $(".applied-filter-item[data-category='"+type+"'][data-name='"+val+"']").remove();
        console.log('One Filter Removed type = ' + type + ' value = ' + val);
    }
    function deleteFilterByType(type,val)
    {
        $(".applied-filter-item[data-category='"+type+"']").remove();
        console.log('One Filter Type Removed type = ' + type);
    }
    function deleteAllFilters()
    {
        $(".applied-filter-item").remove();
        console.log('All filters are cleared');
    }
    function itemCheck(type,val)
    {
        $("#" + type).find(".suggestion-item[data-name='" + val +"']").removeClass('selected');
        $("#" + type).find(".suggestion-item[data-name='" + val +"']").addClass('selected');
        $("#" + type).find(".suggestion-item[data-name='" + val +"']").find(".common-check-box").removeClass('selected');
        $("#" + type).find(".suggestion-item[data-name='" + val +"']").find(".common-check-box").addClass('selected');
        caculateCount(type);
    }
    function itemUncheck(type,val)
    {
        $("#" + type).find(".suggestion-item[data-name='" + val +"']").removeClass('selected');
        $("#" + type).find(".suggestion-item[data-name='" + val +"']").find(".common-check-box").removeClass('selected');
        caculateCount(type);
    }
    function typeUncheck(type)
    {
        $("#" + type).find(".suggestion-item").removeClass('selected');
        $("#" + type).find(".common-check-box").removeClass('selected');  
        caculateCount(type);    
    }
    function allUncheck()
    {
        $(".suggestion-item").removeClass('selected');
        $(".common-check-box").removeClass('selected');
        resetAllCounts();
    }
    function caculateCount(type)
    {
        var count = $(".applied-filter-item[data-category='"+type+"']").length;
        if(count == 0 ) {
            var selected_itemcount =  $("#" + type).find('div.dropdown-icon');
            selected_itemcount.removeClass('selected-count');
            selected_itemcount.html("<span></span>");
            
        }else {
            var selected_itemcount = $("#" + type).find('div.dropdown-icon');
            selected_itemcount.removeClass('selected-count');
            selected_itemcount.addClass('selected-count');
            selected_itemcount.html('<span>'+count+'</span>');
        }
    }
    function resetAllCounts()
    {
        $('div.dropdown-icon').removeClass('selected-count');        
    }
    function getFilteredResults(from = 1)
    {
        $(".pagination-current-page").html(from);
        $(".pagination-current-end-page").html(from + 19);
        var csrftoken  ='{{ csrf_token() }}';
        var baseurl = '<?php echo url('/'); ?>';
        var data = {};
        var joblevel = [];
        var state = [];
        var industries = [];
        var city = [];
        var company = [];
        var ownership = [];
        var business = [];
        var yearfounded = [];
        var joblevels= [];
        var job_funtion = [];
        var countries =[];        
        var zipcode=[];
        var siccode = [];
        var naicscode = [];
        var employeecount = [];
        var revenue = [];
        $(".saved-search .show-elipsis").html("Open Search");
        $("#saveSearch").removeClass('btn-disabled');
        $("#saveSearch").addClass('btn-disabled');
        $('.applied-filter-item').each(function(){
            $("#saveSearch").removeClass('btn-disabled');
            var type = $(this).attr('data-category');
            var val = $(this).attr('data-name');
            if(type=='joblevel'){
                joblevels.push(val);
            }else if(type=='jobtitle'){
                job_funtion.push(val);
            }else if(type=='industry'){
                industries.push(val);
            }else if(type=='companyname'){
                company.push(val);
            }else if(type=='employeecount'){
                employeecount.push(val);
            }else if(type=='revenue'){
                revenue.push(val);
            }else if(type=='country'){
                countries.push(val);
            }else if(type=='state'){
                state.push(val);
            }else if(type=='city'){
                city.push(val);
            }else if(type=='zipcode'){
                zipcode.push(val);
            }else if(type=='businesstype'){
                ownership.push(val);
            }else if(type=='businessmodel'){
                business.push(val);
            }else if(type=='yearfounded'){
                yearfounded.push(val);
            }else if(type=='siccode'){
                siccode.push(val);
            }else if(type=='naicscode'){
                naicscode.push(val);
            }
        });
        if(joblevels != ''){
            data['job_level']=joblevels;
        }
        if(job_funtion != ''){
            data['job_function']=job_funtion;
        }
        if(industries!=''){
            data['industries'] = industries;
        }
        if(company !=''){
            data['company_name'] = company;
        }
        if(employeecount != '') {
            data['employee_count'] = employeecount;
        }
        if(revenue != '')  {
            data['revenue'] = revenue;
        }
        if(countries != ''){
            data['country'] = countries;
        }
        if(state!=''){
            data['state'] = state;
        }
        if(city!=''){
            data['city'] = city;
        }
        if(zipcode!=''){
            data['zipcode'] = zipcode;
        }
        if(ownership != '') {
            data['ownership'] = ownership;
        }
        if(business != '') {
            data['business'] = business;
        }
        if(yearfounded != '') {
            data['yearfounded'] = yearfounded;
        }
        if(siccode!=''){
            data['siccode'] = siccode;
        }
        if(naicscode!=''){
            data['naicscode'] = naicscode;
        }
        console.log(data);
        /*
        if(data.length == 0) {
            $(".contact-item").children().html('');
                return; 
        }
        */
        $(".contact-list").addClass('contact-list-loading-placeholder');
        $(".contact-item").children().html('');
        $(".contact-item").children().addClass('linear-background');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': csrftoken
            },
            type:'POST',
            url:baseurl+'/demofilter',
            data: {
            'data': data,
            'from': from,
            },
            beforeSend: function() {
            },
            success:function(data){
                console.log("---Filter Successed!!!!---");
                $(".contact-list").removeClass('contact-list-loading-placeholder');
                var result = data.result;
                console.log(result);
                var i;
                $(".contact-item").remove();
                for ( i = 0 ;i < result.length ;i++) {
                    $(".contact-list-wrap").append('<div class="contact-item"><div class="contact-check-box-wrap"><div class="common-check-box"><div class="common-check-box-content"><div class="empty-check-box"></div><div class="common-check-box-svg-wrap"><svg width="16" height="14" viewBox="0 0 16 14"><path d="M2 8.5L6 12.5L14 1.5"></path></svg></div></div></div> </div><div class="contact-name"><div class="id item-id" style="display:none">'+result[i]['id']+'</div><div class="name item-name">'+result[i]['first_name']+' ' +result[i]['last_name'] + '</div><div class="title item-title">'+ result[i]['job_title'] + '</div> </div><div class="company-name"><div class="name item-cname">'+ result[i]['company_name']+'</div><div class="company-address-info">'+result[i]['city']+','+result[i]['state']+','+result[i]['country']+'</div></div> <div class="email item-email">'+result[i]['email_address']+'</div><div class="phone-number"><div class="name item-dphone">'+result[i]['direct_phone']+'</div><div class="name item-phone">'+result[i]['phone_number']+'</div> </div><div class="contact-action"><div class="contact-action-btn-wrap"><div class="contact-action-btn view-contact viewContactSingleLB">View contact</div></div></div> </div>');
                }
                $(".leads-count:eq(0)").css("display","flex");
                $(".leads-count:eq(0)").html(data.count * 10 + " Contacts");
                $(".pagination-last-page").html( Math.ceil( data.count * 10 ) );
                $("#selectNull").click();
            }
        });
    }
    function copyToClipboard(id) {
        var text = $("#view-contact-" + id).text(); //getting the text from that particular Row
        console.log(text);
        //window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
        if (window.clipboardData && window.clipboardData.setData) {
            // IE specific code path to prevent textarea being shown while dialog is visible.
            result =  clipboardData.setData("Text", text); 
            if(result) {
                showToast('copied ' + text);
            }
            return result;

        } else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
            var textarea = document.createElement("textarea");
            textarea.textContent = text;
            textarea.style.position = "fixed";  // Prevent scrolling to bottom of page in MS Edge.
            document.body.appendChild(textarea);
            textarea.select();
            try {
                result = document.execCommand("copy");  // Security exception may be thrown by some browsers.
                if(result) {
                    showToast('copied ' + text);
                }
                return result;
            } catch (ex) {
                console.warn("Copy to clipboard failed.", ex);
                return false;
            } finally {
                document.body.removeChild(textarea);
            }
        }
    }
    function showToast(text) {
        var x = document.getElementById("snackbar");
        x.className = "show";
        $("#snackbar").html(text);
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }
</script>
</html>