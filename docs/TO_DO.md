# Stuff to Do

1. Apex Game Client Websocket Connection.
    - Implement protobuf in node server.
        - protobuf imported, now switched the json decode code to protobuf decode code
    - Figure out a way to send the client requests.
    - a way to connect the laravel backend with the node websocket server.

2. Connect websocket server and laravel through redis.
    - Create queues for the node server to publish connected users psk alongside their identifier and get responses back from auth laravel worker.
    - Create queues for the laravel backend matchmaking to publish requests to the game client through node server.

3. Auth for game clients connected accounts.
    - Figure out a way to get the rank of users from the connection to the users game client.

4. Create a matchmaking system.

