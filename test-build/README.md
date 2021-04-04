# inventorsCloud - build#1 (04.04.2021)

### Änderungen/ Dateien:
- [index.html](https://github.com/der-neue/inventorsCloud/blob/main/test-build/index.html)
  - weiterleiten ins eigentliche Root-Verzeichnis public/

- [logout.php](https://github.com/der-neue/inventorsCloud/blob/main/test-build/logout.php)
  - sollte selbsterklärend sein oder?

- [assets/css/login.css](https://github.com/der-neue/inventorsCloud/tree/main/test-build/assets/css)
  - "supercenter" mit Grid und place-items center
  - zum vertikalen Zentrieren muss die Bildschirmhöhe gesetzt sein

```css
display: grid;
place-items: center;
...
height: 100vh;
```

- [assets/db/createUserDatabase.sql](https://github.com/der-neue/inventorsCloud/blob/main/test-build/assets/db/createUserDatabase.sql)
  - Template zum erstellen der User-Tabelle
  - index: id

```sql
PRIMARY KEY (`id`)
```

- [assets/php/model_login.php](https://github.com/der-neue/inventorsCloud/blob/main/test-build/assets/php/model_login.php)
  - beinhaltet Login-Klasse, erweitert durch [Database](https://github.com/der-neue/inventorsCloud/blob/65b3a66218829571b3296cc27219c8543e6e1f32/test-build/assets/php/server_db.php#L2)
  - durchsucht Datenbank Nutzername
  - wenn Nutzer existiert wird der gesamte Datenbankeintrag als Array zurückgegeben
