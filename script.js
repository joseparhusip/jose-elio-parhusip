document.addEventListener('DOMContentLoaded', function() {
    var loader = document.getElementById('globalLoader');
    setTimeout(function() {
        loader.style.opacity = '0';
        setTimeout(function() {
            loader.style.display = 'none';
        }, 500);
    }, 1500);

    var navLinks = document.querySelectorAll('.nav-loader-link, a[href^="#"]');
    navLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            var targetId = this.getAttribute('href');
            if(targetId === '#' || targetId === '') return;
            if(targetId.startsWith('#')) {
                e.preventDefault();
                loader.style.display = 'flex';
                loader.style.opacity = '1';

                setTimeout(function() {
                    loader.style.opacity = '0';
                    var targetElement = document.querySelector(targetId);
                    if(targetElement) {
                        // PERBAIKAN: Menambahkan Offset untuk Navbar Fixed
                        // Angka 100 disesuaikan dengan tinggi navbar Anda + sedikit jarak
                        var headerOffset = 100; 
                        var elementPosition = targetElement.getBoundingClientRect().top;
                        var offsetPosition = elementPosition + window.scrollY - headerOffset;

                        window.scrollTo({
                            top: offsetPosition,
                            behavior: "smooth"
                        });
                        
                        history.pushState(null, null, targetId);
                    }
                    setTimeout(function() {
                        loader.style.display = 'none';
                    }, 500);
                }, 1000); 
            }
        });
    });

    const galleryImages = document.querySelectorAll('.gallery-img');
    galleryImages.forEach(img => {
        const wrapper = img.closest('.gallery-img-wrapper');
        wrapper.classList.add('loading');
        img.addEventListener('load', function() {
            wrapper.classList.remove('loading');
        });
        if (img.complete) {
            wrapper.classList.remove('loading');
        }
    });

    const toggleSwitch = document.querySelector('#input');
    const body = document.body;
    
    if(localStorage.getItem('theme') === 'dark') {
        body.classList.add('dark-theme');
        toggleSwitch.checked = true;
    }

    toggleSwitch.addEventListener('change', () => {
        if(toggleSwitch.checked) {
            body.classList.add('dark-theme');
            localStorage.setItem('theme', 'dark');
        } else {
            body.classList.remove('dark-theme');
            localStorage.setItem('theme', 'light');
        }
    });

    if (typeof typedStrings !== 'undefined' && document.querySelector('.typing-text')) {
        var typed = new Typed('.typing-text', {
            strings: typedStrings,
            typeSpeed: 40,
            backSpeed: 20,
            backDelay: 2000,
            loop: true
        });
    }

    const validSections = ["#about", "#skills", "#experience", "#projects", "#certificates", "#contact", ""];
    const currentHash = window.location.hash;
    if (currentHash && !validSections.includes(currentHash)) {
        if (!document.querySelector(currentHash)) {
            console.warn("Section tidak ditemukan: " + currentHash);
        }
    }
});

function handleFormSubmit() {
    var btn = document.getElementById('submitBtn');
    btn.classList.add('is-sent');
    setTimeout(function() {
        showLoading();
    }, 1200);
    return true;
}

function showLoading() {
    document.getElementById('loadingOverlay').style.display = 'flex';
    return true;
}

function openFullImage(src) {
    var viewer = document.getElementById("fullImageViewer");
    var imgDisplay = document.getElementById("fullImageDisplay");
    imgDisplay.src = src;
    viewer.style.display = "flex";
    setTimeout(function() { viewer.classList.add("active"); }, 10);
}

function closeFullImage() {
    var viewer = document.getElementById("fullImageViewer");
    viewer.classList.remove("active");
    setTimeout(function() {
        viewer.style.display = "none";
        document.getElementById("fullImageDisplay").src = "";
    }, 300);
}