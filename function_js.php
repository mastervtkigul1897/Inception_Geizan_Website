<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script type="text/javascript">
$(document).on('submit','#Register',function(e){
    e.preventDefault();
    $.ajax({
    method:"POST",
    url: "controller/register.php",
    data:$(this).serialize(),
    success: function(data){
    $('#msg').html(data);
    $('#Register').find('input').val('')
}});
});

$(document).on('submit','#Login',function(e){
    e.preventDefault();
    $.ajax({
    method:"POST",
    url: "controller/login.php",
    data:$(this).serialize(),
    success: function(data){
    $('#msg').html(data);
    $('#Login').find('input').val('')
}});
});

$(document).on('submit','#BuyItemmallRPS<?php echo $rows[0]; ?>',function(e){
    e.preventDefault();
    $.ajax({
    method:"POST",
    url: "controller/buyitemmall_rps.php",
    data:$(this).serialize(),
    success: function(data){
    $('#msg<?php echo $rows[0]; ?>').html(data);
    $('#BuyItemmallRPS<?php echo $rows[0]; ?>').find('input').val('')
}});
});

$(document).on('submit','#BuyItemmallEMS<?php echo $rows[0]; ?>',function(e){
    e.preventDefault();
    $.ajax({
    method:"POST",
    url: "controller/buyitemmall_ems.php",
    data:$(this).serialize(),
    success: function(data){
    $('#msg<?php echo $rows[0]; ?>').html(data);
    $('#BuyItemmallEMS<?php echo $rows[0]; ?>').find('input').val('')
}});
});

$(document).on('submit','#BuyRSGPS',function(e){
    e.preventDefault();
    $.ajax({
    method:"POST",
    url: "controller/buyrs_gps.php",
    data:$(this).serialize(),
    success: function(data){
    $('#msgss').html(data);
    $('#BuyRSGPS').find('input').val('')
}});
});

$(document).on('submit','#BuyRSRPS',function(e){
    e.preventDefault();
    $.ajax({
    method:"POST",
    url: "controller/buyrs_rps.php",
    data:$(this).serialize(),
    success: function(data){
    $('#msgss').html(data);
    $('#BuyRSRPS').find('input').val('')
}});
});

$(document).on('submit','#BuyRSEMS',function(e){
    e.preventDefault();
    $.ajax({
    method:"POST",
    url: "controller/buyrs_ems.php",
    data:$(this).serialize(),
    success: function(data){
    $('#msgss').html(data);
    $('#BuyRSEMS').find('input').val('')
}});
});
//

$(document).on('submit','#RDGPS',function(e){
    e.preventDefault();
    $.ajax({
    method:"POST",
    url: "controller/resetdg_gps.php",
    data:$(this).serialize(),
    success: function(data){
    $('#msgrd').html(data);
    $('#RDGPS').find('input').val('')
}});
});

$(document).on('submit','#RDRPS',function(e){
    e.preventDefault();
    $.ajax({
    method:"POST",
    url: "controller/resetdg_rps.php",
    data:$(this).serialize(),
    success: function(data){
    $('#msgrd').html(data);
    $('#RDRPS').find('input').val('')
}});
});

$(document).on('submit','#RDEMS',function(e){
    e.preventDefault();
    $.ajax({
    method:"POST",
    url: "controller/resetdg_ems.php",
    data:$(this).serialize(),
    success: function(data){
    $('#msgrd').html(data);
    $('#RDEMS').find('input').val('')
}});
});
//

$(document).on('submit','#HGGPS',function(e){
    e.preventDefault();
    $.ajax({
    method:"POST",
    url: "controller/buyhg_gps.php",
    data:$(this).serialize(),
    success: function(data){
    $('#msghg').html(data);
    $('#BuyRSGPS').find('input').val('')
}});
});

$(document).on('submit','#HGRPS',function(e){
    e.preventDefault();
    $.ajax({
    method:"POST",
    url: "controller/buyhg_rps.php",
    data:$(this).serialize(),
    success: function(data){
    $('#msghg').html(data);
    $('#BuyRSRPS').find('input').val('')
}});
});

$(document).on('submit','#HGEMS',function(e){
    e.preventDefault();
    $.ajax({
    method:"POST",
    url: "controller/buyhg_ems.php",
    data:$(this).serialize(),
    success: function(data){
    $('#msghg').html(data);
    $('#HGEMS').find('input').val('')
}});
});

$(document).on('submit','#BuyItemmallGPS<?php echo $rows[0]; ?>',function(e){
    e.preventDefault();
    $.ajax({
    method:"POST",
    url: "controller/buyitemmall_gps.php",
    data:$(this).serialize(),
    success: function(data){
    $('#msg<?php echo $rows[0]; ?>').html(data);
    $('#BuyItemmallGPS<?php echo $rows[0]; ?>').find('input').val('')
}});
});

$(document).on('submit','#BuyExMall<?php echo $rows[0]; ?>',function(e){
    e.preventDefault();
    $.ajax({
    method:"POST",
    url: "controller/buyexmall.php",
    data:$(this).serialize(),
    success: function(data){
    $('#msgs<?php echo $rows[0]; ?>').html(data);
    $('#BuyExMall<?php echo $rows[0]; ?>').find('input').val('')
}});
});
</script>




