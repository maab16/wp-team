<?php

//get your custom posts ids as an array
$ids = get_posts(array(
    'post_type'   => 'wp-team',
    'post_status' => 'publish',
    'fields' => 'ids'
    )
);
//loop over each post
?>
<!-- End Work Section -->
	<section class="team" id="team"><!-- Start Team Section -->
		<div class="container">
			<h2 class="team-head title text-center"><strong><?php echo esc_html($title);?></strong></h2>
			<div class="row team-items text-center">
				<?php
				foreach($ids as $id){

				    $name = get_post_meta($id,"wp-team-member-name",true);
				    $title = get_post_meta($id,"wp-team-member-title",true);
				    
				    // Skill Name
				    $skill_name_1 = get_post_meta($id,'wp-team-skill-1-name',true);
				    $skill_name_2 = get_post_meta($id,'wp-team-skill-2-name',true);
				    $skill_name_3 = get_post_meta($id,'wp-team-skill-3-name',true);
				    // Skill Percentage
				    $skill_percent_1 = get_post_meta($id,'wp-team-skill-1-value',true);
				    $skill_percent_2 = get_post_meta($id,'wp-team-skill-2-value',true);
				    $skill_percent_3 = get_post_meta($id,'wp-team-skill-3-value',true);
				    
				    // Social 
				    $facebook = get_post_meta($id,'wp-team-facebook',true);
				    $twitter = get_post_meta($id,'wp-team-twitter',true);
				    $linkedin = get_post_meta($id,'wp-team-linked-in',true);
				    $github = get_post_meta($id,'wp-team-github',true);

				    // Featured Image or Thumbnail
				    $thumb_id = get_post_thumbnail_id($id);
					$url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true)[0];
				?>
				<div class="col-md-3 col-sm-6 text-center team-item-container"><!-- Start Team Item 1 -->
					<div class="team-item">
						<figure class="figure team-member-image"><!-- Start Team Figure -->
							<img src="<?php echo $url;?>" alt="team" class="img-responsive member-image">
							<figcaption class="member-caption">
								<div class="member-desc">
									<img src="<?php echo $url;?>" alt="team" class="img-responsive member-image">
									<h4 class="team-member-title"><?php echo esc_html($title)?></h4>
								</div>
								<?php if(!empty($skill_name_1) && !empty($skill_percent_1)):?>
								<div class="col-sm-12 member-skill" data-percent="<?php echo esc_html($skill_percent_1)?>">
									<div class="col-sm-12 skill-title text-left"><span><?php echo esc_html($skill_name_1);?></span></div>
									<div class="col-sm-12 skill-percent">
										<div class="skill-percent-bg"></div>
										<div class="skill-percent-num"></div>
										<div class="skill-percentage"></div>
									</div>
								</div>
								<?php endif;?>
								<?php if(!empty($skill_name_2) && !empty($skill_percent_2)):?>
								<div class="col-sm-12 member-skill" data-percent="<?php echo esc_html($skill_percent_2)?>">
									<div class="skill-title text-left"><span><?php echo esc_html($skill_name_2);?></span></div>
									<div class="skill-percent">
										<div class="skill-percent-bg"></div>
										<div class="skill-percent-num"></div>
										<div class="skill-percentage"></div>
									</div>
								</div>
								<?php endif;?>
								<?php if(!empty($skill_name_3) && !empty($skill_percent_3)):?>
								<div class="col-sm-12 member-skill" data-percent="<?php echo esc_html($skill_percent_3)?>">
									<div class="skill-title text-left"><span><?php echo esc_html($skill_name_3);?></span></div>
									<div class="skill-percent">
										<div class="skill-percent-bg"></div>
										<div class="skill-percent-num"></div>
										<div class="skill-percentage"></div>
									</div>
								</div>
								<?php endif;?>
							</figcaption>
						</figure>
						<!-- End Figure -->
						<div class="team-item-bottom"><!-- Start Team Bottom -->
							<div class="member-desc">
								<h3 class="team-member-name sub-title"><?php echo esc_html($name)?></h3>
								<h4 class="team-member-title sub-title"><?php echo esc_html($title)?></h4>
							</div>
							<div class="memer-social text-center">
								<ul>
									<?php if(!empty($facebook)):?>
									<li class="facebook"><a href="<?php echo esc_html($facebook);?>"><i class="fa fa-facebook"></i></a></li>
									<?php endif;?>
									<?php if(!empty($twitter)):?>
									<li class="twitter"><a href="<?php echo esc_html($twitter);?>"><i class="fa fa-twitter"></i></a></li>
									<?php endif;?>
									<?php if(!empty($linkedin)):?>
									<li class="linkedin"><a href="<?php echo esc_html($linkedin);?>"><i class="fa fa-linkedin"></i></a></li>
									<?php endif;?>
									<?php if(!empty($github)):?>
									<li class="youtube"><a href="<?php echo esc_html($github);?>"><i class="fa fa-github"></i></a></li>
									<?php endif;?>
								</ul>
							</div>
						</div>
						<!-- End Team Bottom -->
					</div>
				</div>
				<?php
					}
				?>
			</div>
			<!-- End Team Items -->
		</div><!-- End Container -->
	</section>
	<!-- End Team -->