const express = require("express");
const app = express();
const Instagram = require("instagram-web-api");
const FileCookieStore = require("tough-cookie-filestore2");
const cron = require("node-cron");
require("dotenv").config();

const port = 8000;

// cron.schedule("00 08 * * *", () => {

const cookieStore = new FileCookieStore("./cookies.json");

const client = new Instagram({
        username: "username",
        password: "password",
        cookieStore
    },
    {
        language: "en-US"
    }
);

const instagramPostFunction = async () => {
    await client.uploadPhoto({
        photo: "weather.jpg",
        caption: "Wetter heute",
        post: "feed"
    }).then(async (res) => {
        const media = res.media;

        console.log(`https://instagram.com/p/${media.code}`);
    });
}

const loginFunction = async () => {
    console.log("logging in...");
    await client.login({}, {_sharedData: false}).then(() => {
        console.log("Login successful");
        instagramPostFunction();
    }).catch((err) => {
       console.log("Login failed");
       console.log(err);
    });
}

loginFunction();

app.listen(port, () => {
    console.log(`Listening on port ${port}...`);
});
// });