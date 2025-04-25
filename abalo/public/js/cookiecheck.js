"use strict";

/*
function getCookie(cname)
{
    let match = document.cookie.match(new RegExp(cname + "=([^;]+)"));
    return match ? match[1] : null;
}


function setCookie(cname, cvalue, exdays)
{
    let d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toDateString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

 */

// Methoden von W3Schools.com
function getCookie(cname) { // Take the cookiename as parameter (cname)
    let name = cname + "="; // Create a variable (name) with the text to search for (cname + "=")
    let decodedCookie = decodeURIComponent(document.cookie);    // Decode the cookie string, to handle cookies with special characters, e.g. '$'
    let ca = decodedCookie.split(';');  // Split document.cookie on semicolons into an array called ca (ca = decodedCookie.split(';')).
    for (let i = 0; i < ca.length; i++) {   // Loop through the ca array, and read out each value c = ca[i]
        let c = ca[i];
        while (c.charAt(0) === ' ') {   // remove leading white-spaces
            c = c.substring(1); // returns a string that starts at index 1 (skipped the white-space)
        }
        if (c.indexOf(name) === 0) {    // if the cookie is found, return the value of the cookie
            return c.substring(name.length, c.length);
        }
    }
    return "";  // if the cookie is not found, return ""
}

function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

if (!getCookie("acceptCookies"))
{
    const banner = document.createElement("div");
    banner.id = "cookie-banner";
    banner.style.cssText = `
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background: #222;
        color: white;
        padding: 1em;
        text-align: center;
        z-index: 9999;
    `;
    banner.innerHTML = `
        Diese Website verwendet Cookies. Möchten Sie diese akzeptieren?
        <button id="accept-cookies" style="margin-left: 10px;">OK</button>
        <button id="deny-cookies">Nicht OK</button>
    `;


    document.body.appendChild(banner);

    document.getElementById("accept-cookies").addEventListener("click", function () {
            setCookie("acceptCookies", "true", 365);
            banner.remove();
        });
    document.getElementById("deny-cookies").addEventListener("click", function () {
        banner.remove();
        });
}
