<?php

if (isset($_POST['action'])) {
    
       addArt();
          
    }
}

function addArt() {
    echo "
	<script language=javascript >     
	alert('Hello! This is connMysql.'); 
	</script>
	";
    exit;
}


?>