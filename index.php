<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find City using Pincode</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <div class="contanier">
    <div class="title">
        <h1>Find City & State from Pincode.</h1>
    </div>
    <div class="form_box">
        <form action="" autocomplete="off" method="post" id="frmPinCode">
            <label id="displays">ENTER PINCODE</label>
            <input type="text" name="pincode" id="pincode" autocomplete="new-password"  placeholder="Enter Pin Code"><br>
            <input type="button" value="Search" id="submit" onclick="get_details()">

            <label id="display_name"> CITY NAME </label>
            <input type="text"  id="city_name" disabled placeholder="City Name"><br>
            <label id="display_name"> DISTRICT NAME </label>
            <input type="text"  id="district_name" disabled placeholder="District Name"><br>
            <label id="display_name">STATE NAME</label>
            <input type="text"  id="state_name" disabled placeholder="State Name"><br>
        </form>

    </div>
    </div>

    <script>
function get_details()
{
	var pincode=jQuery('#pincode').val();
	if(pincode=='')
    {
		jQuery('#city_name').val('');
		jQuery('#district_name').val('');
		jQuery('#state_name').val('');
	}
    else
    {
		jQuery.ajax({
			url:'find_link.php',
			type:'post',
			data:'pincode='+pincode,
			success:function(data){
				if(data=='no'){
					alert('Wrong Pincode');
					jQuery('#city_name').val('');
					jQuery('#district_name').val('');
					jQuery('#state_name').val('');
				}else{
					var getData=$.parseJSON(data);
					jQuery('#city_name').val(getData.city_name);
					jQuery('#district_name').val(getData.district_name);
					jQuery('#state_name').val(getData.state_name);
				}
			}
		});
	}
}
</script>

</body>
</html>