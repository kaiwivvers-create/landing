<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Portfolio - Vintage Experience</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Playfair+Display:ital,wght@0,400;0,900;1,400&family=Inter:wght@400;500;700;900&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Critical Styles Injected Directly to Bypass Build Issues -->
        <style>
            .content-blur {
                filter: blur(12px) brightness(0.8) !important;
                pointer-events: none;
            }
            .camera-sink {
                animation: cameraSink 1.2s cubic-bezier(0.5, 0, 0.2, 1) forwards;
                pointer-events: none;
            }
            @keyframes cameraSink {
                0% { transform: translateY(0) scale(1); opacity: 1; filter: blur(0); }
                100% { transform: translateY(200px) scale(0.8); opacity: 0; filter: blur(10px); }
            }
            .polaroid-card {
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%) scale(0);
                opacity: 0;
                transition: all 0.8s cubic-bezier(0.34, 1.56, 0.64, 1);
                pointer-events: none;
                position: absolute;
                visibility: hidden;
            }
            .scatter-1 { transform: translate(-180%, -60%) scale(1) rotate(-15deg) !important; opacity: 1 !important; }
            .scatter-2 { transform: translate(-50%, -85%) scale(1) rotate(5deg) !important; opacity: 1 !important; }
            .scatter-3 { transform: translate(80%, -65%) scale(1) rotate(18deg) !important; opacity: 1 !important; }
            .scatter-4 { transform: translate(-180%, -60%) scale(1) rotate(8deg) !important; opacity: 1 !important; }
            .scatter-5 { transform: translate(-50%, -85%) scale(1) rotate(-5deg) !important; opacity: 1 !important; }
            .scatter-6 { transform: translate(80%, -65%) scale(1) rotate(-12deg) !important; opacity: 1 !important; }

            .font-handwriting { font-family: 'Dancing Script', cursive; }
            .font-serif { font-family: 'Playfair Display', serif; }
            .modal-blur-active {
                filter: blur(15px) brightness(0.8) !important;
            }
            #main-content, #hero, #camera-section, #polaroids-section {
                transition: filter 0.8s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.8s ease;
            }
        </style>

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-stone-50 text-slate-900 font-sans selection:bg-indigo-100 selection:text-indigo-900 overflow-x-hidden">
        
        <main id="main-content">
            <!-- Hero Section -->
            <section id="hero" class="relative min-h-screen flex items-center justify-center overflow-hidden transition-all duration-700" style="background-image: url('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&q=80&w=2000'); background-size: cover; background-position: center;">
                <!-- Darkened Overlay for Text Readability -->
                <div class="absolute inset-0 bg-slate-900/30 z-0"></div>
                
                <!-- Periwinkle Fade at the Bottom (MASSIVE overlap) -->
                <div class="absolute bottom-0 inset-x-0 h-[30rem] bg-gradient-to-t from-[#E0E7FF] via-[#E0E7FF] to-transparent z-10"></div>
                
                <!-- Abstract Background Orbs (Aesthetic Colors) -->
                <div class="absolute inset-0 z-0 opacity-40">
                    <div class="absolute -top-24 -left-24 w-96 h-96 bg-blue-400/30 rounded-full blur-3xl animate-pulse"></div>
                    <div class="absolute top-1/2 -right-24 w-80 h-80 bg-indigo-500/20 rounded-full blur-3xl animate-pulse delay-700"></div>
                </div>

                <!-- Content Container -->
                <div class="container mx-auto px-6 relative z-10 flex flex-col md:flex-row items-center justify-between gap-12 pt-20">
                    <!-- Text Content -->
                    <div class="flex-1 text-center md:text-left">
                        <h1 class="text-6xl md:text-8xl font-serif font-black text-white mb-6 leading-tight drop-shadow-lg">
                            My Own <br/> <span class="text-indigo-200 italic">Portfolio Page.</span>
                        </h1>
                        <p class="text-xl md:text-2xl text-stone-100 max-w-lg mb-8 font-medium drop-shadow-md">
                            Welcome to my personal showcase.
                        </p>
                        <a href="#camera-anchor" class="inline-flex items-center px-8 py-4 bg-slate-900 text-white rounded-full font-bold text-lg hover:bg-indigo-600 transition-all duration-300 shadow-xl hover:-translate-y-1">
                            Start Exploring
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                        </a>
                    </div>

                    <!-- Character Placeholder -->
                    <div class="flex-1 flex justify-center md:justify-end relative">
                        <div class="relative w-72 h-72 sm:w-96 sm:h-96 md:w-[450px] md:h-[600px] rounded-2xl overflow-hidden shadow-2xl transform rotate-3 hover:rotate-0 transition-transform duration-700 group">
                            <img src="https://cdn.cara.app/production/posts/c1f3dc8b-89b2-4e61-9d28-668523406146/octopie-z5IAkX-GWwEkeEnc1dylr-0B2C4F4B-6509-40D5-BE14-D5F2959C519E.jpg" alt="Character" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                            <div class="absolute inset-0 ring-1 ring-inset ring-white/20 rounded-2xl"></div>
                        </div>
                        <!-- Decorative Elements -->
                        <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-indigo-500/20 blur-3xl rounded-full"></div>
                        <div class="absolute -top-6 -right-6 w-32 h-32 bg-pink-500/20 blur-3xl rounded-full"></div>
                    </div>
                </div>
            </section>

            <div id="camera-anchor" class="h-0"></div>

            <!-- Camera Section (Periwinkle Background) -->
            <section id="camera-section" class="relative min-h-screen flex flex-col items-center justify-center py-20 z-20 -mt-24" style="background: linear-gradient(to bottom, #E0E7FF 0%, #F5F7FF 50%, #FFFFFF 100%);">
                <div id="camera-container" class="relative transition-all duration-[1500ms] ease-in-out cursor-pointer group">
                    <!-- The Vintage Camera (Built with CSS) -->
                    <div id="camera-trigger" class="relative w-64 h-48 sm:w-80 sm:h-56 bg-slate-800 rounded-xl shadow-[0_30px_60px_-15px_rgba(0,0,0,0.5)] flex flex-col items-center justify-center border-b-[10px] border-slate-900 group-hover:scale-105 transition-transform duration-500">
                        <!-- Top Chrome Bar -->
                        <div class="absolute top-0 inset-x-0 h-4 bg-slate-700 rounded-t-xl border-b border-slate-900/50"></div>
                        
                        <!-- Viewfinder -->
                        <div class="absolute -top-6 left-1/2 -translate-x-1/2 w-20 h-10 bg-slate-800 rounded-t-lg border-x-[8px] border-t-[8px] border-slate-900 flex items-center justify-center">
                            <div class="w-12 h-4 bg-slate-950 rounded shadow-inner"></div>
                        </div>

                        <!-- Shutter Button -->
                        <div class="absolute -top-4 right-8 w-10 h-6 bg-slate-700 rounded-md border-b-4 border-slate-900 active:translate-y-1 transition-transform">
                            <div class="absolute inset-x-2 top-1 h-1 bg-red-500/50 rounded-full animate-pulse"></div>
                        </div>

                        <!-- Flash -->
                        <div class="absolute top-4 left-8 w-12 h-8 bg-slate-200/20 rounded border border-white/10 backdrop-blur-sm"></div>

                        <!-- Lens (The big round part) -->
                        <div class="relative w-32 h-32 sm:w-40 sm:h-40 rounded-full border-[10px] border-slate-900 bg-slate-950 shadow-[inset_0_10px_20px_rgba(0,0,0,0.8)] flex items-center justify-center">
                            <div class="w-24 h-24 sm:w-32 sm:h-32 rounded-full border-4 border-slate-800 bg-gradient-to-br from-slate-700 to-slate-950 flex items-center justify-center overflow-hidden">
                                <div class="w-12 h-12 sm:w-16 sm:h-16 rounded-full bg-slate-900 shadow-inner relative">
                                    <div class="absolute top-2 left-3 w-6 h-6 bg-white/10 rounded-full blur-[2px]"></div>
                                    <div class="absolute bottom-4 right-4 w-2 h-2 bg-indigo-500/30 rounded-full"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Branding -->
                        <div class="absolute bottom-4 left-6 text-[10px] font-bold tracking-[0.2em] text-slate-500 uppercase">kaii</div>
                    </div>

                    <!-- Instruction Text -->
                    <div id="camera-label" class="mt-12 text-center opacity-80 group-hover:opacity-100 transition-opacity">
                        <p class="text-sm font-semibold tracking-widest uppercase mb-2">Ready to snap</p>
                        <h3 class="text-3xl font-serif font-bold text-slate-900">Click to reveal memories</h3>
                    </div>
                </div>
            </section>
        </main>

        <!-- OVERLAYS -->

        <!-- Wave 2 trigger arrow is now inside the polaroids section -->

        <!-- Polaroids Scatter Section -->
        <div id="polaroids-section" class="fixed inset-0" style="display: none; z-index: 9999; pointer-events: auto;">
            <button id="reset-camera" class="fixed top-8 left-8 z-50 flex items-center gap-2 px-6 py-3 bg-white shadow-2xl rounded-full font-bold text-slate-900 hover:bg-indigo-600 hover:text-white transition-all duration-300 pointer-events-auto">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Camera
            </button>

            <button id="prev-wave-arrow" class="absolute z-[60] p-6 text-slate-800 hover:text-indigo-600 transition-all duration-300 hover:-translate-x-2 active:scale-90 flex items-center justify-center cursor-pointer pointer-events-auto" style="left: 3rem; top: 50%; transform: translateY(-50%); display: none;">
                <i class="fas fa-chevron-left text-8xl"></i>
            </button>

            <button id="next-wave-arrow" class="absolute z-[60] p-6 text-slate-800 hover:text-indigo-600 transition-all duration-300 hover:translate-x-2 active:scale-90 flex items-center justify-center cursor-pointer pointer-events-auto" style="right: 3rem; top: 50%; transform: translateY(-50%);">
                <i class="fas fa-chevron-right text-8xl"></i>
            </button>

            <div class="relative w-full h-full flex items-center justify-center perspective-[1500px] pointer-events-none">
                <div class="polaroid-card wave-1 absolute top-[50%] cursor-pointer" data-id="1">
                    <div class="bg-white p-4 pb-16 shadow-[0_30px_70px_rgba(0,0,0,0.3)] rounded-sm transform transition-all duration-500 hover:-translate-y-8 hover:shadow-[0_50px_100px_rgba(0,0,0,0.4)]">
                        <div class="w-48 h-48 sm:w-64 sm:h-64 bg-slate-200 overflow-hidden border border-slate-100">
                            <img src="https://cdn.cara.app/production/posts/c069dbe2-612a-469e-8ff4-23e1f5d85cc2/11648B0B-F053-430B-BFBB-51C05CC56EC5.jpg-rAJE4k3Maf9C_VVaH_Vmz-11648B0B-F053-430B-BFBB-51C05CC56EC5.jpg" class="w-full h-full object-cover" />
                        </div>
                        <p class="text-center mt-6 font-handwriting text-2xl text-slate-800 tracking-wide rotate-[-2deg]">City Lights</p>
                    </div>
                </div>
                <div class="polaroid-card wave-1 absolute top-[50%] cursor-pointer" data-id="2">
                    <div class="bg-white p-4 pb-16 shadow-[0_30px_70px_rgba(0,0,0,0.3)] rounded-sm transform transition-all duration-500 hover:-translate-y-8 hover:shadow-[0_50px_100px_rgba(0,0,0,0.4)]">
                        <div class="w-48 h-48 sm:w-64 sm:h-64 bg-slate-200 overflow-hidden border border-slate-100">
                            <img src="https://cdn.cara.app/production/posts/1625e6d3-1d5b-4fd0-ac9b-8ad3610f5817/50FF2D67-FA49-4A78-AFCE-B1E67B5DA1A1.jpg-SlDjHqgG04pGJIuO78-R3-50FF2D67-FA49-4A78-AFCE-B1E67B5DA1A1.jpg" class="w-full h-full object-cover" />
                        </div>
                        <p class="text-center mt-6 font-handwriting text-2xl text-slate-800 tracking-wide rotate-[3deg]">Ocean Breeze</p>
                    </div>
                </div>
                <div class="polaroid-card wave-1 absolute top-[50%] cursor-pointer" data-id="3">
                    <div class="bg-white p-4 pb-16 shadow-[0_30px_70px_rgba(0,0,0,0.3)] rounded-sm transform transition-all duration-500 hover:-translate-y-8 hover:shadow-[0_50px_100px_rgba(0,0,0,0.4)]">
                        <div class="w-48 h-48 sm:w-64 sm:h-64 bg-slate-200 overflow-hidden border border-slate-100">
                            <img src="https://cdn.cara.app/production/posts/c1f3dc8b-89b2-4e61-9d28-668523406146/octopie-NwbLQn2r5VnHs5JsuTUzj-5D5A07B7-D2B4-435B-AC15-EC939E2F3471.jpg" class="w-full h-full object-cover" />
                        </div>
                        <p class="text-center mt-6 font-handwriting text-2xl text-slate-800 tracking-wide rotate-[1deg]">Morning Brew</p>
                    </div>
                </div>

                <!-- WAVE 2 CARDS -->
                <div class="polaroid-card wave-2 absolute top-[50%] cursor-pointer" data-id="4">
                    <div class="bg-white p-4 pb-16 shadow-[0_30px_70px_rgba(0,0,0,0.3)] rounded-sm transform transition-all duration-500 hover:-translate-y-8 hover:shadow-[0_50px_100px_rgba(0,0,0,0.4)]">
                        <div class="w-48 h-48 sm:w-64 sm:h-64 bg-slate-200 overflow-hidden border border-slate-100">
                            <img src="https://images.unsplash.com/photo-1544648397-72fc8f9d87f0?auto=format&fit=crop&q=80&w=600" class="w-full h-full object-cover" />
                        </div>
                        <p class="text-center mt-6 font-handwriting text-2xl text-slate-800 tracking-wide">Legacy</p>
                    </div>
                </div>
                <div class="polaroid-card wave-2 absolute top-[50%] cursor-pointer" data-id="5">
                    <div class="bg-white p-4 pb-16 shadow-[0_30px_70px_rgba(0,0,0,0.3)] rounded-sm transform transition-all duration-500 hover:-translate-y-8 hover:shadow-[0_50px_100px_rgba(0,0,0,0.4)]">
                        <div class="w-48 h-48 sm:w-64 sm:h-64 bg-slate-200 overflow-hidden border border-slate-100">
                            <img src="https://images.unsplash.com/photo-1518005020480-1cd34333bb6a?auto=format&fit=crop&q=80&w=600" class="w-full h-full object-cover" />
                        </div>
                        <p class="text-center mt-6 font-handwriting text-2xl text-slate-800 tracking-wide">Vision</p>
                    </div>
                </div>
                <div class="polaroid-card wave-2 absolute top-[50%] cursor-pointer" data-id="6">
                    <div class="bg-white p-4 pb-16 shadow-[0_30px_70px_rgba(0,0,0,0.3)] rounded-sm transform transition-all duration-500 hover:-translate-y-8 hover:shadow-[0_50px_100px_rgba(0,0,0,0.4)]">
                        <div class="w-48 h-48 sm:w-64 sm:h-64 bg-slate-200 overflow-hidden border border-slate-100">
                            <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&fit=crop&q=80&w=600" class="w-full h-full object-cover" />
                        </div>
                        <p class="text-center mt-6 font-handwriting text-2xl text-slate-800 tracking-wide">Grit</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Expanded Polaroid Modal -->
        <div id="expanded-modal" class="fixed inset-0 flex items-center justify-center bg-white/95 backdrop-blur-2xl opacity-0 pointer-events-none transition-opacity duration-500" style="display: none; z-index: 999999 !important;">
            <button id="close-modal" class="absolute top-8 right-8 w-12 h-12 bg-slate-900 text-white rounded-full flex items-center justify-center hover:bg-indigo-600 hover:rotate-90 transition-all duration-300 shadow-lg pointer-events-auto">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            <div class="flex flex-col md:flex-row items-center justify-center gap-12 p-8 max-w-6xl w-full">
                <div id="modal-image-container" class="bg-white p-6 pb-24 shadow-[0_40px_100px_rgba(0,0,0,0.4)] rounded-sm transition-transform duration-700" style="transform: scale(0.9);">
                    <div class="w-72 h-72 sm:w-[450px] sm:h-[450px] bg-slate-200 border border-slate-100 overflow-hidden">
                        <img id="modal-image" src="" class="w-full h-full object-cover" />
                    </div>
                    <p id="modal-caption" class="text-center mt-10 font-handwriting text-4xl text-slate-800"></p>
                </div>

                <div id="modal-info" class="flex-1 transition-all duration-700 delay-300 max-w-lg" style="opacity: 0; transform: translateX(30px);">
                    <div class="bg-white p-10 sm:p-14 rounded-[3rem] shadow-[0_40px_120px_rgba(0,0,0,0.15)] border border-slate-50">
                        <h2 id="modal-title" class="text-4xl md:text-6xl font-serif font-black text-slate-900 mb-6 border-b-4 border-indigo-500/20 pb-4">Project Title</h2>
                        <p id="modal-desc" class="text-lg md:text-xl text-slate-700 leading-relaxed font-medium mb-8">
                            This is a detailed explanation of the captured moment. It describes the feelings, the atmosphere, and the memories associated with this photograph.
                        </p>
                        <a href="#" class="inline-flex items-center text-indigo-600 font-bold text-xl group hover:text-indigo-800 transition-colors">
                            Explore full project 
                            <svg class="w-6 h-6 ml-3 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            window.addEventListener('load', () => {
                const mainContent = document.getElementById('main-content');
                const heroSection = document.getElementById('hero');
                const cameraSection = document.getElementById('camera-section');
                const cameraTrigger = document.getElementById('camera-trigger');
                const cameraContainer = document.getElementById('camera-container');
                const polaroidsSection = document.getElementById('polaroids-section');
                const polaroidCards = document.querySelectorAll('.polaroid-card');
                const resetButton = document.getElementById('reset-camera');
                const expandedModal = document.getElementById('expanded-modal');
                const closeModal = document.getElementById('close-modal');
                const modalImage = document.getElementById('modal-image');
                const modalCaption = document.getElementById('modal-caption');
                const modalTitle = document.getElementById('modal-title');
                const modalDesc = document.getElementById('modal-desc');
                const modalInfo = document.getElementById('modal-info');
                const modalImageContainer = document.getElementById('modal-image-container');

                const projectData = {
                    1: { title: "Urban Exploration", desc: "A journey through the neon-lit streets of a bustling metropolis, capturing the essence of city life." },
                    2: { title: "Coastal Serenity", desc: "The calming sound of waves and the soft touch of ocean breeze, frozen in time." },
                    3: { title: "Rustic Mornings", desc: "The aroma of freshly brewed coffee in a quiet, cozy corner of a hidden gem." },
                    4: { title: "Enduring Legacy", desc: "Reflecting on the foundations built over time and the stories passed down through generations." },
                    5: { title: "Modern Vision", desc: "A bold look into the future, blending contemporary aesthetics with innovative ideas." },
                    6: { title: "Steadfast Grit", desc: "The raw energy and determination required to overcome challenges and reach new heights." }
                };

                if (cameraTrigger) {
                    cameraTrigger.addEventListener('click', () => {
                        if (cameraTrigger.classList.contains('snapped')) return;
                        cameraTrigger.classList.add('snapped');
                        if (cameraContainer) cameraContainer.classList.add('camera-sink');
                        if (mainContent) mainContent.classList.add('content-blur');

                        if (polaroidsSection) {
                            polaroidsSection.style.display = 'block';
                            setTimeout(() => {
                                polaroidsSection.style.opacity = '1';
                                currentWave = 1;
                                if (prevArrow) prevArrow.style.display = 'none';
                                if (nextArrow) {
                                    nextArrow.style.display = 'flex';
                                    nextArrow.style.opacity = '1';
                                }
                                // Clear everything first
                                polaroidCards.forEach((card, index) => {
                                    card.classList.remove(`scatter-${index + 1}`);
                                    card.classList.remove(`scatter-${index + 4}`);
                                    card.style.opacity = '0';
                                    card.style.visibility = 'hidden';
                                    card.style.pointerEvents = 'none';
                                });
                                // Show only wave-1
                                document.querySelectorAll('.wave-1').forEach((card, index) => {
                                    setTimeout(() => {
                                        card.style.visibility = 'visible';
                                        card.classList.add(`scatter-${index + 1}`);
                                        card.style.opacity = '1';
                                        card.style.pointerEvents = 'auto';
                                    }, index * 100 + 50);
                                });
                            }, 50);
                        }
                    });
                }

                if (resetButton) {
                    resetButton.addEventListener('click', () => {
                        cameraTrigger.classList.remove('snapped');
                        currentWave = 1;
                        if (prevArrow) prevArrow.style.display = 'none';
                        if (nextArrow) {
                            nextArrow.style.display = 'flex';
                            nextArrow.style.opacity = '1';
                        }
                        polaroidCards.forEach((card, index) => {
                            card.classList.remove(`scatter-${index + 1}`);
                            card.classList.remove(`scatter-${index + 4}`);
                            card.style.opacity = '0';
                            card.style.visibility = 'hidden';
                            card.style.pointerEvents = 'none';
                        });
                        if (polaroidsSection) {
                            polaroidsSection.style.opacity = '0';
                            setTimeout(() => {
                                polaroidsSection.style.display = 'none';
                                if (arrow) {
                                    arrow.style.display = 'flex';
                                    arrow.style.opacity = '1';
                                }
                            }, 500);
                        }
                        if (mainContent) mainContent.classList.remove('content-blur');
                        if (cameraContainer) cameraContainer.classList.remove('camera-sink');
                    });
                }

                const nextArrow = document.getElementById('next-wave-arrow');
                const prevArrow = document.getElementById('prev-wave-arrow');
                let currentWave = 1;
                if (nextArrow) {
                    nextArrow.addEventListener('click', () => {
                        currentWave = 2;
                        document.querySelectorAll('.wave-1').forEach((card, index) => {
                            card.classList.remove(`scatter-${index + 1}`);
                            card.style.opacity = '0';
                            card.style.pointerEvents = 'none';
                            setTimeout(() => { if (currentWave !== 1) card.style.visibility = 'hidden'; }, 800);
                        });
                        document.querySelectorAll('.wave-2').forEach((card, index) => {
                            card.style.visibility = 'visible';
                            setTimeout(() => {
                                card.classList.add(`scatter-${index + 4}`);
                                card.style.opacity = '1';
                                card.style.pointerEvents = 'auto';
                            }, index * 100 + 50);
                        });
                        nextArrow.style.display = 'none';
                        if (prevArrow) {
                            prevArrow.style.display = 'flex';
                            prevArrow.style.opacity = '1';
                        }
                    });
                }

                if (prevArrow) {
                    prevArrow.addEventListener('click', () => {
                        currentWave = 1;
                        document.querySelectorAll('.wave-2').forEach((card, index) => {
                            card.classList.remove(`scatter-${index + 4}`);
                            card.style.opacity = '0';
                            card.style.pointerEvents = 'none';
                            setTimeout(() => { if (currentWave !== 2) card.style.visibility = 'hidden'; }, 800);
                        });
                        document.querySelectorAll('.wave-1').forEach((card, index) => {
                            card.style.visibility = 'visible';
                            setTimeout(() => {
                                card.classList.add(`scatter-${index + 1}`);
                                card.style.opacity = '1';
                                card.style.pointerEvents = 'auto';
                            }, index * 100 + 50);
                        });
                        prevArrow.style.display = 'none';
                        if (nextArrow) {
                            nextArrow.style.display = 'flex';
                            nextArrow.style.opacity = '1';
                        }
                    });
                }

                polaroidCards.forEach(card => {
                    card.addEventListener('click', () => openModal(card));
                });

                function openModal(card) {
                    const id = card.getAttribute('data-id');
                    const img = card.querySelector('img');
                    const p = card.querySelector('p');
                    const caption = p ? p.innerText : "Discovery";
                    const data = (id && projectData[id]) ? projectData[id] : { title: caption, desc: "A special moment from the Narc Showroom collection." };

                    if (expandedModal) {
                        if (modalImage && img) modalImage.src = img.src;
                        if (modalCaption) modalCaption.innerText = caption;
                        if (modalTitle) modalTitle.innerText = data.title;
                        if (modalDesc) modalDesc.innerText = data.desc;

                        expandedModal.style.display = 'flex';
                        if (mainContent) mainContent.classList.add('modal-blur-active');
                        if (polaroidsSection) polaroidsSection.classList.add('modal-blur-active');
                        
                        setTimeout(() => {
                            expandedModal.classList.remove('pointer-events-none', 'opacity-0');
                            expandedModal.classList.add('opacity-100');
                            if (modalImageContainer) modalImageContainer.style.transform = 'scale(1)';
                            if (modalInfo) {
                                modalInfo.style.opacity = '1';
                                modalInfo.style.transform = 'translateX(0)';
                            }
                        }, 10);
                    }
                }

                // triggerBasketballSequence removed as per simplification

                if (closeModal) {
                    closeModal.addEventListener('click', () => {
                        if (expandedModal) {
                            expandedModal.classList.remove('opacity-100');
                            expandedModal.classList.add('opacity-0');
                            
                            if (mainContent) mainContent.classList.remove('modal-blur-active');
                            if (polaroidsSection) polaroidsSection.classList.remove('modal-blur-active');
                            
                            if (modalImageContainer) modalImageContainer.style.transform = 'scale(0.9)';
                            if (modalInfo) {
                                modalInfo.style.opacity = '0';
                                modalInfo.style.transform = 'translateX(30px)';
                            }
                            setTimeout(() => {
                                expandedModal.style.display = 'none';
                                expandedModal.style.pointerEvents = 'none';
                            }, 500);
                        }
                    });
                }

                document.querySelectorAll('.extra-card').forEach(card => {
                    card.addEventListener('click', () => openModal(card));
                });
                
                // backFromBasketball removed as per simplification
            });
        </script>
    </body>
</html>
