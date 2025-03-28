<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alianza Lima - Pasión Blanquiazul</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        :root {
            --blanquiazul: #0050A5;
            --blanco: #FFFFFF;
            --azul-oscuro: #003366;
            --dorado: #FFD700;
            --gris-oscuro: #1A1A1A;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--blanco);
            color: var(--gris-oscuro);
            overflow-x: hidden;
            position: relative;
        }
        
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(0,80,165,0.1) 0%, rgba(255,255,255,0) 50%);
            z-index: -1;
        }
        
        .hero {
            position: relative;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        
        .hero-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            opacity: 0.2;
        }
        
        .hero-content {
            text-align: center;
            max-width: 900px;
            padding: 2rem;
            z-index: 2;
        }
        
        .hero-title {
            font-size: 4.5rem;
            font-weight: 900;
            color: var(--blanquiazul);
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            line-height: 1.1;
        }
        
        .hero-subtitle {
            font-size: 1.5rem;
            color: var(--azul-oscuro);
            margin-bottom: 2.5rem;
            font-weight: 600;
        }
        
        .main-image {
            width: 100%;
            max-width: 800px;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            border: 4px solid var(--blanco);
            margin: 2rem auto;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .main-image:hover {
            transform: scale(1.02);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
        }
        
        .signature {
            font-family: 'Brush Script MT', cursive;
            font-size: 1.8rem;
            color: var(--blanquiazul);
            margin-top: 1rem;
            text-align: right;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            padding-right: 2rem;
            opacity: 0.9;
        }
        
        @media (max-width: 768px) {
            .hero-title {
                font-size: 3rem;
            }
            
            .hero-subtitle {
                font-size: 1.2rem;
            }
        }
        
        /* Animaciones */
        .pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body>
    <section class="hero">
        <video autoplay muted loop class="hero-video">
            <source src="https://assets.mixkit.co/videos/preview/mixkit-football-fans-celebrating-a-victory-41563-large.mp4" type="video/mp4">
        </video>
        <div class="hero-content">
            <h1 class="hero-title animate__animated animate__fadeInDown">¡VIVA ALIANZA LIMA!</h1>
            <p class="hero-subtitle animate__animated animate__fadeInUp animate__delay-1s">Más que un club, una pasión que une corazones</p>
            
            <img src="https://imgmedia.larepublica.pe/640x371/larepublica/original/2025/01/07/677d83a6dc93420f8f5fdf40.webp" 
                 alt="Alianza Lima" 
                 class="main-image animate__animated animate__zoomIn animate__delay-2s pulse">
            
            <p class="signature animate__animated animate__fadeIn animate__delay-3s">Fabricio Aylas Moreno</p>
        </div>
    </section>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const title = document.querySelector('.hero-title');
            const originalText = title.textContent;
            title.textContent = '';
            
            let i = 0;
            const speed = 100;
            
            function typeWriter() {
                if (i < originalText.length) {
                    title.textContent += originalText.charAt(i);
                    i++;
                    setTimeout(typeWriter, speed);
                }
            }
            
            setTimeout(typeWriter, 1000);
        });
    </script>
</body>
</html>