<x-master-layout>
    <title>Contact-Us | True Organic Hub</title>
<style>
        body {
            font-family: 'Arial', sans-serif;
            background-image:url("{{asset("./images./food.webp")}}") ; 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #4a4a4a;
        }
        .contact-section {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 2rem;
        }
        .team-section {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 2rem;
        }
        .footer {
            background-color: rgba(228, 253, 225, 0.8);
            padding: 1rem;
            text-align: center;
            color: #4a4a4a;
            margin-top: 3rem;
        }
        .btn-submit {
            background-color: #6b8e23;
            color: white;
            border: none;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn-submit:hover {
            background-color: #556b2f;
            transform: scale(1.05);
        }
        .details-box {
            background-color: rgba(220, 240, 220, 0.9);
            padding: 1rem;
            border-radius: 10px;
            margin-top: 1rem;
            display: none;
        }

        .social-media {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .social-media a {
            margin: 0 15px;
            width: 40px; 
            height: 40px; 
            border-radius: 80%; 
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s, transform 0.3s;
        }

        .social-media a img {
            width: 50px; 
            height: 50px;
        }

        .social-media a:hover {
            background-color: #6b8e23;
            transform: scale(1.1);
        }
        .link_sty{
            color: blue;
            text-decoration: underline;
        }
        .bg-blur{
		backdrop-filter:blur(5px);
		height:100%;
		width:100%;
		}
    </style>
</head>
<body>
    <div class="bg-blur">
    <div class="container contact-section">
        <h1 class="text-center">Contact Us</h1>
        <p class="text-center"><strong>We’d love to hear from you! Please reach out with any questions, comments, or feedback.</strong></p>
        
        <div class="row mt-4">
            <div class="col-md-6">
                <h4>Our Office</h4>
                <p>123 Organic Street, Clifton, Karachi, Pakistan</p>
                <p><i class="bi bi-envelope"></i> <a class="link_sty" href="mailto:hello@trueorganichub.com">contact@trueorganichub.com</a></p>
                <p><i class="bi bi-telephone"></i> +92 123 4567890</p>
                <p><i class="bi bi-globe"></i> <a class="link_sty" href="https://www.trueorganichub.com">www.trueorganichub.com</a></p>
            </div>

            <div class="col-md-6">
                <form id="contactForm" onsubmit="formSubmit(event)">
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Your Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-submit w-100">Submit</button>
                </form>
                <div id="confirmationMessage" class="mt-3 text-success" style="display: none;"></div>

                <div id="detail" class="details-box">
                    <h4>Details of the Submitted Form</h4>
                    <div id="text"></div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <h4 class="text-center">Follow Us</h4>
                <div class="social-media">
                    <a href="https://www.facebook.com/YourPage" target="_blank" aria-label="Follow us on Facebook">
                        <img src="{{asset("images/face.webp")}}" alt="Facebook">
                    </a>
                    <a href="https://www.instagram.com/YourPage" target="_blank" aria-label="Follow us on Instagram">
                        <img src="{{asset("images/insta.jfif")}}" alt="Instagram">
                    </a>
                    <a href="https://www.youtube.com/YourChannel" target="_blank" aria-label="Follow us on YouTube">
                        <img src="{{asset("images/you.png")}}" alt="YouTube">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section class="container team-section">
        <h2 class="text-center">Team</h2>
        <div class="row">
            <div class="col-md-4 col-sm-12 mt-2" data-aos="fade-left" data-aos-delay="50" data-aos-duration="1000">
                <img src="{{asset("images/usericon.png")}}" class="img-fluid" style="width: 40%;">
            </div>
            <div class="col-md-8 col-sm-12 mt-2" data-aos="fade-right" data-aos-delay="50" data-aos-duration="1000" style="border-left: 1px solid black;">
                <h3>Muhammad Abbas Hassan</h3>
                <h6 style="font-weight: bold;">bcsbs2212333@szabist.pk</h6>
                <h6 style="font-weight: bold;">021-3456789</h6>
                <p>CEO & Founder</p>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function formSubmit(event) {
            event.preventDefault(); 
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const subject = document.getElementById('subject').value;
            const message = document.getElementById('message').value;

            document.getElementById('confirmationMessage').innerText = 'Thank you for contacting us, ' + name + '!';
            document.getElementById('confirmationMessage').style.display = 'block';

            document.getElementById('text').innerHTML = `
                <p><strong>Name:</strong> ${name}</p>
                <p><strong>Email:</strong> ${email}</p>
                <p><strong>Subject:</strong> ${subject}</p>
                <p><strong>Message:</strong> ${message}</p>
            `;
            document.getElementById('detail').style.display = 'block';

            document.getElementById('contactForm').reset();
        }
    </script>
    </div>
</body>
</x-master-layout>
