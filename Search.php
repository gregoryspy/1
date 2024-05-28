<?php
$search = $_GET['search'] ?? null;
$url = $_GET['url'] ?? null;
if ($search) {
    $apiKey = 'AIzaSyDpo6eCUg92ptnb82CxePRY2SbN5T3aKf0';
    $cx = '50819b27c595c41ab';
    $search_url = urlencode($search);
    $url = "https://www.googleapis.com/customsearch/v1?key=$apiKey&cx=$cx&q=$search_url";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $items = json_decode($response, true);
} elseif ($url) {
    echo "<script>window.location.href = '$url';</script>";
    exit;
} else {
    echo "Змінна search не була передана в запиті.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Browser</title>
</head>
<body>
<h2>My Browser</h2>
<form method="GET" action="Search.php">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search"><br><br>
    <input type="submit" value="Submit">
</form>
<?php
if (!empty($items['items'])) {
    echo "<h2>Результати пошуку</h2>";
    foreach ($items['items'] as $item) {
        echo "<div class=\"item\">
            <p class=\"link\">{$item['displayLink']}</p>
            <p class=\"title\"><a target=\"_blank\" href=\"{$item['link']}\">{$item['title']}</a></p>
            <p class=\"desc\">{$item['snippet']}</p><br>
        </div>";
    }
}
?>
</body>
</html>
