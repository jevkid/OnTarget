<li><a href="/">&larr; Back To Site</a></li>
<li><a <?php if ($curpage == 10) {echo "style='background-color:".$colnavbutbgsel.";color:".$colnavbuttxtsel.";'";} ?> href="/admin/">Admin</a></li>
<li><a <?php if ($curpage == 11) {echo "style='background-color:".$colnavbutbgsel.";color:".$colnavbuttxtsel.";'";} ?> href="/admin/users">Users</a></li>
<li><a <?php if ($curpage == 12) {echo "style='background-color:".$colnavbutbgsel.";color:".$colnavbuttxtsel.";'";} ?> href="/admin/dates">Dates</a></li>
<li><a <?php if ($curpage == 13) {echo "style='background-color:".$colnavbutbgsel.";color:".$colnavbuttxtsel.";'";} ?> href="/admin/gallery">Gallery</a></li>
<li><a style="cursor:pointer;" onclick="confLink('<strong>Username:</strong> \'enquiries@cardiffuac.com\'<br><strong>Password:</strong> <?php if ($admin == true) {echo "\'".$clubpw."\'";} else {echo "&lt;NOT ADMIN!&gt;";} ?>','/admin/email');">Email</a></li>
<li><a style="cursor:pointer;" onclick="confLink('<strong>Username:</strong> \'cardiffu_admin\'<br><strong>Password:</strong> <?php if ($admin == true) {echo "\'".$clubpw."\'";} else {echo "&lt;NOT ADMIN!&gt;";} ?>','/admin/phpmyadmin');">Database</a></li>