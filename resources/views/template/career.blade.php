@include('new_header')

<div class="jmbtrn jmbtrn-about">
	<div class="container jmbtrn-container">
		<div class="jmbtrn-inner">
			<div class="row">
				<div class="col-lg-4 col-md-5">
					<h1 class="jmbtrn-title">Careers</h1>
					<div class="breadbrumb gap-bottom">
						<a href="/" class="breadbrumb-item">Home</a>
						<span class="breadbrumb-item">Career</span>
					</div>
					<p>Working at Bookyourdata.com means changing the industry of direct marketing. We want creative, problem-solving, dedicated minds that want to contribute to big projects and make a real impact. If you have such a mind, you might be a good fit for our team. </p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h3 class="primary-title">Open Positions</h3>
				<p>At Bookyourdata.com, there is a job for every skilled person. We value the very best
				ideas – come and join us!</p>
			</div>
			<div class="col-md-8">
				<div class="career-menu">
					<a class="career-menu-item" href="{{url('career/open-positions/web-developer')}}">
						<div class="row">
							<div class="col-sm-4 gap-bottom-small-tpd">
								<h5 class="career-menu-title primary-title">Web Developer</h5>
							</div>
							<div class="col-sm-8">Web development is the backbone of our product. Building great products like ours calls for brilliant minds.</div>
						</div>
					</a>
					<a class="career-menu-item" href="{{url('/career/open-positions/key-account-manager')}}">
						<div class="row">
							<div class="col-sm-4 gap-bottom-small-tpd">
								<h5 class="career-menu-title primary-title">Key Account Manager</h5>
							</div>
							<div class="col-sm-8">When our customers need help, our key account managers are always there to offer assistance.</div>
						</div>
					</a>
					<a class="career-menu-item" href="{{url('/career/open-positions/database-administrator')}}">
						<div class="row">
							<div class="col-sm-4 gap-bottom-small-tpd">
								<h5 class="career-menu-title primary-title">Database Administrator</h5>
							</div>
							<div class="col-sm-8">Handling vast amounts of data effectively is never easy. Our database administrators do it perfectly.</div>
						</div>
					</a>
					<a class="career-menu-item" href="{{url('/career/open-positions/customer-support-specialist')}}">
						<div class="row">
							<div class="col-sm-4 gap-bottom-small-tpd">
								<h5 class="career-menu-title primary-title">Customer Support Specialist</h5>
							</div>
							<div class="col-sm-8">Customers are our most valuable assets. Our highly skilled support specialists treat them with care.</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

@include('new_footer')