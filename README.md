# Laravel + Orchid Template

Questo progetto è uno scaffolding base per avviare rapidamente applicazioni Laravel con Orchid Platform preconfigurato. Ideale per creare interfacce amministrative con funzionalità pronte all'uso.

---

## Requisiti

Assicurati di avere i seguenti prerequisiti installati nel tuo sistema:
- **PHP** >= 8.1
- **Composer**
- **Database** (MySQL, PostgreSQL o SQLite)

---

## Installazione

1. **Clona il repository**:
   ```bash
   git clone https://github.com/tuo-username/nome-template.git
   cd nome-template

## Installa le dipendenze del progetto:

```
bash

composer install
```

## Configura il file .env:
- Copia il file di esempio .env.example:

```
cp .env.example .env
```

- Configura le credenziali del database e altre variabili necessarie.

## Genera la chiave dell'applicazione:

```
php artisan key:generate
```

## Esegui le migrazioni del database:
```
php artisan migrate
```

## Avvia il server di sviluppo:
```
php artisan serve
```

Ora puoi accedere al progetto su http://127.0.0.1:8000

# Accesso al pannello admin:

1. Visita l'URL del pannello di controllo: 

http://127.0.0.1:8000/admin

2. Se non hai un utente amministratore, crealo con:
php artisan orchid:admin

## Funzionalità incluse

- Laravel Framework: per la gestione del back-end.
- Orchid Platform: per creare interfacce amministrative ricche di funzionalità.
- Sistema di autenticazione integrato.
- Esempio di configurazione .env.