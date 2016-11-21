<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Scroll</title>
		<meta charset="utf-8">
   	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   	    <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Angular JS Script -->
		<script src="scripts/angular.min.js"></script>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<!-- CSS Script -->
		<link rel="stylesheet" type="text/css" href="./index.css">

</head>
<body>
<br><br><br>
<?php
include_once("header.php");
$folder_path = 'gallery/'; //image's folder path

$num_files = glob($folder_path . "*.{JPG,jpg,gif,png,bmp}", GLOB_BRACE);

$folder = opendir($folder_path);
$id0 = Img;
$count = 0;
if($num_files > 0)
{
 while(false !== ($file = readdir($folder))) 
 {
  $file_path = $folder_path.$file;
  $extension = strtolower(pathinfo($file ,PATHINFO_EXTENSION));
  if($extension=='jpg' || $extension =='png' || $extension == 'gif' || $extension == 'bmp') 
  {
  	$count = $count + 1;
  	$id = $id0 . $count;

   ?>
            
   <button id="imgButton" onclick="count(<?php echo $count; ?>)"> <img id="<?php echo $id; ?>" src="<?php echo $file_path; ?>" width="300" height="200" /> </button>

			 <!-- The Modal -->
			<div id="myModal" class="modal">

			  <!-- The Close Button -->
			  <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>
		     	
	    	  	<button type="button" class="next">
				  	<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
				</button>

				<button type="button" class="previous">
				    <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
				</button>

			  <!-- Modal Content (The Image) -->
			  <img class="modal-content" id="img01">

			</div>
    <?php
  }
 }
}
else
{
 echo "the folder was empty !";
}
closedir($folder);
$imgCount = $count;
?>

<script>

//Total number of Images
var imgCount = <?php echo json_encode($imgCount); ?>;
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption


var images = [];
var str = 'Img';
var currentImage;
var nextImage;
var previousImage;

function count(element)
{
	currentImage=element;
	nextImage=element+1;
	previousImage=element-1;
}

for (i = 1; i <= imgCount; i++) { 
	images[images.length] = document.getElementById(str.concat(i));  
}

var modalImg = document.getElementById("img01");



// Get the <span> element for next image
var next = document.getElementsByClassName("next")[0];


// Get the <span> element for next image
var previous = document.getElementsByClassName("previous")[0];

for (i = 0; i < images.length; i++) {
	images[i].onclick = function(){
	    modal.style.display = "block";
	    modalImg.src = this.src;
	}

}


	// When the user clicks on <next> (>), go to the next image
	next.onclick = function(){
		var imageSrc = document.getElementById(str.concat(nextImage)).src;
		if(nextImage<imgCount)
		{
			nextImage = nextImage + 1;
			previousImage = previousImage + 1;
		}
	    modal.style.display = "block";
		modalImg.src = imageSrc;
	}


	// When the user clicks on <previous> (>), go to the [previous] image
	previous.onclick = function(){
		var imageSrc = document.getElementById(str.concat(previousImage)).src;
		if(previousImage>1)
		{
			previousImage = previousImage - 1;
			nextImage = nextImage - 1;
		}
	    modal.style.display = "block";
		modalImg.src = imageSrc;
	}


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}





</script>


</body>
</html>