<?php
  //Obtain strings from javascript file
  $previousUserInput = $_POST['previousUserInput'];
  $response = $_POST['response'];

  //Establish database connection
  $server = 'localhost';
  $username = "root";
  $password = "";
  $db_name = 'ai_club';
  $db = mysqli_connect($server, $username, $password, $db_name) or die('Error connecting to MySQL server.');

  //Query userInput
  $query = "SELECT rating FROM chatbot WHERE user_input=\"".$previousUserInput."\" AND response=\"".$response."\";" ;

  //Query request
  $result = mysqli_query($db, $query) or die('Error querying database.');

  //Array of query responses
  $row = mysqli_fetch_array($result);

  //Increase the rating by 1
  $new_rating = $row[0] - 1;

  //Update String
  $update = "UPDATE chatbot SET rating=".$new_rating." WHERE user_input=\"". $previousUserInput . "\" AND response=\"" . $response ."\";";

  //Update request
  mysqli_query($db, $update) or die('Error querying database.');

  //Close database
  mysqli_close($db);
?>