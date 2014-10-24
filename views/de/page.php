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
        <div id="charWrapper">
            <div class="my">
                <div class="myName">
                    charName
                </div>
                    <div class="myHealth"></div>
                    <div class="myPower"></div>
                    <div class="myMind"></div>
                    <div class="myBuffContainer"></div>
            </div>
            <div class="en">
                <div class="enName">
                    charName
                </div>
                    <div class="enHealth"></div>
                    <div class="enPower"></div>
                    <div class="enMind"></div>
                    <div class="enBuffContainer"></div>
            </div>
        </div>
        <button class="skill" name="Infusion">Infusion</button>
        <button class="skill" name="Poison">Poison</button>
        <button class="skill" name="Attack">Attack</button>
    </body>
</html>
