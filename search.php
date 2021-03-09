<?php
function search($text){
   include_once('db.php');
	// let's filter the data that comes in
	$text = htmlspecialchars($text);
	$get_name = $db->prepare("SELECT name FROM db_component_blood WHERE name LIKE concat('%', :name, '%')");
	$get_name -> execute(array('name' => $text));
	// show the users on the page
   while($names = $get_name->fetch(PDO::FETCH_ASSOC)){
      $STH = $db->query('SELECT increased_parameter, low_parameter, normal_parameter from db_component_blood WHERE name = "'.$names['name'].'"');
      # выбираем режим выборки
      $STH->setFetchMode(PDO::FETCH_OBJ);
      while($row = $STH->fetch()) {
   		// show each user as a link
   		echo
         '<div>'.
            '<a>'.
               '<br />'.
               $names['name'].
            '</a>'.

            '<a onclick="alert(`1`)">'.
               '<span id="opacity">'.'Повышен:'.'</span>'.'<br />'.
               $row->increased_parameter.
            '</a>'.

            '<a onclick="alert(`1`)">'.
               '<span id="opacity">'.'Понижен:'.'</span>'.'<br />'.
               $row->low_parameter.
            '</a>'.
            '<a onclick="alert(`1`)">'.
               '<span id="opacity">'.'Норма: '.'</span>'.'<br />'.
               $row->normal_parameter.
            '</a>'.
         '</div>';
   	}
   }
}
// call the search function with the data sent from Ajax
search($_GET['txt']);
?>
