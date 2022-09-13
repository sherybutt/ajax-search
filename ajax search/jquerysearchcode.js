jQuery( document ).ready( function($) {

//Search Post type
$('#cus_searchbtn').on('click', function(){

	$('#results').html('');
	$('#resultsFound').html('');

	var casestudyy = $('#case_name').val();

	//If user didnt enter value in field
	if(casestudyy.length === 0){
		$('#results').html('Please Input value');
		$('#resultsFound').html('');
	} 
	//If theres value in the field
	else {
	var postDataa = {
		action: 'advancedSearchCaseStudy',
		case_name: casestudyy
	}
	
	 jQuery.ajax({
		url: ajax_object.ajax_url,
		type: 'post',
		data: postDataa,
	 }).done(function(response){
		$.each(response, function(index, object){
			var results = '<div class="myResults">';
				results += '<p>' + object.name + '</p>';
				results += '</div>';

				$('#results').append(results);
		});

		if(!response.length > 0) {
			var result = '<h2>No Result Found</h2>';
			$('#resultsFound').html(result);
		}else {
			var result = '<h2>' + response.length + ' results found</h2>';
			$('#resultsFound').html(result);
		}
	 });

	}

});


});