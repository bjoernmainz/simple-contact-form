<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Simple Contact Form %version%</title>


    <!-- 1. Add this  lines to your script -->
    %third_party%
    <link rel="stylesheet" type="text/css" href="css/sf_main.css">
    <!-- Add this  lines to your script -->

</head>

<body>

%debug_line%

<form action="worker.php" method="post" enctype="multipart/form-data" name="simple_form">

<fieldset name="simple_form_fieldset">
	<legend><h1>Simple Contact Form %version%</h1></legend>

        <!-- 2. This is the language selection / Delete This line if don't want a language selector -->
        %language_selector%
        <br /><br />
	
	<!-- This is where the errormessage will be displayed -->
	<div class="scf-error-message" id="error-message"><br /></div><br />

    <!-- This is the Form -->
    %form%

	<br clear="all" />
	
	<div id="scf-mandatory">
	*<? p("Mandatory") ?>
	</div>
</fieldset>
</form>
</body>
</html>
