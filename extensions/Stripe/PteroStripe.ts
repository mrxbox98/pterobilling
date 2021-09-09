import { useParams } from "react-router";

const { AdminInstance } = require('pterowrap');

const url = "https://pterodactyl.app/api/"
const key = "meowmeowmeow"

const client = new AdminInstance(url, key);
(async () => {
    const server = await client.servers.get(5)
    console.log(server.name)
})();

async function createUser(email:string)
{
    var userManager = client.users

    userManager.create(email)
}

