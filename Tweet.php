<?php

  require "twitteroauth/autoload.php";
  $via = new Abraham\TwitterOAuth\TwitterOAuth("4oiYwOByxwDQ14qkcQ5jR11JB", "RAUOpBGBZQY9HKB4QXrQs4vVov8JjcyrtxYHfWtNrSKbPjBb9y", $_COOKIE['oauth_token'], $_COOKIE['oauth_token_secret']);
 $via->post("statuses/update", array("status" => $_POST["tweet"],));
 
