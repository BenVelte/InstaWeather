const express = require("express");
const app = express();
const Instagram = require("instagram-web-api");
const FileCookieStore = require("tough-cookie-filestore2");
const cron = require("node-cron");
require("dotenv").config();

const port = 8000;

// cron.schedule("00 08 * * *", async () => {

const cookieStore = new FileCookieStore("./cookies.json");

const client = new Instagram({
        username: "XXX",
        password: "XXX",
        cookieStore
    },
    {
        language: "en-US"
    }
);

let today = new Date();
let dd = String(today.getDate()).padStart(2, '0');
let mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
let yyyy = today.getFullYear();

today = dd + '.' + mm + '.' + yyyy;

const instagramPostFunction = async () => {
    await client.uploadPhoto({
        photo: "weather.jpg",
        caption: "Wetter heute: " + today,
        post: "feed"
    }).then(async (res) => {
        const media = res.media;

        console.log(`https://instagram.com/p/${media.code}`);
    }).catch((err) => {
        console.log(err.message);
    });
}

const loginFunction = async () => {
    console.log("logging in...");
    await client.login({}, {_sharedData: false}).then(() => {
        console.log("Login successful");
        instagramPostFunction();
    }).catch((err) => {
       console.log("Login failed");
       console.log(err.message);
    });
}

loginFunction();
// });

app.listen(port, () => {
    console.log(`Listening on port ${port}...`);
});