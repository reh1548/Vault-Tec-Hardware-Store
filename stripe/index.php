<?php 
session_start();
require('config.php');

$input = sprintf("%.3f", $_SESSION['checkout_total_price']);
$cents = (int) ( (string) ( $input * 100 ) );
?>

<form action="submit.php" method="post">
    <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button" 
        data-key="<?php echo $publishableKey ?>"
        data-amount = "<?php echo $cents?>"
        data-name="Vault-Tec Hardware Store"
        data-description="Vault-Tec Hardware Store Description"
        data-image=''
        data-currency='usd'
        data-email="<?php echo $_SESSION['emaiL']?>"
    >
    </script>
</form>

