<?php
error_reporting(0);
$id=$_GET['id'];//1-54 (对应的台看数组台名)
$ids=array(
    '1' => '鳳凰衛視資訊台',
    '2' => '鳳凰香港台',
    '3' => '香港有線新聞台',
    '4' => '有線財經資訊台',
    '5' => '香港有線18台',
    '6' => '香港有線體育台',
    '7' => '香港有線602台',
    '8' => '有線高清603台',
    '9' => '香港有線604台',
    '10' => 'TVB無線新聞台',
    '11' => 'TVB財經體育資訊台',
    '12' => 'TVB翡翠台',
    '13' => 'TVB明珠台',
    '14' => 'TVB J2',
    '15' => 'ViuTV',
    '16' => 'ViuTV6',
    '17' => 'NOW新聞台',
    '18' => 'NOW SPORTS PRIME',
    '19' => 'NOW財經台',
    '20' => 'NOW直播台',
    '21' => '香港開電視',
    '22' => '港台電視31',
    '23' => '港台電視32',
    '24' => '中天新聞台',
    '25' => '東森新聞台',
    '26' => '東森財經新聞台',
    '27' => '壹新聞',
    '28' => '寰宇新聞台',
    '29' => '台視新聞台',
    '30' => '中視新聞台',
    '31' => '華視新聞台',
    '32' => 'TVBS新聞台',
    '33' => '三立新聞台',
    '34' => '民視新聞台',
    '35' => '民視第一台',
    '36' => '民視台灣台',
    '37' => '民視影劇台',
    '38' => '民視',
    '39' => '台視',
    '40' => '中視',
    '41' => '華視',
    '42' => 'TVBS HD',
    '43' => 'TVBS歡樂台',
    '44' => '三立台灣台',
    '45' => '三立都會台',
    '46' => '緯來體育台',
    '47' => '緯來日本台',
    '48' => '緯來育樂台',
    '49' => 'ELEVEN 1',
    '50' => 'ELEVEN 2',
    '51' => '大愛一台',
    '52' => '大愛二台',
    '53' => '大愛三台',
    '54' => '澳門蓮花',
    '55' => '鳳凰衛視中文台'

);
$ids2=array(
    '1' => '1',
    '2' => '3',
    '3' => 'hkcxw',
    '4' => 'hkcj',
    '5' => 'hk041',
    '6' => 'hk601',
    '7' => 'hk602',
    '8' => 'hk603',
    '9' => 'hk604',
    '10' => 'inews',
    '11' => 'j5',
    '12' => 'tvb',
    '13' => 'tvbp',
    '14' => 'j2',
    '15' => 'viu',
    '16' => 'vi6',
    '17' => 'nowxw',
    '18' => 'nowsp',
    '19' => 'nowcj',
    '20' => 'nowzb',
    '21' => 'kds',
    '22' => 'rthk31',
    '23' => 'rthk32',
    '24' => 'ztxw',
    '25' => 'dsxw',
    '26' => 'tv571',
    '27' => 'yxw',
    '28' => 'hyxw',
    '29' => 'tsxw',
    '30' => 'zsxw',
    '31' => 'hsxw',
    '32' => 'tv551',
    '33' => 'slxw',
    '34' => 'msxw',
    '35' => 'msdy',
    '36' => 'mstw',
    '37' => 'msyj',
    '38' => 'tv051',
    '39' => 'tv071',
    '40' => 'tv091',
    '41' => 'tv111',
    '42' => 'tvbs',
    '43' => 'tv421',
    '44' => 'sltw',
    '45' => 'sldh',
    '46' => 'tv721',
    '47' => 'tv771',
    '48' => 'tv701',
    '49' => 'tv731',
    '50' => 'tv741',
    '51' => '大愛一台',
    '52' => '大愛二台',
    '53' => '大愛三台',
    '54' => '澳門蓮花',
    '55' => '2');
	
	if($id==1||$id==2||$id==55){
		$wj='ifeng';
	}else if($id==54){
		$wj='macaulotustv';
	}else{
		$wj='tl';
	}

//=============================================开始调用IPTV444===================================================================
$one ='https://player.ggiptv.com/iptv.php?tid=wintv123';
$header=array('User-Agent:Mozilla/5.0 (Linux; Android 6.0; AOSP on HammerHead Build/MRA58K; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/44.0.2403.119 Mobile Safari/537.36 MicroMessengeriptv/1.3.2 VideoPlayer Html5Plus/1.0');
$ch = curl_init($one);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
$data1= curl_exec($ch);
//echo $a;
curl_close($ch);
$data1=str_replace("clicked('",'url":"',$data1);
$data1=str_replace(');" data-ajax="false">',',"name":"',$data1);
$data1=str_replace('</a></li></ul></div>','"',$data1);
$data1=str_replace('</a></li><li><a onclick=','",',$data1);
$data1=str_replace('</a></li><li><script type=','',$data1);
preg_match_all('|"name":"(.*?)"|', $data1, $tm);
preg_match_all('|"url":"(.*?),"|', $data1, $tmurl);
foreach ($tm[1] as $k => $v){
	$zh=$zh.$tm[1][$k].",".$tmurl[1][$k]."\r\n";
}
preg_match("|".$ids[$id].",([\s\S]*?)'|", $zh, $wb);
$api='https://player.ggiptv.com/iptv.php'.$wb[1];
$ch = curl_init($api);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
$a= curl_exec($ch);
curl_close($ch);
preg_match('|data-divider-theme="a"><script>([\s\S]*?)</script><div id="vstPlayer"|',$a,$b);
$barr = (explode(";",$b[1]));
$key=preg_match('|=(.*?)$|',$barr[0],$ke);
$dea=preg_match('|=(.*?)$|',$barr[1],$de);
$k = str_replace('"',"",$ke[1]);
$k=str_replace(' ','',$k);
$d = str_replace('"',"",$de[1]);
$d=str_replace(' ','',$d);
preg_match('|'.$k.'="([\s\S]*?)"|',$a,$nd);
preg_match_all('|'.$k.'=([\s\S]*?);|',$a,$nds);
preg_match_all('|'.$nds[1][1].'="([\s\S]*?)"|',$a,$ndss);
$k=$ndss[1][1];
$url ='https://white-art-6cb8.ysptxlive2019.workers.dev/?k='.$k.'&d='.urlencode($d);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
$art= curl_exec($ch);
curl_close($ch);
preg_match('|<script>([\s\S]*?)var video = null|',$art,$brt);
$aa=str_replace('".split("").reverse().join("")','@',$brt[1]);
preg_match_all('|"([\s\S]*?)@|',$aa,$fz);
foreach ($fz[1] as $k => $v){
	$cc=substr($v,-2)."@";
	$oo=strrev(substr($v,-2))."@";
	$aa=str_replace($cc,$oo,$aa);
}
$aa=str_replace(array('"+"','@+"','"+'),'',$aa);
$bcrr = (explode(";",$aa));
$j0=substr($bcrr[11],7,10);
$j1=substr($bcrr[11],20,10);
$j2=substr($bcrr[11],31,10);
preg_match('|'.$j1.' = "([\s\S]*?)"|',$aa,$ja1);
preg_match('|'.$j2.' = "([\s\S]*?)"|',$aa,$ja2);
  $ja0=$ja1[1].$ja2[1];
  $jm0=substr($bcrr[12],7,10);
$jm1=substr($bcrr[12],29,10);
$jm2=substr($bcrr[12],40,10);
preg_match('|'.$jm1.' = "([\s\S]*?)"|',$aa,$jma1);
$jmurl ='https://small-dust-6d4d.ysptxlive2019.workers.dev/?k='.$ja0.'&d='.urlencode($jma1[1]);
$ch = curl_init($jmurl);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
$jmout= curl_exec($ch);
curl_close($ch);
$jjj = strrev($jmout);
  $f0=substr($bcrr[13],1,10);
$jj0=substr($bcrr[14],7,10);
$jj1=substr($bcrr[14],20,10);
$jj2=substr($bcrr[14],31,10);
	 preg_match('|'.$jj2.' = "([\s\S]*?)"|',$aa,$jjj2);
	$jjjj=$jjj.$jjj2[1];
	preg_match('|token=([\s\S]*?)&|',$jjjj,$token);	
	$jjjj='https://p.ggiptv.com/v/'.$wj.'.php?token='.$token[1].'&id='.$ids2[$id];
		$tl=str_replace($ja0,'',$jjjj);
 $ch = curl_init($tl);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
$aaa= curl_exec($ch);
curl_close($ch);
preg_match("|ocation: (.*?)\n|",$aaa,$u);
if($id==51){
	$playurl='https://pulltv1.wanfudaluye.com/live/tv1.m3u8';
}else if ($id==52){
	$playurl='https://pulltv1.wanfudaluye.com/live/tv2.m3u8';
	}else if ($id==53){
		$playurl='https://pulltv1.wanfudaluye.com/live/tv3.m3u8';
	}else{
		$playurl=$u[1];
		
	}
	
	header('location:'.$playurl);
	//echo $playurl;
		
	
	
