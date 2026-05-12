import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
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

    // Project data
    const projectData = {
        1: { title: "Urban Exploration", desc: "A journey through the neon-lit streets of a bustling metropolis, capturing the essence of city life." },
        2: { title: "Coastal Serenity", desc: "The calming sound of waves and the soft touch of ocean breeze, frozen in time." },
        3: { title: "Rustic Mornings", desc: "The aroma of freshly brewed coffee in a quiet, cozy corner of a hidden gem." }
    };

    let scatterTimeouts = [];

    // 1. Camera Trigger - Snap!
    if (cameraTrigger) {
        cameraTrigger.addEventListener('click', () => {
            // Apply blur to background
            if (heroSection) heroSection.classList.add('content-blur');
            if (cameraSection) cameraSection.classList.add('content-blur');
            
            // Hide the camera container with a sink animation
            if (cameraContainer) cameraContainer.classList.add('camera-sink');
            
            // Show the polaroids section
            setTimeout(() => {
                if (polaroidsSection) {
                    polaroidsSection.classList.remove('hidden', 'opacity-0', 'blur-md');
                    polaroidsSection.classList.add('opacity-100');
                }
                
                // Clear any existing timeouts
                scatterTimeouts.forEach(clearTimeout);
                scatterTimeouts = [];

                // Sequential scattering with a small initial delay to prevent "popping"
                polaroidCards.forEach((card, index) => {
                    const timeout = setTimeout(() => {
                        card.classList.add(`scatter-${index + 1}`);
                    }, (index + 1) * 400); // Start from index 1 to avoid instant pop
                    scatterTimeouts.push(timeout);
                });
            }, 300);
        });
    }

    // 2. Reset Button - Go Back
    if (resetButton) {
        resetButton.addEventListener('click', () => {
            // Clear any active scattering timeouts
            scatterTimeouts.forEach(clearTimeout);
            scatterTimeouts = [];

            // Pull back all polaroids by removing classes
            polaroidCards.forEach((card, index) => {
                card.classList.remove(`scatter-${index + 1}`);
            });

            // Wait for the pull-back transition to finish
            setTimeout(() => {
                // Blur and fade out the whole polaroids section
                if (polaroidsSection) {
                    polaroidsSection.classList.add('opacity-0', 'blur-md');
                }

                setTimeout(() => {
                    if (polaroidsSection) polaroidsSection.classList.add('hidden');
                    
                    // Remove blur from background
                    if (heroSection) heroSection.classList.remove('content-blur');
                    if (cameraSection) cameraSection.classList.remove('content-blur');
                    
                    // Bring camera back
                    if (cameraContainer) cameraContainer.classList.remove('camera-sink');
                    
                    // Scroll back to camera anchor
                    const anchor = document.getElementById('camera-anchor');
                    if (anchor) anchor.scrollIntoView({ behavior: 'smooth' });
                }, 500); // Wait for the section fade-out
            }, 800); // Wait for the cards pull-back
        });
    }

    // 3. Polaroid Click Event (Expansion)
    polaroidCards.forEach(card => {
        card.addEventListener('click', () => {
            const id = card.getAttribute('data-id');
            const img = card.querySelector('img');
            const caption = card.querySelector('p').innerText;
            const data = projectData[id];

            if (modalImage) modalImage.src = img.src;
            if (modalCaption) modalCaption.innerText = caption;
            if (modalTitle) modalTitle.innerText = data.title;
            if (modalDesc) modalDesc.innerText = data.desc;

            if (expandedModal) {
                expandedModal.classList.remove('pointer-events-none', 'opacity-0');
                expandedModal.classList.add('opacity-100');
            }
            
            setTimeout(() => {
                if (modalImageContainer) {
                    modalImageContainer.classList.remove('scale-90');
                    modalImageContainer.classList.add('scale-100');
                }
                if (modalInfo) {
                    modalInfo.classList.remove('opacity-0', 'translate-x-8');
                    modalInfo.classList.add('opacity-100', 'translate-x-0');
                }
            }, 100);
        });
    });

    // 4. Close Modal
    if (closeModal) {
        closeModal.addEventListener('click', () => {
            if (expandedModal) {
                expandedModal.classList.remove('opacity-100');
                expandedModal.classList.add('opacity-0');
                // Delay pointer-events-none so the transition can finish
                setTimeout(() => {
                    expandedModal.classList.add('pointer-events-none');
                }, 500);
            }
            
            if (modalImageContainer) {
                modalImageContainer.classList.add('scale-90');
                modalImageContainer.classList.remove('scale-100');
            }
            if (modalInfo) {
                modalInfo.classList.add('opacity-0', 'translate-x-8');
                modalInfo.classList.remove('opacity-100', 'translate-x-0');
            }
        });
    }

    // Close on backdrop click
    if (expandedModal) {
        expandedModal.addEventListener('click', (e) => {
            if (e.target === expandedModal) {
                closeModal.click();
            }
        });
    }
});

