$url = 'https://api.example.com/data'; // Zmeňte na vaše API URL
$accessToken = 'YOUR_ACCESS_TOKEN'; // Ak potrebujete token

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $accessToken,
    'Content-Type: application/json'
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    die('Error: ' . curl_error($ch));
}

curl_close($ch);

$data = json_decode($response, true);
print_r($data);
