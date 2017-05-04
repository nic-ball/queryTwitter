<?php

require_once '../vendor/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;

define('CONSUMER_KEY', '9njYgolPNP1482l4drQAUrJAp');
define('CONSUMER_SECRET', '9Ds0TC02VCAzTUXJ6PY1LnX0f6aW5JkmbYMp54Fufhug8dKkXY');
define('ACCESS_TOKEN', '855149748537503744-7JfDPMXzGqx8OWR0lYUHNEejwOr0UMx');
define('ACCESS_TOKEN_SECRET', 'PMcHRiJVJ3BfDLhfRsahnbG38eIt1xm50khFzWifdZ1zp');

$conn = new TwitterOAuth(
    CONSUMER_KEY,
    CONSUMER_SECRET,
    ACCESS_TOKEN,
    ACCESS_TOKEN_SECRET);

$query = array(
    "q" => "#sainsburys",
    "count" => 50,
    "result_type" => "recent"
);
$tweets = $conn->get('search/tweets', $query);
foreach ($tweets->statuses as $tweet) {
    echo '<p>'. $tweet->text. '<br>Posted on: <a href="https://twitter.com/' .$tweet->user->screen_name.
        '/status/'.$tweet->id.'">"' .date('Y-m-d H:i', strtotime($tweet->created_at)).'</a>'.

    '</p>';

    print('<pre>');
    print_r($tweet);
    print('</pre>');
}
