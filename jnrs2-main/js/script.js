
        const menuToggle = document.getElementById('mobile-menu');
        const navList = document.getElementById('nav-list');
        const icon = menuToggle.querySelector('i');

        menuToggle.addEventListener('click', (e) => {
            e.stopPropagation(); // Click bar par hi rahe
            navList.classList.toggle('active');
            
            if (navList.classList.contains('active')) {
                icon.classList.replace('fa-bars', 'fa-times');
            } else {
                icon.classList.replace('fa-times', 'fa-bars');
            }
        });

        // Bahar click karne par menu band ho jaye
        document.addEventListener('click', (e) => {
            if (!navList.contains(e.target) && !menuToggle.contains(e.target)) {
                navList.classList.remove('active');
                icon.classList.replace('fa-times', 'fa-bars');
            }
        });

        // Link click hone par band ho jaye
        document.querySelectorAll('.nav-links li a').forEach(link => {
            link.addEventListener('click', () => {
                navList.classList.remove('active');
                icon.classList.replace('fa-times', 'fa-bars');
            });
        });
    


        function togglePolicy(header) {
    const items = document.querySelectorAll('.policy-item');
    const currentItem = header.parentElement;

    // Dusre sabhi open accordions ko close karne ke liye
    items.forEach(item => {
        if (item !== currentItem) {
            item.classList.remove('active');
        }
    });

    // Current item ko toggle karne ke liye
    currentItem.classList.toggle('active');
}


    
        AOS.init({ duration: 1000, once: true });
    

        // hero section
        
let slides = document.querySelectorAll('.slide');
let index = 0;

function showSlide(){
    slides.forEach((slide)=>{
        slide.classList.remove('active');
    });

    slides[index].classList.add('active');

    index++;
    if(index >= slides.length){
        index = 0;
    }
}

// Change slide every 4 seconds
setInterval(showSlide, 4000);
