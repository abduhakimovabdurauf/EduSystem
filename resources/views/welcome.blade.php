<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>English Excellence - Professional English Tutoring</title>
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="nav-wrapper">
                <div class="logo">
                    <div class="logo-icon">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div class="logo-text">
                        <h1>English Execellence</h1>
                    </div>
                </div>
                <nav class="nav">
                    <a href="#achievements">Natijalar</a>
                    <a href="#methodology">Yondashuv</a>
                    <a href="#testimonials">Fikrlar</a>
                    <a href="#contact">Bog‘lanish</a>
                </nav>
                <a href="/student" class="cta-button" style="padding: 3px 10px;">Kirish</a>
            </div>
        </div>
    </header>


    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Ingliz Tilingiz Maqsadlariga Erishing</h1>
                    <p class="hero-subtitle">Maxsus IELTS, TOEFL va Cambridge imtihonlariga tayyorgarlik, ajoyib talaba natijalari bilan</p>
                    <div class="hero-stats">
                        <div class="stat">
                            <div class="stat-icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <div class="stat-content">
                                <span class="stat-number">95%</span>
                                <span class="stat-label">Muvaffaqiyat Darajasi</span>
                            </div>
                        </div>
                        <div class="stat">
                            <div class="stat-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="stat-content">
                                <span class="stat-number">200+</span>
                                <span class="stat-label">Yordam Berilgan Talabalar</span>
                            </div>
                        </div>
                        <div class="stat">
                            <div class="stat-icon">
                                <i class="fas fa-trophy"></i>
                            </div>
                            <div class="stat-content">
                                <span class="stat-number">7.5</span>
                                <span class="stat-label">O‘rtacha IELTS Balli</span>
                            </div>
                        </div>
                    </div>
                    <a href="#contact" class="cta-button">Safaringizni Boshlang</a>
                </div>
            </div>
        </div>
    </section>


    <!-- Student Achievements Marquee -->
    <section id="achievements" class="achievements-section">
        <div class="container">
            <h2 class="section-title">Talabalar Muvaffaqiyat Hikoyalari</h2>
            <p class="section-subtitle">Sadoqatli talabalar tomonidan erishilgan haqiqiy natijalar</p>
        </div>
        
        <div class="marquee-container">
            <div class="marquee-content">
                @for($repeat = 0; $repeat < 2; $repeat++)
                    @for($i = 1; $i <= 15; $i++)
                        <div class="achievement-card">
                            <img src="{{ asset("images/achievements/$i.png") }}" alt="Achievement {{ $i }}">
                        </div>
                    @endfor
                @endfor

{{-- 
                <div class="achievement-card">
                    <div class="achievement-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <div class="achievement-details">
                        <h4>David L.</h4>
                        <p class="test-name">TOEFL</p>
                        <p class="score">118/120</p>
                        <p class="improvement">↗️ +35 ball</p>
                    </div>
                </div>

                <div class="achievement-card">
                    <div class="achievement-icon">
                        <i class="fas fa-medal"></i>
                    </div>
                    <div class="achievement-details">
                        <h4>Maria R.</h4>
                        <p class="test-name">Cambridge FCE</p>
                        <p class="score">A daraja</p>
                        <p class="improvement">↗️ Pass dan A darajaga</p>
                    </div>
                </div>

                <div class="achievement-card">
                    <div class="achievement-icon">
                        <i class="fas fa-crown"></i>
                    </div>
                    <div class="achievement-details">
                        <h4>James W.</h4>
                        <p class="test-name">IELTS Speaking</p>
                        <p class="score">9.0/9</p>
                        <p class="improvement">↗️ +3.0 ball</p>
                    </div>
                </div>

                <div class="achievement-card">
                    <div class="achievement-icon">
                        <i class="fas fa-gem"></i>
                    </div>
                    <div class="achievement-details">
                        <h4>Anna K.</h4>
                        <p class="test-name">PTE Academic</p>
                        <p class="score">87/90</p>
                        <p class="improvement">↗️ +28 ball</p>
                    </div>
                </div>

                <div class="achievement-card">
                    <div class="achievement-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="achievement-details">
                        <h4>Michael B.</h4>
                        <p class="test-name">Cambridge CAE</p>
                        <p class="score">A daraja</p>
                        <p class="improvement">↗️ B dan A darajaga</p>
                    </div>
                </div>

                <div class="achievement-card">
                    <div class="achievement-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <div class="achievement-details">
                        <h4>Lisa T.</h4>
                        <p class="test-name">TOEFL Speaking</p>
                        <p class="score">30/30</p>
                        <p class="improvement">↗️ Mukammal ball</p>
                    </div>
                </div>

                <div class="achievement-card">
                    <div class="achievement-icon">
                        <i class="fas fa-medal"></i>
                    </div>
                    <div class="achievement-details">
                        <h4>Robert F.</h4>
                        <p class="test-name">IELTS Writing</p>
                        <p class="score">8.0/9</p>
                        <p class="improvement">↗️ +2.5 ball</p>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>


    <!-- Teaching Methodology -->
    <section id="methodology" class="methodology-section">
        <div class="container">
            <h2 class="section-title">Sinalgan O‘qitish Metodologiyasi</h2>
            <p class="section-subtitle">Maksimal natijalar uchun yaratilgan tizimli yondashuv</p>
            
            <div class="methodology-grid">
                <div class="method-card">
                    <div class="method-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3>Shaxsiy Tahlil</h3>
                    <p>Sizning joriy darajangiz va aniq maqsadlaringizni batafsil baholash orqali individual o‘quv yo‘lini yaratish.</p>
                </div>
{{-- 
                <div class="method-card">
                    <div class="method-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Tuzilgan Rivojlanish</h3>
                    <p>Qadam-baqadam tuzilgan dastur, aniq bosqichlar va muntazam nazorat orqali barqaror yutuqni ta’minlash.</p>
                </div> --}}

                <div class="method-card">
                    <div class="method-icon">
                        <i class="fas fa-brain"></i>
                    </div>
                    <h3>Strategik Mashqlar</h3>
                    <p>Har bir imtihon shakliga mos ishonchli usullar bilan imtihon-ko‘nikmalarini rivojlantirishga qaratilgan mashqlar.</p>
                </div>

                <div class="method-card">
                    <div class="method-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h3>Amaliy Qo‘llash</h3>
                    <p>Imtihondan tashqarida ham akademik va professional muvaffaqiyat uchun amaliy muloqot ko‘nikmalarini shakllantirish.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section id="testimonials" class="testimonials-section">
        <div class="container">
            <h2 class="section-title">O‘quvchilar Fikrlari</h2>
            <p class="section-subtitle">Motivatsiyaga to‘la o‘quvchilarning muvaffaqiyat hikoyalari</p>
            
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="quote-icon">
                            <i class="fas fa-quote-left"></i>
                        </div>
                        <p>"Uning tizimli yondashuvi tufayli atigi 3 oyda IELTS ballimni 6.0 dan 8.5 gacha oshirdim! Shaxsiylashtirilgan o‘quv reja haqiqiy farqni yaratdi."</p>
                        <div class="testimonial-author">
                            <strong>Sarah M.</strong>
                            <span>IELTS 8.5</span>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="quote-icon">
                            <i class="fas fa-quote-left"></i>
                        </div>
                        <p>"Amaliy muloqotga e’tibor qaratishi biznes ingliz tilida ishonch hosil qilishimga yordam berdi. TOEFL tayyorgarligi esa juda puxta va samarali bo‘ldi."</p>
                        <div class="testimonial-author">
                            <strong>David L.</strong>
                            <span>TOEFL 118</span>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <div class="quote-icon">
                            <i class="fas fa-quote-left"></i>
                        </div>
                        <p>"Cambridge imtihoniga tayyorgarlik kutganimdan ham yaxshi bo‘ldi. Aniq tushuntirishlar va strategik mashqlar natijada Grade A olishimga sabab bo‘ldi."</p>
                        <div class="testimonial-author">
                            <strong>Maria R.</strong>
                            <span>FCE Grade A</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <div class="contact-wrapper">
                <div class="contact-info">
                    <h2>Ingliz Tili Safaringizni Boshlashga Tayar Misiz?</h2>
                    <p>Maqsadlaringiz haqida suhbatlashish va sizga moslashtirilgan o‘quv rejasini yaratish uchun bog‘laning.</p>
                    
                    <div class="contact-features">
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Bepul dastlabki maslahat</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Moslashuvchan dars jadvali</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Online va oflayn imkoniyatlar</span>
                        </div>
                        <div class="feature">
                            <i class="fas fa-check-circle"></i>
                            <span>Rivojlanish nazorati qo‘shib boriladi</span>
                        </div>
                    </div>
                </div>

                <div class="contact-form-wrapper">
                    <form id="contactForm" class="contact-form">
                        <h3>Xabar Yuborish</h3>
                        
                        <div class="form-group">
                            <input type="text" id="name" name="name" required>
                            <label for="name">To‘liq Ism</label>
                        </div>

                        <div class="form-group">
                            <input type="tel" id="phone" name="phone">
                            <label for="phone">Telefon Raqam</label>
                        </div>

                        <div class="form-group">
                            <textarea id="message" name="message" rows="4" required></textarea>
                            <label for="message">Xabar</label>
                        </div>

                        <button type="submit" class="submit-button">
                            <i class="fas fa-paper-plane"></i>
                            Xabarni Yuborish
                        </button>

                        <div id="formStatus" class="form-status"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="logo">
                        <div class="logo-icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <div class="logo-text">
                            <h3>English Excellence</h3>
                            <p>Professional Ingliz Tili O‘qituvchisi</p>
                        </div>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h4>Xizmatlar</h4>
                    <ul>
                        <li>IELTS Tayyorlov</li>
                        <li>TOEFL Tayyorlov</li>
                        <li>Cambridge Imtihonlari</li>
                        <li>Biznes Ingliz Tili</li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h4>Aloqa</h4>
                    <p>Online va oflayn darslar mavjud</p>
                    <p>Sizga moslashuvchan dars jadvali</p>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 English Excellence. Barcha huquqlar himoyalangan.</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>