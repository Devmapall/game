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
        <br>
        <center>
                <table class="skilltree">
                    <tr><td class="skillElement"><?=$tree->getSkill(0,0)->getName();?></td><td class="skillElement">Kick IV</td><td class="skillElement">Body IV</td><td class="skillElement">Defense IV</td></tr>
                    <tr><td class="skillElement">Fist III</td><td class="skillElement">Kick III</td><td class="skillElement">Body III</td><td class="skillElement">Defense III</td></tr>
                    <tr><td class="skillElement">Fist II</td><td class="skillElement">Kick II</td><td class="skillElement">Body II</td><td class="skillElement">Defense II</td></tr>
                    <tr><td class="skillElement">Fist I</td><td class="skillElement">Kick I</td><td class="skillElement">Body I</td><td class="skillElement">Defense I</td></tr>
                </table>
            </form>
        </center>
    </body>


