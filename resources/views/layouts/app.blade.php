<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Pemilihan Ketua & Wakil OSIS SMKN 1 Kota Bekasi')</title>
    <link rel="icon" href="{{ asset('img/logo/logo.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes scaleIn {
        from {
            opacity: 0;
            transform: scale(0.95);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .animate-fade-in {
        animation: fadeIn 0.3s ease-out;
    }

    .animate-scale-in {
        animation: scaleIn 0.3s ease-out;
    }
    </style>
</head>

<body class="font-sans bg-background" style="font-family: 'Poppins', sans-serif;">
    <div class="min-h-screen">
        @yield('content')
    </div>

    <script>
    // Confetti animation
    function createConfetti() {
        const colors = ['#4551ff', '#ffd45e', 'var(--color-background)'];
        const confettiCount = 100;

        for (let i = 0; i < confettiCount; i++) {
            const confetti = document.createElement('div');
            confetti.style.position = 'fixed';
            confetti.style.left = Math.random() * 100 + '%';
            confetti.style.top = '-10px';
            confetti.style.width = Math.random() * 10 + 5 + 'px';
            confetti.style.height = confetti.style.width;
            confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
            confetti.style.borderRadius = '50%';
            confetti.style.pointerEvents = 'none';
            confetti.style.zIndex = '9999';
            confetti.style.opacity = Math.random();
            confetti.style.transform = 'rotate(' + Math.random() * 360 + 'deg)';

            document.body.appendChild(confetti);

            const animation = confetti.animate([{
                    transform: 'translateY(0) rotate(0deg)',
                    opacity: 1
                },
                {
                    transform: 'translateY(' + (window.innerHeight + 100) + 'px) rotate(720deg)',
                    opacity: 0
                }
            ], {
                duration: Math.random() * 3000 + 2000,
                easing: 'cubic-bezier(0.5, 0, 0.5, 1)'
            });

            animation.onfinish = () => confetti.remove();
        }
    }

    window.createConfetti = createConfetti;

    // Listen for vote success event
    window.addEventListener('vote-success', () => {
        createConfetti();
    });
    </script>
    @stack('scripts')
    @livewireScripts
</body>

</html>