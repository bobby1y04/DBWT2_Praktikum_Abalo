## Aufgabe 11 – Diskussion 

### Was passiert, wenn sehr viele Benutzer:innen gleichzeitig die Lösung verwenden?

Bei vielen gleichzeitigen Nutzer:innen führt der aktuelle Lösungsansatz, bei dem jede Eingabe ab 3 Zeichen sofort eine 
neue Serveranfrage auslöst, zu einer starken Serverlast. Der Server erhält viele parallele Requests, was zu erhöhten 
Antwortzeiten und im schlimmsten Fall zu einer Überlastung führen kann.

**Mögliche Lösung**
- Caching


### Wie verhält sich die Suche, wenn der Benutzer seine Eingabe sehr schnell mehrfach hintereinander anpasst?

Schnelle, aufeinanderfolgende Eingaben lösen mehrere Suchanfragen aus, unabhängig davon, ob vorherige bereits 
beantwortet wurden. Dies kann zu sogenannten **Race Conditions** führen, bei denen veraltete Suchergebnisse angezeigt 
werden, weil eine langsamere Antwort eine neuere überschreibt bzw. "überholt".

