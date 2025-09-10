

Descriere:
Acesta este un site web de prezentare a unui restaurant, creat cu PHP, HTML și CSS, fără a folosi vreun framework.
Site-ul include funcționalități pentru utilizatori și administratori, și este conectat la o bază de date MySQL.


Funcționalități principale: Înregistrare utilizatori, Autentificare utilizatori (mod user normal sau mod admin), Vizualizare meniu, 
Creare-Editare-Ștergere Recenzii (doar ale utilizatorului logat), Creare-Editare-Ștergere Rezervări, Admin poate șterge toate rezervările sau recenziile (nu mi s-a părut etic să îi ofer și posibilitatea de a adăuga el recenzii sau de a edita recenziile clienților) și poate adăuga preparate noi în meniu. Toate acestea printr-o interfață simplă și intuitivă.


Structura bazei de date -> baza de date MySQL conține următoarele tabele:
1. utilizatori (id_utilizator, nume, prenume, username, parola, email, admin)
2. meniu (id_preparat, nume_preparat, descriere, gramaj, pret, categorie)
3. recenzii (id_recenzie, id_utilizator, nota_recenzie, comentariu_recenzie, data_recenzie)
4. rezervari (id_rezervare, id_utilizator, numar_persoane, data, ora, loc, telefon, comentarii)

Instalare și rulare:
1. Clonează repo-ul (git clone https://github.com/utilizator/nume-proiect.git)
2. Configurează baza de date (creează o bază de date MySQL, importă fișierul poianabucatelor.sql și actualizează fișierul config.php cu datele tale de acces la MySQL)
3. Rulează site-ul -> Pune proiectul într-un server local (ex: XAMPP, WAMP, MAMP) și accesează în browser http://localhost/nume-proiect/


Rezultatul poate fi observat în următoarele filmulețe (vă rog să aveți puțină răbdare, deoarece se încarcă mai greu):


![Paginile Acasa și Meniu](Images/video1.gif)


![Paginile Catering, Rezervari și Recenzii](Images/video2.gif)


![Pagina Contact](Images/video3.gif)