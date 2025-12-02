# Stuff to Do
# OLD AIMS
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

5. Figure out if we can get the rank of people from the api or we need to get it from users and get other teammates to confirm
    - So we ask people for their origin id.(Not sure if all players have an origin id or if you play on steam you have a steam id.)
    - We use this id with tracker.gg. Tracker.gg api has multiple endpoints for user stats. We use any that returns the rank and name or id(if we can manage to find the correct hash for the id). We get the rank and compare either the name or the id we used after we hash it against the data the game client live api gives us to confirm the id the user gave us for us to check their rank is really their account's id.

    Ask for the id that will be used in the rank checkup and when the other users confirm the rank, bind the nucleus hash and the lookup id together.



    If the nucleus hash is an hashed origin id or any other id, we might not be able to get it from the game and use it, but we can ask for their id, get the rank data from a third party api, and then hash the id they gave us and compare it against the nucleus hash they gave us, and in turn confirm the account they gave us in registiration is the same as the account of the client.

////////////

Switch the project focus to valorant. Document the api endpoints that could be used to get the rank and game account info. a mix of client and riot server api endpoints could be used.

The problem with valo is that it is an http endpoint. so sending requests from the server is not possible as the api endpoints are only exposed internally on the local device. sending requests from the browser could be possible as it is running on the same device and can refer to localhost BUT it could be restricted for security reasons by the browsers themselves. Should be checked before we start building a relay app. The api endpoint requires some authentication. if this auth is obtainable from the browser, then the browser route is possibe. I doubt it because it seems like an obvious security risk.

what we need from the api is: 
    - an identifier we can use that does not change between sessions so we can bind a riot account to our site account.(exists: Player UUID, Given in Player MMR endpoint)
    - Their rank or mmr.(exists: Player MMR endpoint)
    * So it looks like Player MMR endpoint could be enough by its own to give us all the info we need.

What we need to access the Player MMR endpoint:

before we check if we can get all these remotely, we should first check if we can send requests from the browser. and the responses will go back to the browser and not the server. then, we will have to use another axios request this time to the server. so axios->client->browser->axios->server all this has to be done in the browser, so in js. if shit get complicated, it is hell, but worth it if it is possible, much easier onboarding without a need for a relay, but a stable connection could be harder


what if we just do these checks just through the official api. apperantly, we can get the rank info from there, so it is enough. and the users have a lobby join code, we can ask one of them to create, and we can pass that around. and go with a report based system?



to get an api key for valorant, we need to submit a working or semi-working prototype and there is no dev key that grants us the access to the endpoints we need, so we need to make a prototype based on complete decleration of the user and put in some kind of system for the users to verify each others rank after they are in the lobby. After we get the key, We have to implement rso because  riot requires it for valorant apps. Then we implement RSO(Riot Sign On) and get the PUUID that way and then get the match history of the player and get their rank from there. we can still keep the verification by other users just because we can't check if they are playing with the same account they signed in to rso.

-So the final version of to do is:

Create an app that uses no api endpoints as a protorype and then change out whatever you can with apis after you get the key.

After verification, we can ask if the game client internal api is usable or not for our purposes.

# TO DO:
# NEW GOALS:

Write to do

registration and login scaffolding(done)

matchmaking page frontend

matchmaking system job

tests for matchmaking system

matchmaking page websocket connection

implement verification of each others ranks by users

review system frontend

review system backend 

serve the website out of a server with CI CD for ease of development
Preferably one where you can get different services differently capabable servers
But until the whole project is set in stone, it is best to take the easiest route. so just one server and docker

just do all through local until you get the project good enough to present to riot and then also do the bare minimum, if they then accept the project, ask them about the local client usage. depending on the answer, we might have different needs from our hosting so then we will decide.

so just do a bare minimum project for now.