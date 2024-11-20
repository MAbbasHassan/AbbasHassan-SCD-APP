<x-master-layout>
    <style>
         body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #4a4a4a;
            background-image:url("{{asset('./images/food.webp')}}");
            background-size: cover;
        }
        .policy-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        .policy-container h1 {
            text-align: center;
            color: #4A5B4F;
            margin-bottom: 1.5rem;
        }
        .policy-container h2 {
            color: #6b8e23;
            margin-top: 1.5rem;
        }
        .policy-container p {
            line-height: 1.6;
            color: #4a4a4a;
        }
        .policy-container ul {
            margin-left: 20px;
            color: #4a4a4a;
        }
        .bg-blur {
            backdrop-filter: blur(5px);
            height: 100%;
            width: 100%;
        }
    </style>
    <div class="bg-blur">

    <div class="policy-container">
        <h1><strong>Privacy Policy</strong></h1>
        <p>Your privacy is important to us. It is True Organic Hub's policy to respect your privacy regarding any information we may collect from you across our website, <a href="#">trueorganichub.com</a>, and other sites we own and operate.</p>

        <h2>Information We Collect</h2>
        <p>We may collect personal information from you when you visit our site, register, place an order, subscribe to our newsletter, respond to a survey, or fill out a form. The types of personal information we may collect include:</p>
        <ul>
            <li>Name</li>
            <li>Email address</li>
            <li>Phone number</li>
            <li>Mailing address</li>
            <li>Payment information</li>
        </ul>

        <h2>How We Use Your Information</h2>
        <p>We may use the information we collect from you for the following purposes:</p>
        <ul>
            <li>To process transactions and send you order confirmations</li>
            <li>To improve customer service and respond to support needs</li>
            <li>To personalize your experience and deliver content and product offerings relevant to you</li>
            <li>To send periodic emails regarding your order or other products and services</li>
            <li>To administer a contest, promotion, survey, or other site feature</li>
        </ul>

        <h2>Data Protection</h2>
        <p>We implement a variety of security measures to maintain the safety of your personal information when you place an order or enter, submit, or access your personal information. We offer the use of a secure server. All supplied sensitive/credit information is transmitted via Secure Socket Layer (SSL) technology and then encrypted into our Payment Gateway providers database only to be accessible by those authorized with special access rights to such systems, and are required to keep the information confidential.</p>

        <h2>Cookies</h2>
        <p>We may use cookies to help us remember and process the items in your shopping cart and understand and save your preferences for future visits.</p>

        <h2>Third-Party Services</h2>
        <p>We do not sell, trade, or otherwise transfer to outside parties your Personally Identifiable Information unless we provide users with advance notice. This does not include website hosting partners and other parties who assist us in operating our website, conducting our business, or servicing you, so long as those parties agree to keep this information confidential.</p>

        <h2>Changes to Our Privacy Policy</h2>
        <p>We may update our Privacy Policy from time to time. We will notify you about significant changes in the way we treat personal information by sending a notice to the primary email address specified in your account or by placing a prominent notice on our site.</p>

        <h2>Contact Us</h2>
        <p>If you have any questions about this Privacy Policy, please contact us at:</p>
        <p><strong>Email:</strong> support@trueorganichub.com</p>
        <p><strong>Phone:</strong> (123) 456-7890</p>
    </div>
    </div>
</x-master-layout>
