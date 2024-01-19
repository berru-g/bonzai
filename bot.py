#pip install python-telegram-bot
from telegram.ext import Updater, MessageHandler, Filters

# Remplacez 'YOUR_BOT_TOKEN' par le token de votre bot
updater = Updater(token='YOUR_BOT_TOKEN', use_context=True)
dispatcher = updater.dispatcher

def keyword_handler(update, context):
    # Définissez les mots-clés que vous souhaitez rechercher
    keywords = ['mot1', 'mot2', 'mot3']

    # Obtenez le message
    message = update.message.text.lower()

    # Vérifiez si l'un des mots-clés est présent dans le message
    if any(keyword in message for keyword in keywords):
        # Répondez avec le message souhaité
        context.bot.send_message(chat_id=update.effective_chat.id, text='Message à partager en réponse aux mots-clés.')

keyword_message_handler = MessageHandler(Filters.text & ~Filters.command, keyword_handler)
dispatcher.add_handler(keyword_message_handler)

# Lancez le bot
updater.start_polling()
updater.idle()
