function sideBarSlide(){
    const burger = document.querySelector(".burger");
    const sidebar = document.querySelector(".sidebar");
    const main = document.querySelector(".main-content");
    const lineone = document.querySelector(".line1");
    const linetwo = document.querySelector(".line2");
    const linethree = document.querySelector(".line3");
    burger.addEventListener("click", () => {
        sidebar.classList.toggle("show");
        main.classList.toggle("slide");
        lineone.classList.toggle('rotateright');
        linetwo.classList.toggle('opacity');
        linethree.classList.toggle('rotateleft');
    });
}

sideBarSlide();