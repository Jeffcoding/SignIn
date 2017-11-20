<?php    
include_once 'aliyun-php-sdk-core/Config.php';
function SendMSG($pn,$number){
	use Sms\Request\V20160927 as Sms;
	$phonenumber=$_REQUEST['phonenumber'];
	$iClientProfile = DefaultProfile::getProfile("cn-hangzhou", "LTAIJQNI3K9JZvwh", "ElfL2angDN0vqdpMaHaxGjt4lyTxI2");        
	$client = new DefaultAcsClient($iClientProfile);    
	$request = new Sms\SingleSendSmsRequest();
	$request->setSignName("思存");/*签名名称*/
	$request->setTemplateCode("SMS_60095418");/*模板code*/
	$request->setRecNum($pn);/*目标手机号*/
	$request->setParamString("{\"number\":".$number."}");/*模板变量，数字一定要转换为字符串*/
	try {
		$response = $client->getAcsResponse($request);
		/*print_r($response);返回$response['Model'],$response['RequestId']*/
	}
	catch (ClientException  $e) {/*端口错误
		print_r($e->getErrorCode());   
		print_r($e->getErrorMessage());   */
	}
	catch (ServerException  $e) {     /*运营商错误
	print_r($e->getErrorCode());   
	print_r($e->getErrorMessage());*/
	}
}
?>