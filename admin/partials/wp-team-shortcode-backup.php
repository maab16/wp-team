<?php
// normalize attribute keys, lowercase
$atts = array_change_key_case((array)$atts, CASE_LOWER);

// override default attributes with user attributes
extract(shortcode_atts(
			[
                'title' => 'WordPress.org',
            ], 
            $atts, 
            $tag
        ));

//get your custom posts ids as an array
$posts = get_posts(array(
    'post_type'   => 'wp-team',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'fields' => 'ids'
    )
);
//loop over each post
foreach($posts as $p){

    echo $name = get_post_meta($p,"wp-team-name",true);
    echo $title = get_post_meta($p,"wp-team-title",true);
}

$o = <<<TEAM
<!-- End Work Section -->
	<section class="team" id="team"><!-- Start Team Section -->
		<div class="container">
			<h2 class="team-head title text-center">Our <strong>Team</strong></h2>
			<div class="row team-items text-center">
				<div class="col-md-3 col-sm-6 text-center team-item-container"><!-- Start Team Item 1 -->
					<div class="team-item">
						<figure class="figure team-member-image"><!-- Start Team Figure -->
							<img src="http://localhost/wp-content/plugins/wp-team/admin/images/team/member-1.jpg" alt="team" class="img-responsive member-image">
							<figcaption class="member-caption">
								<div class="member-desc">
									<img src="http://localhost/wp-content/plugins/wp-team/admin/images/team/member-1.jpg" alt="team" class="img-responsive member-image">
									<h4 class="team-member-title">Founder &amp; Developer</h4>
								</div>
								<div class="col-sm-12 member-skill" data-percent="80">
									<div class="col-sm-12 skill-title text-left"><span>PHP</span></div>
									<div class="col-sm-12 skill-percent">
										<div class="skill-percent-bg"></div>
										<div class="skill-percent-num"></div>
										<div class="skill-percentage"></div>
									</div>
								</div>
								<div class="col-sm-12 member-skill" data-percent="85">
									<div class="skill-title text-left"><span>WP</span></div>
									<div class="skill-percent">
										<div class="skill-percent-bg"></div>
										<div class="skill-percent-num"></div>
										<div class="skill-percentage"></div>
									</div>
								</div>
								<div class="col-sm-12 member-skill" data-percent="90">
									<div class="skill-title text-left"><span>jQuery</span></div>
									<div class="skill-percent">
										<div class="skill-percent-bg"></div>
										<div class="skill-percent-num"></div>
										<div class="skill-percentage"></div>
									</div>
								</div>
							</figcaption>
						</figure>
						<!-- End Figure -->
						<div class="team-item-bottom"><!-- Start Team Bottom -->
							<div class="member-desc">
								<h3 class="team-member-name sub-title">Abu Ahsan</h3>
								<h4 class="team-member-title sub-title">Founder &amp; Developer</h4>
							</div>
							<div class="memer-social text-center">
								<ul>
									<li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
									<li class="youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
								</ul>
							</div>
						</div>
						<!-- End Team Bottom -->
					</div>
				</div>
				<!-- End Item 1-->
				<div class="col-md-3 col-sm-6 text-center team-item-container"><!-- Start Team Item 2 -->
					<div class="team-item">
						<figure class="figure team-member-image"><!-- Start Team Figure -->
							<img src="http://localhost/wp-content/plugins/wp-team/admin/images/team/member-1.jpg" alt="team" class="img-responsive member-image">
							<figcaption class="member-caption">
								<div class="member-desc">
									<img src="http://localhost/wp-content/plugins/wp-team/admin/images/team/member-1.jpg" alt="team" class="img-responsive member-image">
									<h4 class="team-member-title">Founder &amp; Developer</h4>
								</div>
								<div class="col-sm-12 member-skill" data-percent="80">
									<div class="col-sm-12 skill-title text-left"><span>PHP</span></div>
									<div class="col-sm-12 skill-percent">
										<div class="skill-percent-bg"></div>
										<div class="skill-percent-num"></div>
										<div class="skill-percentage"></div>
									</div>
								</div>
								<div class="col-sm-12 member-skill" data-percent="85">
									<div class="skill-title text-left"><span>WP</span></div>
									<div class="skill-percent">
										<div class="skill-percent-bg"></div>
										<div class="skill-percent-num"></div>
										<div class="skill-percentage"></div>
									</div>
								</div>
								<div class="col-sm-12 member-skill" data-percent="90">
									<div class="skill-title text-left"><span>jQuery</span></div>
									<div class="skill-percent">
										<div class="skill-percent-bg"></div>
										<div class="skill-percent-num"></div>
										<div class="skill-percentage"></div>
									</div>
								</div>
							</figcaption>
						</figure>
						<!-- End Figure -->
						<div class="team-item-bottom"><!-- Start Team Bottom -->
							<div class="member-desc">
								<h3 class="team-member-name sub-title">Abu Ahsan</h3>
								<h4 class="team-member-title sub-title">Founder &amp; Developer</h4>
							</div>
							<div class="memer-social text-center">
								<ul>
									<li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
									<li class="youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
								</ul>
							</div>
						</div>
						<!-- End Team Bottom -->
					</div>
				</div>
				<!-- End Item 2-->
				<div class="col-md-3 col-sm-6 text-center team-item-container"><!-- Start Team Item 3 -->
					<div class="team-item">
						<figure class="figure team-member-image"><!-- Start Team Figure -->
							<img src="http://localhost/wp-content/plugins/wp-team/admin/images/team/member-1.jpg" alt="team" class="img-responsive member-image">
							<figcaption class="member-caption">
								<div class="member-desc">
									<img src="http://localhost/wp-content/plugins/wp-team/admin/images/team/member-1.jpg" alt="team" class="img-responsive member-image">
									<h4 class="team-member-title">Founder &amp; Developer</h4>
								</div>
								<div class="col-sm-12 member-skill" data-percent="80">
									<div class="col-sm-12 skill-title text-left"><span>PHP</span></div>
									<div class="col-sm-12 skill-percent">
										<div class="skill-percent-bg"></div>
										<div class="skill-percent-num"></div>
										<div class="skill-percentage"></div>
									</div>
								</div>
								<div class="col-sm-12 member-skill" data-percent="85">
									<div class="skill-title text-left"><span>WP</span></div>
									<div class="skill-percent">
										<div class="skill-percent-bg"></div>
										<div class="skill-percent-num"></div>
										<div class="skill-percentage"></div>
									</div>
								</div>
								<div class="col-sm-12 member-skill" data-percent="90">
									<div class="skill-title text-left"><span>jQuery</span></div>
									<div class="skill-percent">
										<div class="skill-percent-bg"></div>
										<div class="skill-percent-num"></div>
										<div class="skill-percentage"></div>
									</div>
								</div>
							</figcaption>
						</figure>
						<!-- End Figure -->
						<div class="team-item-bottom"><!-- Start Team Bottom -->
							<div class="member-desc">
								<h3 class="team-member-name sub-title">Abu Ahsan</h3>
								<h4 class="team-member-title sub-title">Founder &amp; Developer</h4>
							</div>
							<div class="memer-social text-center">
								<ul>
									<li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
									<li class="youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
								</ul>
							</div>
						</div>
						<!-- End Team Bottom -->
					</div>
				</div>
				<!-- End Item 3-->
				<div class="col-md-3 col-sm-6 text-center team-item-container"><!-- Start Team Item 4 -->
					<div class="team-item">
						<figure class="figure team-member-image"><!-- Start Team Figure -->
							<img src="http://localhost/wp-content/plugins/wp-team/admin/images/team/member-1.jpg" alt="team" class="img-responsive member-image">
							<figcaption class="member-caption">
								<div class="member-desc">
									<img src="http://localhost/wp-content/plugins/wp-team/admin/images/team/member-1.jpg" alt="team" class="img-responsive member-image">
									<h4 class="team-member-title">Founder &amp; Developer</h4>
								</div>
								<div class="col-sm-12 member-skill" data-percent="80">
									<div class="col-sm-12 skill-title text-left"><span>PHP</span></div>
									<div class="col-sm-12 skill-percent">
										<div class="skill-percent-bg"></div>
										<div class="skill-percent-num"></div>
										<div class="skill-percentage"></div>
									</div>
								</div>
								<div class="col-sm-12 member-skill" data-percent="85">
									<div class="skill-title text-left"><span>WP</span></div>
									<div class="skill-percent">
										<div class="skill-percent-bg"></div>
										<div class="skill-percent-num"></div>
										<div class="skill-percentage"></div>
									</div>
								</div>
								<div class="col-sm-12 member-skill" data-percent="90">
									<div class="skill-title text-left"><span>jQuery</span></div>
									<div class="skill-percent">
										<div class="skill-percent-bg"></div>
										<div class="skill-percent-num"></div>
										<div class="skill-percentage"></div>
									</div>
								</div>
							</figcaption>
						</figure>
						<!-- End Figure -->
						<div class="team-item-bottom"><!-- Start Team Bottom -->
							<div class="member-desc">
								<h3 class="team-member-name sub-title">Abu Ahsan</h3>
								<h4 class="team-member-title sub-title">Founder &amp; Developer</h4>
							</div>
							<div class="memer-social text-center">
								<ul>
									<li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
									<li class="youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
								</ul>
							</div>
						</div>
						<!-- End Team Bottom -->
					</div>
				</div>
				<!-- End Item 4-->
			</div>
			<!-- End Team Items -->
		</div><!-- End Container -->
	</section>
	<!-- End Team -->
TEAM;
// return output
echo $o;