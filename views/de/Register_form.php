<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="<?=$this->ref_url();?>js/jquery-2.1.1.js" type="text/javascript"></script>
        <script src="<?=$this->ref_url();?>js/run.js" type="text/javascript"></script>
        <link rel="stylesheet" href="<?=$this->ref_url();?>css/style.css">
    </head>
    <body>
        <br><br><br>
        <center>
            <form action="<?=$this->base_url();?>user/register" method="POST">
                <table border="0">
                    <tr><td>Username: </td><td><input type="text" name="username"></td></tr>
                    <tr><td>Password: </td><td><input type="password" name="password"></td></tr>
                    <tr><td>E-Mail: </td><td><input type="email" name="email"></td></tr>
                    <tr><td>Charname: </td><td><input type="text" name="charname"></td></tr>
                    <tr><td></td><td><input type="submit" name="register" value="Registrieren"></td></tr>
                </table>
            </form>
        </center>
    </body>