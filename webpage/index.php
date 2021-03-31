<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Validating Forms</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		<h1>Registration Form</h1>
<?php
    $name = "";
    $email ="";
    $username = "";
    $password = "";
    $conf_password= "";
    $date_of_birth = "";
    $gender = "";
    $marital_status = "";
    $address = "";
    $city= "";
    $postal_code = "";
    $home_phone = "";
    $mobile_phone = "";
    $credit_card_num = "";
    $credit_card_expiry= "";
    $monthly_salary = "";
    $web_site_url = "";
    $overall_gpa = "";


    $is_name = true;
    $is_email = true;
    $is_username = true;
    $is_password = true;
    $is_conf_password = true;
    $is_date_of_birth = true;
    $is_gender = true;
    $is_marital_status = true;
    $is_address = true;
    $is_city = true;
    $is_postal_code = true;
    $is_home_phone = true;
    $is_mobile_phone = true;
    $is_credit_card_num = true;
    $is_credit_card_expiry = true;
    $is_monthly_salary = true;
    $is_web_site_url = true;
    $is_overall_gpa = true;

    if($_SERVER["REQUEST_METHOD"] == 'POST')
    {
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $conf_password = $_REQUEST['conf_password'];
        $date_of_birth = $_REQUEST['date_of_birth'];
        $gender = $_REQUEST['gender'];
        $marital_status = $_REQUEST['marital'];
        $address = $_REQUEST['address'];
        $city = $_REQUEST['city'];
        $postal_code = $_REQUEST['postal_code'];
        $home_phone = $_REQUEST['home_phone'];
        $mobile_phone = $_REQUEST['mobile_phone'];
        $credit_card_num = $_REQUEST['credit_card_num'];
        $credit_card_expiry = $_REQUEST['credit_card_expiry'];
        $monthly_salary = $_REQUEST['monthly_salary'];
        $web_site_url = $_REQUEST['url'];
        $overall_gpa = $_REQUEST['gpa'];


        $is_name = preg_match('/^([a-zA-Z][a-z \-]*[a-z]){2,}$/', $name);
        $is_email = preg_match("/(.*)(@)(.*)[.](.*)/", $email);
        $is_username = preg_match('/^([a-z][a-z \-]*[a-z]){5,}$/', $username);
        $is_password =  preg_match('/^([a-z][a-z \-]*[a-z]){8,}$/', $password);
        $is_conf_password = $password == $conf_password;
        $is_date_of_birth = preg_match('/[0-3][0-9][.][0-1][1-9][.][0-9][0-9][0-9][0-9]/', $date_of_birth);
        $is_gender = $gender == 'Male' or $gender == 'Female';
        $is_marital_status = $marital_status == 'Single' or $marital_status == 'Married' or $marital_status == 'Divorced' or $marital_status == 'Widowed';
        $is_address = preg_match('/[0-9a-zA-Z \-\,\.](.*)/', $address);
        $is_city = preg_match('/[a-zA-Z \-](.*)/', $city);
        $is_postal_code = preg_match('/([0-9]){8,}/', $postal_code);
        $is_home_phone = preg_match('/([0-9 ]){9,}/', $home_phone);
        $is_mobile_phone = preg_match('/([0-9 ]){9,}/', $mobile_phone);
        $is_credit_card_num = preg_match('/([0-9 ]){16,}/', $credit_card_num);
        $is_credit_card_expiry = preg_match('/[0-3][0-9][.][0-1][1-9][.][0-9][0-9][0-9][0-9]/', $credit_card_expiry);
        $is_monthly_salary = preg_match('/(UZS )[0-9]*[,][0-9]{3} *[.][0-9]{2,}/', $monthly_salary) ;
        $is_web_site_url = preg_match('/^http:\/\/[a-z0-9]*\.[a-z]{2,3}$/', $web_site_url);
        $is_overall_gpa = preg_match('/[0-4]*[.][0-9]/', $overall_gpa);


        $isValid = $is_name and $is_email and $is_username and $is_password and $is_conf_password and $is_date_of_birth and $is_gender and $is_marital_status and $is_address and $is_city and $is_postal_code and $is_home_phone and $is_mobile_phone and $is_credit_card_num and $is_credit_card_expiry and $is_monthly_salary and $is_web_site_url and $is_overall_gpa;

        if($isValid) {
            header("Location: ThankYou.html", TRUE, 301);
        }

    }
?>
		<p>
			This form validates user input and then displays "Thank You" page.
		</p>
		
		<hr />
		
		<h2>Please, fill below fields correctly</h2>
        <form action="index.php" method="POST">
            <dl>
                <dt>Name</dt>
                <dd>
                    <input type="text" name="name" value="<?= $name ?>">
                </dd>
                <dd class="<?= $is_name ? '' : 'not' ?>valid">
                    This field is required. It has to contain at least 2 chars. It should not contain any number.
                </dd>

                <dt>Email</dt>
                <dd>
                    <input type="text" name="email" value="<?= $email ?>">
                </dd>
                <dd class="<?= $is_email ? '' : 'not' ?>valid">
                    This field is required. It should correspond to email format.
                </dd>

                <dt>Username</dt>
                <dd>
                    <input type="text" name="username" value="<?= $username ?>">
                </dd>
                <dd class="<?= $is_username ? '' : 'not' ?>valid">
                    This field is required. It has to contain at least 5 chars.
                </dd>

                <dt>Password</dt>
                <dd>
                    <input type="password" name="password" value="<?= $password ?>">
                </dd>
                <dd class="<?= $is_password ? '' : 'not' ?>valid">
                    This field is required. It has to contain at least 8 chars.
                </dd>

                <dt>Confirm Password</dt>
                <dd>
                    <input type="password" name="conf_password" value="<?= $conf_password ?>">
                </dd>
                <dd class="<?= $is_conf_password ? '' : 'not' ?>valid">
                    This field is required. It has to be equal to Password field.
                </dd>

                <dt>Date of Birth</dt>
                <dd>
                    <input type="text" name="date_of_birth" value="<?= $date_of_birth ?>">
                </dd>
                <dd class="<?= $is_date_of_birth ? '' : 'not' ?>valid">
                    Date should be written in dd.MM.yyyy format. For ex, 07.03.2019
                </dd>

                <dt>Gender</dt>
                <dd>
                    <input type="text" name="gender" value="<?= $gender ?>">
                </dd>
                <dd class="<?= $is_gender ? '' : 'not' ?>valid">
                    Only 2 options accepted: Male, Female.
                </dd>

                <dt>Marital Status</dt>
                <dd>
                    <input type="text" name="marital" value="<?= $marital_status ?>">
                </dd>
                <dd class="<?= $is_marital_status ? '' : 'not' ?>valid">
                    Only 4 options accepted: Single, Married, Divorced, Widowed
                </dd>

                <dt>Address</dt>
                <dd>
                    <input type="text" name="address" value="<?= $address ?>">
                </dd>
                <dd class="<?= $is_address ? '' : 'not' ?>valid">
                    This is required field.
                </dd>

                <dt>City</dt>
                <dd>
                    <input type="text" name="city" value="<?= $city ?>">
                </dd>
                <dd class="<?= $is_city ? '' : 'not' ?>valid">
                    This is required field.
                </dd>

                <dt>Postal Code</dt>
                <dd>
                    <input type="text" name="postal_code" value="<?= $postal_code ?>">
                </dd>
                <dd class="<?= $is_postal_code ? '' : 'not' ?>valid">
                    This is required field. It should follow 6 digit format. For ex, 100011
                </dd>

                <dt>Home Phone</dt>
                <dd>
                    <input type="text" name="home_phone" value="<?= $home_phone ?>">
                </dd>
                <dd class="<?= $is_home_phone ? '' : 'not' ?>valid">
                    This is required field. It should follow 9 digit format. For ex, 97 1234567
                </dd>

                <dt>Mobile Phone</dt>
                <dd>
                    <input type="text" name="mobile_phone" value="<?= $mobile_phone ?>">
                </dd>
                <dd class="<?= $is_mobile_phone ? '' : 'not' ?>valid">
                    This is required field. It should follow 9 digit format. For ex, 97 1234567
                </dd>

                <dt>Credit Card Number</dt>
                <dd>
                    <input type="text" name="credit_card_num" value="<?= $credit_card_num ?>">
                </dd>
                <dd class="<?= $is_credit_card_num ? '' : 'not' ?>valid">
                    This is required field. It should follow 16 digit format. For ex, 1234 1234 1234 1234
                </dd>

                <dt>Credit Card Expiry Date</dt>
                <dd>
                    <input type="text" name="credit_card_expiry" value="<?= $credit_card_expiry ?>">
                </dd>
                <dd class="<?= $is_credit_card_expiry ? '' : 'not' ?>valid">
                    This is required field. Date should be written in dd.MM.yyyy format. For ex, 07.03.2019
                </dd>

                <dt>Monthly Salary</dt>
                <dd>
                    <input type="text" name="monthly_salary" value="<?= $monthly_salary ?>">
                </dd>
                <dd class="<?= $is_monthly_salary ? '' : 'not' ?>valid">
                    This is required field. It should be written in following format UZS 200,000.00
                </dd>

                <dt>Web Site URL</dt>
                <dd>
                    <input type="text" name="url" value="<?= $web_site_url ?>">
                </dd>
                <dd class="<?= $is_web_site_url ? '' : 'not' ?>valid">
                    This is required field. It should match URL format. For ex, http://github.com
                </dd>

                <dt>Overall GPA</dt>
                <dd>
                    <input type="text" name="gpa" value="<?= $overall_gpa ?>">
                </dd>
                <dd class="<?= $is_overall_gpa ? '' : 'not' ?>valid">
                    This is required field. It should be a floating point number less than or equal 4.5
                </dd>

                <dt>
                    <input type="submit" value="Register">
                </dt>
            </dl>
        </form>
	</body>
</html>