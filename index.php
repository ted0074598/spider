<?php
function login_post($url, $cookie, $post) { 
    $curl = curl_init();//初始化curl模块 

    curl_setopt($curl, CURLOPT_URL, $url);//登录提交的地址
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36');  
    curl_setopt($curl, CURLOPT_HEADER, 0);//是否显示头信息 
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 0);//是否自动显示返回的信息 
    curl_setopt($curl, CURLOPT_POST, 1);//post方式提交 
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));//要提交的信息 
    curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie); //设置Cookie信息保存在指定的文件中 
    curl_setopt($crul, CURLOPT_FOLLOWLOCATION, 1);
    curl_exec($curl);//执行cURL 
    curl_close($curl);//关闭cURL资源，并且释放系统资源 
} 

//登录成功后获取数据 
function get_content($url, $cookie) { 
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Safari/537.36');  
    curl_setopt($ch, CURLOPT_HEADER, 0); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); //读取cookie 
    $rs = curl_exec($ch); //执行cURL抓取页面内容 
   // curl_close($ch); 
    return $rs; 
} 


$post = array ( 
    '__VIEWSTATE' => '/wEPDwUKMTE1MTgyODAyOGRkEJwvKqoQ4JrODKAUxHiiOh81oPzWfEdAMxe4uvLspLk=', 
    '__VIEWSTATEGENERATOR' => 'BA152D26', 
    '__EVENTVALIDATION' => '/wEdAAUTa87VN9JKEJOP4nkM0fYfESCFkFW/RuhzY1oLb/NUVB2nXP6dhZn6mKtmTGNHd3PN+DvxnwFeFeJ9MIBWR693P1jLJHiqNfRsonZfptdXU0kQzQ6G8v1uryDnsFoPafDKvgYlcTj0TWqAkfwSYQEg', 
    'TextBox1' => 'a0098', 
    'TextBox2' => '96969696',
    'Button1' => '%E7%AB%8B%E5%8D%B3%E7%99%BB%E5%BD%95'
); 

//登录地址 
$url = "http://www.hyey.cn/store/login.aspx"; 
//设置cookie保存路径 
$cookie = dirname(__FILE__) . '/cookie_oschina.txt'; 
//登录后要获取信息的地址 
$url2 = "http://www.hyey.cn/MemberServices/AgentSales.aspx"; 

//模拟登录 
//login_post($url, $cookie, $post); 
//获取登录页的信息 
$content = get_content($url2, $cookie); 
//删除cookie文件 
//@ unlink($cookie); 
//匹配页面信息 
//$preg = "/<td class='portrait'>(.*)<\/td>/i"; 
//<a href="http://hyey.cn/Notice/Notice_Show.aspx?id=136" target="_blank">  <img src="/images1/2016-08-11.jpg"> </a>
//preg_match_all($preg, $content, $arr); 
//$str = $arr[1][0]; 
//输出内容 
echo $content;

/*
// 初始化CURL 
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, $url); 
// 获取头部信息 
curl_setopt($ch, CURLOPT_HEADER, 1); 
// 返回原生的（Raw）输出 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
// 执行并获取返回结果 
$content = curl_exec($ch); 
// 关闭CURL 
curl_close($ch); 
// 解析HTTP数据流 
list($header, $body) = explode("\r\n\r\n", $content); 
// 解析COOKIE 
preg_match("/set\-cookie:([^\r\n]*)/i", $header, $matches); 
// 后面用CURL提交的时候可以直接使用 
// curl_setopt($ch, CURLOPT_COOKIE, $cookie); 
$cookie = $matches[1]; 
*/

?>