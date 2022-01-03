<?php
 require "dbconnect.php";


 ?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="jquery.js"></script>

<script language="javascript">
var audio = new Audio('Explosion+3.mp3');
var money=1000;

function setBomb(bombID) {
	now= new Date(); //get the current time
	tday=new Date(myArray[bombID]['expire'])
	console.log(now, tday)
	if (tday <= now) {
		//alert('exploded');
		//use jQuery ajax to reset timer
		if(money >= 500) {
			$.ajax({
				url: "setBomb.php",
				dataType: 'html',
				type: 'POST',
				data: { id: myArray[bombID]['id']}, //optional, you can send field1=10, field2='abc' to URL by this
				error: function(response) { //the call back function when ajax call fails
					alert('Ajax request failed!');
					},
				success: function(txt) { //the call back function when ajax call succeed
					console.log(txt)
					myArray[bombID]['expire'] = txt;
					money -= 500
					}
			});
		} else {
			alert("You need more money to set a bomb!")
		}
	} else {
		alert("counting down, be patient.")
	}
}

function checkBomb() {
	$("#money").html(money);
	now= new Date(); //get the current time
	
	//check each bomb with a for loop
	//array length: number of items in the global array: myArray
	for (i=0; i < myArray.length;i++) {	
		tday=new Date(myArray[i]['expire']); //convert the date string into date object in javascript
		if (tday <= now) { 
			//expired, set the explode image and text
			$("#bomb" + i).attr('src',"images/explode.jpg");
			$("#timer"+i).html("exploded!")
			if (now - tday <= 1500 ) {
				audio.play();
				money += 600
			}
		} else {
			//set the bomb image  and calculate count down
			$("#bomb" + i).attr('src',"images/bomb.jpg");
			$("#timer"+i).html(Math.floor((tday-now)/1000))			
		}
	}
}

//javascript, to set the timer on windows load event
window.onload = function () {
	//check the bomb status every 1 second
    setInterval(function () {
		checkBomb()
    }, 1000);
};
</script>
</head>

<body >
Money:<div id="money"></div><hr>
<?php

$i=0; //counter for bombs
$sql="select * from game"; //select all bomb information from DB
$res=mysqli_query($conn,$sql) or die("db error");
$arr = array(); //define an array for bombs

while($row=mysqli_fetch_assoc($res)) {
	$arr[] = $row; //store the row into the array
	//generate the image tag, the div tag for timer text. Note on the use of $i in tag ID
	echo "<img id='bomb$i' onclick='setBomb($i)'><div id='timer$i'></div><br />";
	$i++; //increase counter
}

?>

<script>
<?php
	//print the bomb array to the web page as a javascript object
	echo "var myArray=" . json_encode($arr);
?>
</script>

</body></html>