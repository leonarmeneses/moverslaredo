@extends('layout')

@section('title', 'Home - MoversLaredo.com | Professional Moving Services in Laredo')
@section('description', 'Professional moving and transport services in Laredo, Texas. Trusted, reliable, and insured movers for residential and commercial moves. Get your free quote today!')

@section('content')
<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content fade-in-up">
            <h1>Professional Moving Services in Laredo</h1>
            <p>Your trusted partner for safe, reliable, and efficient moving solutions. We make your relocation stress-free with our expert team and comprehensive services.</p>
            <div class="mt-4 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('quote') }}" class="btn">
                    <i class="fas fa-calculator mr-2"></i>
                    Get Free Quote
                </a>
                <a href="{{ route('contact') }}" class="btn btn-secondary">
                    <i class="fas fa-phone mr-2"></i>
                    Call (956) 526-8221
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="section">
    <div class="container">
        <div class="text-center mb-4">
            <h2 style="font-size: 2.5rem; margin-bottom: 1rem; color: #2c3e50;">Why Choose MoversLaredo?</h2>
            <p style="font-size: 1.2rem; color: #666; max-width: 600px; margin: 0 auto;">We are your trusted partner for all moving and transport needs in Laredo. With years of experience, we provide reliable, safe, and efficient moving services.</p>
        </div>

        <div class="grid grid-3 mt-4">
            <div class="card text-center">
                <div style="background: linear-gradient(135deg, #3498db, #2980b9); color: white; width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="fas fa-users" style="font-size: 2rem;"></i>
                </div>
                <h3 style="color: #2c3e50; margin-bottom: 1rem;">Professional Team</h3>
                <p>Our trained and experienced professionals handle your belongings with the utmost care and expertise, ensuring a smooth moving experience.</p>
            </div>
            
            <div class="card text-center">
                <div style="background: linear-gradient(135deg, #27ae60, #229954); color: white; width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="fas fa-clock" style="font-size: 2rem;"></i>
                </div>
                <h3 style="color: #2c3e50; margin-bottom: 1rem;">Reliable Service</h3>
                <p>We're committed to delivering on time and within budget. Your schedule is our priority, and we guarantee punctual service every time.</p>
            </div>
            
            <div class="card text-center">
                <div style="background: linear-gradient(135deg, #e74c3c, #c0392b); color: white; width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="fas fa-shield-alt" style="font-size: 2rem;"></i>
                </div>
                <h3 style="color: #2c3e50; margin-bottom: 1rem;">Full Insurance</h3>
                <p>Your belongings are protected with comprehensive insurance coverage. Move with confidence knowing your items are safeguarded.</p>
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

<!-- CTA Section -->
<section class="section" style="background: linear-gradient(135deg, #2c3e50, #34495e); color: white;">
    <div class="container text-center">
        <h2 style="font-size: 2.5rem; margin-bottom: 1rem;">Ready to Move?</h2>
        <p style="font-size: 1.3rem; margin-bottom: 2rem; opacity: 0.9;">Get started with a free, no-obligation quote today. Our team is ready to make your move seamless and stress-free.</p>
        
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
