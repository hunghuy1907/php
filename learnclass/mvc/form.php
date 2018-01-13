<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Document</title>
   </head>
   <body>
      <form action="form.php" method="get">
         Name: <input type="text" name="Name" value="Jim" /><br />
         Password: <input type="password" name="Password" maxlength="10" /><br />
         Age range: 
         <select name="Age">
            <option value="Under 16">Under 16</option>
            <option value="16-30" selected="selected">16-30</option>
            <option value="31-50">31-50</option>
            <option value="51-80">51-80</option>
         </select>
         <br /><br />
         Life story:<br /> 
         <textarea name="Story" rows="10" cols="80">Enter your life story here</textarea>
         <br /><br />
         <input type="radio" name="FaveSport" value="Tennis" /> Tennis
         <input type="radio" name="FaveSport" value="Cricket" /> Cricket
         <input type="radio" name="FaveSport" value="Baseball" /> Baseball
         <input type="radio" name="FaveSport" value="Polo" /> Polo
         <br />
         <input type="checkbox" name="Languages[ ]" value="PHP" checked="checked" /> PHP
         <input type="checkbox" name="Languages[ ]" value="CPP" /> C++
         <input type="checkbox" name="Languages[ ]" value="Delphi" /> Delphi
         <input type="checkbox" name="Languages[ ]" value="Java" /> Java
         <br /><input type="submit" />
         <?php
            if (isset($Age)) {
            if (is_numeric($Age)) {
            if (($Age > 18) && ($Age < 30)) {
            // input is valid
            } else {
            print "Sorry, you're not the right age!";
            }
            } else {
            print "Age is incorrect!";
            }
            } else {
            print "Please provide a value for Age.";
            }
            // is $SpouseAge either unset, blank, or between 18 and 120?
            if (isset($SpouseAge) && $SpouseAge != "") {
            if (is_numeric($SpouseAge)) {
            if (($SpouseAge >= 18) && ($SpouseAge < 120)) {
            // input is valid
            } else {
            print "Spouse is not the right age!";
            }
            } else {
            print "Spouse Age is incorrect!";
            }
            } else {
            // input is valid; no spouse
            print "You have no spouse.";
            }
            // is $Income non-negative?
            if (isset($Income)) {
            if (is_numeric($Income)) {
            if ($Income >= 0) {
            // input is valid
            } else {
            print "Your income is negative!";
            }
            } else {
            print "Please provide a numeric value for Income.";
            }
            } else {
            print "Please valid a value for Income.";
            }
             $_GET['Languages'] = implode(', ', $_GET['Languages']);
             $_GET['Story'] = str_replace("\n", "<br />", $_GET['Story']);
             print "Your name: {$_GET['Name']}<br />";
             print "Your password: {$_GET['Password']}<br />";
             print "Your age: {$_GET['Age']}<br /><br />";
             print "Your life story:<br />{$_GET['Story']}<br /><br />";
             print "Your favorite sport: {$_GET['FaveSport']}<br />";
             print "Languages you chose: {$_GET['Languages']}<br />";
             ?>
      </form>
   </body>
</html>