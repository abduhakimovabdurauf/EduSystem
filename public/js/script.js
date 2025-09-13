document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    const formStatus = document.getElementById('formStatus');
    const submitButton = contactForm.querySelector('button[type="submit"]');
    
    contactForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const formData = new FormData(contactForm);
        const data = {
            name: formData.get('name'),
            phone: formData.get('phone'),
            message: formData.get('message')
        };
        
        submitButton.classList.add('loading');
        submitButton.disabled = true;
        formStatus.style.display = 'none';
        
        try {
            const telegramMessage = `
                🎓 New English Learning Inquiry

                👤 Name: ${data.name}
                📱 Phone: ${data.phone}

                💬 Message:
                ${data.message}
            `.trim();
            
            const BOT_TOKEN = "8216870207:AAHuBbmHby8MTBeK90eyOMczYGqB-KcrA04";
            const CHAT_ID = -4802535698;
            
            if (BOT_TOKEN === 'YOUR_BOT_TOKEN_HERE' || CHAT_ID === 'YOUR_CHAT_ID_HERE') {
                throw new Error('Telegram bot credentials not configured');
            }
            
            const response = await fetch(`https://api.telegram.org/bot${BOT_TOKEN}/sendMessage`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    chat_id: CHAT_ID,
                    text: telegramMessage,
                    parse_mode: 'HTML'
                })
            });
            
            if (response.ok) {
                showStatus('success', '✅ Xabar muvaffaqiyatli yuborildi! Tez orada siz bilan bog‘lanamaniz.');
                contactForm.reset();
            } else {
                throw new Error('Failed to send message');
            }
        } catch (error) {
            console.error('Error sending message:', error);
            if (error.message === 'Telegram bot credentials not configured') {
                showStatus('error', '⚠️ Aloqa formasi hali sozlanmagan. Iltimos, to‘g‘ridan-to‘g‘ri berilgan ma’lumotlar orqali bog‘laning.');
            } else {
                showStatus('error', '❌ Xabarni yuborib bo‘lmadi. Qaytadan urinib ko‘ring yoki bevosita bog‘laning.');
            }
        } finally {
            submitButton.classList.remove('loading');
            submitButton.disabled = false;
        }
    });
    
    function showStatus(type, message) {
        formStatus.className = `form-status ${type}`;
        formStatus.textContent = message;
        formStatus.style.display = 'block';
        
        setTimeout(() => {
            formStatus.style.display = 'none';
        }, 5000);
    }
    
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    const marqueeContent = document.querySelector('.marquee-content');
    if (marqueeContent) {
        const originalContent = marqueeContent.innerHTML;
        marqueeContent.innerHTML = originalContent + originalContent;
    }
    
    const formInputs = document.querySelectorAll('.form-group input, .form-group select, .form-group textarea');
    
    formInputs.forEach(input => {
        if (input.value && input.value.trim() !== '') {
            input.classList.add('has-value');
        }
        
        input.addEventListener('input', function() {
            if (this.value && this.value.trim() !== '') {
                this.classList.add('has-value');
            } else {
                this.classList.remove('has-value');
            }
        });
        
        input.addEventListener('focus', function() {
            this.classList.add('focused');
        });
        
        input.addEventListener('blur', function() {
            this.classList.remove('focused');
        });
    });
    
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, observerOptions);
    
    const animatedElements = document.querySelectorAll(
        '.method-card, .testimonial-card, .achievement-card'
    );
    
    animatedElements.forEach(el => {
        observer.observe(el);
    });
    
    const statNumbers = document.querySelectorAll('.stat-number');
    const hasAnimated = new Set();
    
    const statsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !hasAnimated.has(entry.target)) {
                hasAnimated.add(entry.target);
                animateNumber(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    statNumbers.forEach(stat => {
        statsObserver.observe(stat);
    });
    
    function animateNumber(element) {
        const target = element.textContent;
        const isPercentage = target.includes('%');
        const numericValue = parseFloat(target.replace(/[^0-9.]/g, ''));
        const duration = 2000;
        const steps = 60;
        const increment = numericValue / steps;
        let current = 0;
        
        const timer = setInterval(() => {
            current += increment;
            if (current >= numericValue) {
                current = numericValue;
                clearInterval(timer);
            }
            
            let displayValue;
            if (isPercentage) {
                displayValue = Math.round(current) + '%';
            } else if (target.includes('+')) {
                displayValue = Math.round(current) + '+';
            } else {
                displayValue = current.toFixed(1);
            }
            
            element.textContent = displayValue;
        }, duration / steps);
    }
    
    const mobileMenuButton = document.querySelector('.mobile-menu-button');
    const mobileMenu = document.querySelector('.mobile-menu');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('open');
        });
    }
    
    document.addEventListener('click', (e) => {
        const mobileMenu = document.querySelector('.mobile-menu');
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        
        if (mobileMenu && mobileMenuButton && 
            !mobileMenu.contains(e.target) && 
            !mobileMenuButton.contains(e.target)) {
            mobileMenu.classList.remove('open');
        }
    });
});