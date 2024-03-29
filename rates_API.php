<?php
// Function to fetch exchange rates from the API
function fetchExchangeRates() {
    $api_key = "54cf46a2280e8a28b58fff86f3da4d5d"; // Replace with your API key
    $base_currency = "USD"; // Base currency (change if needed)
    $url = "http://api.exchangeratesapi.io/v1/latest?access_key=".$api_key;

    // Make GET request to the API
    $response = file_get_contents($url);
    if ($response === false) {
        return false; // Failed to fetch data
    }

    // Decode JSON response
    $data = json_decode($response, true);
    if (!$data || !isset($data['rates'])) {
        return false; // Invalid response
    }

    return $data['rates']; // Return exchange rates
}

// Function to perform currency conversion
function convertCurrency($amount, $from_currency, $to_currency, $conversion_rates) {
    if (!isset($conversion_rates[$from_currency]) || !isset($conversion_rates[$to_currency])) {
        return false; // Currency not supported
    }

    if ($from_currency == $to_currency) {
        return $amount; // No conversion needed
    }

    // Perform conversion using exchange rates
    $converted_amount = $amount * ($conversion_rates[$to_currency] / $conversion_rates[$from_currency]);
    return $converted_amount;
}

// Fetch exchange rates from the API
$conversion_rates = fetchExchangeRates();
if (!$conversion_rates) {
    echo "Failed to fetch exchange rates. Please try again later.";
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $amount = $_POST["amount"];
    $from_currency = $_POST["from_currency"];
    $to_currency = $_POST["to_currency"];

    // Perform currency conversion
    $converted_amount = convertCurrency($amount, $from_currency, $to_currency, $conversion_rates);

    // Display result
    if ($converted_amount !== false) {
        echo "<p>Converted Amount: $converted_amount $to_currency</p>";
    } else {
        echo "Invalid currency selected. Please try again.";
    }
}
?>