<?php
// Class : PictureManager
// Version : 1.5
// Create By : GoGermany
// Date Time : 11/1/2009 9:39 PM

// Method
// checkFileType = Find and return type of picture
// createPictureName = create picture name from random or blinding
// createPicture = create picture from old pic return oldpic
// copyPicture = Copy picture to Website
// resizePicture = Resize picture return new picture
// uploadPicture = Main method of Class use to call other methods to upload
// pictures

// New : Transparent gif and png
class PicManager {
	var $picture_tmp;
	var $picture_name;
	var $folder_resize;
	var $folder_fullsize;
	var $new_picture_name;
	var $new_random_name;
	var $new_picture_resize_name;
	var $new_picture_fullsize_name;
	var $picture_type;
	var $resize_type;

	public function checkFileType() {
		//$picture_type = strtolower(end(explode('.',$this->picture_name)));
		$tmp = explode('.',$this->picture_name);
		$picture_type = strtolower(end($tmp));

		if (!in_array($picture_type, array('jpg','gif','png'))) {
		    $picture_type = 'jpg';
		}
		$this->picture_type = $picture_type;
		return $this->picture_type;
	}

	private function createPictureName() {
		if ($this->new_picture_name == "") {
			$this->new_picture_name = date ( 'Y_m_d_H_i_s' ) . "_" . md5 ( rand ( 0, 999999999 ) );
			$this->new_picture_resize_name = $this->new_picture_name . "_resize." . $this->picture_type;
			$this->new_picture_fullsize_name = $this->new_picture_name . "_fullsize." . $this->picture_type;
		} else {
			if ($this->new_random_name == true) {
				$randname = date ( 'Y_m_d_H_i_s' ) . "_" . md5 ( rand ( 0, 999999999 ) );
				$this->new_picture_resize_name = $this->new_picture_name . "_" . $randname . "_resize." . $this->picture_type;
				$this->new_picture_fullsize_name = $this->new_picture_name . "_" . $randname . "_fullsize." . $this->picture_type;
			} else {

				$this->new_picture_resize_name = $this->new_picture_name . "_resize." . $this->picture_type;

				$this->new_picture_fullsize_name = $this->new_picture_name . "_fullsize." . $this->picture_type;
			}
		}
	}
	private function createPicture($picture_type) {
		if (($picture_type == "jpeg") || ($picture_type == "jpg")) {
			$old_pic = imagecreatefromjpeg ( $this->picture_tmp );
		} elseif ($picture_type == "gif") {
			$old_pic = imagecreatefromgif ( $this->picture_tmp );
		} elseif ($picture_type == "png") {
			$old_pic = imagecreatefrompng ( $this->picture_tmp );
		}
		return $old_pic;
	}

	// RESIZE AND CREATE PICTURE
	private function resizePicture($old_pic, $new_w, $new_h) {
		$size = $this->getPictuteSize ( $this->picture_tmp, $new_w, $new_h );
		$new_pic = imagecreatetruecolor ( $size [0], $size [1] );

		// CREATE TRANSPARENT FOR GIF AND PNG
		// if(($this->picture_type == "gif")||($this->picture_type == "png")){
		if ($this->picture_type == "gif") {

			$trnprt_indx = imagecolortransparent ( $old_pic );

			// IF ORIGINAL IMAGE SPECIFIC TRANSPARENT COLOR
			if ($trnprt_indx >= 0) {

				// GET THE ORIGINAL IMAGE'S TRANSPARENT COLOR' RGB VALUES
				$trnprt_color = imagecolorsforindex ( $new_pic, $trnprt_indx );

				// ALLOCATE THE SAME COLOR IN NEW IMAGE RESOURCE
				$trnprt_indx = imagecolorallocate ( $new_pic, $trnprt_color ['red'], $trnprt_color ['green'], $trnprt_color ['blue'] );
				// COMPLETELY FILL THE BACKGROUND OF THE NEW IMAGE WITH
				// ALLOCATED COLOR
				imagefill ( $new_pic, 0, 0, $trnprt_indx );

				// SET THE BACKGROUND COLOR FOR NEW IMAGE TO TRANSPARENT
				imagecolortransparent ( $new_pic, $trnprt_indx );
			}
		} else if ($this->picture_type == "png") {
			// TURN OFF TRANSPARENCY BLENDING (TEMPORARILY)
			imagealphablending ( $new_pic, false );

			// CREATE A NEW TRANSPARENT COLOR FOR IMAGE
			$color = imagecolorallocatealpha ( $new_pic, 0, 0, 0, 127 );

			// COMPLETELY FILL THE BACKGROUND OF THE NEW IMAGE WITH ALLOCATED
			// COLOR
			imagefill ( $new_pic, 0, 0, $color );

			// RESTORE TRANSPARENCY BLENDING
			imagesavealpha ( $new_pic, true );
		}

		imagecopyresampled ( $new_pic, $old_pic, 0, 0, 0, 0, $size [0], $size [1], $size [2], $size [3] );
		return $new_pic;
	}
	private function copyPicture($picture, $folder, $picture_name, $resize) {
		if ($resize == true) {
			if (($this->picture_type == "jpeg") || ($this->picture_type == "jpg")) {
				imagejpeg ( $picture, $folder . $picture_name );
			} elseif ($this->picture_type == "gif") {
				imagegif ( $picture, $folder . $picture_name );
			} elseif ($this->picture_type == "png") {
				imagepng ( $picture, $folder . $picture_name );
			}
		} else {
			copy ( $this->picture_tmp, $folder . $picture_name );
		}
	}
	public function uploadPicture($new_w, $new_h, $resize_pic, $fullsize_pic) {
		$this->checkFileType ();
		$this->createPictureName ();
		$old_pic = $this->createPicture ( $this->picture_type );
		if ($resize_pic == true) {
			$new_pic = $this->resizePicture ( $old_pic, $new_w, $new_h );
			$this->copyPicture ( $new_pic, $this->folder_resize, $this->new_picture_resize_name, true );
			imagedestroy ( $new_pic );
		}
		if ($fullsize_pic == true) {
			$this->copyPicture ( $old_pic, $this->folder_fullsize, $this->new_picture_fullsize_name, false );
		}
		imagedestroy ( $old_pic );
	}

	// GET NEW SIZE FOR UPLOAD
	public function getPictuteSize($image, $new_w, $new_h) {
		$old_size = getimagesize ( $image );
		$old_w = $old_size [0];
		$old_h = $old_size [1];

		if ($this->resize_type == "Stretch") {
			if ($old_w >= $old_h) {
				$new_h = round ( ($new_w / $old_w) * $old_h );
			} else {
				$new_w = round ( ($new_h / $old_h) * $old_w );
			}
		} else if ($this->resize_type == "FixWidth") { // FIX WIDTH. HETGHT DEPENDING
		                                            // ON WIDTH
			$new_h = round ( ($new_w / $old_w) * $old_h );
		} else if ($this->resize_type == "FixHeight") { // FIX HETGHT. WIDTH
		                                             // DEPENDING ON HETGHT

			$new_w = round ( ($new_h / $old_h) * $old_w );
		} else if ($this->resize_type == "LessWidth") { // LESS THAN WIDTH. IF NOT
		                                             // RESIZE TO NEW WIDTH

			if ($old_w > $new_w) {
				$new_h = ($old_h / ($old_w / $new_w));
			} else {
				// thumbnail size is not larger than limit
				$new_w = $old_size [0];
				$new_h = $old_size [1];
			}
		}

		$size [0] = $new_w;
		$size [1] = $new_h;
		$size [2] = $old_w;
		$size [3] = $old_h;

		return $size;
	}
}

?>