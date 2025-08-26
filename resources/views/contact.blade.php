@extends('layout')

@section('title', 'Contact Us - MoversLaredo.com')

@section('content')
<section class="section">
    <div class="container">
        <h1 style="text-align: center; margin-bottom: 3rem;">Contact Us</h1>

        @if(session('success'))
            <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 5px; margin-bottom: 2rem;">
                {{ session('success') }}
            </div>
        @endif

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: start;">
            <!-- Contact Form -->
            <div>
                <h2>Send Us a Message</h2>
                <form action="{{ route('contact.store') }}" method="POST" style="background: #f8f9fa; padding: 2rem; border-radius: 8px; margin-top: 1rem;">
                    @csrf

                    <div style="margin-bottom: 1.5rem;">
                        <label for="name" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Full Name *</label>
                        <input type="text" id="name" name="name" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" value="{{ old('name') }}">
                        @error('name')
                            <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="email" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Email Address *</label>
                        <input type="email" id="email" name="email" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" value="{{ old('email') }}">
                        @error('email')
                            <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="phone" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Phone Number</label>
                        <input type="tel" id="phone" name="phone" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" value="{{ old('phone') }}">
                        @error('phone')
                            <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="subject" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Subject *</label>
                        <input type="text" id="subject" name="subject" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" value="{{ old('subject') }}">
                        @error('subject')
                            <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="message" style="display: block; margin-bottom: 0.5rem; font-weight: bold;">Message *</label>
                        <textarea id="message" name="message" rows="5" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">{{ old('message') }}</textarea>
                        @error('message')
                            <span style="color: #dc3545; font-size: 0.875rem;">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn" style="width: 100%;">Send Message</button>
                </form>
            </div>

            <!-- Contact Information -->
            <div>
                <h2>Get in Touch</h2>
                <div style="margin-top: 1rem;">
                    <div style="margin-bottom: 2rem; padding: 1.5rem; background: #f8f9fa; border-radius: 8px;">
                        <h3 style="color: #2c3e50; margin-bottom: 1rem;">Contact Information</h3>
                        <p style="margin-bottom: 0.5rem;"><strong>Phone:</strong> (956) 526-8221</p>
                        <p style="margin-bottom: 0.5rem;"><strong>Email:</strong> quote@moverslaredo.com</p>
                        <p style="margin-bottom: 0.5rem;"><strong>Address:</strong> 602 W. Calton RD, Laredo, TX 78041</p>
                    </div>

                    <div style="margin-bottom: 2rem; padding: 1.5rem; background: #f8f9fa; border-radius: 8px;">
                        <h3 style="color: #2c3e50; margin-bottom: 1rem;">Business Hours</h3>
                        <p style="margin-bottom: 0.5rem;"><strong>Monday - Friday:</strong> 8:00 AM - 6:00 PM</p>
                        <p style="margin-bottom: 0.5rem;"><strong>Saturday:</strong> 8:00 AM - 4:00 PM</p>
                        <p style="margin-bottom: 0.5rem;"><strong>Sunday:</strong> Closed</p>
                        <p style="margin-top: 1rem; font-style: italic;">Emergency moves available 24/7</p>
                    </div>

                    <div style="padding: 1.5rem; background: #f8f9fa; border-radius: 8px;">
                        <h3 style="color: #2c3e50; margin-bottom: 1rem;">Service Areas</h3>
                        <p>We proudly serve Laredo and surrounding areas including:</p>
                        <ul style="margin-top: 0.5rem;">
                            <li>Laredo, TX</li>
                            <li>Webb County</li>
                            <li>Rio Bravo</li>
                            <li>El Cenizo</li>
                            <li>United, TX</li>
                            <li>And surrounding communities</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div style="text-align: center; margin-top: 4rem;">
            <h3>Ready to Move?</h3>
            <p style="margin-bottom: 2rem;">Contact us today for your free, no-obligation quote!</p>
            <a href="{{ route('quote') }}" class="btn">Get Free Quote</a>
        </div>
    </div>
</section>
@endsection
