<?php
//Include DB configuration file
include 'dbConfig.php';

if(!empty($_GET['item_number']) && !empty($_GET['tx']) && !empty($_GET['amt']) && $_GET['st'] == 'Completed'){
    //get transaction information from query string
    $item_number = $_GET['item_number'];
    $txn_id = $_GET['tx'];
    $payment_gross = $_GET['amt'];
    $currency_code = $_GET['cc'];
    $payment_status = $_GET['st'];
    $custom = $_GET['cm'];
    
    //Check if subscription data exists with the TXN ID
    $prevPaymentResult = $db->query("SELECT * FROM user_subscriptions WHERE txn_id = '".$txn_id."'");
    
    if($prevPaymentResult->num_rows > 0){
        //get subscription info from database
        $paymentRow = $prevPaymentResult->fetch_assoc();
        
        //prepare subscription html to display
        $phtml  = '<h5 class="success">Thanks for payment, your payment was successful. Payment details are given below.</h5>';
        $phtml .= '<div class="paymentInfo">';
        $phtml .= '<p>Payment Reference Number: <span>MS'.$paymentRow['id'].'</span></p>';
        $phtml .= '<p>Transaction ID: <span>'.$paymentRow['txn_id'].'</span></p>';
        $phtml .= '<p>Paid Amount: <span>'.$paymentRow['payment_gross'].' '.$paymentRow['currency_code'].'</span></p>';
        $phtml .= '<p>Validity: <span>'.$paymentRow['valid_from'].' to '.$paymentRow['valid_to'].'</span></p>';
        $phtml .= '</div>';
    }else{
        $phtml = '<h5 class="error">Your payment was unsuccessful, please try again.</h5>';
    }
}elseif(!empty($_GET['item_number']) && !empty($_GET['tx']) && !empty($_GET['amt']) && $_GET['st'] != 'Completed'){
    $phtml = '<h5 class="error">Your payment was unsuccessful, please try again.</h5>';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>PayPal Subscriptions Payment Payment Status</title>
    <meta charset="utf-8">
</head>
<body>
<div class="container">
    <h1>PayPal Subscriptions Payment Status</h1>
    <!-- render subscription details -->
    <?php echo !empty($phtml)?$phtml:''; ?>
</body>
</html>