<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="<?=$this->ref_url();?>js/jquery-2.1.1.js" type="text/javascript"></script>
        <script src="<?=$this->ref_url();?>js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?=$this->ref_url();?>js/run.js" type="text/javascript"></script>
        <link rel="stylesheet" href="<?=$this->ref_url();?>css/jquery-ui.min.css">
        <link rel="stylesheet" href="<?=$this->ref_url();?>css/jquery-ui.structure.min.css">
        <link rel="stylesheet" href="<?=$this->ref_url();?>css/jquery-ui.theme.min.css">
        <link rel="stylesheet" href="<?=$this->ref_url();?>css/style.css">
    </head>
    <body>
        <br>
        <center>
                <table class="skilltree">
                    <tr><td class="skillElement"><?=$tree->getSkill(0,3)->getName();?></td><td class="skillElement"><?=$tree->getSkill(1,3)->getName();?></td><td class="skillElement"><?=$tree->getSkill(2,3)->getName();?></td><td class="skillElement"><?=$tree->getSkill(3,3)->getName();?></td></tr>
                    <tr><td class="skillElement"><?=$tree->getSkill(0,2)->getName();?></td><td class="skillElement"><?=$tree->getSkill(1,2)->getName();?></td><td class="skillElement"><?=$tree->getSkill(2,2)->getName();?></td><td class="skillElement"><?=$tree->getSkill(3,2)->getName();?></td></tr>
                    <tr><td class="skillElement"><?=$tree->getSkill(0,1)->getName();?></td><td class="skillElement"><?=$tree->getSkill(1,1)->getName();?></td><td class="skillElement"><?=$tree->getSkill(2,1)->getName();?></td><td class="skillElement"><?=$tree->getSkill(3,1)->getName();?></td></tr>
                    <tr><td class="skillElement"><?=$tree->getSkill(0,0)->getName();?></td><td class="skillElement"><?=$tree->getSkill(1,0)->getName();?></td><td class="skillElement"><?=$tree->getSkill(2,0)->getName();?></td><td class="skillElement"><?=$tree->getSkill(3,0)->getName();?></td></tr>
                </table>
        </center>
        <div id="dialog" title="Learn the skill?">Do you really want to learn the skill?</div>
        <div id="skillDetails">
            <div id="skillWrapper">
                <div id="skillMods">
                    <table border="0" id="skillModTable">
                        <colgroup>
                            <col width="150">
                            <col width="50">
                        </colgroup>
                        <tr><th colspan="2">Skill Modifications</th></tr>
                    </table>
                </div>
                <div id="abilities">
                    <table border="0" id="abilityTable">
                        <colgroup>
                            <col width="50">
                            <col width="150">
                        </colgroup>
                        <tr><th colspan="2">Available Abilities</th></tr>
                    </table>
                </div>
                <div style="clear: both;"></div>
                <div id="buttonWrapper">
                    <button id="learnSkill">learn Skill</button>
                </div>
            </div>
        </div>
    </body>


