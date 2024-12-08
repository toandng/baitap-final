document.addEventListener("DOMContentLoaded", function () {
    const slides = document.querySelector(".list-slide ul");
    const slideItems = document.querySelectorAll(".list-slide li");
    const totalSlides = slideItems.length;

    let currentIndex = 0;

    function showNextSlide() {
        currentIndex = (currentIndex + 1) % totalSlides; // Tăng chỉ số slide, quay lại 0 nếu vượt quá
        slides.style.transform = `translateX(-${currentIndex * 100}%)`;
    }

    // Tự động chuyển slide mỗi 3 giây
    setInterval(showNextSlide,5000);
});
