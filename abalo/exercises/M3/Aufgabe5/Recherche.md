## Aufgabe:
### Recherche.
Bei der Entwicklung neuer Webanwendungen (wie Abalo) wollen wir
(eigentlich gerne) immer die neueste Technologie verwenden. Recherchieren Sie,
inwieweit die drei JavaScript-Engines JavaScriptCore, V8 und SpiderMonkey die
folgenden Sprachkonstrukte unterstützen:

- Set.prototype.* (wie intersection) – Mengenoperationen.
- Static Blocks in Klassen zur Initialisierung statischer Variablen. Beispiel:
class CL { static { /* … */ } }
- Array.prototype.flat(depth)
- Array.prototype.findLast
- Array.prototype.group zur Gruppierung von Elementen eines Arrays
- Top-Level-Namespace Objekt “Temporal” als Weiterentwicklung von Date.

### Quellen
- [MDN Web Docs](https://developer.mozilla.org/en-US/)
- [Can I use](https://caniuse.com/)
- [npm](https://www.npmjs.com/package/array.prototype.group)
- [Scaler](https://www.scaler.com/topics/javascript-group-by/)

---

### <u>JavaScriptCore</u>
#### Browser: Apple Safari
- Set.prototype.* (wie intersection) – Mengenoperationen.
- Static Blocks in Klassen zur Initialisierung statischer Variablen. Beispiel:
    class CL { static { /* … */ } }
- Array.prototype.flat(depth)
- Array.prototype.findLast
- Top-Level-Namespace Objekt “Temporal” als Weiterentwicklung von Date. (Safari TP)


---

### <u>V8</u>
#### Browser: Google Chrome
- Set.prototype.* (wie intersection) – Mengenoperationen.
- Static Blocks in Klassen zur Initialisierung statischer Variablen. Beispiel:
  class CL { static { /* … */ } }
- Array.prototype.flat(depth)
- Array.prototype.findLast

---


### <u>SpiderMonkey</u>
#### Browser: Mozilla Firefox
- Set.prototype.* (wie intersection) – Mengenoperationen.
- - Static Blocks in Klassen zur Initialisierung statischer Variablen. Beispiel:
    class CL { static { /* … */ } }
- Array.prototype.flat(depth)
- Array.prototype.findLast
- Array.prototype.group zur Gruppierung von Elementen eines Arrays (Firefox Nightly)
- Top-Level-Namespace Objekt “Temporal” als Weiterentwicklung von Date. (Firefox Nightly)




