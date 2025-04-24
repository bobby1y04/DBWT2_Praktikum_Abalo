"use strict";

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
        Diese Website verwendet Cookies. <button id="accept-cookies" style="margin-left: 10px;">OK</button>
    `;

    document.body.appendChild(banner);

    document.getElementById("accept-cookies").addEventListener("click", function () {
            setCookie("acceptCookies", "true", 365);
            banner.remove();
        }
    )
}
