@extends('layout')

@section('title', 'Home - MoversLaredo.com | Professional Moving Services in Laredo')
@section('description', 'Professional moving and transport services in Laredo, Texas. Trusted, reliable, and insured movers for residential and commercial moves. Get your free quote today!')

@section('content')
<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content fade-in-up">
            <h1>Effortless Moving Experiences</h1>
            <p>Experience a stress-free move with our professional services. From careful packing to seamless transportation and timely delivery - we make moving simple.</p>
            <div class="mt-4 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('quote') }}" class="btn">
                    <i class="fas fa-calculator mr-2"></i>
                    Request A Quote
                </a>
                <a href="{{ route('contact') }}" class="btn btn-secondary">
                    <i class="fas fa-phone mr-2"></i>
                    Call (956) 526-8221
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="section" style="background: var(--background-white); padding: 4rem 0;">
    <div class="container">
        <div class="grid grid-3 text-center">
            <div class="stat-card">
                <div class="stat-number">95%</div>
                <div class="stat-label">Customer Satisfied</div>
                <div class="stat-sublabel">4.9/5.0 (500+ Reviews)</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-number">1200+</div>
                <div class="stat-label">Successful Moves</div>
                <div class="stat-sublabel">Helping families and businesses to their new destinations</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-number">15+</div>
                <div class="stat-label">Years Experience</div>
                <div class="stat-sublabel">Trusted by Laredo community</div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section with Progress Bars -->
<section class="section" style="background: var(--background-light);">
    <div class="container">
        <div class="text-center mb-4">
            <h2 style="font-size: 2.5rem; margin-bottom: 1rem; color: var(--primary-blue);">Why Choose MoversLaredo?</h2>
            <p style="font-size: 1.2rem; color: var(--text-light); max-width: 600px; margin: 0 auto;">Reliable. Professional. Hassle-Free Moving Solutions. From start to finish, we're here to make it smooth.</p>
        </div>

        <!-- Progress Bars Section -->
        <div class="progress-section mb-5">
            <div class="grid grid-2" style="gap: 3rem; align-items: center;">
                <div>
                    <h3 style="color: var(--primary-blue); font-size: 1.8rem; margin-bottom: 2rem;">Our Excellence Standards</h3>
                    
                    <div class="progress-item">
                        <div class="progress-header">
                            <span>Real-Time Tracking</span>
                            <span style="color: var(--accent-orange); font-weight: bold;">90%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 90%; background: var(--accent-orange);"></div>
                        </div>
                    </div>
                    
                    <div class="progress-item">
                        <div class="progress-header">
                            <span>Specialized Handling</span>
                            <span style="color: var(--secondary-blue); font-weight: bold;">95%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 95%; background: var(--secondary-blue);"></div>
                        </div>
                    </div>
                    
                    <div class="progress-item">
                        <div class="progress-header">
                            <span>Customer-Centered Approach</span>
                            <span style="color: var(--success-green); font-weight: bold;">98%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 98%; background: var(--success-green);"></div>
                        </div>
                    </div>
                </div>
                
                <div class="grid grid-2" style="gap: 1.5rem;">
                    <div class="feature-card">
                        <div class="feature-icon" style="background: var(--accent-orange);">
                            <i class="fas fa-users"></i>
                        </div>
                        <h4>Professional Team</h4>
                        <p>Trained experts who handle your belongings with care</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon" style="background: var(--secondary-blue);">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4>Full Insurance</h4>
                        <p>Complete protection for your valuable items</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon" style="background: var(--success-green);">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h4>On-Time Delivery</h4>
                        <p>Punctual service that respects your schedule</p>
                    </div>
                    
                    <div class="feature-card">
                        <div class="feature-icon" style="background: var(--primary-blue);">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <h4>Real-Time Tracking</h4>
                        <p>Know exactly where your belongings are</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="section" style="background: linear-gradient(135deg, #f8f9fa, #e9ecef);">
    <div class="container">
        <div class="text-center mb-4">
            <h2 style="font-size: 2.5rem; margin-bottom: 1rem; color: #2c3e50;">Our Services</h2>
            <p style="font-size: 1.2rem; color: #666;">Comprehensive moving solutions tailored to your needs</p>
        </div>

        <div class="grid grid-2 mt-4">
            <div class="card">
                <div class="flex items-start space-x-4">
                    <div style="background: linear-gradient(135deg, #9b59b6, #8e44ad); color: white; width: 60px; height: 60px; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <i class="fas fa-home" style="font-size: 1.5rem;"></i>
                    </div>
                    <div>
                        <h3 style="color: #2c3e50; margin-bottom: 0.5rem;">Residential Moving</h3>
                        <p>Complete home moving services including packing, loading, transportation, and unpacking. We handle everything from apartments to large homes.</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="flex items-start space-x-4">
                    <div style="background: linear-gradient(135deg, #f39c12, #e67e22); color: white; width: 60px; height: 60px; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <i class="fas fa-building" style="font-size: 1.5rem;"></i>
                    </div>
                    <div>
                        <h3 style="color: #2c3e50; margin-bottom: 0.5rem;">Commercial Moving</h3>
                        <p>Office relocations, equipment moving, and business transitions. Minimize downtime with our efficient commercial moving solutions.</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="flex items-start space-x-4">
                    <div style="background: linear-gradient(135deg, #1abc9c, #16a085); color: white; width: 60px; height: 60px; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <i class="fas fa-truck" style="font-size: 1.5rem;"></i>
                    </div>
                    <div>
                        <h3 style="color: #2c3e50; margin-bottom: 0.5rem;">Long Distance</h3>
                        <p>Interstate and long-distance moving services with tracking and secure transportation. We'll get you there safely, no matter the distance.</p>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="flex items-start space-x-4">
                    <div style="background: linear-gradient(135deg, #34495e, #2c3e50); color: white; width: 60px; height: 60px; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <i class="fas fa-box" style="font-size: 1.5rem;"></i>
                    </div>
                    <div>
                        <h3 style="color: #2c3e50; margin-bottom: 0.5rem;">Packing Services</h3>
                        <p>Professional packing and unpacking services with quality materials. We'll safely pack your belongings using industry-best practices.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="section" style="background: var(--primary-blue); color: white;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 style="font-size: 2.5rem; margin-bottom: 1rem; color: white;">What Our Customers Say</h2>
            <p style="font-size: 1.2rem; color: rgba(255, 255, 255, 0.9); max-width: 600px; margin: 0 auto;">Don't just take our word for it - hear from families and businesses who trusted us with their moves</p>
        </div>

        <div class="grid grid-3" style="gap: 2rem;">
            <div class="testimonial-card" style="background: rgba(255, 255, 255, 0.1); padding: 2rem; border-radius: 15px;">
                <div class="testimonial-content">
                    <div class="stars mb-3">
                        <i class="fas fa-star" style="color: var(--accent-orange);"></i>
                        <i class="fas fa-star" style="color: var(--accent-orange);"></i>
                        <i class="fas fa-star" style="color: var(--accent-orange);"></i>
                        <i class="fas fa-star" style="color: var(--accent-orange);"></i>
                        <i class="fas fa-star" style="color: var(--accent-orange);"></i>
                    </div>
                    <p style="font-size: 1.1rem; line-height: 1.6; margin-bottom: 1.5rem; color: rgba(255, 255, 255, 0.95);">"MoversLaredo made our cross-town move incredibly smooth. Their team was professional, efficient, and handled our furniture with extreme care. Highly recommended!"</p>
                    <div class="testimonial-author" style="display: flex; align-items: center;">
                        <div class="author-avatar" style="width: 50px; height: 50px; border-radius: 50%; background: var(--accent-orange); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; margin-right: 1rem;">
                            M
                        </div>
                        <div>
                            <h5 style="margin: 0; color: white;">Maria Rodriguez</h5>
                            <p style="margin: 0; color: rgba(255, 255, 255, 0.7); font-size: 0.9rem;">Residential Move</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card" style="background: rgba(255, 255, 255, 0.1); padding: 2rem; border-radius: 15px;">
                <div class="testimonial-content">
                    <div class="stars mb-3">
                        <i class="fas fa-star" style="color: var(--accent-orange);"></i>
                        <i class="fas fa-star" style="color: var(--accent-orange);"></i>
                        <i class="fas fa-star" style="color: var(--accent-orange);"></i>
                        <i class="fas fa-star" style="color: var(--accent-orange);"></i>
                        <i class="fas fa-star" style="color: var(--accent-orange);"></i>
                    </div>
                    <p style="font-size: 1.1rem; line-height: 1.6; margin-bottom: 1.5rem; color: rgba(255, 255, 255, 0.95);">"As a business owner, I needed reliable movers for our office relocation. MoversLaredo delivered beyond expectations with their organized approach and attention to detail."</p>
                    <div class="testimonial-author" style="display: flex; align-items: center;">
                        <div class="author-avatar" style="width: 50px; height: 50px; border-radius: 50%; background: var(--secondary-blue); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; margin-right: 1rem;">
                            J
                        </div>
                        <div>
                            <h5 style="margin: 0; color: white;">James Thompson</h5>
                            <p style="margin: 0; color: rgba(255, 255, 255, 0.7); font-size: 0.9rem;">Commercial Move</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card" style="background: rgba(255, 255, 255, 0.1); padding: 2rem; border-radius: 15px;">
                <div class="testimonial-content">
                    <div class="stars mb-3">
                        <i class="fas fa-star" style="color: var(--accent-orange);"></i>
                        <i class="fas fa-star" style="color: var(--accent-orange);"></i>
                        <i class="fas fa-star" style="color: var(--accent-orange);"></i>
                        <i class="fas fa-star" style="color: var(--accent-orange);"></i>
                        <i class="fas fa-star" style="color: var(--accent-orange);"></i>
                    </div>
                    <p style="font-size: 1.1rem; line-height: 1.6; margin-bottom: 1.5rem; color: rgba(255, 255, 255, 0.95);">"Moving from Laredo to San Antonio was stress-free thanks to this amazing team. They provided real-time updates and delivered everything on schedule. Outstanding service!"</p>
                    <div class="testimonial-author" style="display: flex; align-items: center;">
                        <div class="author-avatar" style="width: 50px; height: 50px; border-radius: 50%; background: var(--success-green); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; margin-right: 1rem;">
                            A
                        </div>
                        <div>
                            <h5 style="margin: 0; color: white;">Ana Garcia</h5>
                            <p style="margin: 0; color: rgba(255, 255, 255, 0.7); font-size: 0.9rem;">Long Distance Move</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section" style="background: var(--secondary-blue); color: white;">
    <div class="container text-center">
        <h2 style="font-size: 2.5rem; margin-bottom: 1rem;">Ready to Experience Effortless Moving?</h2>
        <p style="font-size: 1.3rem; margin-bottom: 2rem; opacity: 0.9;">Get your free quote today and join the 92% of customers who rate us 5 stars!</p>
        
        <div class="grid grid-3 mb-4" style="max-width: 800px; margin: 0 auto;">
            <div class="text-center">
                <div style="background: rgba(255,255,255,0.1); width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                    <i class="fas fa-phone" style="font-size: 1.5rem;"></i>
                </div>
                <h4>Call Us</h4>
                <p style="opacity: 0.8;">(956) 526-8221</p>
            </div>
            
            <div class="text-center">
                <div style="background: rgba(255,255,255,0.1); width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                    <i class="fas fa-envelope" style="font-size: 1.5rem;"></i>
                </div>
                <h4>Email Us</h4>
                <p style="opacity: 0.8;">quote@moverslaredo.com</p>
            </div>
            
            <div class="text-center">
                <div style="background: rgba(255,255,255,0.1); width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                    <i class="fas fa-map-marker-alt" style="font-size: 1.5rem;"></i>
                </div>
                <h4>Visit Us</h4>
                <p style="opacity: 0.8;">602 W. Calton RD<br>Laredo, TX 78041</p>
            </div>
        </div>
        
        <div class="mt-4">
            <a href="{{ route('quote') }}" class="btn" style="background: #3498db; margin-right: 1rem;">
                <i class="fas fa-calculator mr-2"></i>
                Get Free Quote
            </a>
            <a href="{{ route('contact') }}" class="btn btn-secondary">
                <i class="fas fa-comments mr-2"></i>
                Contact Us
            </a>
        </div>
    </div>
</section>

<!-- Trust Section -->
<section class="section">
    <div class="container text-center">
        <h2 style="font-size: 2.5rem; margin-bottom: 2rem; color: #2c3e50;">Trusted by Laredo Families & Businesses</h2>
        
        <div class="grid grid-3">
            <div class="card text-center">
                <div style="font-size: 3rem; color: #3498db; margin-bottom: 1rem;">500+</div>
                <h4 style="color: #2c3e50;">Successful Moves</h4>
                <p>Happy customers who trusted us with their relocation needs</p>
            </div>
            
            <div class="card text-center">
                <div style="font-size: 3rem; color: #27ae60; margin-bottom: 1rem;">15+</div>
                <h4 style="color: #2c3e50;">Years Experience</h4>
                <p>Serving the Laredo community with professional moving services</p>
            </div>
            
            <div class="card text-center">
                <div style="font-size: 3rem; color: #e74c3c; margin-bottom: 1rem;">100%</div>
                <h4 style="color: #2c3e50;">Satisfaction Rate</h4>
                <p>Committed to excellence in every move we complete</p>
            </div>
        </div>
    </div>
</section>
@endsection
