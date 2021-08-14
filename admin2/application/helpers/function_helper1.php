<?php
function selectbox($query,$name,$select,$req=true,$opt=''){
	if($req){
		$text='<select name="'.$name.'" id="'.$name.'" class="required" '.$opt.'>';
	}else{
		$text='<select name="'.$name.'" id="'.$name.'" '.$opt.'>';
	}
	$text.='<option value="">เลือก</option>';
	if($query){
		$field=$query->list_fields();
		foreach($query->result() as $r){
			if($select==$r->$field[0]){
				$text.=sprintf('<option value="%s" selected>%s</option>',$r->$field[0],$r->$field[1]);
			}else{
				$text.=sprintf('<option value="%s">%s</option>',$r->$field[0],$r->$field[1]);
			}
		}
		$field = NULL;
		$query->free_result();
	}
	$text.='</select>';
	return $text;
}
function selectbox_array($arr,$name,$select,$req=true,$opt=''){
	if($req){
		$text='<select name="'.$name.'" id="'.$name.'" class="required" '.$opt.'><option value=""></option>';
	}else{
		$text='<select name="'.$name.'" id="'.$name.'" '.$opt.'>';
	}
	foreach($arr as $key=>$value){
		if($select==$key){
			$text.=sprintf('<option value="%s" selected>%s</option>',$key,$value);
		}else{
			$text.=sprintf('<option value="%s">%s</option>',$key,$value);
		}
	}
	$text.='</select>';
	return $text;
}
function label_array($arr,$select){
	$text=NULL;
	foreach($arr as $key=>$value){
		if($key==$select){
			$text=$value;
		}
	}
	return $text;
}
function rel_time($from,$to=null){
	$output='';
	if($from!='0000-00-00 00:00:00'){
		$to=(($to===null)?time():$to);
		$to=(is_int($to)?$to:strtotime($to));
		$from=(is_int($from)?$from:strtotime($from));
		$units=array('ปี'=>29030400,'เดือน'=>2419200,'สัปดาห์'=>604800,'วัน'=>86400,'ชั่งโมง'=>3600,'นาที'=>60);
		$diff=abs($from-$to);
		$suffix=($from>$to?'ที่เหลือ':'ที่ผ่านมา');
		foreach($units as $unit=>$mult){
			if($diff>=$mult){
				$output.=', '.intval($diff/$mult).' '.$unit;
				$diff-=intval($diff/$mult)*$mult;
			}
		}
		$output.=' '.$suffix;
		$output=substr($output,strlen(', '));
	}
	return $output;
}
function post_array2text($a){
	$post='';
	foreach($a as $key=>$value){
		$post.=sprintf('%s=%s&',$key,urlencode($value));
	}
	return substr($post,0,-1);
}
function clean($text){
	return str_replace('&nbsp;','',trim($text));
}
function send_massage($message,$telephone,$type='premium',$sender='PRIVATE'){
	if(strlen($telephone)==10 && preg_match('/^(08|09)/',$telephone)){
		if($type=='premium'){
			if(!$sender){
				$sender='PRIVATE';
			}
		}else{
			$sender='THAIBULKSMS';
		}
		$ch=curl_init();
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,5);
		curl_setopt($ch,CURLOPT_USERAGENT,'API SENDER');
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION,0);
		curl_setopt($ch,CURLOPT_TIMEOUT,5);
		curl_setopt($ch,CURLOPT_URL,'http://www.thaibulksms.com/sms_api.php');
		curl_setopt($ch,CURLOPT_POST,1);
		curl_setopt($ch,CURLOPT_POSTFIELDS,"username=&password=&msisdn=$telephone&message=$message&sender=$sender&force=$type");
		$tmp=curl_exec($ch);
		curl_close($ch);
		return $tmp;
	}else{
		return false;	
	}
}
?>