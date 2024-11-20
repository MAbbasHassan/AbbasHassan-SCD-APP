<x-master-layout>
    <style>
         body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #4a4a4a;
            background-image:url("{{asset('./images/food.webp')}}");
            background-size: cover;
        }
        .terms-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
           
        }
        .terms-container h1 {
            text-align: center;
            color: #4A5B4F;
            margin-bottom: 1.5rem;
        }
        .terms-container h2 {
            color: #6b8e23;
            margin-top: 1.5rem;
        }
        .terms-container p {
            line-height: 1.6;
            color: #4a4a4a;
        }
        .terms-container ul {
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

    <div class="terms-container">
        <h1><strong>Terms of Service</strong></h1>
        <p>Welcome to True Organic Hub! These terms and conditions outline the rules and regulations for the use of True Organic Hub's Website, located at <a href="#">trueorganichub.com</a>.</p>

        <h2>Acceptance of Terms</h2>
        <p>By accessing this website, we assume you accept these terms and conditions. Do not continue to use True Organic Hub if you do not agree to take all of the terms and conditions stated on this page.</p>

        <h2>Products and Services</h2>
        <p>True Organic Hub offers organic products for sale. We reserve the right to discontinue any product at any time without notice.</p>

        <h2>Order Acceptance</h2>
        <p>We may, in our sole discretion, refuse or cancel any order and limit quantities purchased per person, per household, or per order. We may also impose additional restrictions on the purchase of certain items.</p>

        <h2>Payment</h2>
        <p>All payments are processed securely through third-party services. We do not store your payment information.</p>

        <h2>Shipping and Delivery</h2>
        <p>We aim to ship your order promptly. However, we do not guarantee delivery dates and will not be liable for any delays caused by third-party carriers.</p>

        <h2>Returns and Refunds</h2>
        <p>We have a 30-day return policy. If you are not satisfied with your purchase, please contact us for a return authorization.</p>

        <h2>Limitation of Liability</h2>
        <p>In no event shall True Organic Hub, nor any of its officers, directors, and employees, be liable for anything arising out of or in any way connected with your use of this website whether such liability is under contract. True Organic Hub, including its officers, directors, and employees shall not be liable for any indirect, consequential or special liability arising out of or in any way related to your use of this website.</p>

        <h2>Changes to Terms</h2>
        <p>We may revise these terms at any time by updating this page. Please check this page regularly to ensure you are happy with any changes.</p>

        <h2>Contact Us</h2>
        <p>If you have any questions regarding these Terms of Service, please contact us:</p>
        <p><strong>Email:</strong> support@trueorganichub.com</p>
        <p><strong>Phone:</strong> 021-3456789</p>
    </div>
    </div>
</x-master-layout>
