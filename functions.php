

function custom_year_filter_get_years() {
    global $wpdb;

    $years = $wpdb->get_col( "
        SELECT DISTINCT YEAR( post_date )
        FROM {$wpdb->posts}
        WHERE post_type = 'post' AND post_status = 'publish'
        ORDER BY post_date DESC
    " );

    return $years;
}

function getYear(){
    $html = '<form method="GET" id="year-filter">
    <h4>Year Filter</h4>
    <select name="y" id="year">';
    foreach ( custom_year_filter_get_years() as $year ):
        if($_GET['y'] == $year){ $select = "selected"; }else{ $select =""; }
         $html .= '<option value="'.$year.'" '.$select.'>'.$year.'</option>';
    endforeach; 
    $html .= '</select><input type="button" onclick = "myFunction()" id="clearButton" value="Clear" /></form><script>jQuery("#year").on("change",function(){ jQuery("#year-filter").submit(); });function myFunction() {
         window.location.href = window.location.origin + window.location.pathname;
}</script>';
    echo  $html ;
}

add_shortcode('get_year', 'getYear');
