-- utworzenie tabeli użytkowników
CREATE TABLE uzytkownicy (
  id INT PRIMARY KEY AUTO_INCREMENT,
  imie text NOT NULL,
  nazwisko text NOT NULL,
  email text NOT NULL UNIQUE,
  haslo text NOT NULL
);

-- utworzenie tabeli przedmiotów
CREATE TABLE przedmioty (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nazwa text NOT NULL,
  opis TEXT NOT NULL,
  cena_wywoławcza int NOT NULL,
  data_wystawienia datetime NOT NULL,
  data_zakończenia datetime NOT NULL,
  kategoria_id INT NOT NULL,
  FOREIGN KEY (kategoria_id) REFERENCES kategorie(id)
);

-- utworzenie tabeli licytacji
CREATE TABLE licytacje (
  id INT PRIMARY KEY AUTO_INCREMENT,
  przedmiot_id INT NOT NULL,
  uzytkownik_id INT NOT NULL,
  cena_podbicie DECIMAL int NOT NULL,
  FOREIGN KEY (przedmiot_id) REFERENCES przedmioty(id),
  FOREIGN KEY (uzytkownik_id) REFERENCES uzytkownicy(id)
);

-- utworzenie tabeli kategorii przedmiotów
CREATE TABLE kategorie (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nazwa text NOT NULL
);

-- dodanie kilku kategorii przedmiotów
INSERT INTO kategorie (nazwa) VALUES
  ('Elektronika'),
  ('Motoryzacja'),
  ('Dom i ogród'),
  ('Zdrowie i uroda');