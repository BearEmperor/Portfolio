document.addEventListener('DOMContentLoaded', function() {
var monthSelect = document.getElementById("month");
monthSelect.addEventListener("change", filterPosts);

function filterPosts() {
    var monthIndex = parseInt(monthSelect.value);
    var monthsArray = [
        "All", "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];
    var month = monthsArray[monthIndex];
    var posts = document.getElementsByClassName("blog-post");

    if(month === "All"){
        for (var i = 0; i < posts.length; i++) {
            posts[i].style.display = "block";
        }
    }
    else{
        for (var i = 0; i < posts.length; i++) {
            var postDateStr = posts[i].querySelector("#blog-date").innerText;
            var postMonthStr = postDateStr.split(" ")[1];
    
            if (month === postMonthStr) {
                posts[i].style.display = "block";
            } else {
                posts[i].style.display = "none";
            }
        }
    }
    
}
});