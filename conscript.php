<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Git Status</h1>
<?php
	// passthru("git init");
	// passthru("git remote add $project_name $project_git_url");
	// passthru("git init");
	// passthru("git add .");
	// passthru("git commit -m 'descriptivemessage' ");
	// passthru("status");
	// passthru("git push origin master ");
	// passthru("git config --global user.name Revlotianize");
	passthru("git status");
	passthru("git add .");
	passthru("git commit -m 'descriptivemessage' ");
	passthru("git push");
	
	echo "The Git status ";

	passthru("git status");

?>


</body>
</html>

<!-- <?php  
	// passthru("git init");
	// passthru("git remote add $project_name $project_git_url");
	// passthru("git init");
	// passthru("git add .");
	// passthru("git commit -m 'descriptivemessage' ");
	// passthru("status");
	// passthru("git push origin master ");
	// passthru("git config --global user.name Revlotianize");
	// passthru("git status");
	// passthru("git add .");
	// passthru("git commit -m 'descriptivemessage' ");
	// passthru("git push");
	
	// echo "The Git status   ";

	// passthru("git status");

	?> -->

	 -->
	 <?php
$output = shell_exec('ls -lart');
echo "<pre>$output</pre>";
?>