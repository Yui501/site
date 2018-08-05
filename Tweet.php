<?php

  require "twitteroauth/autoload.php";
  $via = new Abraham\TwitterOAuth\TwitterOAuth("4oiYwOByxwDQ14qkcQ5jR11JB", "RAUOpBGBZQY9HKB4QXrQs4vVov8JjcyrtxYHfWtNrSKbPjBb9y", "2805705715-kpYKix27hsKez3vDtyAXRTg5GaF9t9ic36mHyAd", "cSyHDFT4B3DOIs2DbTPIYbv21aaiVKn9DYftvzf4julgQ");
 $via->post("statuses/update", array("status" => $_POST["tweet"],));
