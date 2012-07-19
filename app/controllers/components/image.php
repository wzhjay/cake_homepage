<?php
/*
 * upload the image and its thumbnail
 */
class ImageComponent extends Object {
  /*
  *    Parameters:
    *    $data: CakePHP data array from the form
    *    $datakey: key in the $data array. If you used <?= $form->file('Image/name1'); ?> in your view, then $datakey = name1
    *    $imgscale: the maximum width or height that you want your picture to be resized to
    *    $thumbscale: the maximum width or height that you want your thumbnail to be resized to
    *    $folderName: the name of the parent folder of the images. The images will be stored to /webroot/img/$folderName/big/ and  /webroot/img/$folderName/small/
    *    $square: a boolean flag indicating whether you want square and zoom cropped thumbnails, or thumbnails with the same aspect ratio of the source image
*/
  function upload_image_and_thumbnail($data, $datakey, $imgscale, $thumbscale, $folderName, $square){
	if(strlen($data['Image'][$datakey]['name'])>4){
	  $error = 0;
	  $tempuploaddir = "img/temp";
	  $biguploaddir = "img/".$folderName."/big";
	  $smalluploaddir = "img/".$folderName."/small"; // fot thumbnails
	  
	  // Make sure the required directories exist, and create them if necessary
	  if(!is_dir($tempuploaddir)) mkdir($tempuploaddir, true);
	  if(!is_dir($biguploaddir)) mkdir($biguploaddir, true);
	  if(!is_dir($smalluploaddir)) mkdir($smalluploaddir, true);
	  
	  $filetype = $this->getFileExtension($data['Image'][$datakey]['name']);
	  $filetype = strtolower($filetype);
	   if (($filetype != "jpeg") && ($filetype != "jpg") && ($filetype != "gif") && ($filetype != "png")){
		 return;
	   }
	   else{
		 $imgsize = GetImageSize($data['Image'][$datakey]['tmp_name']);
	   }
	   
	  // Generate a unique name for the image (from the timestamp)
//	  $id_unic = str_replace(".", "", strtotime ("now"));
//	  $filename = $id_unic;
//	  
	  $filename = $data['Image'][$datakey]['name'];
	  settype($filename,"string");
//	  $filename.= ".";
//	  $filename.=$filetype;
	  $tempfile = $tempuploaddir . "/$filename";
	  $resizedfile = $biguploaddir . "/$filename";
	  $croppedfile = $smalluploaddir . "/$filename";
	  
	  if (is_uploaded_file($data['Image'][$datakey]['tmp_name']))
	  {
		// Copy the image into the temporary directory
		if (!copy($data['Image'][$datakey]['tmp_name'],$tempfile))
		{
		  print "Error Uploading File!.";
		  exit();
		}
		else {
		  /*
		  *    Generate the big version of the image with max of $imgscale in either directions
		  */
		  $this->resize_img($tempfile, $imgscale, $resizedfile);                          
		  if($square) {
			/*
			*    Generate the small square version of the image with scale of $thumbscale
			*/
			$this->crop_img($tempfile, $thumbscale, $croppedfile);
		  }
		  else {
			/*
			*    Generate the big version of the image with max of $imgscale in either directions
			*/
			$this->resize_img($tempfile, $thumbscale, $croppedfile);
		  }
		  // Delete the temporary image
		  unlink($tempfile);
		}
	  }
	  // Image uploaded, return the file name
	  return $filename;
	  
	}
  }
  
  function delete_img($filename,$folderName) {
	unlink(WWW_ROOT."img/".$folderName."/big/".$filename);
	unlink(WWW_ROOT."img/".$folderName."/small/".$filename);
  }
  
  function crop_img($imgname, $scale, $filename) {
	$filetype = $this->getFileExtension($imgname);
	$filetype = strtolower($filetype);
	switch($filetype){
		case "jpeg":
		case "jpg":
		  $img_src = imagecreatefromjpeg ($imgname);
		  break;
		  case "gif":
		  $img_src = imagecreatefromgif ($imgname);
		  break;
		  case "png":
		  $img_src = imagecreatefrompng ($imgname);
		  break;
	}

	$width = imagesx($img_src);
	$height = imagesy($img_src);
	$ratiox = $width / $height * $scale;
	$ratioy = $height / $width * $scale;

	//-- Calculate resampling
	$newheight = ($width <= $height) ? $ratioy : $scale;
	$newwidth = ($width <= $height) ? $scale : $ratiox;
	//-- Calculate cropping (division by zero)
	$cropx = ($newwidth - $scale != 0) ? ($newwidth - $scale) / 2 : 0;
	$cropy = ($newheight - $scale != 0) ? ($newheight - $scale) / 2 : 0;
	//-- Setup Resample & Crop buffers
	$resampled = imagecreatetruecolor($newwidth, $newheight);
	$cropped = imagecreatetruecolor($scale, $scale);
	//-- Resample
	imagecopyresampled($resampled, $img_src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
	//-- Crop
	imagecopy($cropped, $resampled, 0, 0, $cropx, $cropy, $newwidth, $newheight);
	// Save the cropped image
	switch($filetype)
	{
	  case "jpeg":
	  case "jpg":
	  imagejpeg($cropped,$filename,80);
	  break;
	  case "gif":
	  imagegif($cropped,$filename,80);
	  break;
	  case "png":
	  imagepng($cropped,$filename,80);
	  break;
	}
  }
  
  
  function resize_img($imgname, $size, $filename) {
	$filetype = $this->getFileExtension($imgname);
	$filetype = strtolower($filetype);

	switch($filetype) {
	  case "jpeg":
	  case "jpg":
	  $img_src = imagecreatefromjpeg ($imgname);
	  break;
	  case "gif":
	  $img_src = imagecreatefromgif ($imgname);
	  break;
	  case "png":
	  $img_src = imagecreatefrompng ($imgname);
	  break;
	}
	
	$true_width = imagesx($img_src);
	$true_height = imagesy($img_src);
	$size =  explode('x',strtolower($size));
	
	$width=$size[0];
	$height =  ($width/$true_width)*$true_height;
	
//	if($true_width>=$true_height)
//	{
//	  $width=$size[0];
//	  $height =  ($width/$true_width)*$true_height;
//	}
//	else
//	{
//	  $height=$size[1];
//	  $width =  ($height/$true_height)*$true_width;
//	}
	$img_des = ImageCreateTrueColor($width,$height);
	imagecopyresampled ($img_des, $img_src, 0, 0, 0, 0, $width, $height, $true_width, $true_height);
	
	// Save the resized image
	switch($filetype)
	{
		case "jpeg":
		case "jpg":
		  imagejpeg($img_des, $filename,80);
		  break;
		  case "gif":
		  imagegif($img_des,$filename,80);
		  break;
		  case "png":
		  imagepng($img_des,$filename,80);
		  break;
	}
  }
  
  function getFileExtension($str) {
	$i = strrpos($str,".");
	if (!$i) { return ""; }
	$l = strlen($str) - $i;
	$ext = substr($str,$i+1,$l);
	return $ext;
  }
}

?>