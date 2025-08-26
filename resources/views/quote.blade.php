@extends('layout')

@section('title', 'Get Quote - MoversLaredo.com | Free Moving Quote')
@section('description', 'Get your free moving quote from MoversLaredo. Professional moving services in Laredo, Texas. Fast, accurate quotes for your relocation needs.')

@section('content')
<!-- Hero Section -->
<section class="hero" style="padding: 4rem 0;">
    <div class="container text-center">
        <div class="hero-content">
            <h1 style="font-size: 3rem; margin-bottom: 1rem;">Get Your Free Quote</h1>
            <p style="font-size: 1.3rem; max-width: 600px; margin: 0 auto;">Get an instant estimate for your move. Our professional team will provide you with a detailed quote tailored to your specific needs.</p>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success" style="background: linear-gradient(135deg, #d4edda, #c3e6cb); color: #155724; padding: 1.5rem; border-radius: 12px; margin-bottom: 2rem; border-left: 5px solid #28a745; box-shadow: 0 4px 15px rgba(40, 167, 69, 0.2);">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-3" style="font-size: 1.5rem;"></i>
                    <div>
                        <h4 style="margin: 0 0 0.5rem; font-weight: bold;">Quote Submitted Successfully!</h4>
                        <p style="margin: 0;">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <div class="grid grid-2" style="gap: 3rem; align-items: start;">
            <!-- Quote Form -->
            <div class="card" style="padding: 2.5rem;">
                <h2 style="color: #2c3e50; margin-bottom: 1.5rem; display: flex; align-items: center;">
                    <i class="fas fa-calculator mr-3 text-blue-600"></i>
                    Quote Request Form
                </h2>
                
                <form action="{{ route('quote.store') }}" method="POST" id="quote-form">
                    @csrf

                    <div class="form-group">
                        <label for="from_address" class="form-label">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            Origin (Moving From) *
                        </label>
                        <input type="text" id="from_address" name="from_address" required 
                               class="form-input" 
                               placeholder="Enter city, state (e.g., Laredo, TX)" 
                               value="{{ old('from_address') }}" 
                               autocomplete="off">
                        <div id="from_suggestions" class="suggestions-dropdown"></div>
                        @error('from_address')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="to_address" class="form-label">
                            <i class="fas fa-flag-checkered mr-2"></i>
                            Destination (Moving To) *
                        </label>
                        <input type="text" id="to_address" name="to_address" required 
                               class="form-input" 
                               placeholder="Enter city, state (e.g., San Antonio, TX)" 
                               value="{{ old('to_address') }}" 
                               autocomplete="off">
                        <div id="to_suggestions" class="suggestions-dropdown"></div>
                        @error('to_address')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="move_date" class="form-label">
                            <i class="fas fa-calendar-alt mr-2"></i>
                            Preferred Move Date *
                        </label>
                        <input type="date" id="move_date" name="move_date" required 
                               class="form-input" 
                               value="{{ old('move_date') }}"
                               min="{{ date('Y-m-d') }}">
                        @error('move_date')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="move_type" class="form-label">
                            <i class="fas fa-home mr-2"></i>
                            Type of Move *
                        </label>
                        <select name="move_type" id="move_type" required class="form-input">
                            <option value="">Select move type</option>
                            <option value="Studio Apt" {{ old('move_type') === 'Studio Apt' ? 'selected' : '' }}>Studio Apartment</option>
                            <option value="1 BR" {{ old('move_type') === '1 BR' ? 'selected' : '' }}>1 Bedroom Apartment</option>
                            <option value="1 BR Apt - Large" {{ old('move_type') === '1 BR Apt - Large' ? 'selected' : '' }}>1 Bedroom Apartment - Large</option>
                            <option value="2 BR Apt" {{ old('move_type') === '2 BR Apt' ? 'selected' : '' }}>2 Bedroom Apartment</option>
                            <option value="3 BR Apt" {{ old('move_type') === '3 BR Apt' ? 'selected' : '' }}>3 Bedroom Apartment</option>
                            <option value="4+ BR Apt" {{ old('move_type') === '4+ BR Apt' ? 'selected' : '' }}>4+ Bedroom Apartment</option>
                            <option value="House" {{ old('move_type') === 'House' ? 'selected' : '' }}>House</option>
                            <option value="Commercial move" {{ old('move_type') === 'Commercial move' ? 'selected' : '' }}>Commercial Move</option>
                        </select>
                        @error('move_type')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="grid grid-2">
                        <div class="form-group">
                            <label for="phone" class="form-label">
                                <i class="fas fa-phone mr-2"></i>
                                Phone Number *
                            </label>
                            <input type="tel" id="phone" name="phone" required 
                                   class="form-input" 
                                   placeholder="(956) 123-4567"
                                   value="{{ old('phone') }}">
                            @error('phone')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope mr-2"></i>
                                Email Address *
                            </label>
                            <input type="email" id="email" name="email" required 
                                   class="form-input" 
                                   placeholder="your@email.com"
                                   value="{{ old('email') }}">
                            @error('email')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="form-label">
                            <i class="fas fa-user mr-2"></i>
                            Full Name *
                        </label>
                        <input type="text" id="name" name="name" required 
                               class="form-input" 
                               placeholder="Enter your full name"
                               value="{{ old('name') }}">
                        @error('name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="message" class="form-label">
                            <i class="fas fa-comment mr-2"></i>
                            Additional Details
                        </label>
                        <textarea id="message" name="message" rows="4" 
                                  class="form-input" 
                                  placeholder="Tell us about your moving needs, special items, timeline, or any questions you have...">{{ old('message') }}</textarea>
                        @error('message')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn" style="width: 100%; font-size: 1.2rem; padding: 15px; background: linear-gradient(135deg, #3498db, #2980b9);">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Get My Free Quote
                    </button>
                </form>
            </div>

            <!-- Quote Info Sidebar -->
            <div>
                <div class="card mb-3" style="background: linear-gradient(135deg, #667eea, #764ba2); color: white;">
                    <div style="padding: 2rem;">
                        <h3 style="margin-bottom: 1.5rem; display: flex; align-items: center;">
                            <i class="fas fa-star mr-3"></i>
                            Why Choose MoversLaredo?
                        </h3>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="margin-bottom: 1rem; display: flex; align-items: center;">
                                <i class="fas fa-check-circle mr-3" style="color: #2ecc71;"></i>
                                Professional & Experienced Team
                            </li>
                            <li style="margin-bottom: 1rem; display: flex; align-items: center;">
                                <i class="fas fa-check-circle mr-3" style="color: #2ecc71;"></i>
                                Fully Licensed & Insured
                            </li>
                            <li style="margin-bottom: 1rem; display: flex; align-items: center;">
                                <i class="fas fa-check-circle mr-3" style="color: #2ecc71;"></i>
                                Competitive Pricing
                            </li>
                            <li style="margin-bottom: 1rem; display: flex; align-items: center;">
                                <i class="fas fa-check-circle mr-3" style="color: #2ecc71;"></i>
                                Free Quotes & Estimates
                            </li>
                            <li style="display: flex; align-items: center;">
                                <i class="fas fa-check-circle mr-3" style="color: #2ecc71;"></i>
                                24/7 Customer Support
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card mb-3">
                    <div style="padding: 2rem;">
                        <h4 style="color: #2c3e50; margin-bottom: 1.5rem; display: flex; align-items: center;">
                            <i class="fas fa-phone mr-3 text-green-600"></i>
                            Need Immediate Help?
                        </h4>
                        <div class="text-center">
                            <div style="background: linear-gradient(135deg, #27ae60, #229954); color: white; padding: 1.5rem; border-radius: 12px; margin-bottom: 1rem;">
                                <h3 style="margin: 0; font-size: 1.8rem;">Call Now</h3>
                                <p style="margin: 0.5rem 0 0; font-size: 1.5rem; font-weight: bold;">(956) 526-8221</p>
                            </div>
                            <p style="color: #666; font-size: 0.9rem;">Available Monday - Saturday<br>8:00 AM - 6:00 PM</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div style="padding: 2rem;">
                        <h4 style="color: #2c3e50; margin-bottom: 1.5rem; display: flex; align-items: center;">
                            <i class="fas fa-clock mr-3 text-blue-600"></i>
                            Quick Response Time
                        </h4>
                        <div class="text-center">
                            <div style="font-size: 3rem; color: #3498db; margin-bottom: 0.5rem;">
                                <i class="fas fa-stopwatch"></i>
                            </div>
                            <h3 style="color: #2c3e50; margin-bottom: 0.5rem;">Under 2 Hours</h3>
                            <p style="color: #666;">Average response time for quote requests during business hours</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Additional CSS for improved forms -->
<style>
    .suggestions-dropdown {
        display: none;
        position: absolute;
        background: white;
        border: 1px solid #e1e5e9;
        border-radius: 8px;
        z-index: 1000;
        max-height: 200px;
        overflow-y: auto;
        width: 100%;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        margin-top: 2px;
    }
    
    .suggestion-item {
        padding: 12px 16px;
        cursor: pointer;
        border-bottom: 1px solid #f8f9fa;
        transition: background-color 0.2s ease;
    }
    
    .suggestion-item:hover {
        background-color: #f8f9fa;
    }
    
    .suggestion-item:last-child {
        border-bottom: none;
    }
    
    .error-message {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.5rem;
        display: block;
    }
    
    /* Mobile responsiveness for form grid */
    @media (max-width: 768px) {
        .grid-2 {
            grid-template-columns: 1fr !important;
        }
        
        .card {
            margin-bottom: 1rem;
        }
        
        .hero {
            padding: 2rem 0 !important;
        }
        
        .hero h1 {
            font-size: 2rem !important;
        }
        
        .hero p {
            font-size: 1.1rem !important;
        }
    }
</style>

<script>
    // Enhanced US Cities data with more Texas cities
    const usCities = [
        'New York, NY', 'Los Angeles, CA', 'Chicago, IL', 'Houston, TX', 'Phoenix, AZ', 'Philadelphia, PA',
        'San Antonio, TX', 'San Diego, CA', 'Dallas, TX', 'San Jose, CA', 'Austin, TX', 'Jacksonville, FL',
        'Fort Worth, TX', 'Columbus, OH', 'Charlotte, NC', 'San Francisco, CA', 'Indianapolis, IN', 'Seattle, WA',
        'Denver, CO', 'Washington, DC', 'Boston, MA', 'El Paso, TX', 'Nashville, TN', 'Detroit, MI',
        'Oklahoma City, OK', 'Portland, OR', 'Las Vegas, NV', 'Memphis, TN', 'Louisville, KY', 'Baltimore, MD',
        'Milwaukee, WI', 'Albuquerque, NM', 'Tucson, AZ', 'Fresno, CA', 'Sacramento, CA', 'Kansas City, MO',
        'Mesa, AZ', 'Atlanta, GA', 'Omaha, NE', 'Colorado Springs, CO', 'Raleigh, NC', 'Virginia Beach, VA',
        'Long Beach, CA', 'Miami, FL', 'Oakland, CA', 'Minneapolis, MN', 'Tulsa, OK', 'Tampa, FL',
        'Arlington, TX', 'New Orleans, LA', 'Wichita, KS', 'Cleveland, OH', 'Bakersfield, CA', 'Aurora, CO',
        'Anaheim, CA', 'Honolulu, HI', 'Santa Ana, CA', 'Riverside, CA', 'Corpus Christi, TX', 'Lexington, KY',
        'Stockton, CA', 'Henderson, NV', 'Saint Paul, MN', 'St. Louis, MO', 'Cincinnati, OH', 'Pittsburgh, PA',
        'Greensboro, NC', 'Anchorage, AK', 'Plano, TX', 'Lincoln, NE', 'Orlando, FL', 'Irvine, CA',
        'Newark, NJ', 'Toledo, OH', 'Durham, NC', 'Chula Vista, CA', 'Fort Wayne, IN', 'Jersey City, NJ',
        'St. Petersburg, FL', 'Laredo, TX', 'Madison, WI', 'Chandler, AZ', 'Buffalo, NY', 'Lubbock, TX',
        'Scottsdale, AZ', 'Reno, NV', 'Glendale, AZ', 'Gilbert, AZ', 'Winston-Salem, NC', 'North Las Vegas, NV',
        'Norfolk, VA', 'Chesapeake, VA', 'Garland, TX', 'Irving, TX', 'Hialeah, FL', 'Fremont, CA',
        'Boise, ID', 'Richmond, VA', 'Baton Rouge, LA', 'Spokane, WA', 'Des Moines, IA', 'Modesto, CA',
        'Fayetteville, NC', 'Tacoma, WA', 'Oxnard, CA', 'Fontana, CA', 'Columbus, GA', 'Montgomery, AL',
        // Additional Texas cities
        'Amarillo, TX', 'Beaumont, TX', 'Brownsville, TX', 'Carrollton, TX', 'College Station, TX', 
        'Denton, TX', 'Edinburg, TX', 'Frisco, TX', 'Grand Prairie, TX', 'Killeen, TX', 'League City, TX',
        'Lewisville, TX', 'McAllen, TX', 'McKinney, TX', 'Mesquite, TX', 'Midland, TX', 'Odessa, TX',
        'Pasadena, TX', 'Pearland, TX', 'Richardson, TX', 'Round Rock, TX', 'Sugar Land, TX', 'Tyler, TX',
        'Waco, TX', 'Weatherford, TX', 'Wichita Falls, TX'
    ];

    function setupAutocomplete(inputId, suggestionsId) {
        const input = document.getElementById(inputId);
        const suggestions = document.getElementById(suggestionsId);

        if (!input || !suggestions) return;

        input.addEventListener('input', function() {
            const value = this.value.toLowerCase().trim();
            suggestions.innerHTML = '';

            if (value.length < 2) {
                suggestions.style.display = 'none';
                return;
            }

            const matches = usCities.filter(city =>
                city.toLowerCase().includes(value)
            ).slice(0, 8);

            if (matches.length > 0) {
                matches.forEach(city => {
                    const div = document.createElement('div');
                    div.className = 'suggestion-item';
                    div.textContent = city;

                    div.addEventListener('click', function() {
                        input.value = city;
                        suggestions.style.display = 'none';
                        input.focus();
                    });

                    suggestions.appendChild(div);
                });
                suggestions.style.display = 'block';
            } else {
                suggestions.style.display = 'none';
            }
        });

        // Hide suggestions when clicking outside
        document.addEventListener('click', function(e) {
            if (!input.contains(e.target) && !suggestions.contains(e.target)) {
                suggestions.style.display = 'none';
            }
        });

        // Hide suggestions on ESC key
        input.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                suggestions.style.display = 'none';
            }
        });
    }

    // Enhanced form validation
    function validateForm() {
        const form = document.getElementById('quote-form');
        const inputs = form.querySelectorAll('input[required], select[required]');
        let isValid = true;

        inputs.forEach(input => {
            const errorElement = input.parentNode.querySelector('.error-message');
            
            if (!input.value.trim()) {
                isValid = false;
                input.style.borderColor = '#dc3545';
                if (!errorElement) {
                    const error = document.createElement('span');
                    error.className = 'error-message';
                    error.textContent = 'This field is required';
                    input.parentNode.appendChild(error);
                }
            } else {
                input.style.borderColor = '#e1e5e9';
                if (errorElement && !errorElement.textContent.includes('The')) {
                    errorElement.remove();
                }
            }
        });

        return isValid;
    }

    // Initialize when page loads
    document.addEventListener('DOMContentLoaded', function() {
        // Setup autocomplete
        setupAutocomplete('from_address', 'from_suggestions');
        setupAutocomplete('to_address', 'to_suggestions');

        // Form submission handling
        const form = document.getElementById('quote-form');
        if (form) {
            form.addEventListener('submit', function(e) {
                if (!validateForm()) {
                    e.preventDefault();
                    alert('Please fill in all required fields.');
                    return false;
                }
                
                // Show loading state
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Sending Quote Request...';
                submitBtn.disabled = true;
                
                // Re-enable after 3 seconds if something goes wrong
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 10000);
            });
        }

        // Phone number formatting
        const phoneInput = document.getElementById('phone');
        if (phoneInput) {
            phoneInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length >= 6) {
                    value = `(${value.slice(0,3)}) ${value.slice(3,6)}-${value.slice(6,10)}`;
                } else if (value.length >= 3) {
                    value = `(${value.slice(0,3)}) ${value.slice(3)}`;
                }
                e.target.value = value;
            });
        }

        // Set minimum date to today
        const dateInput = document.getElementById('move_date');
        if (dateInput) {
            const today = new Date().toISOString().split('T')[0];
            dateInput.setAttribute('min', today);
        }
    });
</script>

<!-- FAQ Section -->
<section class="section" style="background: #f8f9fa;">
    <div class="container">
        <div class="text-center mb-4">
            <h2 style="font-size: 2.5rem; margin-bottom: 1rem; color: #2c3e50;">Frequently Asked Questions</h2>
            <p style="font-size: 1.2rem; color: #666;">Get answers to common questions about our moving services</p>
        </div>

        <div class="grid grid-2">
            <div class="card">
                <h4 style="color: #2c3e50; margin-bottom: 1rem; display: flex; align-items: center;">
                    <i class="fas fa-question-circle mr-3 text-blue-600"></i>
                    How quickly can I get a quote?
                </h4>
                <p>Most quote requests are responded to within 2 hours during business hours. For urgent moves, call us directly at (956) 526-8221.</p>
            </div>

            <div class="card">
                <h4 style="color: #2c3e50; margin-bottom: 1rem; display: flex; align-items: center;">
                    <i class="fas fa-question-circle mr-3 text-blue-600"></i>
                    Are your movers insured?
                </h4>
                <p>Yes, we are fully licensed and insured. Your belongings are protected throughout the entire moving process.</p>
            </div>

            <div class="card">
                <h4 style="color: #2c3e50; margin-bottom: 1rem; display: flex; align-items: center;">
                    <i class="fas fa-question-circle mr-3 text-blue-600"></i>
                    Do you provide packing services?
                </h4>
                <p>Absolutely! We offer complete packing and unpacking services using professional-grade materials to ensure your items are secure.</p>
            </div>

            <div class="card">
                <h4 style="color: #2c3e50; margin-bottom: 1rem; display: flex; align-items: center;">
                    <i class="fas fa-question-circle mr-3 text-blue-600"></i>
                    What areas do you serve?
                </h4>
                <p>We serve Laredo, TX and surrounding areas, with long-distance moving services available throughout Texas and beyond.</p>
            </div>
        </div>
    </div>
</section>
@endsection
