let slides = document.querySelectorAll("#slideshow .slide");
let i = 0;
let startSlideShow = setInterval(slideshow, 5000);

function slideshow()
{ 
    slides[i].classList.remove("show");
    i = (i + 1) % (slides.length);
    slides[i].classList.add("show");
}

function prevImage()
{
    clearInterval(startSlideShow);

    slides[i].classList.remove("show");
    i = (i - 1 < 0) ? (slides.length - 1) : (i - 1);

    slides[i].classList.add("show");
}

function nextImage()
{
    clearInterval(startSlideShow);

    slides[i].classList.remove("show");
    i = (i + 1) % (slides.length);
    slides[i].classList.add("show");
}

function expand(event)
{
    let btnText = event.textContent;
    let textEl = document.getElementById('more');
    if(btnText === "more")
    {
        event.textContent = "less";
        textEl.classList.remove('d-none');
    }
    else
    {
        event.textContent = "more";
        textEl.classList.add('d-none');
    }
}