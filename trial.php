

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Currency Converter</title>
</head>
<body>
    <h2>Currency Converter</h2>
    <form method="post" action="">
        <label for="amount">Amount:</label>
        <input type="number" name="amount" required>
        <br><br>
        <label for="from_currency">From Currency:</label>
        <select name="from_currency" required>
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
            <option value="NGN">NGN</option>
            <!-- Add more currency options as needed -->
        </select>
        <br><br>
        <label for="to_currency">To Currency:</label>
        <select name="to_currency" required>
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
            <option value="NGN">NGN</option>
            <!-- Add more currency options as needed -->
        </select>
        <br><br>
        <button type="submit">Convert</button>
    </form>

    <?php
function fetchExchangeRates($from_currency, $to_currency, $amount) {
    $api_key = "6b1d7a32c6cb05e41cd4af8c"; // Replace with your API key
    $base_currency = "USD"; // Base currency
    $url = "https://v6.exchangerate-api.com/v6/{$api_key}/pair/{$from_currency}/{$to_currency}";

    // Make GET request to the API
    $response = file_get_contents($url);

    // Check if request was successful
    if ($response === false) {
        // Request failed, handle error
        return false;
    }

    // Decode JSON response
    $data = json_decode($response, true);

    // Check if response was valid
    if (!$data || !isset($data['conversion_rate'])) {
        // Invalid response, handle error
        return false;
    }

    // Get conversion rate for the specified currencies
    $conversion_rate = $data['conversion_rate'];

    // Perform conversion
    $converted_amount = $amount * $conversion_rate;

    return $converted_amount;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $amount = $_POST["amount"];
    $from_currency = $_POST["from_currency"]; // Base currency is always USD in this function
    $to_currency = $_POST["to_currency"];// Target currency is always EUR in this function

    // Perform currency conversion
    $converted_amount = fetchExchangeRates($from_currency, $to_currency, $amount);

    // Display result
    if ($converted_amount !== false) {
        echo "<p>Converted Amount: {$converted_amount} {$to_currency}</p>";
    } else {
        echo "Failed to fetch exchange rates. Please try again later.";
    }
}


