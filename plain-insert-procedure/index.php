<?php
  session_start();
  $output = "<!DOCTYPE html>
        <html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>
          <head>
            <meta http-equiv='content-type' content='text/html;charset=utf-8' />
            <title>Login</title>
            <style type='text.css'>
              @import common.css;
            </style>
          </head>
          <body>
            <form name='input' action='insertIntoDB.php' method='post'>
              <input type='text' value='' id='username' name='username' />
              <input type='password' value='' id='password' name='password' />
              <input type='submit' value='Submit' name='sub' />
            </form>
            <script type='text/javascript' src='common.js'></script>
          </body>
        </html>" ;
  echo $output;
?>
