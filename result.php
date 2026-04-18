<?php
$loan_amount=filter_input(INPUT_POST,'loan_amount', FILTER_VALIDATE_FLOAT);
$interest_rate=filter_input(INPUT_POST,'interest_rate',FILTER_VALIDATE_FLOAT);
$years=filter_input(INPUT_POST,'years', FILTER_VALIDATE_INT);
//+++++++++++++++++++++++++++++++++++++++
//the part below to validate loan amount
if($loan_amount===FALSE){
    $error_message='Enter valid number please!';
}else if ($loan_amount<=0) {
    $error_message='Enter number greater than zero!';  
}
// +++++++++++++++++++++++++++++++++++++++
//code below to validate intrest rate
elseif($interest_rate===FALSE){
    $error_message='Enter valid number please!';
}elseif($interest_rate<=0){
    $error_message='Enter number greater than zero please!';
}
//++++++++++++++++++++++++++++++++++++++++
// code below to validate number of years
elseif($years==FALSE){
    $error_message='Enter valid number please!';
}elseif($years<=0){
    $error_message='Years must be greater than zero!';
}elseif($years>30){
    $error_message='Number of years should be 30 years or less';
}
//++++++++++++++++++++++++++++++++++++++++++
//code below set error if no input and left blank
else{$error_message='';}
//if there is erro message, exit and go to index page
if($error_message!=''){
    include('index.php');
    exit();
}
//calculate monthly payment
// Convert annual interest rate to a monthly decimal
// Example: 5% becomes 0.05, then divided by 12 months
$monthly_rate = ($interest_rate / 100) / 12;

// Total number of months (years * 12)
$total_months = $years * 12;

// Standard Amortization Formula
// M = P [ i(1 + i)^n ] / [ (1 + i)^n – 1 ]
if ($monthly_rate > 0) {
    $interest_factor = pow(1 + $monthly_rate, $total_months);
    $monthly_payment = $loan_amount * ($monthly_rate * $interest_factor) / ($interest_factor - 1);
} else {
    // Handle 0% interest case to avoid division by zero
    $monthly_payment = $loan_amount / $total_months;
}

// Calculate total interest paid (optional but useful)
$total_interest = ($monthly_payment * $total_months) - $loan_amount;

//set currency and percent format
$loan_amount_f='$'.number_format($loan_amount,2);
$interest_rate_f=$interest_rate.'%';
$monthly_payment_f='$'.number_format($monthly_payment,2);
$total_interest_f='$'.number_format($total_interest,2);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Result of Monthly Payment</title>
        <link rel="stylesheet" type="text/css" href='main.css'>
    </head>
    <body>
        <main>
            <h1>Monthly Payment</h1>
            <form>
                <label>Loan Amount:</label>
                <span><?php echo $loan_amount_f;?></span>
                <br><!-- comment -->
                <label>Interest Rate:</label><!-- comment -->
                <span><?php echo $interest_rate_f;?></span>
                <br><!-- comment -->
                <label> Number Of Years:</label><!-- comment -->
                <span><?php echo $years; ?></span>
                <br>
                <label>Monthly Payment</label><!-- comment -->
                <span><?php echo $monthly_payment_f;?></span>
                <br>
                <label> Total Interest</label><!-- comment -->
                <span><?php echo $total_interest_f;?></span>
                <br>
            </form>
        </main>
    </body>
</html>



