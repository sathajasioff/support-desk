<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="payment.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="content">
        <div class="navbar">
            <h1>WE SUPPORT</h1>
            <nav>
                <ul>
                <li><a href="../home.php">Home</a></li>
                <li><a href="../home.php">About</a></li>
                <li><a href="../contact.php">Contact</a></li>
                <li><a href="#">Inquiry</a></li>
                </ul>
            </nav>
            <div class="btn">
                <a href="#"><i class='bx bx-user-circle'></i></a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Payment</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Est non temporibus error iusto cum culpa atque, 
                    ab labore, sequi magnam repudiandae nam quas. 
                    Perferendis pariatur rem aperiam optio praesentium! Natus.</p>
            </div>
            <div class="formreg">
                <h1>Payment</h1>
                <form action="wepayment.php" method="post" id="paymentForm" onsubmit="return validateForm()">
                    <div class="column">
                        <h3 class="title">Billing Address</h3>
                        <div class="input-box">
                            <label for="fullName">Full name :</label>
                            <input type="text" placeholder="Full name" name="fullName" id="fullName">
                        </div>
                        <div class="input-box">
                            <label for="email">Email :</label>
                            <input type="text" placeholder="Example@gmail.com" name="email" id="email">
                        </div>
                        <div class="input-box">
                            <label for="address">Address :</label>
                            <input type="text" placeholder="Address"  name="address" id="address">
                        </div>
                        <div class="flex">
                            <div class="input-box">
                                <label for="zipCode">Zip code :</label>
                                <input type="number" placeholder="xxxxxx" name="zipCode" id="zipCode">
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <h3 class="title">Payment</h3>
                        <div class="input-box">
                            <span>Card Accepted :</span>
                            <img src="25654-2-major-credit-card-logo-transparent.png" alt="Card Accepted">
                        </div>
                        <div class="input-box">
                            <label for="nameOnCard">Name On Card :</label>
                            <input type="text" placeholder="Name on Card" name="nameOnCard" id="nameOnCard">
                        </div>
                        <div class="input-box">
                            <label for="cardNumber">Card Number :</label>
                            <input type="number" placeholder="xxxx xxxx xxxx xxxx" name="cardNumber" id="cardNumber">
                        </div>
                        <div class="flex">
                            <div class="input-box">
                                <label for="expMonth">Exp Month :</label>
                                <select class="box" name="expMonth" id="expMonth">
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                            <div class="input-box">
                                <label for="expYear">Exp Year :</label>
                                <input type="number" placeholder="2024" name="expYear" id="expYear">
                            </div>
                            <div class="input-box">
                                <label for="cvv">CVV :</label>
                                <input type="number" placeholder="XXX" name="cvv" id="cvv">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn">Pay</button>
                </form>
        </div>
        
    </div>
</body>
</html>