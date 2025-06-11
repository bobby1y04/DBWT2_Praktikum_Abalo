<?php
/**
 * /websocketclient.php (im Laravel-Wurzelverzeichnis)
 * composer.json +Abhängigkeit: ratchet/pawl
 * Quelle des Beispiels: https://github.com/ratchetphp/Pawl (Letzter Zugriff 8.5.2023)
 */
require __DIR__ . '/vendor/autoload.php';

\Ratchet\Client\connect('ws://localhost:8085/chat')
    ->then(function($conn) {
        $conn->send('Hello! I\'m the client!');

        $conn->on('message', function($msg) use ($conn) {
            echo "Received: {$msg}\n";

            if (substr($msg, 0, 8) != 'You said') {
                $conn->send('You said: ' . $msg);
            }
            // $conn->close(); // Terminates the socket communication.
        });
}, function ($e) {
    echo "Could not connect: {$e->getMessage()}\n";
});
