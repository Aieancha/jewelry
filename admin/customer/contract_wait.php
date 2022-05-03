<?php
$sql = "SELECT *,tbl_social.id,tbl_status.id as header_status 
FROM `tb_booked_stadium_header` inner join tb_user on tb_booked_stadium_header.user_id = tb_user.id 
inner join tb_stadium_type on tb_booked_stadium_header.field_id = tb_stadium_type.id ";
$query = mysqli_query($connection, $sql);
?>