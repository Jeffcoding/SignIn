<?php    
	include_once 'phpqrcode/phpqrcode.php';
	function qrcode($value)
	{
		$errorCorrectionLevel = 'L';//�ݴ��� 
		$matrixPointSize = 6;//����ͼƬ��С 
		//���ɶ�ά��ͼƬ 
		QRcode::png($value, 'qrcode.png', $errorCorrectionLevel, $matrixPointSize, 2); 
		$logo = 'logo.png';//׼���õ�logoͼƬ 
		$QR = 'qrcode.png';//�Ѿ����ɵ�ԭʼ��ά��ͼ 
		
		if ($logo !== FALSE) { 
			$QR = imagecreatefromstring(file_get_contents($QR)); 
			$logo = imagecreatefromstring(file_get_contents($logo)); 
			$QR_width = imagesx($QR);//��ά��ͼƬ��� 
			$QR_height = imagesy($QR);//��ά��ͼƬ�߶� 
			$logo_width = imagesx($logo);//logoͼƬ��� 
			$logo_height = imagesy($logo);//logoͼƬ�߶� 
			$logo_qr_width = $QR_width / 5; 
			$scale = $logo_width/$logo_qr_width; 
			$logo_qr_height = $logo_height/$scale; 
			$from_width = ($QR_width - $logo_qr_width) / 2; 
			//�������ͼƬ��������С 
			imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width, 
			$logo_qr_height, $logo_width, $logo_height); 
		} 
		//���ͼƬ 
		imagepng($QR, 'helloweba.png'); 
		echo '<img src="helloweba.png">'; 
	}
	qrcode("https://www.baidu.com");
?>