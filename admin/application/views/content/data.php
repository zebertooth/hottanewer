<?php
$root_path = $_SERVER['DOCUMENT_ROOT'];
$dir_uploads_article = $this->config->item('dir_uploads_article');// พาธในการอัพภาพ
foreach ($query->result() as $post) {
	        $img=$post->img;
			$file_tmp = $this->config->item('imgurl').$dir_uploads_article.'_thumbs/'.$img;
			$file_org = $this->config->item('imgurl').$dir_uploads_article.$img;
echo'
<li class="ListImg">
<div class="showT right" id="showT'.$post->id.'"></div>
<img  id="'.$post->id.'" class="ShowImg" data-fsrc="'.$file_tmp.'?time='.time().'" path_org="'.$file_org.'" />
 </li>';

    }

?>