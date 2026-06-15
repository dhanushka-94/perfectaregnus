@extends('layouts.app')

@section('title', 'Terms & Conditions')
@section('meta_description', 'Perfecta Regen Terms and Conditions — rules for using our website and purchasing our collagen peptide products.')

@section('content')
@include('pages.partials.legal-header', ['title' => 'Terms & Conditions'])

<section class="legal-content-section pb-16 sm:pb-20 lg:pb-28">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="legal-prose card-elevated p-6 sm:p-10 lg:p-12">
            <p class="legal-lead">
                These Terms &amp; Conditions ("Terms") govern your access to and use of the Perfecta Regen website and your purchase of products from us. By using this website or placing an order, you agree to these Terms.
            </p>

            <h2>1. About Perfecta Regen</h2>
            <p>
                Perfecta Regen offers premium dietary supplement products, including collagen peptide formulas, through this website. We are based in the United States and ship to addresses within the regions we support at checkout.
            </p>

            <h2>2. Eligibility</h2>
            <p>
                You must be at least 18 years of age to use this website and purchase our products. By placing an order, you represent that you meet this requirement and that all information you provide is accurate and complete.
            </p>

            <h2>3. Product Information &amp; Disclaimer</h2>
            <p>
                We strive to display product descriptions, ingredients, and images as accurately as possible. However, we do not warrant that product descriptions or other content on this site are complete, current, or error-free.
            </p>
            <p>
                <strong>Dietary supplement disclaimer:</strong> These statements have not been evaluated by the Food and Drug Administration (FDA). Perfecta Regen products are not intended to diagnose, treat, cure, or prevent any disease. Our products are dietary supplements and should not replace advice from a qualified healthcare professional.
            </p>
            <p>
                Consult your physician before use if you are pregnant, nursing, taking medication, or have a medical condition. Discontinue use and consult a healthcare provider if you experience an adverse reaction.
            </p>

            <h2>4. Orders &amp; Acceptance</h2>
            <p>
                When you place an order, you offer to purchase the selected products subject to these Terms. We reserve the right to accept or decline any order for any reason, including product availability, errors in pricing or product information, or suspected fraud.
            </p>
            <p>
                An order confirmation email or page does not constitute acceptance of your order. Acceptance occurs when we confirm fulfillment or shipment of your order.
            </p>

            <h2>5. Pricing &amp; Payment</h2>
            <p>
                All prices are listed in U.S. dollars unless otherwise stated. We reserve the right to change prices at any time without notice. Applicable shipping charges and taxes, if any, will be displayed during checkout before you submit your order.
            </p>
            <p>
                Payment terms will be communicated during checkout or order confirmation. We reserve the right to cancel orders if payment cannot be verified or completed according to our stated payment process.
            </p>

            <h2>6. Shipping &amp; Delivery</h2>
            <p>
                We will make reasonable efforts to ship orders within the timeframe communicated at checkout or in your order confirmation. Delivery dates are estimates only and are not guaranteed. Risk of loss passes to you upon delivery to the carrier.
            </p>
            <p>
                You are responsible for providing a complete and accurate shipping address. We are not liable for delays or failed deliveries resulting from incorrect address information provided by you.
            </p>

            <h2>7. Returns &amp; Refunds</h2>
            <p>
                Due to the nature of dietary supplement products, all sales may be subject to restrictions on returns once the product has been opened or used, except where required by applicable law. If you receive a damaged, defective, or incorrect item, contact us within a reasonable time at <a href="mailto:hello@perfectaregen.com">hello@perfectaregen.com</a> with your order number and details of the issue.
            </p>
            <p>
                We will review return requests on a case-by-case basis and may offer a replacement or refund at our discretion where appropriate.
            </p>

            <h2>8. Intellectual Property</h2>
            <p>
                All content on this website — including text, graphics, logos, images, product names, and design — is owned by or licensed to Perfecta Regen and is protected by applicable intellectual property laws. You may not copy, reproduce, distribute, or create derivative works without our prior written consent.
            </p>

            <h2>9. Acceptable Use</h2>
            <p>You agree not to:</p>
            <ul>
                <li>Use the website for any unlawful purpose or in violation of these Terms</li>
                <li>Attempt to gain unauthorized access to our systems, accounts, or data</li>
                <li>Interfere with the proper functioning or security of the website</li>
                <li>Submit false, misleading, or fraudulent order information</li>
                <li>Scrape, harvest, or misuse content or customer data from the site</li>
            </ul>

            <h2>10. Limitation of Liability</h2>
            <p>
                To the fullest extent permitted by law, Perfecta Regen and its officers, employees, and affiliates shall not be liable for any indirect, incidental, special, consequential, or punitive damages arising from your use of the website or products, even if we have been advised of the possibility of such damages.
            </p>
            <p>
                Our total liability for any claim arising out of or relating to these Terms or your purchase shall not exceed the amount you paid for the product giving rise to the claim.
            </p>

            <h2>11. Indemnification</h2>
            <p>
                You agree to indemnify and hold harmless Perfecta Regen from any claims, damages, losses, or expenses (including reasonable legal fees) arising from your violation of these Terms, misuse of the website, or violation of any rights of a third party.
            </p>

            <h2>12. Governing Law</h2>
            <p>
                These Terms are governed by the laws of the State of California, United States, without regard to conflict-of-law principles. Any dispute arising under these Terms shall be subject to the exclusive jurisdiction of the state or federal courts located in Ventura County, California, unless otherwise required by applicable consumer protection law.
            </p>

            <h2>13. Changes to These Terms</h2>
            <p>
                We may revise these Terms at any time by posting an updated version on this page. The "Last updated" date reflects the most recent revision. Your continued use of the website after changes are posted constitutes acceptance of the revised Terms.
            </p>

            <h2>14. Contact Us</h2>
            <p>For questions about these Terms, contact us at:</p>
            <div class="legal-contact">
                <p><strong>Perfecta Regen</strong></p>
                <p>743 California Ave.<br>Simi Valley, CA 93065<br>United States</p>
                <p>Email: <a href="mailto:hello@perfectaregen.com">hello@perfectaregen.com</a></p>
            </div>
        </div>

        <div class="legal-footer-links">
            <a href="{{ route('privacy') }}" class="text-sm text-muted hover:text-gold-dark transition-colors">Privacy Policy</a>
            <span class="text-muted/40" aria-hidden="true">·</span>
            <a href="{{ route('home') }}" class="text-sm text-muted hover:text-gold-dark transition-colors">Return to Home</a>
        </div>
    </div>
</section>
@endsection
