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
            <!-- Add more currency options as needed -->
        </select>
        <br><br>
        <label for="to_currency">To Currency:</label>
        <select name="to_currency" required>
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
            <!-- Add more currency options as needed -->
        </select>
        <br><br>
        <button type="submit">Convert</button>
    </form>

    <?php
    // Conversion rates (hardcoded for demonstration)
   // $conversion_rates = [
       // "USD" => 1,    // 1 USD = 1 USD
       // "EUR" => 0.85, // 1 USD = 0.85 EUR
        // Add more conversion rates as needed
    //];
    function fetchExchangeRates($from_currency, $to_currency, $amount) {
        $api_key = "6b1d7a32c6cb05e41cd4af8c"; // Replace with your API key
        $base_currency = "USD"; // Base currency (change if needed)
     $url = "https://v6.exchangerate-api.com/v6/6b1d7a32c6cb05e41cd4af8c/latest/USD".$api_key."&from=".$from_currency."&to=".$to_currency."&amount=".$amount;
      
    
        // Make GET request to the API
        echo $response = file_get_contents($url);
        echo $response = $response['success'];
       
    }
//fetchExchangeRates("GBP", "JPY", "3000");

    // Function to perform currency conversion
    function convertCurrency($amount, $from_currency, $to_currency, $conversion_rates) {
        if ($from_currency == $to_currency) {
            return $amount; // No conversion needed
        }

        // Perform conversion using exchange rates
        $converted_amount = $amount * ($conversion_rates[$to_currency] / $conversion_rates[$from_currency]);
        return $converted_amount;
    }
   

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $amount = $_POST["amount"];
        $from_currency = $_POST["from_currency"];
        $to_currency = $_POST["to_currency"];

        // Perform currency conversion
        $converted_amount = fetchExchangeRates($from_currency, $to_currency, $amount);

        // Display result
        echo "<p>Converted Amount: $converted_amount $to_currency</p>";
    }
    ?>
</body>
</html>
