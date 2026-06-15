@extends('layouts.app')

@section('title', 'Privacy Policy')
@section('meta_description', 'Perfecta Regen Privacy Policy — how we collect, use, and protect your personal information when you shop with us.')

@section('content')
@include('pages.partials.legal-header', ['title' => 'Privacy Policy'])

<section class="legal-content-section pb-16 sm:pb-20 lg:pb-28">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="legal-prose card-elevated p-6 sm:p-10 lg:p-12">
            <p class="legal-lead">
                Perfecta Regen ("we," "us," or "our") respects your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website, place an order, or otherwise interact with us.
            </p>

            <h2>1. Information We Collect</h2>
            <p>We may collect the following types of information:</p>
            <ul>
                <li><strong>Contact information</strong> — name, email address, and phone number when you place an order or contact us.</li>
                <li><strong>Shipping information</strong> — street address, city, state, ZIP/postal code, and country needed to fulfill your order.</li>
                <li><strong>Order information</strong> — products purchased, quantities, order totals, order status, and optional order notes.</li>
                <li><strong>Technical information</strong> — browser type, device information, IP address, and general usage data collected automatically through cookies and similar technologies when you browse our site.</li>
            </ul>

            <h2>2. How We Use Your Information</h2>
            <p>We use the information we collect to:</p>
            <ul>
                <li>Process, fulfill, and deliver your orders</li>
                <li>Communicate with you about your order, shipping updates, and customer support inquiries</li>
                <li>Improve our website, products, and customer experience</li>
                <li>Comply with legal obligations and prevent fraud or misuse</li>
                <li>Send marketing communications only where you have opted in or where permitted by law</li>
            </ul>

            <h2>3. How We Share Your Information</h2>
            <p>We do not sell your personal information. We may share information with:</p>
            <ul>
                <li><strong>Service providers</strong> — such as shipping carriers, payment processors, email providers, and hosting partners who assist in operating our business</li>
                <li><strong>Legal authorities</strong> — when required by law, court order, or to protect our rights, safety, or property</li>
                <li><strong>Business transfers</strong> — in connection with a merger, acquisition, or sale of assets, subject to appropriate confidentiality protections</li>
            </ul>

            <h2>4. Cookies &amp; Tracking</h2>
            <p>
                Our website may use cookies and similar technologies to maintain your shopping cart, remember preferences, and understand how visitors use the site. You can control cookies through your browser settings, though disabling them may affect site functionality.
            </p>

            <h2>5. Data Retention</h2>
            <p>
                We retain personal information for as long as necessary to fulfill orders, maintain business records, resolve disputes, and comply with applicable legal requirements. Order records may be kept for accounting and tax purposes as required by law.
            </p>

            <h2>6. Data Security</h2>
            <p>
                We implement reasonable administrative, technical, and physical safeguards designed to protect your personal information. However, no method of transmission over the Internet or electronic storage is completely secure, and we cannot guarantee absolute security.
            </p>

            <h2>7. Your Rights &amp; Choices</h2>
            <p>Depending on your location, you may have the right to:</p>
            <ul>
                <li>Request access to the personal information we hold about you</li>
                <li>Request correction or deletion of your personal information</li>
                <li>Opt out of certain marketing communications</li>
                <li>Request information about how your data is used and shared</li>
            </ul>
            <p>
                If you are a California resident, you may have additional rights under the California Consumer Privacy Act (CCPA), including the right to know, delete, and opt out of the sale of personal information. We do not sell personal information.
            </p>
            <p>
                To exercise your privacy rights, contact us using the details below. We may need to verify your identity before responding to certain requests.
            </p>

            <h2>8. Children's Privacy</h2>
            <p>
                Our website and products are not intended for individuals under 18 years of age. We do not knowingly collect personal information from children. If you believe we have collected information from a minor, please contact us so we can promptly remove it.
            </p>

            <h2>9. Third-Party Links</h2>
            <p>
                Our website may contain links to third-party websites. We are not responsible for the privacy practices or content of those sites. We encourage you to review their privacy policies before providing any personal information.
            </p>

            <h2>10. Changes to This Policy</h2>
            <p>
                We may update this Privacy Policy from time to time. The "Last updated" date at the top of this page indicates when the policy was most recently revised. Continued use of our website after changes are posted constitutes acceptance of the updated policy.
            </p>

            <h2>11. Contact Us</h2>
            <p>If you have questions about this Privacy Policy or our data practices, contact us at:</p>
            <div class="legal-contact">
                <p><strong>Perfecta Regen</strong></p>
                <p>743 California Ave.<br>Simi Valley, CA 93065<br>United States</p>
                <p>Email: <a href="mailto:hello@perfectaregen.com">hello@perfectaregen.com</a></p>
            </div>
        </div>

        <div class="legal-footer-links">
            <a href="{{ route('terms') }}" class="text-sm text-muted hover:text-gold-dark transition-colors">Terms &amp; Conditions</a>
            <span class="text-muted/40" aria-hidden="true">·</span>
            <a href="{{ route('home') }}" class="text-sm text-muted hover:text-gold-dark transition-colors">Return to Home</a>
        </div>
    </div>
</section>
@endsection
