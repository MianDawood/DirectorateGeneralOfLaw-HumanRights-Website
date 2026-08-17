// Initialize Lucide icons on load
document.addEventListener('DOMContentLoaded', () => {
    lucide.createIcons();
});
window.addEventListener('load', () => {
    lucide.createIcons(); // Fallback to ensure icons render
});

// Mobile Menu Logic
function toggleMobileMenu(isOpen) {
    const overlay = document.getElementById('mobileMenuOverlay');
    const content = document.getElementById('mobileMenuContent');
    if (!overlay || !content) return;

    if (isOpen) {
        overlay.classList.remove('invisible', 'opacity-0');
        overlay.classList.add('visible', 'opacity-100');
        content.classList.remove('translate-x-full');
        document.body.style.overflow = 'hidden';
    } else {
        overlay.classList.add('invisible', 'opacity-0');
        overlay.classList.remove('visible', 'opacity-100');
        content.classList.add('translate-x-full');
        document.body.style.overflow = '';
    }
}

document.addEventListener('click', (e) => {
    if (e.target.closest('#mobileMenuBtn')) toggleMobileMenu(true);
    if (e.target.closest('#closeMobileMenu')) toggleMobileMenu(false);
    if (e.target.id === 'mobileMenuOverlay') toggleMobileMenu(false);
});

// Mobile Dropdown Accordion Logic
document.addEventListener('click', (e) => {
    const dropdownTrigger = e.target.closest('.mobile-dropdown button, .mobile-dropdown .dropdown-trigger');
    if (dropdownTrigger) {
        e.stopPropagation();
        const parent = dropdownTrigger.closest('.mobile-dropdown');
        const content = parent.querySelector('.dropdown-content');
        const icon = parent.querySelector('.dropdown-icon');

        // Toggle current
        if (content) content.classList.toggle('hidden');
        if (icon) icon.classList.toggle('rotate-180');
    }
});

// Smart Sticky Header Logic
let lastScrollY = window.scrollY;
const mainHeader = document.getElementById('mainHeader');

window.addEventListener('scroll', () => {
    if (mainHeader) {
        if (window.scrollY > 150) {
            if (window.scrollY > lastScrollY) {
                // Scrolling down
                mainHeader.classList.add('-translate-y-full');
            } else {
                // Scrolling up
                mainHeader.classList.remove('-translate-y-full');
                mainHeader.classList.add('shadow-xl');
            }
        } else {
            mainHeader.classList.remove('-translate-y-full', 'shadow-xl');
        }
    }
    lastScrollY = window.scrollY;
});

// Hero Slider Logic
let currentSlide = 0;
const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.dot');
const totalSlides = slides.length;

function showSlide(index) {
    if (totalSlides === 0) return;

    // Reset slides
    slides.forEach((slide, i) => {
        slide.classList.remove('opacity-100', 'z-10');
        slide.classList.add('opacity-0', 'z-0');
        if (dots[i]) {
            dots[i].classList.remove('bg-[#02B1EB]');
            dots[i].classList.add('bg-white/40');
        }
    });

    // Set current slide
    currentSlide = (index + totalSlides) % totalSlides;
    if (slides[currentSlide]) {
        slides[currentSlide].classList.remove('opacity-0', 'z-0');
        slides[currentSlide].classList.add('opacity-100', 'z-10');
    }
    if (dots[currentSlide]) {
        dots[currentSlide].classList.add('bg-[#02B1EB]');
        dots[currentSlide].classList.remove('bg-white/40');
    }
}

function nextSlide() {
    showSlide(currentSlide + 1);
}

function prevSlide() {
    showSlide(currentSlide - 1);
}

// Auto slide every 2 seconds
let sliderInterval = setInterval(nextSlide, 2000);

// Dot navigation
dots.forEach((dot, i) => {
    dot.addEventListener('click', () => {
        clearInterval(sliderInterval);
        showSlide(i);
        sliderInterval = setInterval(nextSlide, 2000);
    });
});

// Pause on hover
const heroSlider = document.getElementById('hero-slider');
if (heroSlider) {
    heroSlider.addEventListener('mouseenter', () => clearInterval(sliderInterval));
    heroSlider.addEventListener('mouseleave', () => {
        sliderInterval = setInterval(nextSlide, 2000);
    });
}

// Global functions for inline onclick (if any)
window.nextSlide = nextSlide;
window.prevSlide = prevSlide;

// Back to Top Logic
const backToTopBtn = document.getElementById('backToTop');
window.addEventListener('scroll', () => {
    if (backToTopBtn) {
        if (window.scrollY > 400) {
            backToTopBtn.classList.remove('translate-y-20', 'opacity-0');
            backToTopBtn.classList.add('translate-y-0', 'opacity-100');
        } else {
            backToTopBtn.classList.add('translate-y-20', 'opacity-0');
            backToTopBtn.classList.remove('translate-y-0', 'opacity-100');
        }
    }
});

// Global Scroll Reveal Initialization
const revealOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -100px 0px"
};

const revealObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('revealed');

            // Handle Staggered Children
            if (entry.target.classList.contains('reveal-stagger')) {
                const children = entry.target.children;
                Array.from(children).forEach((child, index) => {
                    child.style.transitionDelay = `${index * 0.15}s`;
                });
            }

            observer.unobserve(entry.target);
        }
    });
}, revealOptions);

document.querySelectorAll('.reveal-on-scroll, .reveal-stagger').forEach(el => {
    revealObserver.observe(el);
});

// Events Section Slider Logic
document.addEventListener('DOMContentLoaded', () => {
    const slider = document.getElementById('eventsSlider');
    const prevBtn = document.getElementById('prevEvent');
    const nextBtn = document.getElementById('nextEvent');

    if (slider && prevBtn && nextBtn) {
        const scrollAmount = () => {
            // Scroll by one card width + gap
            const firstCard = slider.querySelector('.flex-none');
            if (firstCard) {
                return firstCard.offsetWidth + 32; // 32 is the gap-8 (2rem)
            }
            return slider.offsetWidth;
        };

        prevBtn.addEventListener('click', () => {
            slider.scrollBy({
                left: -scrollAmount(),
                behavior: 'smooth'
            });
        });

        nextBtn.addEventListener('click', () => {
            slider.scrollBy({
                left: scrollAmount(),
                behavior: 'smooth'
            });
        });

        // Update button states
        const updateButtons = () => {
            const scrollLeft = slider.scrollLeft;
            const maxScroll = slider.scrollWidth - slider.clientWidth;

            prevBtn.style.opacity = scrollLeft <= 10 ? '0.5' : '1';
            prevBtn.style.pointerEvents = scrollLeft <= 10 ? 'none' : 'auto';

            nextBtn.style.opacity = scrollLeft >= maxScroll - 10 ? '0.5' : '1';
            nextBtn.style.pointerEvents = scrollLeft >= maxScroll - 10 ? 'none' : 'auto';
        };

        slider.addEventListener('scroll', updateButtons);
        window.addEventListener('resize', updateButtons);
        setTimeout(updateButtons, 500); // Initial check after reveal
    }
});
