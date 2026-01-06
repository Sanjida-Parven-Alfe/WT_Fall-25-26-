<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BariForce - Home</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* --- CSS Start --- */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

        :root {
            --primary: #4A90E2;    
            --secondary: #2C3E50;  
            --text: #333;
            --light-bg: #F9FBFD;
            --white: #fff;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { background: var(--light-bg); color: var(--text); overflow-x: hidden; }

        /* Navbar */
        .navbar {
            display: flex; justify-content: space-between; align-items: center;
            background: var(--white); padding: 1.2rem 5%;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            position: sticky; top: 0; z-index: 1000;
        }
        .logo { font-size: 1.8rem; font-weight: 800; color: var(--primary); text-decoration: none; }
        .nav-links a { text-decoration: none; color: var(--secondary); margin-left: 2rem; font-weight: 500; transition: 0.3s; }
        .nav-links a:hover { color: var(--primary); }
        .btn-signup { 
            background: var(--primary); color: white !important; padding: 10px 25px; 
            border-radius: 50px; transition: 0.3s; box-shadow: 0 4px 10px rgba(74, 144, 226, 0.3);
        }
        .btn-signup:hover { background: #357ABD; transform: translateY(-3px); }

        /* Hero Section */
        .hero {
            display: flex; align-items: center; justify-content: space-between;
            padding: 4rem 5%; min-height: 85vh;
            background: linear-gradient(135deg, #ffffff 0%, #f0f4f8 100%);
        }
        .hero-text { flex: 1; padding-right: 3rem; }
        .hero-text h1 { font-size: 3.5rem; line-height: 1.2; margin-bottom: 1rem; color: var(--secondary); }
        .hero-text span { color: var(--primary); }
        .hero-text p { font-size: 1.1rem; color: #666; margin-bottom: 2rem; max-width: 500px; }

        .cta-box { display: flex; gap: 20px; align-items: center; }
        .btn-main { 
            background: var(--primary); color: white; padding: 12px 30px; 
            border-radius: 50px; text-decoration: none; font-weight: 600; 
            box-shadow: 0 5px 15px rgba(74, 144, 226, 0.4); transition: 0.3s;
        }
        .btn-main:hover { transform: translateY(-3px); background: #357ABD; }
        
        .btn-sec { color: var(--secondary); text-decoration: none; font-weight: 600; font-size: 1rem; }
        .btn-sec:hover { color: var(--primary); }

        /* Image Animation */
        .hero-img img { max-width: 100%; width: 600px; animation: float 4s ease-in-out infinite; }
        @keyframes float { 0% { transform: translateY(0px); } 50% { transform: translateY(-20px); } 100% { transform: translateY(0px); } }

        /* Footer */
        footer { text-align: center; padding: 2rem; background: var(--white); color: #888; margin-top: auto; }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="#" class="logo">BariForce.</a>
        <div class="nav-links">
            <a href="#">Home</a>
            <a href="#">Services</a>
            <a href="#">Login</a>
            <a href="#" class="btn-signup">Sign Up</a>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-text">
            <h1>Expert Home Services <br> at Your <span>Doorstep</span></h1>
            <p>Need a cleaner, electrician, or driver? BariForce connects you with verified professionals instantly.</p>
            
            <div class="cta-box">
                <a href="#" class="btn-main">Book Now</a>
                <a href="#" class="btn-sec">Sign In <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>

        <div class="hero-img">
            <img src="https://img.freepik.com/free-vector/cleaning-service-concept-illustration_114360-98.jpg?w=740" alt="Home Service">
        </div>
    </section>

    <footer>
        <p>&copy; 2026 BariForce System. Developed for Practice.</p>
    </footer>

</body>
</html>