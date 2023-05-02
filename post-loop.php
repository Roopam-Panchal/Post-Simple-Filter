if(isset($_GET['y'])){
				$args = array(
			        'post_type' => 'post',
			        'post_status' => 'publish',
			        'posts_per_page' => -1,
			        'paged'=> $paged ,
			        'cat'=>$category,
			        'date_query' => array(
			            array(
			                'year' => $_GET['y']
			            )
			        )
			    );
			    $blog_query = new WP_Query($args);
			}
