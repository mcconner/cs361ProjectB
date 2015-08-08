<?php
echo file_get_contents("http://www.numbeo.com/api/indices?api_key=vr5x2c8nzqofyv&query=" . urlencode( $_REQUEST['location']));
?>