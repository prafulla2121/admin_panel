<?php
// Set the URL of the Wikipedia page
$url = 'https://en.wikipedia.org/wiki/Oh_My_God';

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36');

// Execute the cURL request and get the response
$htmlContent = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
    exit;
}

curl_close($ch);

// Load the HTML content into DOMDocument
$doc = new DOMDocument();
libxml_use_internal_errors(true); // Suppress warnings
$doc->loadHTML($htmlContent);
libxml_clear_errors();

// Initialize DOMXPath
$xpath = new DOMXPath($doc);

// Define the XPath query to extract the desired data
$query = '//table[contains(@class, "infobox")]//tr'; // Adjust the query based on the website's structure

// Execute the XPath query
$rows = $xpath->query($query);

// Initialize an array to store the scraped data
$data = [];

// Loop through the rows and extract the data
foreach ($rows as $row) {
    $header = $xpath->query('.//th', $row)->item(0);
    $value = $xpath->query('.//td', $row)->item(0);
    if ($header && $value) {
        $data[trim($header->textContent)] = trim($value->textContent);
    }
}

// Save the extracted data into a JSON file
file_put_contents('output.json', json_encode($data, JSON_PRETTY_PRINT));

echo "Data extracted and saved to output.json!";
?>
