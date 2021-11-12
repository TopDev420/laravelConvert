<style>
body {
    background: #3A589B;
}
.rr-content {
	padding-left : 25%;
	padding-right : 25%;
}
.rr-content>div {
    min-height: calc(100vh - 24.3rem);
	padding-bottom : 1.5rem;
}
.rr-auth-page {
    padding-top: 1vh!important;
}
.rr-auth-box {
    font-family: "Avenir","rr-venir",-apple-system,BlinkMacSystemFont,"Helvetica Neue",Arial,Helvetica,sans-serif;
    text-align: center;
}
.rr-auth-box .heading {
    color: #fff;
    opacity: 0.5;
    padding-bottom: 1rem;
    font-weight: bold;
    text-align: center;
}
H4 {
    font-family: "Avenir","rr-venir",-apple-system,BlinkMacSystemFont,"Helvetica Neue",Arial,Helvetica,sans-serif;
}
.rr-auth-box .form-box {
   position:relative;
}
.rr-auth-box .form-container {
	display : flex;
    background: white; 
	-webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
    border-radius: 1rem;
    margin-left: 15px;
    margin-right: 15px;
    margin-top: 1rem;
    text-align: left;
    padding: 2.5rem;
}
.rr-auth-box .heading .subheading {
    font-size: 0.8em;
    display: block;
    margin: 0;
    font-weight: normal;
    padding: 0;
    margin-top: .8rem;
}
.oauth-signup{
    border-right: 1px solid #c0c0c0;
	padding-right : 30px !important;
}
.manual-signup {
	padding-left : 30px !important;
}
.row [class*="col-"] {
    position: inherit;
}
.col-sm-6 {
    width: 50%;
}
.col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9 {
    float: left;
}
.col-xs-12 {
    width: 100%;
}
.col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
    position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
}
fieldset {
    min-width: 0;
    padding: 0;
    margin: 0;
    border: 0;
}
.rr-auth-page .form-box .manual-signup .signup-disclaimer-box {
    text-align: center;
    margin-top: 2rem;
    color: #898989;
    font-weight: 400;
    font-size: 20px;
    top: calc(100% + 2rem);
}
.form-group {
    margin-bottom: 15px;
}
.rr-auth-page .manual-signup .password-wpr {
    position: relative;
}
.rr-auth-page .rr-auth-box ul.error-messages {
    height: .75rem;
    display: block!important;
    font-size : 14px;
    padding: 0;
    margin: 0;
	color: #b94a48;
	list-style-type: none;
}
label.peeky-placeholder {
    position: relative;
    font-weight: normal;
    display: block;
    background: #f7f7f7;
    border-radius: .5rem;
    max-width: unset;
    width: 100%;
    overflow: hidden;
    height: 70px;
}
label.peeky-placeholder input {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    display: block;
    padding: 1.5rem;
    height: auto;
    background: none;
    border: none;
    width: 100%;
    -webkit-box-shadow: none!important;
    box-shadow: none!important;
    outline: none;
    color: #4F4F4F;
}
.RR2018 ul.error-messages>li, .RR2018 ul.errorlist>li {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
.ul.error-messages li:before, ul.errorlist li:before, ul.warning-messages li:before, ul.warninglist li:before {
    font: normal normal normal 14px/1 FontAwesome;
    display: inline-block;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    margin-right: 5px;
}
.rr-auth-page .rr-auth-box button[type='submit'] {  
	width: 100%;
    font-size: 20px;
    padding-top: 15px;
    padding-bottom: 15px;
}
.rr-auth-page .form-box .manual-signup .or-login, .PLY .rr-auth-page .form-box .manual-signup .alt-action, .PLY .rr-auth-page .form-box .manual-signup .signup-disclaimer-box {
    text-align: center;
    margin-top: 2rem;
    color: #898989;
    font-weight: 400;
    font-size: 1.4rem;
    top: calc(100% + 2rem);
}
.btn.btn-primary, .btn.btn-primary:focus {
    background-color: #3A589B;
    border-color: #3A589B;
    color: #ffffff;
}
.btn.btn-primary:hover {
	background-color: #142956;
}
.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}
.btn-primary {
    color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;
}
.rr-auth-page .form-box .manual-signup .signup-disclaimer-box p {
    margin-bottom: 0;
}
.form-control:focus {
	outline : none;
	border-color : #b3b3b3;
}
input:focus {
	padding-top : 2.5rem;
}
label.peeky-placeholder.rr-invalid input {
	color : #b94a48;
}
label.peeky-placeholder input:focus, label.peeky-placeholder input.peek-mode, label.peeky-placeholder input:-webkit-autofill {
    padding-top: 2.5rem;
}
label.peeky-placeholder input:focus + span, label.peeky-placeholder input.peek-mode + span, label.peeky-placeholder input:-webkit-autofill + span {
    opacity: 1;
    position: absolute;
    top: 0.5rem;
    font-size: 10px;
    color: #049cdb;
}
label.peeky-placeholder span {
    color: #049cdb;
    pointer-events: none;
    position: absolute;
    top: 30%;
    left: 1.5rem;
    opacity: 0;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}
.rr-auth-page .form-box .manual-signup .or-login, .rr-auth-page .form-box .manual-signup .alt-action, .rr-auth-page .form-box .manual-signup .signup-disclaimer-box {
    text-align: center;
    margin-top: 2rem;
    color: #898989;
    font-weight: 400;
    font-size: 1.4rem;
    top: calc(100% + 2rem);
}
.terms-text{
    text-align: center;
    margin-top: 2rem;
    color: #898989;
    font-weight: 400;
    font-size: 17px;
    top: calc(100% + 2rem);
}
.heading-title {
	font-size : 25px;
	color : mediumslateblue;
	margin-bottom: 40px;
}
.oauth-divider-vertical-or {
    position: absolute;
    display: block;
    left: -1rem;
    top: 25%;
    z-index: 2;
    background: #fff;
    width: 2rem;
    padding: 1rem 0;
    text-align: center;
    color: #757575;
    font-size: 14px;
}
.signup-disclaimer-box {
    text-align: center;
    margin-top: 2rem;
    color: #898989;
    font-weight: 400;
    top: calc(100% + 2rem);
}
a {
    color: #08c;
    text-decoration: none;
    cursor: pointer;
}
.signup-disclaimer-box a {
    font-weight: 500;
}
.signup-disclaimer-box a:hover {
	color: #142956;
}
.password-reset-description {
    color: #4d5769;
    font-size: 16px;
}
</style>
<style>
		@font-face {
			font-family: 'Open Sans';
			font-style: normal;
			font-weight: 300;
			src: local("Open Sans Light"), local("OpenSans-Light"), url(https://fonts.gstatic.com/s/opensans/v13/DXI1ORHCpsQm3Vp6mXoaTegdm0LZdjqr5-oayXSOefg.woff2) format("woff2")
		}

		@font-face {
			font-family: 'Open Sans';
			font-style: normal;
			font-weight: 400;
			src: local("Open Sans"), local("OpenSans"), url(https://fonts.gstatic.com/s/opensans/v13/cJZKeOuBrn4kERxqtaUH3VtXRa8TVwTICgirnJhmVJw.woff2) format("woff2")
		}

		@font-face {
			font-family: 'Open Sans';
			font-style: normal;
			font-weight: 600;
			src: local("Open Sans Semibold"), local("OpenSans-Semibold"), url(https://fonts.gstatic.com/s/opensans/v13/MTP_ySUJH_bn48VBG8sNSugdm0LZdjqr5-oayXSOefg.woff2) format("woff2")
		}

		@font-face {
			font-family: 'Open Sans';
			font-style: normal;
			font-weight: 700;
			src: local("Open Sans Bold"), local("OpenSans-Bold"), url(https://fonts.gstatic.com/s/opensans/v13/k3k702ZOKiLJc3WVjuplzOgdm0LZdjqr5-oayXSOefg.woff2) format("woff2")
		}

		@font-face {
			font-family: 'Open Sans';
			font-style: normal;
			font-weight: 800;
			src: local("Open Sans Extrabold"), local("OpenSans-Extrabold"), url(https://fonts.gstatic.com/s/opensans/v13/EInbV5DfGHOiMmvb1Xr-hugdm0LZdjqr5-oayXSOefg.woff2) format("woff2")
		}

		@font-face {
			font-family: 'Open Sans';
			font-style: italic;
			font-weight: 300;
			src: local("Open Sans Light Italic"), local("OpenSansLight-Italic"), url(https://fonts.gstatic.com/s/opensans/v13/PRmiXeptR36kaC0GEAetxko2lTMeWA_kmIyWrkNCwPc.woff2) format("woff2")
		}

		@font-face {
			font-family: 'Open Sans';
			font-style: italic;
			font-weight: 400;
			src: local("Open Sans Italic"), local("OpenSans-Italic"), url(https://fonts.gstatic.com/s/opensans/v13/xjAJXh38I15wypJXxuGMBo4P5ICox8Kq3LLUNMylGO4.woff2) format("woff2")
		}

		@font-face {
			font-family: 'Open Sans';
			font-style: italic;
			font-weight: 600;
			src: local("Open Sans Semibold Italic"), local("OpenSans-SemiboldItalic"), url(https://fonts.gstatic.com/s/opensans/v13/PRmiXeptR36kaC0GEAetxl2umOyRU7PgRiv8DXcgJjk.woff2) format("woff2")
		}

		@font-face {
			font-family: 'Open Sans';
			font-style: italic;
			font-weight: 700;
			src: local("Open Sans Bold Italic"), local("OpenSans-BoldItalic"), url(https://fonts.gstatic.com/s/opensans/v13/PRmiXeptR36kaC0GEAetxolIZu-HDpmDIZMigmsroc4.woff2) format("woff2")
		}

		@font-face {
			font-family: 'Open Sans';
			font-style: italic;
			font-weight: 800;
			src: local("Open Sans Extrabold Italic"), local("OpenSans-ExtraboldItalic"), url(https://fonts.gstatic.com/s/opensans/v13/PRmiXeptR36kaC0GEAetxnibbpXgLHK_uTT48UMyjSM.woff2) format("woff2")
		}

		@font-face {
			font-family: 'Klinic Slab';
			src: url(/assets/fonts/KlinicSlab-Bold.eot);
			src: local("Klinic Slab Bold Regular"), local("KlinicSlab-Bold"), url(/assets/fonts/KlinicSlab-Bold.eot?#iefix) format("embedded-opentype"), url(/assets/fonts/KlinicSlab-Bold.woff2) format("woff2"), url(/assets/fonts/KlinicSlab-Bold.woff) format("woff"), url(/assets/fonts/KlinicSlab-Bold.ttf) format("truetype"), url(/assets/fonts/KlinicSlab-Bold.svg#KlinicSlab-Bold) format("svg");
			font-weight: 700;
			font-style: normal
		}

		@font-face {
			font-family: 'Klinic Slab';
			src: url(/assets/fonts/KlinicSlab-MediumItalic.eot);
			src: local("Klinic Slab Medium Regular"), local("KlinicSlab-MediumItalic"), url(/assets/fonts/KlinicSlab-MediumItalic.eot?#iefix) format("embedded-opentype"), url(/assets/fonts/KlinicSlab-MediumItalic.woff2) format("woff2"), url(/assets/fonts/KlinicSlab-MediumItalic.woff) format("woff"), url(/assets/fonts/KlinicSlab-MediumItalic.ttf) format("truetype"), url(/assets/fonts/KlinicSlab-MediumItalic.svg#KlinicSlab-MediumItalic) format("svg");
			font-weight: 500;
			font-style: italic
		}

		@font-face {
			font-family: 'Klinic Slab Book';
			src: url(/assets/fonts/KlinicSlab-BookItalic.eot);
			src: local("Klinic Slab Book Regular"), local("KlinicSlab-BookItalic"), url(/assets/fonts/KlinicSlab-BookItalic.eot?#iefix) format("embedded-opentype"), url(/assets/fonts/KlinicSlab-BookItalic.woff2) format("woff2"), url(/assets/fonts/KlinicSlab-BookItalic.woff) format("woff"), url(/assets/fonts/KlinicSlab-BookItalic.ttf) format("truetype"), url(/assets/fonts/KlinicSlab-BookItalic.svg#KlinicSlab-BookItalic) format("svg");
			font-weight: 400;
			font-style: italic
		}

		@font-face {
			font-family: 'Klinic Slab';
			src: url(/assets/fonts/KlinicSlab-Light.eot);
			src: local("Klinic Slab Light Regular"), local("KlinicSlab-Light"), url(/assets/fonts/KlinicSlab-Light.eot?#iefix) format("embedded-opentype"), url(/assets/fonts/KlinicSlab-Light.woff2) format("woff2"), url(/assets/fonts/KlinicSlab-Light.woff) format("woff"), url(/assets/fonts/KlinicSlab-Light.ttf) format("truetype"), url(/assets/fonts/KlinicSlab-Light.svg#KlinicSlab-Light) format("svg");
			font-weight: 300;
			font-style: normal
		}

		@font-face {
			font-family: 'Klinic Slab';
			src: url(/assets/fonts/KlinicSlab-BoldItalic.eot);
			src: local("Klinic Slab Bold Regular"), local("KlinicSlab-BoldItalic"), url(/assets/fonts/KlinicSlab-BoldItalic.eot?#iefix) format("embedded-opentype"), url(/assets/fonts/KlinicSlab-BoldItalic.woff2) format("woff2"), url(/assets/fonts/KlinicSlab-BoldItalic.woff) format("woff"), url(/assets/fonts/KlinicSlab-BoldItalic.ttf) format("truetype"), url(/assets/fonts/KlinicSlab-BoldItalic.svg#KlinicSlab-BoldItalic) format("svg");
			font-weight: 700;
			font-style: italic
		}

		@font-face {
			font-family: 'Klinic Slab Book';
			src: url(/assets/fonts/KlinicSlab-Book.eot);
			src: local("Klinic Slab Book Regular"), local("KlinicSlab-Book"), url(/assets/fonts/KlinicSlab-Book.eot?#iefix) format("embedded-opentype"), url(/assets/fonts/KlinicSlab-Book.woff2) format("woff2"), url(/assets/fonts/KlinicSlab-Book.woff) format("woff"), url(/assets/fonts/KlinicSlab-Book.ttf) format("truetype"), url(/assets/fonts/KlinicSlab-Book.svg#KlinicSlab-Book) format("svg");
			font-weight: 400;
			font-style: normal
		}

		@font-face {
			font-family: 'Klinic Slab';
			src: url(/assets/fonts/KlinicSlab-Medium.eot);
			src: local("Klinic Slab Medium Regular"), local("KlinicSlab-Medium"), url(/assets/fonts/KlinicSlab-Medium.eot?#iefix) format("embedded-opentype"), url(/assets/fonts/KlinicSlab-Medium.woff2) format("woff2"), url(/assets/fonts/KlinicSlab-Medium.woff) format("woff"), url(/assets/fonts/KlinicSlab-Medium.ttf) format("truetype"), url(/assets/fonts/KlinicSlab-Medium.svg#KlinicSlab-Medium) format("svg");
			font-weight: 500;
			font-style: normal
		}

		@font-face {
			font-family: 'Klinic Slab';
			src: url(/assets/fonts/KlinicSlab-LightItalic.eot);
			src: local("Klinic Slab Light Regular"), local("KlinicSlab-LightItalic"), url(/assets/fonts/KlinicSlab-LightItalic.eot?#iefix) format("embedded-opentype"), url(/assets/fonts/KlinicSlab-LightItalic.woff2) format("woff2"), url(/assets/fonts/KlinicSlab-LightItalic.woff) format("woff"), url(/assets/fonts/KlinicSlab-LightItalic.ttf) format("truetype"), url(/assets/fonts/KlinicSlab-LightItalic.svg#KlinicSlab-LightItalic) format("svg");
			font-weight: 300;
			font-style: italic
		}

		@font-face {
			font-family: 'Sharp Sans';
			src: url(/assets/fonts/SharpSans.otf);
			src: url(/assets/fonts/SharpSans.otf);
			font-weight: 400;
			font-display: swap;
			font-style: normal
		}

		@font-face {
			font-family: 'Sharp Sans';
			src: url(/assets/fonts/SharpSans.otf);
			src: url(/assets/fonts/SharpSans.otf);
			font-weight: 200;
			font-display: swap;
			font-style: normal
		}

		@font-face {
			font-family: 'Sharp Sans';
			src: url(/assets/fonts/SharpSans-book.otf);
			src: url(/assets/fonts/SharpSans-book.otf);
			font-weight: 300;
			font-display: swap;
			font-style: normal
		}

		@font-face {
			font-family: 'Sharp Sans';
			src: url(/assets/fonts/SharpSans-medium.otf);
			src: url(/assets/fonts/SharpSans-medium.otf);
			font-weight: 400;
			font-display: swap;
			font-style: normal
		}

		@font-face {
			font-family: 'Sharp Sans';
			src: url(/assets/fonts/SharpSans-semibold.otf);
			src: url(/assets/fonts/SharpSans-semibold.otf);
			font-weight: 500;
			font-display: swap;
			font-style: normal
		}

		@font-face {
			font-family: 'Sharp Sans';
			src: url(/assets/fonts/SharpSans-bold.otf);
			src: url(/assets/fonts/SharpSans-bold.otf);
			font-weight: 700;
			font-display: swap;
			font-style: normal
		}

		*[_ngcontent-c13],
		[_ngcontent-c13]:after,
		[_ngcontent-c13]:before {
			-webkit-box-sizing: border-box;
			box-sizing: border-box
		}

		a[_ngcontent-c13],
		abbr[_ngcontent-c13],
		acronym[_ngcontent-c13],
		address[_ngcontent-c13],
		applet[_ngcontent-c13],
		article[_ngcontent-c13],
		aside[_ngcontent-c13],
		audio[_ngcontent-c13],
		b[_ngcontent-c13],
		big[_ngcontent-c13],
		blockquote[_ngcontent-c13],
		body[_ngcontent-c13],
		canvas[_ngcontent-c13],
		caption[_ngcontent-c13],
		center[_ngcontent-c13],
		cite[_ngcontent-c13],
		code[_ngcontent-c13],
		dd[_ngcontent-c13],
		del[_ngcontent-c13],
		details[_ngcontent-c13],
		dfn[_ngcontent-c13],
		div[_ngcontent-c13],
		dl[_ngcontent-c13],
		dt[_ngcontent-c13],
		em[_ngcontent-c13],
		embed[_ngcontent-c13],
		fieldset[_ngcontent-c13],
		figcaption[_ngcontent-c13],
		figure[_ngcontent-c13],
		footer[_ngcontent-c13],
		form[_ngcontent-c13],
		header[_ngcontent-c13],
		html[_ngcontent-c13],
		i[_ngcontent-c13],
		iframe[_ngcontent-c13],
		img[_ngcontent-c13],
		ins[_ngcontent-c13],
		kbd[_ngcontent-c13],
		label[_ngcontent-c13],
		legend[_ngcontent-c13],
		li[_ngcontent-c13],
		mark[_ngcontent-c13],
		menu[_ngcontent-c13],
		nav[_ngcontent-c13],
		object[_ngcontent-c13],
		ol[_ngcontent-c13],
		output[_ngcontent-c13],
		p[_ngcontent-c13],
		pre[_ngcontent-c13],
		q[_ngcontent-c13],
		ruby[_ngcontent-c13],
		s[_ngcontent-c13],
		samp[_ngcontent-c13],
		section[_ngcontent-c13],
		small[_ngcontent-c13],
		span[_ngcontent-c13],
		strike[_ngcontent-c13],
		strong[_ngcontent-c13],
		sub[_ngcontent-c13],
		summary[_ngcontent-c13],
		sup[_ngcontent-c13],
		table[_ngcontent-c13],
		tbody[_ngcontent-c13],
		td[_ngcontent-c13],
		tfoot[_ngcontent-c13],
		th[_ngcontent-c13],
		thead[_ngcontent-c13],
		time[_ngcontent-c13],
		tr[_ngcontent-c13],
		tt[_ngcontent-c13],
		u[_ngcontent-c13],
		ul[_ngcontent-c13],
		var[_ngcontent-c13],
		video[_ngcontent-c13] {
			margin: 0;
			padding: 0;
			border: 0
		}

		a[_ngcontent-c13] {
			color: #000
		}

		h1[_ngcontent-c13],
		h2[_ngcontent-c13],
		h3[_ngcontent-c13],
		h4[_ngcontent-c13],
		p[_ngcontent-c13] {
			margin: 10px 0
		}

		article[_ngcontent-c13],
		aside[_ngcontent-c13],
		details[_ngcontent-c13],
		figcaption[_ngcontent-c13],
		figure[_ngcontent-c13],
		footer[_ngcontent-c13],
		header[_ngcontent-c13],
		menu[_ngcontent-c13],
		nav[_ngcontent-c13],
		section[_ngcontent-c13] {
			display: block
		}

		ol[_ngcontent-c13],
		ul[_ngcontent-c13] {
			list-style: none
		}

		blockquote[_ngcontent-c13],
		q[_ngcontent-c13] {
			quotes: none
		}

		blockquote[_ngcontent-c13]:after,
		blockquote[_ngcontent-c13]:before,
		q[_ngcontent-c13]:after,
		q[_ngcontent-c13]:before {
			content: '';
			content: none
		}

		table[_ngcontent-c13] {
			border-collapse: collapse;
			border-spacing: 0
		}

		body[_ngcontent-c13],
		html[_ngcontent-c13] {
			margin: 0;
			padding: 0;
			height: 100%;
			width: 100%;
			background-color: #fff;
			font-family: 'Sharp Sans', sans-serif;
			line-height: 1.5
		}

		body[_ngcontent-c13] a[_ngcontent-c13],
		html[_ngcontent-c13] a[_ngcontent-c13] {
			color: #4a6ee3
		}

		body[_ngcontent-c13] input[_ngcontent-c13],
		body[_ngcontent-c13] textarea[_ngcontent-c13],
		html[_ngcontent-c13] input[_ngcontent-c13],
		html[_ngcontent-c13] textarea[_ngcontent-c13] {
			font-family: "Sharp Sans", "Sharp Sans Semibold", sans-serif;
			font-size: 12px;
			color: #000;
			font-weight: 400;
			width: 100%;
			height: 30px;
			border-radius: 2px;
			border: 1px solid #c9cfd3;
			padding-left: 10px
		}

		body[_ngcontent-c13] input[_ngcontent-c13] button[_ngcontent-c13]:focus,
		body[_ngcontent-c13] input[_ngcontent-c13]:focus,
		body[_ngcontent-c13] textarea[_ngcontent-c13] button[_ngcontent-c13]:focus,
		body[_ngcontent-c13] textarea[_ngcontent-c13]:focus,
		html[_ngcontent-c13] input[_ngcontent-c13] button[_ngcontent-c13]:focus,
		html[_ngcontent-c13] input[_ngcontent-c13]:focus,
		html[_ngcontent-c13] textarea[_ngcontent-c13] button[_ngcontent-c13]:focus,
		html[_ngcontent-c13] textarea[_ngcontent-c13]:focus {
			outline: 0
		}

		body[_ngcontent-c13] input[_ngcontent-c13]:-webkit-autofill,
		body[_ngcontent-c13] textarea[_ngcontent-c13]:-webkit-autofill,
		html[_ngcontent-c13] input[_ngcontent-c13]:-webkit-autofill,
		html[_ngcontent-c13] textarea[_ngcontent-c13]:-webkit-autofill {
			-webkit-box-shadow: 0 0 0 30px #fff inset
		}

		body[_ngcontent-c13] input.ng-valid.ng-dirty[_ngcontent-c13],
		body[_ngcontent-c13] input.ng-valid.ng-touched[_ngcontent-c13],
		body[_ngcontent-c13] input.ng-valid.submitted[_ngcontent-c13],
		body[_ngcontent-c13] textarea.ng-valid.ng-dirty[_ngcontent-c13],
		body[_ngcontent-c13] textarea.ng-valid.ng-touched[_ngcontent-c13],
		body[_ngcontent-c13] textarea.ng-valid.submitted[_ngcontent-c13],
		html[_ngcontent-c13] input.ng-valid.ng-dirty[_ngcontent-c13],
		html[_ngcontent-c13] input.ng-valid.ng-touched[_ngcontent-c13],
		html[_ngcontent-c13] input.ng-valid.submitted[_ngcontent-c13],
		html[_ngcontent-c13] textarea.ng-valid.ng-dirty[_ngcontent-c13],
		html[_ngcontent-c13] textarea.ng-valid.ng-touched[_ngcontent-c13],
		html[_ngcontent-c13] textarea.ng-valid.submitted[_ngcontent-c13] {
			border: 1px solid #42bc4e!important
		}

		body[_ngcontent-c13] input.ng-invalid.ng-touched[_ngcontent-c13],
		body[_ngcontent-c13] input.ng-invalid.submitted[_ngcontent-c13],
		body[_ngcontent-c13] textarea.ng-invalid.ng-touched[_ngcontent-c13],
		body[_ngcontent-c13] textarea.ng-invalid.submitted[_ngcontent-c13],
		html[_ngcontent-c13] input.ng-invalid.ng-touched[_ngcontent-c13],
		html[_ngcontent-c13] input.ng-invalid.submitted[_ngcontent-c13],
		html[_ngcontent-c13] textarea.ng-invalid.ng-touched[_ngcontent-c13],
		html[_ngcontent-c13] textarea.ng-invalid.submitted[_ngcontent-c13] {
			border: 1px solid #ce450a!important
		}

		.lineBreak-10px[_ngcontent-c13] {
			display: block;
			height: 10px
		}

		.lineBreak-20px[_ngcontent-c13] {
			display: block;
			height: 20px
		}

		.forgotPassword-sentEmail-bottomLinks[_ngcontent-c13] a[_ngcontent-c13]:hover {
			cursor: pointer;
			text-decoration: underline!important
		}

		.forgotPassword-sentEmail-bottomLinks[_ngcontent-c13] p[_ngcontent-c13],
		.forgotPassword-sentEmail-greyBox[_ngcontent-c13] p[_ngcontent-c13] {
			font-family: "Sharp Sans", "Sharp Sans Semibold", sans-serif;
			font-size: .85em;
			color: #1a1a1a;
			font-weight: 500
		}

		.forgotPassword[_ngcontent-c13] {
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-orient: vertical;
			-webkit-box-direction: normal;
			-ms-flex-direction: column;
			flex-direction: column;
			max-width: 380px;
			margin: 0 auto;
			text-align: center;
			height: 100%
		}

		.forgotPassword[_ngcontent-c13] h1[_ngcontent-c13],
		.forgotPassword[_ngcontent-c13] h2[_ngcontent-c13],
		.forgotPassword[_ngcontent-c13] p[_ngcontent-c13] {
			text-align: left
		}

		.forgotPassword-forgotPassword_form[_ngcontent-c13] label[_ngcontent-c13] {
			font-family: "Sharp Sans", "Sharp Sans Semibold", sans-serif;
			font-size: 18px;
			color: #1a1a1a;
			font-weight: 300;
			margin: 0 auto 7px 0
		}

		.forgotPassword-sentEmail-bottomLinks[_ngcontent-c13] {
			text-align: center
		}

		.forgotPassword-sentEmail-bottomLinks[_ngcontent-c13] p[_ngcontent-c13] a[_ngcontent-c13] {
			font-size: 100%
		}

		.forgotPassword-sentEmail-bottomLinks[_ngcontent-c13] span[_ngcontent-c13] {
			margin: 0 15px;
			color: #6d6e71
		}

		.loader {
			max-width: 45px;
			max-height: 45px;
			margin-left: 5px
		}

		[_nghost-c13] {
			height: 100%;
			width: 330px;
			margin: auto;
			z-index: 1
		}

		.forgotPassword-forgotPassword[_ngcontent-c13] .title[_ngcontent-c13],
		.forgotPassword-sentEmail[_ngcontent-c13] .title[_ngcontent-c13] {
			font-family: "Sharp Sans", "Sharp Sans Semibold", sans-serif;
			font-size: 24px;
			color: #404040;
			font-weight: 400;
			margin-bottom: 30px;
			white-space: nowrap;
			text-align: center
		}

		.forgotPassword-forgotPassword-greyBox[_ngcontent-c13],
		.forgotPassword-sentEmail-greyBox[_ngcontent-c13] {
			width: 100%
		}

		.forgotPassword-forgotPassword-greyBox[_ngcontent-c13] p[_ngcontent-c13],
		.forgotPassword-sentEmail-greyBox[_ngcontent-c13] p[_ngcontent-c13] {
			font-family: "Sharp Sans", "Sharp Sans Semibold", sans-serif;
			font-size: 12px;
			color: #404040;
			font-weight: 300
		}

		.forgotPassword-sentEmail-greyBox[_ngcontent-c13] p[_ngcontent-c13] {
			font-size: 18px;
			font-weight: 300;
			text-align: center
		}

		.forgotPassword-sentEmail-greyBox[_ngcontent-c13] h2[_ngcontent-c13] {
			font-size: 1em;
			font-weight: 600
		}

		.forgotPassword-sentEmail-greyBox[_ngcontent-c13] img[_ngcontent-c13] {
			max-width: 234px;
			max-height: 174px;
			width: 100%;
			height: 100%;
			margin: 30px auto 25px;
            z-index: 999;
            position: relative;
		}

		.forgotPassword-sentEmail-bottomLinks[_ngcontent-c13] a[_ngcontent-c13] {
			display: inline-block;
			text-decoration: none!important;
			font-family: "Sharp Sans", "Sharp Sans Semibold", sans-serif;
			font-size: 14px;
			color: #0d78f9;
			font-weight: 400;
			letter-spacing: 1px
		}

		.forgotPassword-sentEmail-backToLoginCta[_ngcontent-c13] {
			margin-top: 50px
		}

		.forgotPassword-forgotPassword[_ngcontent-c13] h1[_ngcontent-c13] {
			font-family: "Sharp Sans", "Sharp Sans Semibold", sans-serif;
			font-size: 18px;
			color: #1a1a1a;
			font-weight: 400;
			letter-spacing: .5px;
			margin: 0 0 25px
		}

		.forgotPassword-forgotPassword[_ngcontent-c13] p[_ngcontent-c13]:not(.errMessage) {
			font-family: "Sharp Sans", "Sharp Sans Semibold", sans-serif;
			font-size: 14px;
			color: #404040;
			font-weight: 400;
			text-align: center;
			margin: 0 auto 50px
		}

		.forgotPassword-forgotPassword_form[_ngcontent-c13] {
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-orient: vertical;
			-webkit-box-direction: normal;
			-ms-flex-direction: column;
			flex-direction: column;
			-webkit-box-align: start;
			-ms-flex-align: start;
			align-items: flex-start
		}

		.forgotPassword-forgotPassword_form[_ngcontent-c13] button[_ngcontent-c13] {
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-align: center;
			-ms-flex-align: center;
			align-items: center;
			padding: 0;
			height: 50px;
			margin: 25px auto;
			letter-spacing: .5px
		}

		.forgotPassword-forgotPassword_form[_ngcontent-c13] button[_ngcontent-c13] img[_ngcontent-c13] {
			max-height: 40px;
			max-width: 40px;
			height: 100%;
			width: 100%
		}

		.forgotPassword[_ngcontent-c13] .need-help[_ngcontent-c13] {
			text-align: center;
			font-family: "Sharp Sans", "Sharp Sans Semibold", sans-serif;
			font-size: 12px;
			color: #7c7c7c;
			font-weight: 500;
			margin: 25px auto
		}

		.forgotPassword[_ngcontent-c13] .need-help.needAccount[_ngcontent-c13] {
			font-family: "Sharp Sans", "Sharp Sans Semibold", sans-serif;
			font-size: 20px;
			color: #000;
			font-weight: 500
		}

		.forgotPassword[_ngcontent-c13] .need-help.needAccount[_ngcontent-c13] a[_ngcontent-c13] {
			font-family: "Sharp Sans", "Sharp Sans Semibold", sans-serif;
			font-size: 20px;
			color: #404040;
			font-weight: 300
		}

		.forgotPassword[_ngcontent-c13] .need-help[_ngcontent-c13] .contact-phone[_ngcontent-c13] {
			color: #0d78f9
		}

		.forgotPassword[_ngcontent-c13] .backBtn[_ngcontent-c13] {
			font-family: "Sharp Sans", "Sharp Sans Semibold", sans-serif;
			font-size: 14px;
			color: #0d78f9;
			font-weight: 400;
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-orient: vertical;
			-webkit-box-direction: reverse;
			-ms-flex-direction: column-reverse;
			flex-direction: column-reverse;
			margin: auto auto 10px;
			cursor: pointer
		}

        .loginPage .decoration-square[_ngcontent-c3] {
            position: absolute;
            top: 70px;
            right: 22%;
        }
	</style>
<div class="rr-content">  
    <div class="rr-auth-page pure-g  max-width-layout">
		<div>
			<div class="rr-auth-box">
				<div class="signup-pending loginPage">
        			<h4 class="heading">
						PASSWORD RESET
        			</h4>
					<div class="form-container">
					<div class="col-xs-12 col-sm-6 oauth-signup">
                    
                    <img _ngcontent-c3="" alt="decorations" class="decoration-square" src="https://login.zoominfo.com/assets/images/login/decorations-square.png">
                        <div _ngcontent-c3="" class="loginPage_main-login-no-box">
                            <router-outlet _ngcontent-c3=""></router-outlet>
                            <zi-forgot-password _nghost-c13="">
                                <div _ngcontent-c13="" class="forgotPassword">
                                    <!---->
                                    <!---->
                                    <div _ngcontent-c13="" class="forgotPassword-sentEmail">
                                        <div _ngcontent-c13="" class="forgotPassword-sentEmail-greyBox">
                                        <p _ngcontent-c13="">We’ve sent you an email with a link to reset your password</p>
                                        <img _ngcontent-c13="" src="https://login.zoominfo.com/assets/images/login/loginMailBox.png">
                                        </div>
                                        <div _ngcontent-c13="" class="forgotPassword-sentEmail-bottomLinks">
                                        <!-- <a _ngcontent-c13="" href="{{ url('/resetpassword') }}" class="forgotPasswordCta clickable" style="height: 60px;">Resend the Email</a> -->
                                            <form class="row form-box " action="{{ url('/resetpassword') }}" method="post" role="form">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="email" value="{{ $email }}">
                                                <button type="submit" style="height: 60px;height: 60px;border: 0px;background: none;color: #08c;text-decoration: none;cursor: pointer;font-weight: lighter;">Resend the Email</button>
                                            </form>
                                        </div>
                                    </div>
                                    <zi-login-footer _ngcontent-c13="" _nghost-c14="">
                                        <div _ngcontent-c14="" class="footer">
                                        <a _ngcontent-c14="" href="{{ url('/frontlogin') }}" class="clickable-center footer-backBtn">Go back to login</a>
                                        </div>
                                    </zi-login-footer>
                                </div>
                            </zi-forgot-password>
                        </div>
						
					</div>
						<!-- oauth -->
						<!-- ngIf: !!processing -->
					</div>
				</div><!-- end ngIf: !showSuccessAnimation || (showSuccessAnimation && user && user.state!='registered') -->
				<!-- ngIf: user && user.state=='registered' -->
			</div>
		</div>
	</div><!-- end ngIf: user && user.state!='registered' -->
</div>