function get_cookie(name) {
    let matches = document.cookie.match(
        new RegExp(
            "(?:^|; )" +
            name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, "\\$1") +
            "=([^;]*)"
        )
    );
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

function hide_cookie() {
    document.cookie = "approve__cookies=true; max-age=360000";
    $(".cookie").css("display", "none");
}

if (get_cookie("approve__cookies") == "true") {
    let t = document.querySelector("div.cookie");
    console.log(t)
    t.classList.add("hidden");
}
