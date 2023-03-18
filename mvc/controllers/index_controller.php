<?php
    header('Location: https://' . $_SERVER['HTTP_HOST'] . '/SIVAL/mvc/views/master.php');

    # Define una función para manejar el comando /start
    def start(update, context):
    context.bot.send_message(chat_id=update.effective_chat.id, text="Hola Mundo!")


?>
