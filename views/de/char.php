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
            <form action="<?=$this->base_url();?>user/login" method="POST">
                <table border="0">
                    <tr><td>Name: </td><td><?=$char->getName();?></td></tr>
                    <tr><td>Health: </td><td><?=$char->getMaxHealth();?></td></tr>
                    <tr><td>Power: </td><td><?=$char->getMaxPower();?></td></tr>
                    <tr><td>Mind: </td><td><?=$char->getMaxMind();?></td></tr>
                    <tr><td>Race: </td><td><?=$char->getSkillMod("race");?></td></tr>
                    <tr><td>Willpower: </td><td><?=$char->getSkillMod("willpower");?></td></tr>
                    <tr><td>Focus: </td><td><?=$char->getSkillMod("focus");?></td></tr>
                    <tr><td>Stamina: </td><td><?=$char->getSkillMod("stamina");?></td></tr>
                    <tr><td>Agility: </td><td><?=$char->getSkillMod("agility");?></td></tr>
                    <tr><td>Intelligence: </td><td><?=$char->getSkillMod("intelligence");?></td></tr>
                    <tr><td>Wisdom: </td><td><?=$char->getSkillMod("wisdom");?></td></tr>
                    <tr><td>Strength: </td><td><?=$char->getSkillMod("strength");?></td></tr>
                    <tr><td>Action: </td><td><?=$char->getSkillMod("action");?></td></tr>
                    <tr><td>Constitution: </td><td><?=$char->getSkillMod("constitution");?></td></tr>
                    <tr><td>Melee Attack: </td><td><?=$char->getSkillMod("melee_atk");?></td></tr>
                    <tr><td>Range Attack: </td><td><?=$char->getSkillMod("range_atk");?></td></tr>
                    <tr><td>Melee Defense: </td><td><?=$char->getSkillMod("melee_def");?></td></tr>
                    <tr><td>Range Defense: </td><td><?=$char->getSkillMod("range_def");?></td></tr>
                    <tr><td>Melee Accuracy: </td><td><?=$char->getSkillMod("melee_accuracy");?></td></tr>
                    <tr><td>Range Accuracy: </td><td><?=$char->getSkillMod("range_accuracy");?></td></tr>
                    <tr><td>Melee Speed: </td><td><?=$char->getSkillMod("melee_speed");?></td></tr>
                    <tr><td>Range Speed: </td><td><?=$char->getSkillMod("range_speed");?></td></tr>
                    <tr><td>Defense vs Stun: </td><td><?=$char->getSkillMod("def_stun");?></td></tr>
                    <tr><td>Defense vs Knock Down: </td><td><?=$char->getSkillMod("def_knockdown");?></td></tr>
                    <tr><td>Defense vs Blind: </td><td><?=$char->getSkillMod("def_blind");?></td></tr>
                    <tr><td>Defense vs Dizzy: </td><td><?=$char->getSkillMod("def_dizzy");?></td></tr>
                    <tr><td>Defense vs Incapacitated: </td><td><?=$char->getSkillMod("def_incap");?></td></tr>
                    <tr><td>Block: </td><td><?=$char->getSkillMod("block");?></td></tr>
                    <tr><td>Counter Attack: </td><td><?=$char->getSkillMod("counter_attack");?></td></tr>
                </table>
            </form>
        </center>
    </body>


