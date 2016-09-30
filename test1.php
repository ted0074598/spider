<?php
$login_url = 'http://www.hyey.cn/login.aspx';  
   
 $post_fields['__VIEWSTATE'] = '/wEPDwUKMTE1MTgyODAyOGRkEJwvKqoQ4JrODKAUxHiiOh81oPzWfEdAMxe4uvLspLk=';  
 $post_fields['__VIEWSTATEGENERATOR'] = 'BA152D26';  
 $post_fields['__EVENTVALIDATION'] = '/wEdAAUTa87VN9JKEJOP4nkM0fYfESCFkFW/RuhzY1oLb/NUVB2nXP6dhZn6mKtmTGNHd3PN+DvxnwFeFeJ9MIBWR693P1jLJHiqNfRsonZfptdXU0kQzQ6G8v1uryDnsFoPafDKvgYlcTj0TWqAkfwSYQEg';  
 $post_fields['TextBox1'] = 'a0098';  
 $post_fields['TextBox2'] = '96969696';  

 //cookie文件存放在网站根目录的temp文件夹下  
 $cookie_file = tempnam('./temp','cookie');  

$ch = curl_init($login_url);  
 curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.1.5) Gecko/20091102 Firefox/3.5.5');  
 curl_setopt($ch, CURLOPT_HEADER, 0);  
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
 curl_setopt($ch, CURLOPT_MAXREDIRS, 1);  
 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  
 curl_setopt($ch, CURLOPT_AUTOREFERER, 1);  
 curl_setopt($ch, CURLOPT_POST, 1);  
 curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($post_fields) );  
 curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);  
 curl_exec($ch);  
curl_close($ch);

?>