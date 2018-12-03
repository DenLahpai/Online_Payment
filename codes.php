<?php
	$responseCodes=array(
		'0'=>'Transaction Successful',
		'1'=>'Transaction could not be processed',
		'2'=>'Transaction Declined - Contact Issuing Bank',
		'3'=>'Transaction Declined- No reply from Bank',
		'4'=>'Transaction Declined - Expired Card',
		'5'=>'Transaction Declined - Insufficient credit',
		'6'=>'Transaction Declined - Bank system error',
		'7'=>'Payment Server Processing Error - Typically caused by invalid input data such as an invalid credit card number. Processing errors can also occur. (This is only relevant for Payment Servers that enforce the uniqueness of this field) Processing errors can also occur.',
		'8'=>'Transaction Declined - Transaction Type Not Supported',
		'9'=>'Bank Declined Transaction (Do not contact Bank)',
		'A'=>'Transaction Aborted',
		'B'=>'Transaction Blocked - Returned when: The Verification Security Level has a value of "07".If the merchant has 3-D Secure Blocking enabled, the transaction will not proceed.The overall risk assessment result returns a "Reject" or "System Reject".',
		'C'=>'Transaction Cancelled',
		'D'=>'Deferred Transaction',
		'E'=>'Transaction Declined - Refer to card issuer',
		'F'=>'3D Secure Authentication Faileds',
		'I'=>'Card Security Code Failed',
		'L'=>'Shopping Transaction Locked (This indicates that there is another transaction taking place using the same shopping transaction number)',
		'N'=>'Cardholder is not enrolled in 3D Secure (Authentication Only)',
		'P'=>'Transaction is Pending',
		'R'=>'Retry Limits Exceeded, Transaction Not Processed',
		'T'=>'Address Verification Failed',
		'U'=>'Card Security Code Failed',
		'V'=>'Address Verification and Card Security Code Failed',
		'No value return'=>'No value return' //if there is no value
	);
	
	$cscCodes=array(
		'M'=>'Valid or matched CSC',
		'S'=>'Merchant indicates CSC not present on card',
		'P'=>'CSC Not Processed',
		'U'=>'Card issuer is not registered and/or certified',
		'N'=>'Code invalid or not matched',
		'No value return'=>'No value return' //if there is no value
	);
	
	$cardTypes=array(
		'AE'=>'American Express',
		'DC'=>'Diners Club',
		'JC'=>'JCB Card',
		'MS'=>'Maestro Card',
		'MC'=>'Master Card',
		'PL'=>'Private Label Card',
		'VC'=>'Visa Card',
		'No value return'=>'No value return' //if there is no value
	);
	
	$riskOverallResult=array(
		'ACC'=>'Accept',
		'REJ'=>'Reject',
		'REV'=>'Review',
		'NCK'=>'Not Checked',
		'SRJ'=>'System Reject',
		'No value return'=>'No value return' //if there is no value
	);
	
	$threeDResponse=array(
		'Y'=>'Success - The cardholder was successfully authenticated.',
		'M'=>'Success - The cardholder is not enrolled, but their card issuer attempted processing.',
		'E'=>'Not Enrolled - The cardholder is not enrolled.',
		'F'=>'Failed - An error exists in the request format from the Merchant.',
		'N'=>'Failed - Verification Failed.',
		'S'=>'Failed - The signature on the response received from the Issuer could not be validated. This should be considered a failure.',
		'P'=>'Failed - Error receiving input from Issuer.',
		'I'=>'Failed - Internal Error.',
		'U'=>'Undetermined - The verification was unable to be completed. This can be caused by network or system failures.',
		'T'=>'Undetermined - The cardholder session timed out and the cardholder’s browser never returned from the Issuer site.',
		'A'=>'Undetermined - Authentication of Merchant ID and Password to the Directory Failed.',
		'D'=>'Undetermined - Error communicating with the Directory Server.',
		'C'=>'Undetermined - Card brand not supported.',
		'No value return'=>'No value return' //if there is no value
	);
?>