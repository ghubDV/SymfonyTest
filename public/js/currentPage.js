let path = (window.location.pathname === "/") ? ("/home") : (window.location.pathname);
let navItem = document.getElementById(path.substring(1));

navItem.classList.add("active");
