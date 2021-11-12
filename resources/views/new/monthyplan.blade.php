@include('header')
<section id="our-pricing">
     <div class="container">
		<div class="col-md-12">
			<div class="pricing-page-list">
			 <p class="">{{ $monthlyplan->description }}</p.>
            </div>
		</div>
	</div>
</section>
<section class="mnthly-plans">
    <div class="container">
        
        <div class="table-responsi">
            <div class="membership-pricing-table">
                <table>
                    <tbody>
                        <tr>
                            <th></th>
                            <?php
                            foreach($monthlyplandata as $value) {
                                $plan_name = $value->plans;
                                $plan_amount = $value->price;
                                $plan_delete = $value->deleted_at;
                                if($plan_delete == ''){    
                            ?>
                            <th class="plan-header plan-header-free">
                                <div class="pricing-plan-name"><?php echo $plan_name; ?></div>
                                <div class="pricing-plan-price">
                                    <span class="price-lst">$<?php echo $plan_amount; ?>/month</span>
                                    <?php if(!empty($currentid)) { ?>

                                        <form action="{{ url('/memberpayment') }}" method="get" >
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="userid" value="<?php echo $currentid; ?>">
                                            <input type="hidden" name="planname" value="<?php echo $plan_name; ?>">
                                            <input type="hidden" name="amount" value="<?php echo $plan_amount; ?>">
                                            <input type="hidden" name="points" value="<?php echo $value->points; ?>">
                                            <input type="hidden" name="tutorial" value="<?php echo $value->tutorial; ?>">
                                            <input type="hidden" name="soportaccess" value="<?php echo $value->supportaccess; ?>">
                                            <input type="hidden" name="automaticupdt" value="<?php echo $value->automatic; ?>">
                					        <button type="submit" class="signup buy_login">Buy Now</button>
                                        </form>

                                    <?php } else { ?>

                                        <button class="signup buy_not_login">Buy Now</button>
                                        
                                    <?php } ?>
                                </div>
                            </th>
                            <?php } } ?>
                        </tr>
                        <tr>
                            <td>Tutorials and Support Docs:</td>
                            <?php foreach($monthlyplandata as $spport){ ?>

                                <?php if($spport->tutorial == '1') { ?>

                                    <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>

                                <?php } else { ?>

                                    <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>

                                <?php } ?>

                            <?php } ?>
                        </tr>
                        <tr>
                            <td>Support Forum Access:</td>
                            <?php foreach($monthlyplandata as $access){ ?>

                                <?php if($access->supportaccess == '1') { ?>

                                    <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>

                                <?php } else { ?>

                                    <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td>

                                <?php } ?>

                            <?php } ?>
                        </tr>
                        <tr>
                            <td>Automatic Updates:</td>
                            <?php foreach($monthlyplandata as $automatic){ ?>

                                <?php if($automatic->automatic == '1') { ?>

                                    <td><span class="icon-yes glyphicon glyphicon-ok-circle"></span></td>

                                <?php } else { ?>

                                    <td><span class="icon-no glyphicon glyphicon-remove-circle"></span></td> 

                                <?php } ?>

                            <?php } ?>
                        </tr>
                        <tr>
                            <td>Points:</td>
                            <?php foreach($monthlyplandata as $point){ ?>
                                <td><?php echo $point->points; ?> Points</td>
                            <?php } ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
	</div>
</section>

@include('footer')
<script>
    $(document).ready(function () {
        $('.buy_not_login').on('click', function(){
            swal("Please Login!", "", "error");
        });
    });
</script>