<?php $user_details = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array(); ?>
<?php include "breadcrumb.php"; ?>

<!-------- Wish List body section start ------>
<section class="wish-list-body grid-view-body">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <?php include "profile_menus.php"; ?>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-12">
                <div class="my-course-1-full-body">
                    <h1><?php echo get_phrase('Economic Calendar'); ?></h1>


                <div class="courses wishlist-course mt-5">
                    <div class="courses-card">
                        <div class="row">
                        	<?php foreach(json_decode($wishlist, true) as $course_id):
                        		$row = $this->crud_model->get_course_by_id($course_id);
                        		if($row->num_rows() == 0) continue;
                        		$course = $row->row_array();
	                            $lessons = $this->crud_model->get_lessons('course', $course['id']);
			                    $instructor_details = $this->user_model->get_all_user($course['user_id'])->row_array();
			                    $course_duration = $this->crud_model->get_total_duration_of_lesson_by_course_id($course['id']);
			                    $total_rating =  $this->crud_model->get_ratings('course', $course['id'], true)->row()->rating;
			                    $number_of_ratings = $this->crud_model->get_ratings('course', $course['id'])->num_rows();
			                    if ($number_of_ratings > 0) {
			                        $average_ceil_rating = ceil($total_rating / $number_of_ratings);
			                    } else {
			                        $average_ceil_rating = 0;
			                    }
			                    ?>
			                   
			                      
			                               
											<div class="center-right">
                    <div class="iframe-container">
                        <iframe
                            src="https://sslecal2.investing.com?columns=exc_flags,exc_currency,exc_importance,exc_actual,exc_forecast,exc_previous&features=datepicker,timezone&countries=25,6,37,72,22,17,39,10,35,43,20,36,110,26,12,4,5&calType=week&timeZone=67&lang=71"
                            width="100%" height="100%" frameborder="0" allowtransparency="true"></iframe>
                    </div>
                </div>
                <div class="poweredBy">
                    <span>Real Time Economic Calendar provided by <a href="https://za.Investing.com/" rel="nofollow"
                            target="_blank" class="underline_link">Investing.com ZA</a>.</span>
                </div>
            </div>
        </div>
    </div></div>
			                                    </div>
			                                </div>
			                             </div>
			                        </a>
			                    </div>
	                        <?php endforeach; ?>
                        </div>
                    </div>
            </div>
			
</section>
<!-------- wish list bosy section end ------->

<style>
.center-right {
    display: flex;
    justify-content: flex-end;
    font-family: Arial, sans-sarif;
    color:#fff
}

.iframe-container {
    width: 100%;
    height: 590px;
    margin: 0 auto;
	font-family: Arial, sans-serif;
            background-color: #f5f4f3;
            margin: 0;
            padding: 0;
}

.poweredBy {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 11px;
    color: #333333;
    text-align: right;
    margin-top: 5px;
}
</style>