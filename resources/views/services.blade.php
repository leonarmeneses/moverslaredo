@extends('layout')

@section('title', 'Services - MoversLaredo.com')

@section('content')
<section class="section">
    <div class="container">
        <h1 style="text-align: center; margin-bottom: 3rem;">Our Services</h1>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 3rem;">
            <div style="padding: 2rem; border: 1px solid #ddd; border-radius: 8px;">
                <h3>Residential Moving</h3>
                <p>Complete home moving services including packing, loading, transport, and unpacking. We handle everything from studio apartments to large family homes.</p>
                <ul style="margin-top: 1rem;">
                    <li>Professional packing services</li>
                    <li>Furniture disassembly/assembly</li>
                    <li>Safe transport of fragile items</li>
                    <li>Unpacking and setup</li>
                </ul>
            </div>

            <div style="padding: 2rem; border: 1px solid #ddd; border-radius: 8px;">
                <h3>Commercial Moving</h3>
                <p>Office and business relocations with minimal downtime. We understand the importance of getting your business back up and running quickly.</p>
                <ul style="margin-top: 1rem;">
                    <li>Office furniture and equipment</li>
                    <li>IT equipment handling</li>
                    <li>Document and file transport</li>
                    <li>Weekend and after-hours moves</li>
                </ul>
            </div>

            <div style="padding: 2rem; border: 1px solid #ddd; border-radius: 8px;">
                <h3>Long Distance Transport</h3>
                <p>Interstate and cross-country moving services. We coordinate every aspect of your long-distance move for a seamless experience.</p>
                <ul style="margin-top: 1rem;">
                    <li>Interstate moving permits</li>
                    <li>Real-time tracking</li>
                    <li>Secure storage options</li>
                    <li>Delivery scheduling</li>
                </ul>
            </div>

            <div style="padding: 2rem; border: 1px solid #ddd; border-radius: 8px;">
                <h3>Packing Services</h3>
                <p>Professional packing and unpacking services using high-quality materials to ensure your items arrive safely.</p>
                <ul style="margin-top: 1rem;">
                    <li>Quality packing materials</li>
                    <li>Fragile item specialists</li>
                    <li>Custom crating for valuables</li>
                    <li>Unpacking services</li>
                </ul>
            </div>

            <div style="padding: 2rem; border: 1px solid #ddd; border-radius: 8px;">
                <h3>Storage Solutions</h3>
                <p>Secure, climate-controlled storage facilities for short-term and long-term storage needs.</p>
                <ul style="margin-top: 1rem;">
                    <li>Climate-controlled units</li>
                    <li>24/7 security monitoring</li>
                    <li>Flexible rental terms</li>
                    <li>Easy access scheduling</li>
                </ul>
            </div>

            <div style="padding: 2rem; border: 1px solid #ddd; border-radius: 8px;">
                <h3>Specialty Items</h3>
                <p>Expert handling of pianos, artwork, antiques, and other valuable or delicate items requiring special care.</p>
                <ul style="margin-top: 1rem;">
                    <li>Piano moving specialists</li>
                    <li>Artwork and antique handling</li>
                    <li>Custom protective packaging</li>
                    <li>White glove service</li>
                </ul>
            </div>
        </div>

        <div style="text-align: center; margin-top: 4rem;">
            <a href="{{ route('quote') }}" class="btn">Get Your Free Quote Today</a>
        </div>
    </div>
</section>
@endsection
