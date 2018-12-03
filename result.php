<?php

	require_once 'codes.php';
	
	function getValue($key) {
    	if (isset($_GET[$key]) && $_GET[$key]!=""){
    		return $_GET[$key];
    	}
		else{
			return "No value return";
		}
	}

	$secureHash=$_GET['vpc_SecureHash'];
	$hashType=$_GET['vpc_SecureHashType'];
	
	$secureSecret='';
	$packedSecret=pack('H*',$secureSecret);
	
	unset($_GET['vpc_SecureHash']);
	unset($_GET['vpc_SecureHashType']);
	
	$appendAmp=0;
	
	$parametersToHash="";
	
	foreach ($_GET as $key => $value) {
			
		if (strlen($value) > 0) {
	        if ($appendAmp == 0) {
	        	
            	$parametersToHash .= $key . '=' . $value; //for calculating secure hash, not use urlencode
            	$appendAmp = 1;
        	} else {
            	$parametersToHash .= '&' . $key . "=" . $value;
        	}
        	
    	}
	}
	
	$computedHash=strtoupper(hash_hmac('sha256', $parametersToHash, $packedSecret));
	
	if ($secureHash===$computedHash){
		$txnResponseCode=$_GET['vpc_TxnResponseCode'];
		
			// If input is null, returns string "No Value Returned", else returns inpu
		
		//if ($txnResponseCode==0){ //transaction success
			//standard transaction data
			$locale          = getValue("vpc_Locale");
			$command         = getValue("vpc_Command");
			$message         = getValue("vpc_Message");
			$version         = getValue("vpc_Version");
			$cardType        = getValue("vpc_Card");
			$orderInfo       = getValue("vpc_OrderInfo");
			$merchantID      = getValue("vpc_Merchant");
			$authorizeID     = getValue("vpc_AuthorizeId");
			$acqResponseCode = getValue("vpc_AcqResponseCode");
			
			$receiptNo=getValue("vpc_ReceiptNo");
			$transactionNo=getValue("vpc_TransactionNo");
			$amount=getValue("vpc_Amount");
			$batchNo=getValue("vpc_BatchNo");
			$merchTxnRef=getValue("vpc_MerchTxnRef");
			$cardNo=getValue("vpc_CardNum");
			$cscResultCode=getValue("vpc_CSCResultCode");
			$acqcscrespcode=getValue("vpc_AcqCSCRespCode");
			$riskOverall=getValue("vpc_RiskOverallResult");
			
			// 3-D Secure Data
			$verType         = getValue("vpc_VerType");
			$verStatus       = getValue("vpc_VerStatus");
			$token           = getValue("vpc_VerToken");
			$verSecurLevel   = getValue("vpc_VerSecurityLevel");
			$enrolled        = getValue("vpc_3DSenrolled");
			$xid             = getValue("vpc_3DSXID");
			$acqECI          = getValue("vpc_3DSECI");
			$authStatus      = getValue("vpc_3DSstatus");
?>
<html>
	<head>
		<title>Purchase Result</title>
	</head>
	<body>
		<h2 align="center">Payment of &#36;<?=$amount/100 ?> is <?php echo $txnResponseCode==="0"?"success!":"fail." ?></h2>
		<table border="5">
			<tr>
				<th>Field Nmae</th>
				<th>Value</th>
			</tr>
			<tr>
				<td>VPC API Version : </td>
				<td><?=$version ?></td>
			</tr>
			<tr>
				<td>Command : </td>
				<td><?=$command ?></td>
			</tr>
			<tr>
				<td>Merchant Transaction Reference : </td>
				<td><?=$merchTxnRef ?></td>
			</tr>
			<tr>
				<td>Merchant ID : </td>
				<td><?=$merchantID ?></td>
			</tr>
			<tr>
				<td>Order Information : </td>
				<td><?=$orderInfo ?></td>
			</tr>
			<tr>
				<td>Purchase Amount : </td>
				<td><?=$amount ?></td>
			</tr>
			<tr>
				<td>Message : </td>
				<td><?=$message ?></td>
			</tr>
			<tr>
				<td>VPC Transaction Response Code : </td>
				<td><?=$txnResponseCode ?></td>
			</tr>
			<tr>
				<td>Transaction Response Code Description : </td>
				<td><?=$responseCodes[$txnResponseCode] ?></td>
			</tr>
			<tr>
				<td>Receipt Number : </td>
				<td><?=$receiptNo ?></td>
			</tr>
			<tr>
				<td>AcqResponseCode (Not return in error condition) : </td>
				<td><?=$acqResponseCode ?></td>
			</tr>
			<tr>
				<td>Transaction Number : </td>
				<td><?=$transactionNo ?></td>
			</tr>
			<tr>
				<td>Batch Number : </td>
				<td><?=$batchNo ?></td>
			</tr>
			<tr>
				<td>Autherisation Identification Code : </td>
				<td><?=$authorizeID ?></td>
			</tr>
			<tr>
				<td>Card Type : </td>
				<td><?=$cardTypes[$cardType] ?></td>
			</tr>
			<tr>
				<td>Secure Hash : </td>
				<td><?=$secureHash ?></td>
			</tr>
			<tr>
				<td>Secure Hash Type :</td>
				<td><?=$hashType ?></td>
			</tr>
			<tr>
				<td>Card Number : </td>
				<td><?=$cardNo ?></td>
			</tr>
			<tr>
				<td>CSC Result Code</td>
				<td><?=$cscCodes[$cscResultCode] ?></td>
			</tr>
			<tr>
				<td>AcqCSCRespCode</td>
				<td><?=$acqcscrespcode ?></td>
			</tr>
			<tr>
				<td>Risk Overall Result</td>
				<td><?=$riskOverallResult[$riskOverall] ?></td>
			</tr>
		</table>
		<p>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
		<h4 align="center">Below are 3D Secure Fields</h4>
		<table border="5">
			<tr>
				<th>Filed Name</th>
				<th>Value</th>
			</tr>
			<tr>
				<td>Unique 3DS transaction identifier : </td>
				<td><?=$xid ?></td>
			</tr>
			<tr>
				<td>3DS Authentication Verification Value : </td>
				<td><?=$token ?></td>
			</tr>
			<tr>
				<td>3DS Electronic Commerce Indicator : </td>
				<td><?=$acqECI ?></td>
			</tr>
			<tr>
				<td>3DS Authentication Scheme : </td>
				<td><?=$verType ?></td>
			</tr>
			<tr>
				<td>3DS Security level used in the AUTH message : </td>
				<td><?=$verSecurLevel ?></td>
			</tr>
			<tr>
				<td>3DS CardHolder Enrolled : </td>
				<td><?=$enrolled ?></td>
			</tr>
			<tr>
				<td>Authenticated Successfully : </td>
				<td><?=$authStatus ?></td>
			</tr>
			<tr>
				<td>Payment Server 3DS Authentication Status Code : </td>
				<td><?=$verStatus ?></td>
			</tr>
			<tr>
				<td>3DS Authentication Status Code Description : </td>
				<td><?=$threeDResponse[$verStatus] ?></td>
			</tr>
		</table>
		
	</body>
</html>
<?php		
	}
	else{
		echo "hash not correct";
	}
?>