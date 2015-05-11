<html>
    <body>
        Olá, seja bem vindo: <?php echo!empty($teste) ? $teste : ''; ?>
        <form name='form' method="POST">
            <input type='text' name='teste'></input>
            <input type="submit" value='Enviar'/>
        </form>
    </body>
</html>

