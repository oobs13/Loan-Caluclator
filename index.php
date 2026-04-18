<?php
/*
I need to set loan amount, intrest rate, number of years 
I need to get monthly payment and amount of intrest that will be paid
*/
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

/*This ensures the variables exist before the HTML runs.
If they are not already set, they are initialized as empty strings ('').
This prevents PHP “undefined variable” warning
ox */
if(!isset($loan_amount)){$loan_amount='';}
if(!isset($interest_rate)){$interest_rate='';}
if(!isset($years)){$years='';}
?>
<!doctype html>
<html>
    <head>
        <title>Metro Bank Calculator</title>
        <link rel="stylesheet" href="main.css">
        </head>  
        <body>
            <main>
                <h1>Metro Loan Bank Calculator </h1><!-- comment -->
                <!-- Section to display error if no input -->
                <?php  if(!empty($error_message)){?>
                <p class="error"> <?php echo htmlspecialchars($error_message);?></p> <?php } ?>
                <!-- ends here -->
                <form action="result.php" method="post"> <!-- to send data to result.php -->
                    <div id="data">
                        <label> Loan Amount: </label>
                        <input type="text" name="loan_amount" value="<?php echo htmlspecialchars($loan_amount); ?>">
                        <br><!-- comment -->
                        <label> Intrest Rate: </label>
                        <input type="text" name="interest_rate" value="<?php echo htmlspecialchars($interest_rate); ?>">
                        <br><!-- comment -->
                        <label> Number Of Years: </label>
                        <input type="text" name="years" value="<?php echo htmlspecialchars($years);?>">
                        <br><!-- comment -->
                    </div>
                    <div id="buttons">
                        <label>&nbsp;</label>  
                        <input type="submit" value="Calculate">
                        <br>
                    </div>
                </form>
            </main>
        </body>
</html>