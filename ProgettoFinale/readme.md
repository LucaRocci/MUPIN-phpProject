Author: Rocci Luca
In this repository you can find my last PHP school project.
It's a simple website for a museum with a public part for general research in the catalog and a private part for CRUD operation on the catalog of finds.
Belowa brief description of the project folder:
Immagini: folder with the images of the finds in the museum
Log: folder with the log file of the website menaged by Monolog
Src: folder with the php controller file 
templates: folder with all the website's page menaged with plates
test: folder dedicated to the PHPUnit test
utility: folder with all the php classes who carry out all the operation on the data

With the website I attach all the necessary databases scripts, one db with login credential, and two finds database one with some test value

Missed functionality:
-> Full coverage with Unit test
-> User management system

-----------------------------------------------------------------------------------------------------------------------------------------------------------------------
Autore: Rocci Luca

descrizione cartelle  Progetto:
cartella Immagini: cartella locale con le immagini dei reperti del museo
log: cartella con i file di log gestiti da monolog; error.log registra gli errori dell'applicazione, administrator.log contine lo storico degli eventi dell'amministratore del sito
src : contiene i controller dell'applicazione che si occupano del reperimento dei dati e della loro renderizzazione
templates : suddivisa in diverse sotto-cartelle contiene tutti i template gestiti da plates per la renderizzazione delle pagine
test: da terminare, contiene i test per le classi dell'applicazione,gestiti da phpUnit
utility : cartella che contiene le classi necessarie al progetto per le operazioni sui dati

Con il progetto abbiamo due DB uno con dei dati di prova e uno senza dati.
Il database con il login è separato rispetto al database del progetto 
Come ultimo file ho inserito query.txt dove ho trscritto le query che ho utilizzato e che vengono eseguite sul database

Implementazioni mancanti:
-> visualizzazione dei reperti di tutto il museo, 
-> Copertura totale con i test per le classi
-> Sistema di gestione degli utenti 
