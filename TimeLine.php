<?php

require_once("twitteroauth/autoload.php");
use Abraham\TwitterOAuth\TwitterOAuth;

function h($str, $double = true){
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8', $double);
}

date_default_timezone_set('Asia/Tokyo');

$via = new TwitterOAuth("4oiYwOByxwDQ14qkcQ5jR11JB", "RAUOpBGBZQY9HKB4QXrQs4vVov8JjcyrtxYHfWtNrSKbPjBb9y", "2805705715-kpYKix27hsKez3vDtyAXRTg5GaF9t9ic36mHyAd", "cSyHDFT4B3DOIs2DbTPIYbv21aaiVKn9DYftvzf4julgQ");
$statuses = $via->get('statuses/home_timeline', ['count' => '50']);

header('Content-Type: text/html; charset=utf-8');
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="TimeLine.css">
  <title>TimeLine</title>
 <meta charset="utf-8">
 <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>
  <!--Timeline-->
  <?php foreach ($statuses as $status): ?>
  <hr>
    <p><img class="icon" src="<?= $status->user->profile_image_url;?>"></p>
    <p><?=h($status->user->name)?></p>
    <p>@<?=$status->user->screen_name?></p>
    <p><?=h($status->text, false)?></p>
    <p><?=date('Y/m/d H:i:s', strtotime($status->created_at))?></p>
<?php endforeach;?>
<!--投稿-->
  <form id="form">
    <div id="area">
      <textarea name="tweet"></textarea>
      <input type="submit" value="ツイート" class="twe">
    </div>
  </from>

  <script>
  $('#form').submit(function(event) {
    event.preventDefault();
    let res = $.ajax({
      url: 'tweet.php',
      async: false,
      type: 'POST',
      dataType: 'json',
      data: $(this).serialize()
    }).status;
    $('#form')[0].reset();
    $('main').append('<div id="res">'+res+'</div>');
  });
</script>
</body>
</html>
