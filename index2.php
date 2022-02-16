<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
<body>
<div class="container">

<?php
error_reporting(0);
function watermark_image($file, $destination, $overlay = "./img/logo.png", $X = 10, $Y = 10){
$watermark =    imagecreatefrompng($overlay);
$source = getimagesize($file);
$source_mime = $source['mime'];
$source_x = $source['width'];
$source_y = $source['height'];
if($source_mime == "image/png"){
$image = imagecreatefrompng($file);
}else if($source_mime == "image/jpeg"){
$image = imagecreatefromjpeg($file);
}else if($source_mime == "image/gif"){
$image = imagecreatefromgif($file);
}
imagecopy($image, $watermark, $X, $Y, 0, 0, imagesx($watermark), imagesy($watermark));
imagepng($image, $destination);
return $destination;
}
 ?> 
<html> 
 <body> 

<img src='<?php echo watermark_image("./img/bg.png", "./img/".time().".jpg"); ?>' style="
width: 500px;
height: 200px;

">

 </body> 
 </html> 
  
</div>	
</body>
<script type="text/javascript">
	$(document).ready(function() {
		$.ajax({
			url: "vi.json",
			type: "get",
			dataType: 'json',
			success: function(data) {
		// console.log(data['sEmptyTable']);
		// let n =  Object.keys(data).length;
		// console.log(data);
		// console.log(data.data[0]['name']);
		console.log(JSON.parse(data.data[0]));
      $('#example').DataTable( {
        "destroy":true,
        "data": data.data,
        "columns": [
           { "data": "1" },
            { "data": "2" },
     ],

   }); 
},error: () => {
		console.log('Error');
	}
});
	} );
</script>  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
</html>