<html>
    <head>
        <title>File not found!</title>
    </head>
    <style type="text/css">
        html {
            background-color: #eee;
        }
        #error {
            margin: auto;
            margin-top: 100px;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            height: 250px;
            text-align: center;
            border: 4px solid green;
            width: 500px;
            padding: 20px;
            border-radius: 10px;
            background-color: #f5f5f5;
            overflow: visible;
        }
    </style>
    <body>
        <div id="error">
            Sorry, something went wrong.<br>
            <br>
            A team of highly trained monkeys has been dispatched to deal with this situation.<br>
            <br>
            If you see them, show them this information:<br>
            <br>
            Exception: File not found (<?=$path;?>)<br>
            Hash: 72621f962753f54a8811e76ddc0<br><br>
            Remember: don't feed the monkeys!<br><br>
            Best regards,<br>
            The Web-Dev Team.
        </div>
    </body>
</html>