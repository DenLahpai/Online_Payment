<?php
	$vpcURL='https://migs.mastercard.com.au/vpcpay?';
	$secureSecret='12FD277EAC461970DC68504A1034B07E';

	$packedSecret=pack('H*',$secureSecret);


	$parameters=array(
		'vpc_Version'=>'2',
		'vpc_Command'=>'pay',
		'vpc_AccessCode'=>'67ACADC9',
		'vpc_MerchTxnRef'=> $_POST['merchTxnRef'],
		'vpc_Merchant'=>'ECOMLINKIN02',
		'vpc_OrderInfo'=> $_POST['orderInfo'],
		'vpc_Amount'=> $_POST['amount'],
		'vpc_Locale'=>'en',
		'vpc_ReturnURL'=>'https://denlp.com/Online_Payment/receipt.php', //because local testing
		'vpc_gateway'=>'ssl', // hw - use SSL (if we use threeDSecure instead of ssl it will only authenicate, no payment will be made)
	);

	ksort($parameters); // hw - need to sort the parameters before calculating secure hash


	$appendAmp=0;

	$parametersToHash="";

	foreach ($parameters as $key => $value) {

		if (strlen($value) > 0) {
	        if ($appendAmp == 0) {

            	$parametersToHash .= $key . '=' . $value; // hw - for calculating secure hash, not use urlencode
            	$appendAmp = 1;
        	} else {
            	$parametersToHash .= '&' . $key . "=" . $value;
        	}

    	}
	}

	$securedHash= hash_hmac('sha256', $parametersToHash, $packedSecret);


?>

<html>
	<body onload="window.postForm.submit()">
		<form action="<?=$vpcURL ?>" method="post" name="postForm">
		<div style="text-align: center; border: 3px solid #ccc;padding: 20px; margin: auto; display: table"
			<p>Please wait while your payment is processing ...</p>
		</div>
			<?php
				foreach ($parameters as $key => $value) {
					if (strlen($value)>0){
			?>
					<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
			<?php
					}
				}
			?>

			<input type="hidden" name="vpc_SecureHash" value="<?=$securedHash ?>" />
			<input type="hidden" name="vpc_SecureHashType" value="SHA256" />
		</form>
	</body>
</html>
