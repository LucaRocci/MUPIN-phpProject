Autore: Rocci Luca

descrizione cartelle  Progetto:
cartella Immagini: cartella locale con le immagini dei reperti del museo
log: cartella con i fiel di log gestiti da monolo; error.log registra gli errori dell'applicazione, administrator.log contine lo storico degli eventi dell'amministratore del sito
src : contiene i controller dell'applicazione che si occupano del reperimento dei dati e della loro renderizzazione
templates : suddivisa in diverse sotto-cartelle contiene tutti i tempalte gestiti da plates per la renderizzazione delle pagine
test: da terminare, contiene i test per le classi dell'applicazione,gestiti da phpUnit
utility : cartella che contiene le classi necessarie al progetto per le operazioni sui dati

Con il progetto abbiamo due DB uno con dei dati di prova e uno senza dati.
Il database con il login è separato rispetto al database del progetto 
Come ultimo file ho inserito query.txt dove ho trscritto le query che ho utilizzato e che vengono eseguite sul database

Implementazioni mancanti:
-> visualizzazioen dei reperti di tutto il museo, 
-> Copertura totale con i test per le classi

