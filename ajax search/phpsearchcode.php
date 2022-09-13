//Search Case Studies Shortcode
function lets_begin_ajax_custom_search(){

	$html = '';
	$html .= '<div class="cus-search">
	<input type="text" name="case_name" id="case_name" placeholder="Type Here...">
	<button id="cus_searchbtn" type="button">Search</button>
	</div>';
	$html .='<div id="searchingg">Searching</div>';
	$html .='<div id="resultsFound"></div>';
	$html .='<div id="results"></div>';
	
	return $html;
}
add_shortcode('custom-search-posttype', 'lets_begin_ajax_custom_search');


function advancedSearchCaseStudy(){
	$case_val = $_POST['case_name'];

	$args = array(
		'post_type' => 'case-studies',
		'posts_per_page' => -1,
		's' => $case_val
	);

	$caseResults = get_posts($args);
	$list = array();

	foreach($caseResults as $case){
		setup_postdata($case);
		$list[] = array(
			'object' => $case,
			'id' => $case->ID,
			'name' => $case->post_title
		); 
	}

	header("Content-type: application/json");
	echo json_encode($list);
	die;
}
add_action('wp_ajax_nopriv_advancedSearchCaseStudy', 'advancedSearchCaseStudy');
add_action('wp_ajax_advancedSearchCaseStudy', 'advancedSearchCaseStudy');
